<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::where('user_type', User::USER)->count();
        $totalEarning = $totalEarning = Order::sum('total_price');
        return view('admin.dashboard', compact('users', 'totalEarning'));
    }
}
