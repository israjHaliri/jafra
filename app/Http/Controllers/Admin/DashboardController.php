<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use View;

class DashboardController extends Controller
{

  private $items;

  public function __construct() 
  {
    $this->items = \App\User::all();
  }

  public function index()
  {
    $itemsHelper = new $this();
    return View::make('admin.dashboard.index',compact('items','itemsHelper'));
  }

  public function show_tree() 
  {
    return $this->print_tree($this->list_data());
  }

  private function list_data() 
  {
    $result = array();
    foreach($this->items as $item) 
    {
      if ($item->parent_id == 0) 
      {
        $result[$item->name] = $this->list_child($item);
      }
    }
    return $result;
  }

  private function list_child_extend($item) 
  {
    $result = array();
    foreach($this->items as $i) 
    {
      if ($i->parent_id == $item->id) 
      {
        $result[] = $i;
      }
    }
    return $result;
  }

  private function list_child($item) 
  {
    $result = array();
    $child_data = $this->list_child_extend($item);
    foreach ($child_data as $child) 
    {
      $result[$child->name] = $this->list_child($child);
    }
    return $result;
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



