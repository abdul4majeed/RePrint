<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\ForgetPasswordMail;
use App\Mail\WeclomeMail;
use App\User;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function forget_password(Request $request)
    {
        $user = User::where ('email', $request->email)->first();
        if ( !$user ) return redirect()->back()->withErrors(['error' => '404']);

        //create a new token to be sent to the user. 
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => (time().'4'.time()), //change 60 to any length you want
            'created_at' => Carbon::now()
        ]);

        $tokenData = DB::table('password_resets')
        ->where('email', $request->email)->first();

    $token = $tokenData->token;
    $email = $request->email; // or $email = $tokenData->email;


    $data = ['token' => $token,'email'=>$email];
    Mail::to($request->email)->send(new ForgetPasswordMail($data));
    /**
        * Send email to the email above with a link to your password reset
        * something like url('password-reset/' . $token)
        * Sending email varies according to your Laravel version. Very easy to implement
        */
    }

    public function showPasswordResetForm($token,$email)
    {
        $tokenData = DB::table('password_resets')
        ->where('token', $token)->first();

        if ( !$tokenData ) return redirect()->to('home'); //redirect them anywhere you want if the token does not exist.
        return view('resetpassword.reset-token-form')->with('token',$token)->with('email',$email);
    }

    public function resetPassword(Request $request, $token,$email)
    {
        //some validation

        $password = $request->password;
        $tokenData = DB::table('password_resets')
        ->where('token', $token)->first();

        $user = User::where('email', $tokenData->email)->first();
        if ( !$user ) return redirect()->to('home'); //or wherever you want

        $user->password = Hash::make($password);
        $user->update(); //or $user->save();

        //do we log the user directly or let them login and try their password for the first time ? if yes 
        Auth::login($user);

        // If the user shouldn't reuse the token later, delete the token 
        DB::table('password_resets')->where('email', $user->email)->delete();

    }



    
}
