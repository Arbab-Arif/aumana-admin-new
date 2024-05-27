<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    public function login(){
        return view('admin.authentication.login');
    }

    public function loginData(){

        $validator = Validator::make(request()->all(), [
            'email' => 'required|max:255|email',
            'password' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if(!empty(Auth::validate(['email' => request()->email, 'password' => request()->password]))){
            $user = User::where('email', request()->email)->where('user_type', User::ADMIN)->first();

            if(empty($user)){
                return redirect()->back()->withInput()->with('error', 'You are not able to access.');
            }

            $rememberMe = !empty(request()->remember_me)?:false;

            if(Auth::attempt(['email' => request()->email, 'password' => request()->password],$rememberMe)){
                return redirect()->route('admin.dashboard');
            }
        }

        return redirect()->back()->withInput()->with('error', 'Incorrect email or password.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
