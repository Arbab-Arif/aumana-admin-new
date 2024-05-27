<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactUsUser;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactUsUserController extends Controller
{

    public function getAllContactUsUser()
    {
        try {
            $contactUsUsers = ContactUsUser::all();
            return makeJsonResponse('get all Contact Us.', $contactUsUsers);
        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Some Thing Went Wrong', [], 404);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email'          => 'required|email',
                'phone_number'   => 'required',
                'write_messages' => 'required',
            ]);
            if ($validator->fails()) {
                return makeJsonResponse('Error', [], 422, collect($validator->errors())->values()->map(fn($error) => $error));
            }

            $data = $request->all();
            ContactUsUser::create($data);
            return makeJsonResponse('thank you for the contact us.');

        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Some Thing Went Wrong', [], 404);
        }

    }
}
