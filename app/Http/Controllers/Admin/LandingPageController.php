<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Input;
use Validator;
use Redirect;
use File;

class LandingPageController extends Controller
{
	public function __construct() 
	{
		
	}
	public function index()
	{
		$request_param = Input::get('search');

		if ($request_param)
		{
			$list_data = \App\landingPage::where('title', 'LIKE', "%$request_param%")->paginate(5);
		}
		else
		{
			$list_data = \App\LandingPage::orderBy('id', 'DESC')->paginate(5);
		}

		return View('admin.landing_page.index', compact('list_data'));
	}
	public function create()
	{
		$id = Auth::user()->id;
		$active = array(
			'1' => 'active', 
			'0' => 'non-active');
		$category = array(
			'1' => 'promo', 
			'2' => 'product',
			'3' => 'event',
			'4' => 'news',
			'5' => 'testimonial');
		return View('admin.landing_page.create', compact('active','category'));
	}
	public function insert(Request $request) 
	{

		$data = Input::all();
		
		$rule = array(
			'title' => 'required|min:5', 
			'description' => 'required', 
			'file' => 'image'
			);

		$message = array(
			'title.required' => 'title cannot be empty.',
			'title.min' => 'title min 5 character.',
			'description.required' => 'description cannot be empty.',
			'file.image' => 'File Must Be An Image.',
			);
		
		$validation = Validator::make($data, $rule, $message);
		
		if($validation->fails()) 
		{
			return Redirect::back()->withErrors($validation)->withInput();
		} 
		else 
		{	
			$title = Input::get('title');
			$description = Input::get('description');
			$active = Input::get('active');
			$category = Input::get('category');
			$create_by = Auth::user()->name;
			
			$save_data =\App\LandingPage::create(compact('title', 'description', 'create_by','active', 'category', 'image'));
			
			if ($save_data) 
			{
				if($request->file('file') != "")
				{
					$name_file = str_random(30).'-'.$request->file('file')->getClientOriginalName();
					$newDir =  base_path().'/resources/assets/image/landing_page/' . $save_data->id;
					File::makeDirectory( $newDir, 0755, false);
					$request->file('file')->move('resources/assets/image/landing_page/'. $save_data->id.'',$name_file);

					$update = \App\LandingPage::find($save_data->id);
					$update->image 	= $name_file;		
					$update->save();

				}
				return Redirect::route('admin/landing_page/create')->withMessage('Data Has Been Saved.');
				Storage::MakeDirectory(public_path('my_new_directory'));

			}
			else
			{
				return Redirect::route('admin/landing_page/create')->withMessage('Something When Wrong Please Verify Your Data.');	
			}
			
		}
	}
	public function edit($id) {

		$active = array(
			'1' => 'active', 
			'0' => 'non-active');
		$category = array(
			'1' => 'promo', 
			'2' => 'product',
			'3' => 'event',
			'4' => 'news',
			'5' => 'testimonial');
		$list_data = \App\LandingPage::find($id);
		return View('admin.landing_page.edit', compact('active','category','list_data'));
	}

	public function update($id,Request $request) {
		
		$data = Input::all();
		
		$rule = array(
			'title' => 'required|min:5', 
			'description' => 'required', 
			'file' => 'image'
			);

		$message = array(
			'title.required' => 'title cannot be empty.',
			'title.min' => 'title min 5 character.',
			'description.required' => 'description cannot be empty.',
			'file.image' => 'File Must Be An Image.',
			);
		
		$validation = Validator::make($data, $rule, $message);

		if($validation->fails()) 
		{
			return Redirect::back()->withErrors($validation)->withInput();
		} 
		else 
		{	
			$update = \App\LandingPage::find($id);

			$update->title = Input::get('title');
			$update->description = Input::get('description');
			$update->active = Input::get('active');
			$update->category = Input::get('category');
			$update->create_by = Auth::user()->name;

			$save_data = $update->save();

			if ($save_data) 
			{
				if($request->file('file') != "")
				{
					$name_file = str_random(30).'-'.$request->file('file')->getClientOriginalName();
					$newDir =  base_path().'/resources/assets/image/landing_page/'.$id;
					File::delete($newDir.'/'.$update->image);
					if(!File::exists($newDir)) {
						File::makeDirectory( $newDir, 0755, false);   
					}
					$request->file('file')->move('resources/assets/image/landing_page/'. $id.'',$name_file);

					$update = \App\LandingPage::find($id);
					$update->image 	= $name_file;		
					$update->save();

				}
				return Redirect::route('admin/landing_page/edit',array('id' => $id))->withMessage('Data Has Been Edited.');
				Storage::MakeDirectory(public_path('my_new_directory'));

			}
			else
			{
				return Redirect::route('admin/landing_page/edit',array('id' => $id))->withMessage('Something When Wrong Please Verify Your Data.');	
			}
			
		}
	}
	public function delete($id) {
		
		if ($id == "") {
			return Redirect::route('admin/landing_page')->withMessage('Something Wrong Please Contact Your Administrator.');	
		}
		else
		{
			$landing_page = \App\LandingPage::where("id" , '=' , $id)->first();			
			$delete = \App\landingPage::find($id)->delete();
			if ($delete) 
			{
				$newDir =  base_path().'/resources/assets/image/landing_page/' . $landing_page->id;
				File::deleteDirectory($newDir);
				return Redirect::route('admin/landing_page')->withMessage('Data Has Been Deleted.');	
			}
		}
	}
	public function gallery($id)
	{			
		$list_data = \App\LandingPage::find($id);
		return View('admin.landing_page.gallery',compact('list_data'));
	}
	public function list_gallery()
	{
		$id = Input::get('id');
		$landing_page_data = \App\LandingPage::where('id',$id)->get();
		$list_data = array();

		for($i=0; $i < count($landing_page_data); $i++)
		{
			$my_list_data = \App\Image::where('landing_page_id',$landing_page_data[$i]->id)->get();
			array_push($list_data,$my_list_data);
		}
		return $list_data;	
	}
	public function upload(Request $request)
	{
		if ($request->file('images') == "") {
			$output = ['error'=>'No files were processed.'];
			echo json_encode($output);
		}
		else
		{
			$newDir =  base_path().'/resources/assets/image/landing_page/' . Input::get('id');
			if(!File::exists($newDir)) {
				File::makeDirectory( $newDir, 0755, false);   
			}

			$success = null;
			for($i=0; $i < count($request->file('images')); $i++)
			{
				$name_file = str_random(30).'-'.$request->file('images')[$i]->getClientOriginalName();
				$name_file_view = $request->file('images')[$i]->getClientOriginalName();

				if($request->file('images')[$i]->move('resources/assets/image/landing_page/'.Input::get('id').'/',$name_file)) 
				{
					$success = true;
				} else {
					$success = false;
					break;
				}

				if ($success === true) 
				{   
					$output = [];

					$original_name = $name_file;
					$filename = pathinfo($name_file_view, PATHINFO_FILENAME);
					
					$gallery_id = '';
					$landing_page_id = Input::get('id');

					\App\Image::create(compact('filename','original_name','gallery_id','landing_page_id'));

				} 
				elseif ($success === false) 
				{
					$output = ['error'=>'Error while uploading images. Contact the system administrator'];

					foreach ($request->file('images')[$i]->move('resources/assets/image/gallery',$name_file) as $file) 
					{
						unlink($file);
					}
				} 
				else 
				{
					$output = ['error'=>'No files were processed.'];
				}
			}

			echo json_encode($output);
		}
	}
	public function delete_image(Request $request)
	{
		$id = $request->input('key');

		$image=\App\Image::find($id);

		if (!is_null($image)) {

			$images=\App\Image::where('landing_page_id',$image->landing_page_id)->where('id',$id)->first();
			if(File::delete('resources/assets/image/landing_page/'.$image->landing_page_id.'/'.$image->original_name))
			{	
				$images->delete();
			}
		}	

		$output = ['success'=>'Success.'];
		echo json_encode($output);
	}
}
