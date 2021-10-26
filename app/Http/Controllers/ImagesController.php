<?php

namespace App\Http\Controllers;

use App\Models\images;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    
    public function index()
    {
        //
    }

    public function create(Request $request)
    {   
        $data = $request->all();
        $image = new images;
        $image->img = $data["img"];
        $image->template_id = $data["template_id"];
        $image->save();

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $image = images::find($request['id']);

        if ($image) {
           if ($image->delete()) {
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
