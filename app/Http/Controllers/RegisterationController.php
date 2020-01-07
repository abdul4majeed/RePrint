<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\WeclomeMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class RegisterationController extends Controller
{
    public function user_login(LoginRequest $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            if(Auth::user()->email_verified_at == null)
            {
                Auth::logout();
                return redirect()->route('login')->withErrors(['please_verify'=>'Please Activate Your Account']);

            }
            else
            {
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
        $data['token'] = md5( time().'-'.time());
        if ($user === null) {
            if($user = User::create($data))
            {
                $url_host = env('APP_URL','http:localhost');

                $url_host = ($url_host.'/verify_account');
            
                $data = ['name' => $user->firstname,'email'=>$user->email,'token'=>$user->token,'url'=>$url_host];
                Mail::to($user->email)->send(new WeclomeMail($data));
                
                return back()->withErrors(['emailSend'=>'Email has been send. Please Verify Your Account.'])->withInput($request->except('confirmpassword'));
            }
        }
        else
        {
           return back()->withErrors(['userFound'=>'Email already Exist'])->withInput($data);;
        }
        
    }

    public function user_logout()
    {
        Auth::logout();
        return redirect()->route('home')->withErrors(['loginmsg'=>'You Successfully Logout.Hope You Come Back Again.']);

    }


    
}
