<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Posttag;
use App\Models\Tag;
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
        $posts = Post::orderBy('id', 'DESC')->take(10)->paginate(6);
        $Toppost = Post::orderBy('id', 'DESC')->take(5)->get();
        $Foterpost = Post::inRandomOrder()->limit(5)->get();
        //return $Foterpost;
        //toppost
        $postFirst = $Toppost->splice(0,2);
        $postsecond = $Toppost->splice(0,1);
        $postthird = $Toppost->splice(0,2);

        //Footerpost
        $footerFirst = $Foterpost->splice(0,1);
        $Foterpostsecond = $Foterpost->splice(0,1);
        $Foterpostpostthird = $Foterpost->splice(0,2);

        //return $footerFirst;





       return view('frontend.index',compact('posts','postFirst', 'postsecond', 'postthird', 'footerFirst', 'Foterpostsecond', 'Foterpostpostthird'));
    }
    public function category($id){
        // $tags = Posttag::where('post_id', $id)->get();
        // return $tags;

        $single_post = Post::where('category_id', $id)->first();
        if( $single_post){
            $categoryposts = Post::where('category_id', $id)->get();
            //return $categoryposts;
           return view('frontend.category', compact('categoryposts','single_post'));
        }
        else{
            return back();
        }

    }
    public function about(){
        return view('frontend.about');

    }
    // public function single(){
    //     return view('frontend.single');

    // }
    public function contact(){
        return view('frontend.contact');

    }

    public function diteils($slug){
        $details_post = Post::where('post_slug', $slug)->first();
        $popularposts = Post::inRandomOrder()->limit(3)->get();
        //$tags = Tag::orderBy('id', 'DESC')->limit('10')->get();

        // return $tags;

        return view('frontend.single', compact('details_post', 'popularposts'));
    }
}
