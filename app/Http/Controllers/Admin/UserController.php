<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('user_type', User::USER)->get();
        return view('admin.manage-users.index', compact('users'));
    }

    public function userDetail($id)
    {
        $user = User::find($id);
        return view('admin.manage-users.show', compact('user'));
    }

    public function userStatusUpdate()
    {
        $user = User::find(request()->get('id'));
        $data = request()->all();
        $data['status'] = request()->get('status');
        $user->update($data);
    }
}
