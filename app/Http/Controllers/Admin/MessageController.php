<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Redirect;

class MessageController extends Controller
{
	public function index()
	{
		$request_param = Input::get('search');

		if ($request_param)
		{
			$list_data = \App\Message::where('name', 'LIKE', "%$request_param%")->paginate(5);
		}
		else
		{
			$list_data = \App\Message::orderBy('id', 'DESC')->paginate(5);
		}

		return View('admin.message.index', compact('list_data'));
	}
	public function detail($id)
	{
		$list_data = \App\Message::where('id','=', $id)->orderBy('id')->get();
		$update = \App\Message::find($id);

		$update->status	= 1;
		
		$update->save();
		return View('admin.message.detail', compact('list_data'));
	}
	public function delete($id) {
		\App\Message::find($id)->delete();
		return Redirect::route('admin/message')->withMessage('Data Has Been Deleted.');
	}
}
