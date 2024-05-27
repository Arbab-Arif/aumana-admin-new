<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Validator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{

    public function index()
    {
        $data = SubCategory::with(['getCategory'])->get();
        return view('admin.sub-categories.index', compact('data'));
    }

    public function create()
    {
        $categories = Category::get();
        return view('admin.sub-categories.create', compact('categories'));
    }

    public function createData()
    {
        $validator = Validator::make(request()->all(), [
         //   'category_id' => 'required|in:' . implode(',', Category::pluck('id')->toArray()),
            'name'        => 'required|max:255|unique:sub_categories,name,NULL,id,category_id,' . request('category_id')
        ], [
            'category_id.required' => 'The category field is required.',
            'category_id.in'       => 'The selected category is invalid.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        SubCategory::create([
            'category_id' => 1,
            'name'        => request('name'),
            'slug'        => Str::slug(request('name'))
        ]);

        return redirect('/manage-sub-categories')->with('success_msg', 'Sub-Category successfully created.');
    }

    public function update($subCategoryId)
    {
        $categories = Category::get();
        $subCategory = SubCategory::findOrFail($subCategoryId);
        return view('admin.sub-categories.update', compact('categories', 'subCategory'));
    }

    public function updateData($subCategoryId)
    {
        $subCategory = SubCategory::findOrFail($subCategoryId);

        $validator = Validator::make(request()->all(), [
            // 'category_id' => 'required|in:' . implode(',', Category::pluck('id')->toArray()),
            'name'        => ['required', 'max:255', 'unique:sub_categories,name,' . $subCategoryId . ',id,category_id,' . request('category_id')]
        ], [
            'category_id.required' => 'The category field is required.',
            'category_id.in'       => 'The selected category is invalid.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $subCategory->update([
            'category_id' => 1,
            'name'        => request('name'),
            'slug'        => Str::slug(request('name'))
        ]);

        return redirect('/manage-sub-categories')->with('success_msg', 'Sub-Category successfully updated.');
    }

    public function delete($subCategoryId)
    {
        $msg = 'Something went wrong.';
        $code = 400;
        $subCategory = SubCategory::find($subCategoryId);

        if (!empty($subCategory)) {

            $hasImage = Image::where('sub_category_id', $subCategoryId)->first();
            if (!empty($hasImage)) {
                $msg = 'delete relational image first.';
            } else {
                $subCategory->delete();
                $msg = "Sub-Category successfully deleted.";
                $code = 200;
            }
        }

        return response()->json(['msg' => $msg], $code);
    }
}
