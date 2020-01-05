<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class RegisterationController extends Controller
{
    public function user_login(LoginRequest $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            if(Session::has('document'))
            {
                return redirect()->route('shops.index');
            }
            else
            {
                return redirect()->route('client_dashboard');
            }
        }
        else
        {
            return back()->withErrors(['loginerror'=>'Credentials not Correct'])->withInput($request->all());
        }
    }

    public function user_registeration(RegisterRequest $request)
    {
        $data = $request->except('confirmpassword');
        $data['password'] = bcrypt($data['password']);
        $user = User::where('email', '=', $request->get('email'))->first();
        if ($user === null) {
            if(User::create($data))
            {
                return back()->withErrors(['user'=>'User Created Successfully'])->withInput($request->except('confirmpassword'));
            }
        }
        else
        {
           return back()->withErrors(['email'=>'Email already Exist'])->withInput($data);;
        }
        
    }

    public function user_logout()
    {
        Auth::logout();
        return redirect()->route('home')->withErrors(['loginmsg'=>'You Successfully Logout.Hope You Come Back Again.']);

    }


    
}
