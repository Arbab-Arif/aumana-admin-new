<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Collage;
use App\Models\CollageImage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CollageController extends Controller
{

    public function getDraftsImage()
    {
        try {
            $draftCollagesImages = Collage::where([
                'is_cart' => 0,
                'user_id' => auth()->id(),
            ])->without('collageImages')->select('id', 'frame_type', 'collage_image')->get();
            return makeJsonResponse('get draft collage images  successfully.', $draftCollagesImages);
        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Some Thing Went Wrong', [], 404);
        }

    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'category_id' => 'required',
            ]);
            if ($validator->fails()) {
                return makeJsonResponse('Error', [], 422, collect($validator->errors())->values()->map(fn($error) => $error));
            }
            $data = $request->all();
            $data['user_id'] = auth()->id();
            Collage::create($data);
            return makeJsonResponse('You has been Create Collage successfully.');
        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Some Thing Went Wrong', [], 404);
        }
    }

    public function addCollage()
    {
        try {
            $data = request()->all();
            $data['user_id'] = auth()->id();
            $data['layout_id'] = request()->get('layout_id');
            $data['frame_type'] = request()->get('frame_type');
            $data['collage_image'] = request()->get('collage_image');
            $data['is_cart'] = request()->get('is_cart');

            $collageId = Collage::create($data);
            foreach (request()->images as $image) {
                $collageImage = new CollageImage();
                $collageImage->user_id = auth()->id();
                $collageImage->collage_id = $collageId->id;
                $collageImage->image_id = $image['id'];
                $collageImage->layout_index = $image['index'];
                $collageImage->converted_image = $image['converted_image'];
                $collageImage->is_converted = $image['is_converted'];
                $collageImage->save();
            }
            if (request()->get('is_cart') == true) {
                $cart = new Cart();
                $cart->user_id = auth()->id();
                $cart->collage_id = $collageId->id;
                $cart->price = request()->get('price');
                $cart->save();
            }
            return makeJsonResponse('You have been save Collage successfully.');
        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Some Thing Went Wrong', [], 404);
        }
    }

    public function editDraft($id)
    {
        try {
            $draftCollagesImage = Collage::where([
                'is_cart' => 0,
                'user_id' => auth()->id(),
                'id'      => $id
            ])->with('collageImages')->first();
            return makeJsonResponse('get draft collage images  successfully.', $draftCollagesImage);
        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Some Thing Went Wrong', [], 404);
        }
    }

    public function updateDraft($id)
    {
        try {
            $draftCollagesImage = Collage::where([
                'is_cart' => 0,
                'user_id' => auth()->id(),
                'id'      => $id
            ])->first();
            $data = request()->all();
            $data['user_id'] = auth()->id();
            $data['layout_id'] = request()->get('layout_id');
            $data['frame_type'] = request()->get('frame_type');
            $data['collage_image'] = request()->get('collage_image');
            $data['is_cart'] = request()->get('is_cart');

            $collageId = $draftCollagesImage->update($data);
            CollageImage::where('collage_id', $draftCollagesImage->id)->delete();
            foreach (request()->images as $image) {
                $collageImage = new CollageImage();
                $collageImage->user_id = auth()->id();
                $collageImage->collage_id = $draftCollagesImage->id;
                $collageImage->image_id = $image['id'];
                $collageImage->layout_index = $image['index'];
                $collageImage->converted_image = $image['converted_image'];
                $collageImage->is_converted = $image['is_converted'];
                $collageImage->save();
            }
            if (request()->get('is_cart') == true) {
                $cart = new Cart();
                $cart->user_id = auth()->id();
                $cart->collage_id = $draftCollagesImage->id;
                $cart->price = $cart->price;
                $cart->save();
            }
            return makeJsonResponse('You have been save Collage successfully.');
        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Some Thing Went Wrong', [], 404);
        }
    }

    public function deleteCollage($id)
    {
        try {
            $draftCollagesImage = Collage::where([
                'is_cart' => 0,
                'user_id' => auth()->id(),
                'id'      => $id
            ])->first();
            CollageImage::where('collage_id', $id)->delete();
            $draftCollagesImage->delete();
            return makeJsonResponse('delete draft collage images  successfully.',);
        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Some Thing Went Wrong', [], 404);
        }
    }
}
