<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function listAllPosts(){
        return view('posts.listAllPosts');
    }
    public function createPost(){
        return view('posts.createPost');
    }

    public function listPostById(Request $request,$id) {
        return view('posts.viewPost');
    }

    public function UpdatePost(Request $request, $id) {
        return view('posts.viewPost');
    }

    public function deletePost(Request $request, $id) {
        return view('posts.viewPost');
    }
}
