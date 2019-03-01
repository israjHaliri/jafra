<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Input;
use Redirect;
use Auth;
use Hash;
use Session;
use Cookie;
use Socialite;
use DB;

class LoginController extends Controller
{
    public function __construct()
    {

    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        setcookie('remember_me_cookie','',time()-3600,'/');
        return Redirect::route('/');
    }

    public function auth() 
    {

        $rules = array(
            'email'    => 'required|email',
            'password' => 'required|min:1'
            );

        $validator = Validator::make(Input::all(), $rules);
        $remember_me = Input::get('remember_me');
        

        if ($validator->fails()) 
        {
            return Redirect::to('login')
            ->withErrors($validator)
            ->withInput(Input::except('password'));
        } 
        else 
        {

            $userdata = [
            'email'     => Input::get('email'),
            'password'  => Input::get('password')            
            ];

            if (Auth::attempt($userdata))
            {

                if (Auth::user()->active == 1) {

                    if ($remember_me) 
                    {
                        setcookie('remember_me_cookie','on',time()+3600,'/');

                    }
                    else
                    {
                        setcookie('remember_me_cookie','on',-1,'/');              
                    }

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
                    Auth::logout();
                    Session::flush();
                    return Redirect::route('login')->withMessage('Your Account Is not Activated Yet');
                }

            }
            else
            {
                return Redirect::route('login')->withMessage('Email Or Password Is Wrong');
            }

        }
    }

    public function fbauth()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function fbauth_callback()
    {

        try 
        {
            $user = Socialite::driver('facebook')->user();
        } 
        catch (Exception $e) 
        {

            return redirect('fbauth');
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect()->route('staff/dashboard');
    }

    private function findOrCreateUser($facebookUser)
    {        
        $authUser = \App\User::where('facebook_id', $facebookUser->id)->first();

        $get_email_fb  = \App\User::where('email', $facebookUser->email)->first();

        // print_r($get_email_fb->id);
        // die();

        if ($authUser){
            return $authUser;
        }

        if ($get_email_fb != "") 
        {
            $update = \App\User::find($get_email_fb->id);

            $update->facebook_id  = $facebookUser->id;
            $update->avatar  = $facebookUser->avatar;
            
            $update->save();

            return $update;
        }
        else
        {

            $mod_id  = DB::table('users')->select('id')->where('email', 'yourmail@gmail.com')->first()->id;

            $UserData = \App\User::create([
                'name' => $facebookUser->name,
                'email' => $facebookUser->email,
                'facebook_id' => $facebookUser->id,
                'avatar' => $facebookUser->avatar,
                'active' => 1,
                'level' => 2,
                'parent_id' => $mod_id,
                ]);

            $users_id = $UserData->id;
            \App\Profile::create(compact('users_id'));

            return $UserData;
        }
    }
}
