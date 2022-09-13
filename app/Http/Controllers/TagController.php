<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){
        return view('backend.tag.create');
    }
    public function create(){
        $tags = Tag::orderBy('id', 'DESC')->get();
        return view('backend.tag.index', compact('tags'));
    }

    public function store(Request $request){
       $request->validate([
        'tag_tittle' => 'required|unique:tags,tag_tittle'
       ]);

    //    $tags = Tag::insert([
    //     'tag_tittle' => $request->tag_name,
    //     'tag_slug' => Str::slug($request->tag_name),
    //     'tag_description' => $request->tag_description,
    //     'created_at' => Carbon::now()
    //    ]);
       $tags = new Tag();
       $tags->tag_tittle = $request->tag_tittle;
       $tags->tag_slug = Str::slug($request->tag_tittle);
       $tags->tag_description = $request->tag_description;
       $tags->created_at = Carbon::now();
       $tags->save();
       return redirect()->back();
    }

    public function edit($id){
       $tag = Tag::find($id);
       return view('backend.tag.edit', compact('tag'));
    }
    public function update(Request $request, $id){
        $tag = Tag::find($id);
        //dd($tag->tag_tittle);
        $request->validate([
            'tag_tittle' => "required|unique:tags,tag_tittle,$tag->tag_tittle"
        ]);

        Tag::find($id)->update([
            'tag_tittle' =>$request->tag_tittle,
            'tag_slug' =>Str::slug($request->tag_tittle),
            'tag_description' =>$request->tag_description
        ]);
       return redirect()->route('tag.create');
    }
    public function destroy($id){

        if($id){
            Tag::find($id)->delete();
            return back();
        }else{
            return back();
        }


    }
}
