<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    function index() {
        $posts=Post::latest()->paginate(9); // latest to first
        return view('Index',['posts'=>$posts]);
    }

    function createpost()
    {
        return view("User.Create");
    }

    function userprofile()
    {
        return view("User.Userprofile");
    }

    function contactus()
    {
        return view("User.Contactus");
    }

    function showPostByID($id)
    {
        $post=Post::find($id);
        return view('User/showpost',['post'=>$post]);
    }

    function editPost($id)
    {
        $editPost=Post::find($id);
        return view('User.editPost',['editPost'=>$editPost]);
    }
}
