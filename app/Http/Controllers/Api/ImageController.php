<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\SubCategory;
use App\Models\WishList;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    public function getImageDetail($slug)
    {

        try {
            $images = Image::where('slug', $slug)->with('attributeImages')->get();
            return makeJsonResponse('Image Detail Fetch.', $images);
        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Some Thing Went Wrong', [], 404);
        }
    }

    public function getFeaturedImage()
    {
        try {
            $wonderLand = Image::where('is_featured', 1)->where('category_id', 1)->with('attributeImages')->take(12)->get();
            $nwCollage = Image::where('is_featured', 1)->where('category_id', 2)->take(12)->get();
            return makeJsonResponse('Featured Image get.', [
                'natural_wonderland' => $wonderLand,
                'nw_collage'         => $nwCollage
            ]);
        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Some Thing Went Wrong', [], 404);
        }
    }

    public function getCategoryByImage()
    {
        try {
            $images = SubCategory::where('category_id', request()->get('category_id'))->orderBy('sort', 'ASC')->get();
            return makeJsonResponse('Category By Image get.', $images);
        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Some Thing Went Wrong', [], 404);
        }
    }

    public function getSubCategoryByImage()
    {
        try {
            if (!empty(request()->get('sub_category_id'))) {
                $images = Image::where('sub_category_id', request()->get('sub_category_id'))->latest()->paginate(18);
            } else {
                $images = Image::where('category_id', 1)->latest()->paginate(18);
            }

            return makeJsonResponse('sub Category By Image get.', $images);
        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Some Thing Went Wrong', [], 404);
        }
    }

    public function getSCategoryCollageByImage()
    {
        try {
            $images = Image::where('category_id', 2)->paginate(16);
            return makeJsonResponse('sub Category Collage By Image get.', $images);
        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Some Thing Went Wrong', [], 404);
        }
    }

    public function getWishList()
    {
        try {
            $wishList = WishList::where('user_id', auth()->id())->with('images')->paginate(18);
            return makeJsonResponse('Wish List get.', $wishList);
        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Some Thing Went Wrong', [], 404);
        }
    }

    public function addWishList(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'category_id' => 'required|in:' . implode(',', Category::pluck('id')->toArray()),
                'image_id'    => 'required|in:' . implode(',', Image::pluck('id')->toArray()),
            ], [
                'category_id.required'     => 'The Category field is required',
                'category_id.in'           => 'The Category field is invalid',
                'sub_category_id.required' => 'The Sub-Category field is required',
                'sub_category_id.in'       => 'The Sub-Category field is invalid',
                'image_id.required'        => 'The Image field is required',
                'image_id.in'              => 'The Image field is invalid',
            ]);

            if ($validator->fails()) {
                return makeJsonResponse('Error', [], 422, collect($validator->errors())->values()->map(fn($error) => $error));
            }

            if (!empty($request->sub_category_id)) {
                $dataSet = [
                    'user_id'         => auth()->id(),
                    'category_id'     => $request->category_id,
                    'sub_category_id' => $request->sub_category_id,
                    'image_id'        => $request->image_id
                ];
            } else {
                $dataSet = [
                    'user_id'     => auth()->id(),
                    'category_id' => $request->category_id,
                    'image_id'    => $request->image_id
                ];
            }
            WishList::updateOrCreate($dataSet, $dataSet);

            return makeJsonResponse('Image successfully added in your interest list.');

        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Some Thing Went Wrong', [], 404);
        }
    }

    public function getAllImage()
    {
        try {
            $images = Image::with('getCategory', 'getSubCategory')->get();
            return makeJsonResponse('get all Image.', $images);
        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Some Thing Went Wrong', [], 404);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'category_id'     => 'required',
                'sub_category_id' => 'required',
                'name'            => 'required',
                'image'           => 'required',
                'is_featured'     => 'required',
            ]);
            if ($validator->fails()) {
                return makeJsonResponse('Error', [], 422, collect($validator->errors())->values()->map(fn($error) => $error));
            }
            $imagePath = [];
            if ($request->hasFile('image')) {
                $imageName = Str::random('4') . '.' . $request->image->extension();
                $imagePath = "/images/" . $imageName;
                $request->image->move(public_path('/images/'), $imageName);
            }
            $data = $request->all();
            $data['image'] = $imagePath;
            Image::create($data);
            return makeJsonResponse('You has been Create Image successfully.');

        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Some Thing Went Wrong', [], 404);
        }

    }

    public function update(Image $image, Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
//                'category_id' => 'required|{$subCategory->category_id}',
//                'name'        => 'required|{ $subCategory->name}',
            ]);
            if ($validator->fails()) {
                return makeJsonResponse('Error', [], 422, collect($validator->errors())->values()->map(fn($error) => $error));
            }
            $imagePath = [];
            if ($request->hasFile('image')) {
                $imageName = Str::random('4') . '.' . $request->image->extension();
                $imagePath = "/images/" . $imageName;
                $request->image->move(public_path('/images/'), $imageName);
            }
            $data = $request->all();
            $data['image'] = $imagePath;
            $image->update($data);
            return makeJsonResponse('You has been Update Image successfully.');

        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Some Thing Went Wrong', [], 404);
        }

    }

    public function delete(Image $image)
    {
        try {
            $image->delete();
            return makeJsonResponse('You has been Deleted Image successfully.');
        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Some Thing Went Wrong', [], 404);

        }
    }
}
