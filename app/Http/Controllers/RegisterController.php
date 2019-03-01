<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Mail;
use Input;
use Validator;
use Redirect;
use Hash;
use DB;
use Crypt;


class RegisterController extends Controller
{
    public function __construct()
    {

    }
    public function index()
    {       
        
        $list_parent = User::where('active', 1)->orderBy('id')->lists('name', 'id');
        return View('frontend.register', compact('list_parent'));
    }
    public function activate($id)
    {       
        $update = \App\User::find($id);
        $update->active     = 1; 
        if ($update->save()) 
        {
            return Redirect::route('register')->withMessage('Your Account Has been Activated.');
        }
        else
        {
            return Redirect::route('register')->withMessage('Were Not Found Your Account In our Database,Sorry.');
        }
    }
    public function request_mail()
    {       
        return View('frontend.resend_mail');
    }
    public function forgot_password()
    {       
        return View('frontend.forgot_password');
    }
    public function reset_password()
    {       
        $data = Input::all();
        
        $rules = array(
            'email' => 'required|email',
            'new_password' => 'required|max:60',
            );
        
        $validator = Validator::make($data, $rules);
        
        if ($validator->fails())
        {
            return Redirect::to('forgot_password')->withInput()->withErrors($validator);
        }
        else
        {
            $exists = DB::table('users')->where('email', '=', Input::get('email'))->exists();
            if (!$exists) 
            {
                return Redirect::route('forgot_password')->withMessage('Your Email Is Not Registered Yet.');  
            }
            else
            {
                $result = DB::table('users')->where('email', '=', Input::get('email'))->first();

                if ($result)
                {

                    $hash_password = Hash::make(Input::get('new_password'));
                    $update = \App\User::find($result->id);
                    $update->password     = $hash_password;

                    $data = ['new_password' => Input::get('new_password')];
                    
                    if ($update->save()) 
                    {
                        $user = User::findOrFail($result->id);

                        Mail::send('mailing.reset_password', $data, function ($message) use ($user) {
                            $message->from('admin@mail.com', 'Administrator');

                            $message->to($user->email, $user->name)->subject('Change Password');
                        });
                        return Redirect::route('forgot_password')->withMessage('We Have Send You An Email,Please Check Your Email.');   
                    }
                    else
                    {
                        return Redirect::route('forgot_password')->withMessage('We Cannot Found Youre Account.');  
                    }
                    
                }
                else
                {
                    return Redirect::route('forgot_password')->withMessage('Something Wrong Happend Please Check Your Data And Connection.');  
                }
            }        
        }
        
    }
    public function resend()
    {       
        $data = Input::all();
        
        $rules = array(
            'email' => 'required|email',
            );
        
        $validator = Validator::make($data, $rules);
        
        if ($validator->fails())
        {
            return Redirect::to('request_mail')->withInput()->withErrors($validator);
        }
        else
        {
            $exists = DB::table('users')->where('email', '=', Input::get('email'))->exists();
            if (!$exists) 
            {
                return Redirect::route('request_mail')->withMessage('Your Email Is Not Registered Yet.');  
            }
            else
            {
                $result = DB::table('users')->where('email', '=', Input::get('email'))->first();

                if ($result)
                {
                    $user = User::findOrFail($result->id);

                    Mail::send('mailing.welcome', ['user' => $user], function ($message) use ($user) {
                        $message->from('admin@mail.com', 'Administrator');

                        $message->to($user->email, $user->name)->subject('Register Almost Complete');
                    });
                    return Redirect::route('request_mail')->withMessage('We Have Send You An Email,Please Check Your Email.');   
                }
                else
                {
                    return Redirect::route('request_mail')->withMessage('Something Wrong Happend Please Check Your Data And Connection.');  
                }
            }        
        }
        
    }
    public function submit()
    {       

        $data = Input::all();
        $rules = array(
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:60', 
            'g-recaptcha-response' => 'required|captcha',
            'parent' => 'required',
            );

        $message = array(
            'name.required' => 'name cannot be empty.',
            'email.required' => 'Email cannot be empty.',
            'email.email' => 'Email Must Be Like admini@mail.com.',
            'email.unique' => 'Email Already Registered.',
            'g-recaptcha-response.required' => 'Captcha mustbe checked.',
            'password.max' => 'Password Max 60 Character.',
            'parent.required' => 'Please Select Your Parent Client.',
            );
        

        $validator = Validator::make($data, $rules, $message);
        if ($validator->fails())
        {
            return Redirect::to('register')->withInput()->withErrors($validator);
        }
        else
        {
            $parent_id = Input::get('parent');
            $name = Input::get('name');
            $email = Input::get('email');
            $password = Hash::make(Input::get('password'));
            $active = 0;
            $level = 2;
            $facebook_id = uniqid();
            
            $UserData = \App\User::create(compact('name', 'email', 'password', 'active', 'level', 'parent_id', 'facebook_id'));

            if ($UserData)
            {

                $users_id = $UserData->id;
                \App\Profile::create(compact('users_id'));
                $user = User::findOrFail($UserData->id);

                Mail::send('mailing.welcome', ['user' => $user], function ($message) use ($user) {
                    $message->from('yourmail@gmail.com', 'Administrator');

                    $message->to($user->email, $user->name)->subject('Register Almost Complete');
                });
                return Redirect::route('register')->withMessage('Your Account Has Been Registered Please Check Your Mailbox or Spam.');   
            }
            else
            {
                return Redirect::route('register')->withMessage('Something Wrong Happend Please Check Your Data And Connection.');  
            }
        }
    }
}
