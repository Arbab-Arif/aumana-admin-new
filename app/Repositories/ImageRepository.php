<?php


namespace App\Repositories;


use App\Interfaces\ImageRepositoryInterface;
use App\Models\Category;
use App\Models\CollageImage;
use App\Models\Image;
use App\Models\ImageSize;
use App\Models\ImageVariant;
use App\Models\SubCategory;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ImageRepository implements ImageRepositoryInterface
{
    public function getDataTable()
    {
        $query = Image::query()
            ->join('categories', 'images.category_id', '=', 'categories.id')
            ->leftJoin('sub_categories', 'images.sub_category_id', '=', 'sub_categories.id')
            ->select('images.id', 'categories.name as category', 'sub_categories.name as sub_category', 'sub_categories.slug as slug', 'images.name')
            ->with('imageSize', 'attributeImages');

        return Datatables::of($query)
            ->filter(function ($instance) {
                $search = request('search')['value'];
                $instance->where(function ($w) use ($search) {
                    $w->orWhere('categories.name', 'LIKE', "%$search%")
                        ->orWhere('sub_categories.name', 'LIKE', "%$search%")
                        ->orWhere('images.name', 'LIKE', "%$search%");
                });
            })
            ->editColumn('thumbnail', function ($obj) {
                return '<img src="' . asset($obj->attributeImages[0]->image) . '" height="50px" width="50px">';
            })
            ->addColumn('action', function ($obj) {
                $btn = '<a href="/update-image/' . $obj->id . '" class="btn btn-primary mr-2">Update</a>';
                $btn .= '<a href="javascript:void(0);" class="btn btn-danger" onclick="deleteDataSet(`' . $obj->id . '`)">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action', 'personal_use_price', 'corporate_use_price', 'commercial_use_price', 'thumbnail', 'image_size'])
            ->make(true);
    }

    public function getImageAllData()
    {
        return Image::get();
    }

    public function getImageById($imageId)
    {
        return Image::findOrFail($imageId);
    }

    public function createImage($req)
    {

        $validator = Validator::make(request()->all(), [
            'image'               => 'required',
            'image.*'             => 'required',
            'select_image_type.*' => 'required|in:thumbnail,standard,small,medium,large,extra_large',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category = Category::findOrFail($req->category_id);
        $path = '';
        if ($req->sub_category_id) {
            $subCategory = SubCategory::where('id', $req->sub_category_id)->first();
            $subCategoryPath = $subCategory->slug ? $subCategory->slug : 'slug';
            $path = Str::slug($category->name) . '/' . $subCategoryPath . '/';
        } else {
            $path = Str::slug($category->name) . '/';
        }

        $imagePath = [];
        if ($req->hasFile('image')) {
            foreach ($req->file('image') as $key => $image) {
                $actualImage = Str::random(10) . now()->format('YmdHis') . Str::random(10) . '.' . $image->getClientOriginalExtension();
                $imagePath[] = "/images/" . $path . Str::slug($req->get('size')[$key]) . '/' . $req->get('select_image_type')[$key] . '/' . $actualImage;
                $image->move(public_path('/images/' . $path) . Str::slug($req->get('size')[$key]) . '/' . $req->get('select_image_type')[$key] . '/', $actualImage);
            }

        }

        $imageId = Image::create([
            'category_id'     => $req->category_id,
            'sub_category_id' => $req->sub_category_id,
            'name'            => $req->name,
            'slug'            => Str::slug($req->name),
            'description'     => $req->description,
        ]);

        $dataMany = [];
        foreach ($req->get('select_image_type') as $key => $imageType) {
            $dataMany[] = [
                'select_image_type'    => $imageType,
                'size'                 => $req->get('size')[$key],
                'dpi'                  => $req->get('dpi')[$key],
                'personal_use_price'   => $req->get('personal_use_price')[$key],
                'corporate_use_price'  => $req->get('corporate_use_price')[$key],
                'commercial_use_price' => $req->get('commercial_use_price')[$key],
                'image'                => $imagePath[$key],
            ];
        }

        $imageId->attributeImages()->createMany($dataMany);

        return redirect('/manage-images')->with('success_msg', 'Image successfully created.');

    }

    public function updateImage($imageId, $req)
    {

        $imageData = $this->getImageById($imageId);
        $validator = Validator::make(request()->all(), [
            'image.*'             => 'required',
            'select_image_type.*' => 'required|in:thumbnail,standard,small,medium,large,extra_large',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $imageId = Image::findOrFail($imageId);

        $category = Category::findOrFail($req->category_id);
        $path = '';
        if ($req->sub_category_id) {
            $subCategory = SubCategory::where('id', $req->sub_category_id)->first();
            $subCategoryPath = $subCategory->slug ? $subCategory->slug : 'slug';
            $path = Str::slug($category->name) . '/' . $subCategoryPath . '/';
        } else {
            $path = Str::slug($category->name) . '/';
        }

        $imagePath = $imageId->attributeImages->pluck('image')->toArray();

        if ($req->hasFile('image')) {
            foreach ($req->file('image') as $key => $image) {
                $actualImage = Str::random(10) . now()->format('YmdHis') . Str::random(10) . '.' . $image->getClientOriginalExtension();
                $imagePath[$key] = "/images/" . $path . Str::slug($req->get('size')[$key]) . '/' . $req->get('select_image_type')[$key] . '/' . $actualImage;
                $image->move(public_path('/images/' . $path) . Str::slug($req->get('size')[$key]) . '/' . $req->get('select_image_type')[$key] . '/', $actualImage);
            }
        }

        $imageId->update([
            'category_id'     => $req->category_id,
            'sub_category_id' => $req->sub_category_id,
            'name'            => $req->name,
            'slug'            => Str::slug($req->name),
            'description'     => $req->description,
        ]);

        $dataMany = [];
        foreach ($req->get('select_image_type') as $key => $imageType) {
            $dataMany[] = [
                'select_image_type'    => $imageType,
                'size'                 => $req->get('size')[$key],
                'dpi'                  => $req->get('dpi')[$key],
                'personal_use_price'   => $req->get('personal_use_price')[$key],
                'corporate_use_price'  => $req->get('corporate_use_price')[$key],
                'commercial_use_price' => $req->get('commercial_use_price')[$key],
                'image'                => $imagePath[$key] ?? '',
            ];
        }
        $imageId->attributeImages()->delete();
        $imageId->attributeImages()->createMany($dataMany);
        return redirect('/manage-images')->with('success_msg', 'Image successfully updated.');
    }

    public function deleteImage($imageId)
    {
        $msg = 'Something went wrong.';
        $code = 400;

        $image = Image::find($imageId);
        if (!$image) {
            return redirect()->back()->withErrors(['error' => 'Image not found.']);
        }

        $attributes = $image->attributeImages()->get();

        foreach ($attributes as $attribute) {
            $imagePath = public_path($attribute->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $attribute->delete();
        }

        if ($image->delete()) {
            $msg = 'Image deleted successfully.';
            $code = 200;
        }

        return response()->json(['msg' => $msg], $code);

    }
}
