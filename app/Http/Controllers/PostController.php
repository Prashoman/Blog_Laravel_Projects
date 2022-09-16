<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Posttag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::orderBy('id', 'DESC')->paginate(5);
        $tag = Posttag::all();

       return view('backend.post.index',compact('posts', 'tag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        $tags = Tag::orderBy('id', 'DESC')->get();
        return view('backend.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'post_tittle' => 'required',
            'post_category' =>'required',
            'tag' =>'required',
            'post_image' =>'required',
            'post_description' =>'required',

        ]);

        date_default_timezone_set('Asia/Dhaka');
        $visit_time = date('h:i:sa');


        $image = $request->file('post_image');

        if(isset($image)){
            $currentDate= Carbon::now()->toDateString();
            $imagename = $currentDate.'-'.Str::random(10).'.'.$image->getClientOriginalExtension();
            if(!file_exists('uploads/post')){
                mkdir('uploads/post', 077, true);
            }
            $image->move('uploads/post', $imagename);
        }else{
            $imagename = 'default.png';
        }


        $post_id = Post::insertGetId([
            'category_id' => $request->post_category,
            'user_id' => auth()->user()->id,
            'post_tittle' => $request->post_tittle,
            'post_image' => $imagename,
            'post_slug' =>Str::slug($request->post_tittle.Str::random(10)),
            'post_description' => $request->post_description,
            'post_time' => $visit_time,
            'created_at' => Carbon::now()
        ]);

        foreach ($request->tag as $tags){
            if($tags){
                Posttag::insert([
                    'post_id' =>$post_id,
                    'tag_id' => $tags
                ]);
            }

        }

        return redirect()->back();




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $categories = Category::orderBy('id', 'DESC')->get();
        $tags = Tag::orderBy('id', 'DESC')->get();
        return view('backend.post.show', compact('post', 'categories', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::orderBy('id', 'DESC')->get();
        $tags = Tag::orderBy('id', 'DESC')->get();
       return view('backend.post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'post_tittle' => 'required',
            'post_category' =>'required',
            'tag' =>'required',

            'post_description' =>'required',

        ]);
        date_default_timezone_set('Asia/Dhaka');
        $visit_time = date('h:i:sa');


        $image = $request->file('post_image');

        if(isset($image)){
            $currentDate= Carbon::now()->toDateString();
            $imagename =  $currentDate.'-'.Str::random(10).'.'.$image->getClientOriginalExtension();
            if(!file_exists('uploads/post')){
                mkdir('uploads/post', 077, true);
            }
            $image->move('uploads/post', $imagename);
        }else{
            $imagename = Post::find($id)->post_image;
        }
        $post_id = Post::find($id);
        Post::find($id)->update([
            'category_id' => $request->post_category,
            'user_id' => auth()->user()->id,
            'post_tittle' => $request->post_tittle,
            'post_image' => $imagename,
            'post_slug' =>Str::slug($request->post_tittle.Str::random(10)),
            'post_description' => $request->post_description,
            'post_time' => $visit_time,
            'updated_at' => Carbon::now()
        ]);




            // $posttag = Posttag::where('post_id', $id)->update([
            //     'post_id' =>$id,
            //     'tag_id' => $request->tag
            // ]);

                // Posttag::fi([
                //     'post_id' =>$post_id,
                //     'tag_id' => $tags
                // ]);



        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);
        if(file_exists('public/uploads/post/'.Post::find($id)->post_image)){
            unlink('public/uploads/post/'.Post::find($id)->post_image);
        }
        $post->delete();

        $posttag = Posttag::where('post_id', $id)->delete();

    //    return $posttag;


        return back();
    }
}
