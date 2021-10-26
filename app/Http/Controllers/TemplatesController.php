<?php

namespace App\Http\Controllers;

use App\Models\templates;
use Illuminate\Http\Request;

class TemplatesController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Request $request)
    {   
        $data = $request->all();
        $template = new templates;
        $template->course_id = $data["course_id"];
        $template->save();

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $template = templates::find($request['id']);

        if ($template) {
           if ($template->delete()) {
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
