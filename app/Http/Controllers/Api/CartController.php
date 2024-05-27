<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Collage;
use App\Models\CollagePrice;
use App\Models\Image;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function getCart()
    {
        try {
            // Retrieve carts for the authenticated user
            $carts = DB::table('carts')
                ->join('attribute_images', function ($join) {
                    $join->on('carts.image_id', '=', 'attribute_images.image_id')
                        ->on('carts.image_type', '=', 'attribute_images.select_image_type');
                })
                ->select(
                    'carts.image_id',
                    'carts.id',
                    'carts.image_type',
                    'carts.user_id',
                    'carts.collage_id',
                    'carts.image_size',
                    'carts.price',
                    'carts.license',
                    'attribute_images.dpi',
                    'attribute_images.personal_use_price',
                    'attribute_images.corporate_use_price',
                    'attribute_images.commercial_use_price',
                    'attribute_images.image',
                    'carts.created_at',
                    'carts.updated_at'
                )
                ->where('carts.user_id', auth()->id())
                ->get();
            $collageImages = Cart::where('user_id', auth()->id())->where('image_id', null)->with('collage.collageImages')->without('image')->get();
            return makeJsonResponse('get Cart successfully.', [
                'images'         => $carts,
                'collage_images' => $collageImages,
            ]);
        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Some Thing Went Wrong', [], 404);
        }
    }

    public function addToCart(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'image_id'   => 'sometimes|nullable|in:' . implode(',', Image::pluck('id')->toArray()),
                'collage_id' => 'sometimes|nullable|in:' . implode(',', Collage::pluck('id')->toArray()),
            ]);

            if ($validator->fails()) {
                return makeJsonResponse('Error', [], 422, collect($validator->errors())->values()->map(fn($error) => $error));
            }

            if (!empty($request->get('image_id'))) {
                $cartData['image_id'] = $request->get('image_id');
            } elseif (!empty($request->get('collage_id'))) {
                $cartData['collage_id'] = $request->get('collage_id');
            }

            $cartData['user_id'] = request()->user()->id;
            $cartData['image_type'] = request()->get('image_type');
            $cartData['image_size'] = request()->get('image_size');
            $cartData['price'] = request()->get('price');
             $cartData['license'] = request()->get('license');

            Cart::updateOrCreate($cartData, $cartData);

            return makeJsonResponse('Item added to cart successfully.', Cart::where('user_id', auth()->id())->with('images', 'collage.collageImages')->get());

        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Some Thing Went Wrong', [], 404);
        }
    }

    public function updateCart($id, Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'price' => 'required'
            ]);
            if ($validator->fails()) {
                return makeJsonResponse('Error', [], 422, collect($validator->errors())->values()->map(fn($error) => $error));
            }
            $cart = Cart::find($id);

            $cart->update([
                'price' => $request->get('price'),
                'license' => $request->get('license')
            ]);
            $carts = DB::table('carts')
                ->join('attribute_images', function ($join) {
                    $join->on('carts.image_id', '=', 'attribute_images.image_id')
                        ->on('carts.image_type', '=', 'attribute_images.select_image_type');
                })
                ->select(
                    'carts.image_id',
                    'carts.id',
                    'carts.image_type',
                    'carts.user_id',
                    'carts.collage_id',
                    'carts.image_size',
                    'carts.price',
                    'carts.license',
                    'attribute_images.dpi',
                    'attribute_images.personal_use_price',
                    'attribute_images.corporate_use_price',
                    'attribute_images.commercial_use_price',
                    'attribute_images.image',
                    'carts.created_at',
                    'carts.updated_at'
                )
                ->where('carts.user_id', auth()->id())
                ->get();
            $collageImages = Cart::where([
                'user_id'  => auth()->id(),
                'image_id' => null,
            ])->with('collage')->get();
            return makeJsonResponse('Item Updated to cart successfully', [
                'images'         => $carts,
                'collage_images' => $collageImages,
            ]);
        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Some Thing Went Wrong', [], 404);
        }
    }


    public function destroy($id)
    {
        try {
            $cart = Cart::find($id);
            $cart->delete();
            $carts = DB::table('carts')
                ->join('attribute_images', function ($join) {
                    $join->on('carts.image_id', '=', 'attribute_images.image_id')
                        ->on('carts.image_type', '=', 'attribute_images.select_image_type');
                })
                ->select(
                    'carts.image_id',
                    'carts.id',
                    'carts.image_type',
                    'carts.user_id',
                    'carts.collage_id',
                    'carts.image_size',
                    'carts.price',
                     'carts.license',
                    'attribute_images.dpi',
                    'attribute_images.personal_use_price',
                    'attribute_images.corporate_use_price',
                    'attribute_images.commercial_use_price',
                    'attribute_images.image',
//                    'collage_images.converted_image',
//                    'collage_images.layout_index',
//                    'collage_images.is_converted',
//                    'collage_images.is_cart',
                    'carts.created_at',
                    'carts.updated_at'
                )
                ->where('carts.user_id', auth()->id())
                ->get();
            $collageImages = Cart::where('user_id', auth()->id())->where('image_id', null)->with('collage.collageImages')->without('image')->get();
            return makeJsonResponse('Item Deleted to cart successfully', [
                'images'         => $carts,
                'collage_images' => $collageImages,
            ]);
        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Some Thing Went Wrong', [], 404);
        }

    }

    public function collagePrice()
    {
        try {
            $collagePrices = CollagePrice::all();
            return makeJsonResponse('get all collage prices.', $collagePrices);
        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Some Thing Went Wrong', [], 404);
        }
    }
}
