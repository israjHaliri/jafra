<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;	
use Auth;
use Validator;
use Redirect;
use Hash;
use File;
use View;

class ProfileController extends Controller
{

    public function index()
    {    	
		$id = Auth::user()->id;
		$list_data = \App\User::where('id', '=', $id)->first();
		$list_parent = \App\User::where('active', 1)->where('id','=', Auth::user()->parent_id)->orderBy('id')->lists('name', 'id');
		return View('admin.profile.index', compact('list_data','list_parent'));
    }
    public function edit($id,Request $request)
    {

		$data = Input::all();
		
		$rule = array(
			'name' => 'required', 
			'file' => 'image'
			);

		$message = array(
			'name.required' => 'name cannot be empty.',
			'name.min' => 'name Min 5 Character.',
			'file.image' => 'File Must Be An Image.',
			);
		
		$validation = Validator::make($data, $rule, $message);
		
		if($validation->fails()) 
		{	
			return Redirect::back()->withErrors($validation)->withInput();
		} 
		else 
		{
			$user = \App\User::find($id);
			$profile = \App\Profile::where("users_id" , '=' , $id)->first();

			if($request->file('file') != "")
			{
				$name_file = str_random(30).'-'.$request->file('file')->getClientOriginalName();
				File::delete('resources/assets/image/profile/'.$profile->photo);
				$request->file('file')->move('resources/assets/image/profile',$name_file);
				$profile->photo	= $name_file;
			}
			
			if (Input::get('password') != "") 
			{
				$user->password 	= Hash::make(Input::get('password'));
			}

			$user->name	= Input::get('name');

			$profile->fullname 	= Input::get('fullname');	
			$profile->address 	= Input::get('address');	
			$profile->phone_number 	= Input::get('phone_number');	
			

			$user->save();
			$profile->save();

			return Redirect::route('admin/profile')->withMessage('Data Has Been Edited.');
		}
    }
}
