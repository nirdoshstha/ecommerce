<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $view_path ='frontend.';


    public function index(){
        $data = [];
        return view($this->view_path.'index',compact('data'));
    }
}
