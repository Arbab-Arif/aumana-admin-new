<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('getUser')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function orderDetail($id)
    {
        $orderImages = DB::table('order_items')
            ->where('order_items.order_id', $id)
            ->orWhere(function ($query) use ($id) {
                $query->where('order_items.order_id', '=', $id)
                    ->where('order_items.user_id', auth()->id());
            })
            ->leftJoin('orders', 'orders.id', '=', 'order_items.order_id')
            ->join('attribute_images', function ($join) {
                $join->on('attribute_images.image_id', '=', 'order_items.image_id')
                    ->on('attribute_images.select_image_type', '=', 'order_items.image_type');
            })
            ->select(
                'order_items.id',
                'order_items.image_id',
                'order_items.order_id',
                'order_items.image_type',
                'order_items.user_id',
                'order_items.collage_id',
                'order_items.image_size',
                'order_items.price',
                'order_items.license',
                'orders.total_price',
                'orders.order_number',
                'orders.status',
                'attribute_images.dpi',
                'attribute_images.image',
                'order_items.created_at',
                'order_items.updated_at'
            )
            ->get();
        $collageImage = OrderItem::where('order_id', $id)->where('image_id', null)->with('getCollage', 'getOrder')->get();
        $order = Order::where('id', $id)->first();
        return view('admin.orders.show', compact('order', 'collageImage', 'orderImages'));
    }
}
