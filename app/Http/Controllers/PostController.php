<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Post;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
}
