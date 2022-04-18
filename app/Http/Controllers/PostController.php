<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request) {
        return view('posts.index');
    }
    public function addPost(Request $request){
        return view("posts.postsform");
    }
    public function addPostR(Request $request){
        $post = new Posts();
    }
    public function posts(Request $request){
        $posts = Posts::all();
        return view("posts.list",[
            "posts"=> $posts
        ]);
    }
}
