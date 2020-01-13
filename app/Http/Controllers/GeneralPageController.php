<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralPageController extends Controller
{
    function home()
    {
        return view('index');
    }
    function about()
    {
        return view('about');
    }

    function blog()
    {
        return view('blog');
    }

    function contact()
    {
        return view('contact');
    }

    function journal()
    {
        return view('journal');
    }

    function login_form()
    {
        return view('login');
    }

    function register_form()
    {
        return view('register');
    }

    function reset_password_form()
    {
        return view('resetpassword.forgetpassword');
    }

    function single()
    {
        return view('single');
    }

    function work_single()
    {
        return view('work-single');
    }

    function work()
    {
        return view('work');
    }

    function document()
    {
        return view('common.document');
    }
}
