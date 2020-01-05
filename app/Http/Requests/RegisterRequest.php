<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|max:16',
            'confirmpassword' => 'required|min:6|max:16|same:password',
            'cnic' => 'required',
            'country' => 'required|integer',
        ];

    }

    public function messages()
{
    return [
        'firstname.required' => 'First Name is required',
        'lastname.required'  => 'Last Name is required',
        'email.required'  => 'Email is required',
        'email.email'  => 'Email is not in correct format',
        'password.required'  => 'Password is required',
        'password.min'  => 'Password must be greater then 6 characters',
        'password.max'  => 'Password must be less then 16 characters',
        'confirmpassword.required'  => 'Confirm Password is required',
        'confirmpassword.same'  => 'Confirm Password and password not matched',
        'confirmpassword.min'  => 'Confirm Password  must be greater then 6 characters',
        'confirmpassword.max'  => 'Confirm Password  must be less then 16 characters',
        'cnic.required'  => 'CNIC is required',
        'country.required'  => 'Country is required',
        'country.integer'  => 'Country must be integer type',
    ];
}
}
