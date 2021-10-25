<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;

class CommentsController extends Controller
{   
    public function index()
    {

    }
    
    public function create(Request $request)
    {   

        $data = $request->all();
        $comment = new Comments;
        $comment->text = $data["text"];
        $comment->likes = 0;
        $comment->user_id = $data["user_id"];
        $comment->post_id = $data["post_id"];
        $comment->save();

        return redirect()->back();
    }

    public function store()
    {
       
    }
}
