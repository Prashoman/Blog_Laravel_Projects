<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *

     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       return view('frontend.index');
    }
    public function category(){
        return view('frontend.category');

    }
    public function about(){
        return view('frontend.about');

    }
    public function single(){
        return view('frontend.single');

    }
    public function contact(){
        return view('frontend.contact');

    }
}
