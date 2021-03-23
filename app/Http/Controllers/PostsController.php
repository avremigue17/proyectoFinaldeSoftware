<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\User;
use App\Models\Comments;

class PostsController extends Controller
{
    public function index()
    {
    	$posts = Posts::all();
        $users = User::all();
        $comments = Comments::all();

        return view('main.index', compact('posts','users','comments'));
    }

    public function perfil()
    {
    	$posts = Posts::all();
        $users = User::all();
        $comments = Comments::all();

        return view('perfil.index', compact('posts','users','comments'));
    }
}
