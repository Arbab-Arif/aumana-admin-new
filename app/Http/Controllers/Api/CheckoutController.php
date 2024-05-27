<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Collage;
use App\Models\Image;
use App\Models\Order;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function createOrder(Request $request)
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
                $orderData['image_id'] = $request->get('image_id');
            } elseif (!empty($request->get('collage_id'))) {
                $orderData['collage_id'] = $request->get('collage_id');
            }

            $orderData['user_id'] = auth()->id();
            $orderData['transaction_id'] = $request['paypal_res']['id'];
            $orderData['total_price'] = $request['sub_total'];
            $orderData['status'] = $request['paypal_res']['status'];

            $orderCreate = Order::create($orderData);
            $orderNumber = '#' . str_pad($orderCreate->id, 8, '0', STR_PAD_LEFT);
            $orderCreate->update([
                'order_number' => $orderNumber,
            ]);
            $orderCreate->orderItem()->createMany($request->get('cart'));
            Cart::where('user_id', auth()->id())->delete();
            return makeJsonResponse('Order Create successfully.', Order::where('id',$orderCreate->id)->get());

        } catch
        (ModelNotFoundException $exception) {
            return makeJsonResponse('Some Thing Went Wrong', [], 404);
        }
    }

}
