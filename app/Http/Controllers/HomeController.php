<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Input;
use Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_data_promo = \App\LandingPage::where('active', 1)->orderBy('updated_at')->where('category', 1)->take(4)->get();
        $list_data_product = \App\LandingPage::where('active', 1)->orderBy('updated_at')->where('category', 2)->take(9)->get();
        $list_data_testimonial = \App\LandingPage::where('active', 1)->orderBy('updated_at')->where('category', 5)->take(6)->get();
        $total_user = DB::table('users')->count();
        $total_product = \App\LandingPage::orderBy('updated_at')->where('category', 2)->count();
        $total_testimonial = \App\LandingPage::orderBy('updated_at')->where('category', 5)->count();

        $gallery_data_gallery = \App\Gallery::where('category',1)->get();
        $list_gallery_data_gallery = array();

        for($i=0; $i < count($gallery_data_gallery); $i++)
        {
            $my_list_gallery_data_gallery = \App\Image::where('gallery_id',$gallery_data_gallery[$i]->id)->get();
            array_push($list_gallery_data_gallery,$my_list_gallery_data_gallery);
        }

        $gallery_data_testimonial = \App\Gallery::where('category',3)->get();
        $list_gallery_data_testimonial = array();

        for($i=0; $i < count($gallery_data_testimonial); $i++)
        {
            $my_list_gallery_data_testimonial = \App\Image::where('gallery_id',$gallery_data_testimonial[$i]->id)->get();
            array_push($list_gallery_data_testimonial,$my_list_gallery_data_testimonial);
        }

        $gallery_data_company = \App\Gallery::where('category',2)->get();
        $list_gallery_data_company = array();

        for($i=0; $i < count($gallery_data_company); $i++)
        {
            $my_list_gallery_data_company = \App\Image::where('gallery_id',$gallery_data_company[$i]->id)->get();
            array_push($list_gallery_data_company,$my_list_gallery_data_company);
        }

        return view('frontend.home', compact(
            'list_data_promo',
            'list_data_product',
            'total_user',
            'total_product',
            'total_testimonial',
            'list_gallery_data_gallery',
            'list_gallery_data_company',
            'list_data_testimonial',
            'list_gallery_data_testimonial'));
    }
    public function detail_content($id)
    {        
        $list_data_main = \App\LandingPage::where('id',$id)->first();
        $list_data_child = \App\Image::where('landing_page_id',$list_data_main->id)->get();        
        $title = $list_data_main->title;
        $description = $list_data_main->description;
        $create_by = $list_data_main->create_by;
        $image = $list_data_main->image;     
        $id=$id;   
        $path = url('/').'/resources/assets/image/landing_page/'. $id.'/';

        return View('frontend.detail_content', compact('path','title', 'description', 'create_by', 'image','list_data_child','id'));
    }
    public function contact_us() {


        $name = Input::get('name');
        $email = Input::get('email');
        $subject = Input::get('subject');
        $message = Input::get('message');
        $status = 0;

        $save_data =\App\Message::create(compact('name', 'email', 'subject', 'message'));
        if ($save_data) 
        {
            return Redirect::route('/')->withMessage('Data Has Been Send.');
        }   
        else
        {
            return Redirect::route('/')->withMessage('Were Sorry to failed send your message, Please contact your administrator.');
        }       
    }
}
