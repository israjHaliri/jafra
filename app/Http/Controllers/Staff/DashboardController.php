<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use View;

class DashboardController extends Controller
{


  public function __construct() 
  {

  }

  public function index()
  {
    $itemsHelper = new $this();
    return View::make('staff.dashboard.index',compact('itemsHelper'));
  }
  public function show_tree() 
  {
    return $this->print_tree($this->get_parent());
  }

  public function get_parent()
  {

    $id = Auth::user()->id;
    $new_id = \App\User::where('id', '=', $id)->first();
    $my_param = \App\User::where('id', '=', $id)->where('parent_id', '=', $new_id->parent_id)->first();    

    $children = $this->build_child($my_param->parent_id);  
    return $children;

  }

  public function build_child($param)
  {
    $id = Auth::user()->id;
    $result = \App\User::where('id', '=', $id)->where("parent_id" , '=' , $param)->get();


    $roles = array(); 
    foreach($result as $key => $val) {

      if($result[$key]->parent_id == $param) 
      {
        $children = $this->build_child($result[$key]->id);
        $roles = array($result[$key]->name => $children);

        if( !empty($children) ) {                   

          $roles = array($result[$key]->name => $children);

        }
      }
    }
    return $roles;

  }
  private function print_tree($data) 
  {

    $html = "";
    $html .= "<ul class='mytree'>";
    foreach($data as $index=>$value) 
    {

      $html .= "<li>".$index;
      if(count($value) > 0) 
      {

        $html .= $this->print_tree($value);
      }
      $html .= "</li>";
    }
    $html .= "</ul>";
    return $html;
  }
}
