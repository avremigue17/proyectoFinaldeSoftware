<?php

namespace App\Http\Controllers;

use App\Models\texts;
use Illuminate\Http\Request;

class TextsController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Request $request)
    {   
        $data = $request->all();
        $text = new texts;
        $text->text = $data["text"];
        $text->template_id = $data["template_id"];
        $text->save();

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $text = texts::find($request['id']);

        if ($text) {
           if ($text->delete()) {
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
