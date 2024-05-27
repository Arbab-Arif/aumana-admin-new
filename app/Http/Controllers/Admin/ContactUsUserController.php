<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUsUser;

class ContactUsUserController extends Controller
{

    public function index()
    {
        $data = ContactUsUser::get();
        return view('admin.manage-contact-us-users.index', compact('data'));
    }
}
