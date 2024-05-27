<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\OtpSendMil;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register()
    {
        try {

            $validator = Validator::make(request()->all(), [
                'name'     => 'required|max:255',
                'email'    => 'required|max:255|email|unique:users,email',
                'password' => 'required|max:255|confirmed',

            ]);

            if ($validator->fails()) {
                return makeJsonResponse('Error', [], 422, collect($validator->errors())->values()->map(fn($error) => $error));
            }
            User::create([
                'name'      => request('name'),
                'email'     => request('email'),
                'password'  => Hash::make(request('password')),
                'user_type' => User::USER

            ]);
            return makeJsonResponse('Your account successfully created.');

        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Error.', [], 422, [['Something went wrong.']]);
        }
    }

    public function login()
    {
        try {
            $validator = Validator::make(request()->all(), [
                'email'    => 'required|max:255|email',
                'password' => 'required|max:255'
            ]);

            if ($validator->fails()) {
                return makeJsonResponse('Error', [], 422, collect($validator->errors())->values()->map(fn($error) => $error));
            }

            if (!Auth::validate(request(['email', 'password']))) {
                return makeJsonResponse('Error.', [], 422, [['Credentials not matched.']]);
            }

            $user = User::where('email', request()->email)->where('user_type', User::USER)->first();
            if ($user) {
                if ($user->status == 1) {
                    Auth::loginUsingId($user->id);
                    $user = request()->user();
                    $tokenResult = $user->createToken('Personal Access Token');
                    $token = $tokenResult->token;
                    $token->save();
                    return makeJsonResponse('Success', [
                        'token' => $tokenResult->accessToken,
                        'user'  => $user,
                    ]);
                } else {
                    return makeJsonResponse('Error.', [], 422, [['your account has been blocked.']]);
                }

            } else {
                return makeJsonResponse('Error.', [], 422, [['credentials not match.']]);
            }


        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Error.', [], 422, [['Something went wrong.']]);
        }
    }

    public function getUserInfo()
    {
        try {
            return makeJsonResponse('Success', [
                'user' => User::where('id', auth()->id())->first()
            ]);
        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Error.', [], 422, [['Something went wrong.']]);
        }
    }

    public function updateUserInfo()
    {
        try {
            auth()->user()->update([
                'name'       => (request()->get('name')) ? request()->get('name') : auth()->user()->name,
                'address'    => (request()->get('address')) ? request()->get('address') : auth()->user()->address,
                'address_2'  => (request()->get('address_2')) ? request()->get('address_2') : auth()->user()->address_2,
                'country'    => (request()->get('country')) ? request()->get('country') : auth()->user()->country,
                'state'      => (request()->get('state')) ? request()->get('state') : auth()->user()->state,
                'zip_code'   => (request()->get('zip_code')) ? request()->get('zip_code') : auth()->user()->zip_code,
                'city'       => (request()->get('city')) ? request()->get('city') : auth()->user()->city,
                'free_image' => (request()->get('free_image')) ? request()->get('free_image') : auth()->user()->free_image,
            ]);
            return makeJsonResponse('Success', auth()->user());

        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Error.', [], 422, [['Something went wrong.']]);
        }
    }

    public function logout()
    {
        try {
            request()->user()->token()->revoke();
            return makeJsonResponse('Successfully logged out.');

        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Error.', [], 422, [['Something went wrong.']]);
        }
    }

    public function sendOtp(Request $request)
    {
        try {
            $validator = Validator::make(request()->all(), [
                'email' => 'required|email',
            ]);
            if ($validator->fails()) {
                return makeJsonResponse('Error', [], 422, collect($validator->errors())->values()->map(fn($error) => $error));
            }
            $user = User::where('email', $request->get('email'))->first();
            if ($user === null) {
                return makeJsonResponse('Error', [], 422, [['email is not match.']]);
            } else {
                $otp = mt_rand(111111, 999999);
                $test = $user->update([
                    'otp' => $otp
                ]);
                $user->notify(new OtpSendMil());
                return makeJsonResponse('check your email and get otp code.');
            }
        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Error . ', [], 422, [['Something went wrong . ']]);
        }
    }

    public function checkOtp(Request $request)
    {
        try {
            $user = User::where('otp', $request->get('otp'))->first();
            if (!$user) {
                return makeJsonResponse('Error', [], 422, [['otp is not match.']]);
            } else {
                return makeJsonResponse('success');
            }

        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Error . ', [], 422, [['Something went wrong . ']]);
        }
    }

    public function updatePassword(Request $request)
    {
        try {
            $validator = Validator::make(request()->all(), [
                'otp'      => 'required|min:6',
                'password' => 'required|confirmed|min:8',
            ]);
            if ($validator->fails()) {
                return makeJsonResponse('Error', [], 422, collect($validator->errors())->values()->map(fn($error) => $error));
            }
            $user = User::where('otp', $request->get('otp'))->first();
            if ($user === null) {
                return makeJsonResponse('Error', [], 422, [['otp is not match.']]);
            } else {
                $user->update([
                    'otp'      => null,
                    'password' => Hash::make($request->get('password')),
                ]);
            }

            return makeJsonResponse('success');
        } catch (ModelNotFoundException $exception) {
            return makeJsonResponse('Error . ', [], 422, [['Something went wrong . ']]);
        }
    }
}
