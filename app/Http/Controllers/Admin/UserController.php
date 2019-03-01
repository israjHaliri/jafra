<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Validator;
use Redirect;
use DB;
use Auth;
use Hash;
use Mail;
use View;


class UserController extends Controller
{

	public function __construct() 
	{
		
	}
	public function index()
	{
		$request_param = Input::get('search');

		if ($request_param)
		{
			$list_data = \App\User::where('name', 'LIKE', "%$request_param%")->paginate(5);
		}
		else
		{
			$list_data = \App\User::orderBy('id', 'DESC')->paginate(5);
		}

		return View('admin.user.index', compact('list_data'));
	}

	public function create() {
		$id = Auth::user()->id;
		$active = array(
			'1' => 'active', 
			'0' => 'non-active');
		$level = array(
			'1' => 'admin', 
			'2' => 'staff');
		$list_parent = \App\User::where('active', 1)->orderBy('id')->lists('name', 'id');
		return View('admin.user.create', compact('active','level','list_parent'));
	}

	public function insert() {

		$data = Input::all();
		
		$rule = array(
			'name' => 'required|min:5', 
			'password' => 'required|max:60', 
			'email' => 'required|email|unique:users'
			);

		$message = array(
			'name.required' => 'name cannot be empty.',
			'name.min' => 'name Min 5 Character.',
			'email.required' => 'Email cannot be empty.',
			'email.email' => 'Email Must Be Like admini@mail.com.',
			'email.unique' => 'Email Already Registered.',
			'password.max' => 'Password Max 60 Character.'
			);
		
		$validation = Validator::make($data, $rule, $message);
		
		if($validation->fails()) 
		{
			return Redirect::back()->withErrors($validation)->withInput();
		} 
		else 
		{	
			$name = Input::get('name');
			$email = Input::get('email');
			$password = Hash::make(Input::get('password'));
			$active = Input::get('active');
			$level = Input::get('level');
			$parent_id = Input::get('parent');
			$facebook_id = Input::get('email');
			
			$user_data =\App\User::create(compact('name', 'email', 'password', 'active', 'level', 'parent_id', 'facebook_id'));
			if ($user_data) 
			{
				$users_id = $user_data->id;
				\App\Profile::create(compact('users_id'));

				$user = \App\User::findOrFail($users_id);

				if ($active == 1) 
				{
					Mail::send('mailing.welcome_active', ['user' => $user], function ($message) use ($user) {
						$message->from('admin@mail.com', 'Administrator');

						$message->to($user->email, $user->name)->subject('Register Complete');
					});
				}
				else
				{
					Mail::send('mailing.welcome', ['user' => $user], function ($message) use ($user) {
						$message->from('admin@mail.com', 'Administrator');

						$message->to($user->email, $user->name)->subject('Register Almost Complete');
					});
				}
				return Redirect::route('admin/user/create')->withMessage('Data Has Been Saved.');
			}	
			else
			{
				return Redirect::route('admin/user/create')->withMessage('Data Failed To Save.');
			}		
		}
	}

	public function edit($id) {

		$active = array(
			'1' => 'active', 
			'0' => 'non-active');
		$level = array(
			'1' => 'admin', 
			'2' => 'staff');
		$list_data = \App\User::find($id);
		$list_parent = \App\User::where('active', 1)->where('id','!=', $list_data->id)->orderBy('id')->lists('name', 'id');
		return View('admin.user.edit', compact('active', 'level', 'list_data', 'list_parent'));
	}

	public function update($id) {
		$data = Input::all();
		
		$rule = array(
			'name' => 'required|min:5', 
			'email' => 'required|email|unique:users,email,'.$id.',id',
			);

		$message = array(
			'name.required' => 'name cannot be empty.',
			'name.min' => 'name Min 5 Character.',
			'email.required' => 'Email cannot be empty.',
			'email.email' => 'Email Must Be Like admini@mail.com.',
			'email.unique' => 'Email Already Registered.',
			);
		
		$validation = Validator::make($data, $rule, $message);
		
		if($validation->fails()) 
		{	
			return Redirect::back()->withErrors($validation)->withInput();
		} 
		else 
		{
			$update = \App\User::find($id);


			$update->name	= Input::get('name');
			$update->email 		= Input::get('email');
			if (Input::get('password') != "") {
				$update->password 	= Hash::make(Input::get('password'));	
			}
			$update->active 	= Input::get('active');	
			$update->level 	= Input::get('level');	
			$update->parent_id 	= Input::get('parent');	
			
			$update->save();
			return Redirect::route('admin/user/edit',array('id' => $id))->withMessage('Data Has Been Edited.');
		}
	}
	public function delete($id) {
		\App\User::find($id)->delete();
		return Redirect::route('admin/user')->withMessage('Data Has Been Deleted.');
	}

}
