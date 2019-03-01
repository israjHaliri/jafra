<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use File;

class GalleryController extends Controller
{
	public function gallery()
	{
		$label = "Gallery";
		$category = array('1' => 'gallery');
		
		return View('admin.gallery.index',compact('category','label'));
	}
	public function company()
	{
		$label = "Company";
		$category = array('2' => 'company');
		
		return View('admin.gallery.index',compact('category','label'));
	}
	public function testimoni()
	{
		$label = "Testimonial";
		$category = array('3' => 'testimoni');
		
		return View('admin.gallery.index',compact('category','label'));
	}
	public function list_data()
	{
		$category = Input::get('category');
		$gallery_data = \App\Gallery::where('category',$category)->get();
		$list_data = array();

		for($i=0; $i < count($gallery_data); $i++)
		{
			$my_list_data = \App\Image::where('gallery_id',$gallery_data[$i]->id)->get();
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

			$success = null;
			for($i=0; $i < count($request->file('images')); $i++)
			{
				$name_file = str_random(30).'-'.$request->file('images')[$i]->getClientOriginalName();
				$name_file_view = $request->file('images')[$i]->getClientOriginalName();

				if($request->file('images')[$i]->move('resources/assets/image/gallery',$name_file)) 
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
					$category = Input::get('category');

					$gallery_data = \App\Gallery::create(compact('category'));
					$gallery_id = $gallery_data->id;
					$landing_page_id = '';

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
	public function delete(Request $request)
	{
		$id = $request->input('key');

		$galleries=\App\Gallery::find($id);

		if (!is_null($galleries)) {

			$images=\App\Image::where('gallery_id',$galleries->id)->first();
			if(File::delete('resources/assets/image/gallery/'.$images->original_name))
			{	
				$images->delete();
				$galleries->delete();
			}
		}	

		$output = ['success'=>'Success.'];
		echo json_encode($output);
	}
}
