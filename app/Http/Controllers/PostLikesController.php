<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostLikes;

class PostLikesController extends Controller
{
    public function store(Request $request)
    {
       	#$like = PostLikes::create($request->all());
       	#return $like;
        $likes = PostLikes::where('user_id', $request->user_id)->where('post_id', $request->post_id)->get();
       	
       	if(sizeof($likes) != 0)
       	{
        	return response()->json([
                'message' => 'like dado correctamente',
                'code' => '500',
                'id' => $likes
            ]);
       	}
       	else
       	{
       		$like = PostLikes::create($request->all());
       		$like->save();
       		return response()->json([
                'message' => 'like dado correctamente',
                'code' => '200',
            ]);
       	}
    }

     public function destroy(Request $request)
    {
        $like = PostLikes::find($request['id']);

        if ($like) {
           if ($like->delete()) {
               return response()->json([
                    'message' => '¡Registro eliminado correctamente!',
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
