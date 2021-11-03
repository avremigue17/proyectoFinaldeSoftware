<?php

namespace App\Http\Controllers;

use App\Models\CoursePosts;
use Illuminate\Http\Request;

class CoursePostsController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Request $request)
    {   
        $data = $request->all();
        $coursePost = new CoursePosts;
        $coursePost->course_id = $data["course_id"];
        $coursePost->post_id = $data["post_id"];
        $coursePost->save();

        return redirect()->back();
    }
}
