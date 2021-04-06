<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\PostLikes;
use App\Models\User;
use App\Models\Comments;

class PostsController extends Controller
{
    public function index()
    {
    	$posts = Posts::all()->sortByDesc('created_at');;
        $postLikes = PostLikes::all();
        $users = User::all();
        $comments = Comments::all();

        return view('main.index', compact('posts','postLikes','users','comments'));
    }

    public function perfil($id)
    {
    	$posts = Posts::where("user_id", $id)->get();
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
