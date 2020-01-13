<?php

use Illuminate\Support\Facades\Route;

// General Page Routes
Route::get('/', 'GeneralPageController@home')->name('home');
Route::get('/about', 'GeneralPageController@about')->name('about');
Route::get('/blog', 'GeneralPageController@blog')->name('blog');
Route::get('/contact','GeneralPageController@contact')->name('contact');
Route::get('/journal', 'GeneralPageController@journal')->name('journal');
Route::get('/form/login', 'GeneralPageController@login_form')->name('login');
Route::get('/form/register', 'GeneralPageController@register_form')->name('register');
Route::get('form/forget/password', 'GeneralPageController@reset_password_form')->name('forgetpassword');
Route::get('/single', 'GeneralPageController@single')->name('single');
Route::get('/work/single', 'GeneralPageController@work_single')->name('work-single');
Route::get('/work', 'GeneralPageController@work')->name('work');
Route::get('/document', 'GeneralPageController@document')->name('document');
// General Page Route End

// User Registeration and Password Reset Routes Starts
Route::post('/register',"RegisterationController@user_registeration")->name('registerProcess');
Route::post('/login',"RegisterationController@user_login")->name('loginProcess');
Route::get('/logout',"RegisterationController@user_logout")->name('logoutProcess');
Route::post('/forget/password','RegisterationController@forget_password')->name('forgetPasswordProcess');
Route::get('/reset/password/{token}/{email}', 'RegisterationController@showPasswordResetForm')->name('reset-password-form');
Route::post('/reset/password/{token}/{email}', 'RegisterationController@resetPassword')->name('reset-password');
Route::get('verify_account/{email}/{token}','RegisterationController@verify_email')->name('verify_account');
// User Registeration and Password Reset Routes End

// Shop Operations Routes Start
Route::resource('shops','ShopController');
Route::post('shop/services','ShopController@get_shop_services')->name('get_shop_services');
// Shop Operations Routes End

// Order Routes Start
Route::post('order','OrderController@place_order')->name('order');
// Order Routes End


// Document Upload Routes Start
Route::post('/upload/document', "OrderDocumentController@upload_document")->name('uploadFile');
// Document Upload Routes End



// Payment Routest Start
# Tap Routes
Route::get('tap-payment','PaymentProcessorsController@tap_payment_view')->name('tap-payment');
Route::post('charge','PaymentProcessorsController@tap_payment_charge')->name('charge');
Route::post('post_url','PaymentProcessorsController@tap_post_url')->name('post_url');
Route::get('/redirect_url','PaymentProcessorsController@tap_redirect_url')->name('redirect_url');
# MyFatoorah Routes
Route::get('myfatroohah','PaymentProcessorsController@my_fatoorah_initiate_payment_and_return_view_with_card')->name('fatroorah-payment');
Route::post('exe_fatroah','PaymentProcessorsController@my_fatoorah_payment_url_redirection_and_execution')->name('exe_fatrah');
Route::get('fatrah/redirect','PaymentProcessorsController@my_fatoorah_redirect_url')->name('fatrooh_redirect');
Route::get('fatrooh_error','PaymentProcessorsController@my_fatoorah_error_url')->name('fatrooh_error');
// Payment Routest End