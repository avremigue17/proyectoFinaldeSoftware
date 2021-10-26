<?php

namespace App\Http\Controllers;

use App\Models\areas;
use Illuminate\Http\Request;

class AreasController extends Controller
{
    public function index()
    {
        //
    }
    
    public function create(Request $request)
    {   
        $data = $request->all();
        $area = new areas;
        $area->name = $data["name"];
        $area->save();

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $area = areas::find($request['id']);

        if ($area) {
           if ($area->delete()) {
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
