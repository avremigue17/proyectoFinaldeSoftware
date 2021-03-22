<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\User;

class PostsController extends Controller
{
    public function index()
    {
    	$posts = Posts::all();
        $users = User::all();

        return view('main.index', compact('posts','users'));
    }
}
