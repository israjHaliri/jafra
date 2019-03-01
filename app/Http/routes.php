<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => '/', 'uses' => 'HomeController@index']);

Route::get('detail_content/{id}', ['as' => 'detail_content', 'uses' => 'HomeController@detail_content']);

Route::post('contact_us', ['as' => 'contact_us', 'uses' => 'HomeController@contact_us']);

Route::get('login',['as' => 'login', function () {

    if (isset($_COOKIE['remember_me_cookie']) && Auth::user() != "") 
    {   
        if (Auth::user()->level == 1) 
        {
            return Redirect::to('admin/dashboard');  
        }
        else
        {
            return Redirect::to('staff/dashboard');  
        }   
        
    }
    else
    {
        return View('frontend.login');
    }
}]);


Route::get('fbauth', ['as' => 'fbauth', 'uses' => 'LoginController@fbauth']);

Route::get('fbauth_callback', ['as' => 'fbauth_callback', 'uses' => 'LoginController@fbauth_callback']);

Route::post('login/auth', ['as' => 'login/auth', 'uses' => 'LoginController@auth']);

Route::get('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);

Route::get('register', ['as' => 'register', 'uses' => 'RegisterController@index']);

Route::get('forgot_password', ['as' => 'forgot_password', 'uses' => 'RegisterController@forgot_password']);

Route::get('request_mail', ['as' => 'request_mail', 'uses' => 'RegisterController@request_mail']);

Route::post('resend', ['as' => 'resend', 'uses' => 'RegisterController@resend']);

Route::post('reset_password', ['as' => 'reset_password', 'uses' => 'RegisterController@reset_password']);

Route::post('register/submit', ['as' => 'register/submit', 'uses' => 'RegisterController@submit']);

Route::get('register/activate/{id}', ['as' => 'register/activate', 'uses' => 'RegisterController@activate']);


// atuh basic using email and password in table users
Route::get('/api/users/{id?}', ['middleware' => 'auth.basic', function($id = null) 
{
    if ($id == null) 
    {
        $users = App\User::all(array('id', 'name', 'email'));
    } 
    else 
    {
        $users = App\User::find($id, array('id', 'name', 'email'));
    }
    return Response::json(array(
        'error' => false,
        'users' => $users,
        'status_code' => 200
    ));
}]);



Route::group(array('middleware' => 'auth'), function()
{
    Route::group(array('middleware' => 'admin'), function()
    {

        // dashboard
        Route::get('admin/dashboard', ['as' => 'admin/dashboard', 'uses' => 'Admin\DashboardController@index']);
        // dashboard


        // gallery
        Route::get('admin/image_gallery', ['as' => 'admin/image_gallery', 'uses' => 'Admin\GalleryController@gallery']);

        Route::get('admin/image_testimoni', ['as' => 'admin/image_testimoni', 'uses' => 'Admin\GalleryController@testimoni']);
        
        Route::get('admin/image_company', ['as' => 'admin/image_company', 'uses' => 'Admin\GalleryController@company']);
        
        Route::get('admin/list_gallery', ['as' => 'admin/list_gallery', 'uses' => 'Admin\GalleryController@list_data']);
        
        Route::post('admin/gallery/upload', ['as' => 'admin/gallery/upload', 'uses' => 'Admin\GalleryController@upload']);
        
        Route::post('admin/gallery/delete', ['as' => 'admin/gallery/delete', 'uses' => 'Admin\GalleryController@delete']);
        // gallery

        // landing_page
        Route::get('admin/landing_page', ['as' => 'admin/landing_page', 'uses' => 'Admin\LandingPageController@index']);

        Route::get('admin/landing_page/create', ['as' => 'admin/landing_page/create', 'uses' => 'Admin\LandingPageController@create']);

        Route::post('admin/landing_page/insert', ['as' => 'admin/landing_page/insert', 'uses' => 'Admin\LandingPageController@insert']);

        Route::get('admin/landing_page/edit/{id}', ['as' => 'admin/landing_page/edit', 'uses' => 'Admin\LandingPageController@edit']);

        Route::put('admin/landing_page/edit/{id}', ['as' => 'admin/landing_page/update', 'uses' => 'Admin\LandingPageController@update']);

        Route::get('admin/landing_page/delete/{id}', ['as' => 'admin/landing_page/delete', 'uses' => 'Admin\LandingPageController@delete']);  

        Route::get('admin/landing_page/gallery/{id}', ['as' => 'admin/landing_page/gallery', 'uses' => 'Admin\LandingPageController@gallery']);

        Route::get('admin/landing_page/list_gallery', ['as' => 'admin/landing_page/list_gallery', 'uses' => 'Admin\LandingPageController@list_gallery']);
        
        Route::post('admin/landing_page/upload', ['as' => 'admin/landing_page/upload', 'uses' => 'Admin\LandingPageController@upload']);
        
        Route::post('admin/landing_page/delete_image', ['as' => 'admin/landing_page/delete_image', 'uses' => 'Admin\LandingPageController@delete_image']);
        // landing_page
        

        // message
        Route::get('admin/message', ['as' => 'admin/message', 'uses' => 'Admin\MessageController@index']);

        Route::get('admin/message/delete/{id}', ['as' => 'admin/message/delete', 'uses' => 'Admin\MessageController@delete']);  

        Route::get('admin/message/detail/{id}', ['as' => 'admin/message/detail', 'uses' => 'Admin\MessageController@detail']);  
        // message


        // user
        Route::get('admin/user', ['as' => 'admin/user', 'uses' => 'Admin\UserController@index']);

        Route::get('admin/user/create', ['as' => 'admin/user/create', 'uses' => 'Admin\UserController@create']);

        Route::post('admin/user/insert', ['as' => 'admin/user/insert', 'uses' => 'Admin\UserController@insert']);

        Route::get('admin/user/edit/{id}', ['as' => 'admin/user/edit', 'uses' => 'Admin\UserController@edit']);

        Route::put('admin/user/edit/{id}', ['as' => 'admin/user/update', 'uses' => 'Admin\UserController@update']);

        Route::get('admin/user/delete/{id}', ['as' => 'admin/user/delete', 'uses' => 'Admin\UserController@delete']);  
        // user

        // profile
        Route::get('admin/profile', ['as' => 'admin/profile', 'uses' => 'Admin\ProfileController@index']);

        Route::put('admin/profile/edit/{id}', ['as' => 'admin/profile/edit', 'uses' => 'Admin\ProfileController@edit']); 
        // profile
    });

Route::group(array('middleware' => 'staff'), function()
{
    Route::get('staff/dashboard', ['as' => 'staff/dashboard', 'uses' => 'Staff\DashboardController@index']);

    Route::get('staff/profile', ['as' => 'staff/profile', 'uses' => 'Staff\ProfileController@index']);

    Route::put('staff/profile/edit/{id}', ['as' => 'staff/profile/edit', 'uses' => 'Staff\ProfileController@edit']);
});
});




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});