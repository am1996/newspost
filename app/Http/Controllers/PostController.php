<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request) {
        return view('posts.index');
    }
    public function view(Request $request,$id){
        $post = Posts::find($id);
        return view('posts.view',[
            "post" => $post
        ]);
    }
    public function add(Request $request){
        if($request->isMethod('post')){
            $user = User::find($request->user()->id);
            $request->validate([
                "title" => "required",
                "content" => "required"
            ]);
            $post = new Posts();
            $post->title = $request->title;
            $post->content = $request->content;
            $post->save();
            $user->posts()->save($post);
            return redirect("/posts")->with("message","Successfully added a post!");
        }else return view("posts.postsform");
    }
    public function edit(Request $request){
        
    }
    public function posts(Request $request){
        $posts = Posts::all();
        return view("posts.list",[
            "posts"=> $posts
        ]);
    }
}
