<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\PostLikes;
use App\Models\User;
use App\Models\Comments;
use App\Models\Areas;
use App\Models\images;
use App\Models\texts;
use App\Models\templates;
use App\Models\course;
use App\Models\CoursePosts;
use App\Models\UserPosts;
use App\Models\records;

class PostsController extends Controller
{
    public function index($id)
    {
    	$posts = Posts::all()->sortByDesc('created_at');
        $users = User::all();
        $areas = Areas::all();
        $images = images::all();
        $texts = texts::all();
        $templates = templates::where("course_id", 1)->get();
        $courses = course::all();
        $coursePosts = CoursePosts::with('course')->get();
        $user = User::findOrFail($id);
        $userPost = UserPosts::all();
        $records = records::with('course')->get(); 

        return view('test', compact('users','areas','posts','images','texts','templates','courses','coursePosts','userPost','records'));
        //return view('main.index', compact('posts','postLikes','users','comments'));
    }

    public function create(Request $request)
    {   
        $data = $request->all();
        $post = new Posts;
        $post->name = $data["name"];
        $post->area_id = $data["area_id"];
        $post->save();

        return redirect()->back();
    }

    public function perfil($id)
    {
    	$posts = Posts::where("user_id", $id)->get()->sortByDesc('created_at');
        $user = User::findOrFail($id);
        $comments = Comments::all();

        return view('perfil.index', compact('posts','user','comments'));
    }

    public function store(Request $request)
    {
        if ($post = Posts::create($request->all())) {

            if ($request->hasFile('cover_file')) {
                
                $file = $request->file('cover_file');
                $file_name = 'post_image'.$post->id.'.'.$file->getClientOriginalExtension();

                $path = $request->file('cover_file')->storeAs(
                    'img', $file_name
                );

                $post->image = $file_name;
                $post->save();
            }
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $post = Posts::find($request['id']);

        if ($post) {
           if ($post->delete()) {
               return response()->json([
                    'code' => '200',
                ]);
           }
        }
        return response()->json([
            'message' => '¡No se pudo eliminar el registro!',
            'code' => '400',
        ]);
    }
}
