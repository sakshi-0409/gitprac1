<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(){
        return view('admin/operation');
    }
   
    public function add_new_manufacturer(){
        return view('admin/add-new-manufacturer');
    }
    public function add_new_product(){
        $title = 'Add New Product';
        $url = url('/add-product');
        $data = compact('title', 'url');
        return view('admin/add-new-product')->with($data);
    }
    public function operation(){
        return view('admin/operation');
    }
  
    
}
