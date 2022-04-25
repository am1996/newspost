<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        }else return view("posts.add");
    }
    public function edit(Request $request,$id){
        if($request->isMethod('post')){
            $post = Posts::find($id);

            //Check if same user is deleting the post
            if($post->user_id !== Auth::user()->id) return abort(403);

            $request->validate([
                "title" => "required",
                "content"=> "required"
            ]);

            $post->title = $request->title;
            $post->content = $request->content;
            $post->save();
            return redirect("/posts/$id")->with("message","Successfully edited the post!");
        }else{
            $post = Posts::find($id);
            return view("posts.edit",[
                "post" => $post
            ]);
        }
    }
    
    public function delete(Request $request,$id){
        Posts::find($id)->delete();
        return redirect("/posts")->with("message","Successfully Deleted a post!");
    }

    public function posts(Request $request){
        $posts = Posts::all();
        return view("posts.list",[
            "posts"=> $posts
        ]);
    }
}
