<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserPosts;

class UserController extends Controller
{
    public function index()
    {

        $users = User::all();
        foreach ($users as $user) {
            if ($user->role_id!=null) {
                $user->assignRole($user->role_id);
            }
        }
 
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create(Request $request)
    {   
        $data = $request->all();
        $user = new User;
        $user->profile_image = "default.png";
        $user->name = $data["name"];
        $user->middle_name = $data["middle_name"];
        $user->last_name = $data["last_name"];
        $user->nick_name = $data["nick_name"];
        $user->email = $data["email"];
        $user->password = bcrypt("12345");
        $user->role_id = 2;
        $user->save();

        $userPost = new UserPosts;
        $userPost->post_id = $data["post_id"];
        $userPost->user_id = $user->id;
        $userPost->save();

        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $user = User::find($request['user_id']);

        if ($request->hasFile('cover_file')) {
                
            $file = $request->file('cover_file');
            $file_name = 'profile_image'.$user->id.'.'.$file->getClientOriginalExtension();

            $path = $request->file('cover_file')->storeAs(
                'img', $file_name
            );

            $user->profile_image = $file_name;
            $user->save();
        }
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $user = User::find($request['id']);
        if ($user) {
            if ($user->update($request->all())) {
                
                return redirect()->back()->with('success', '¡El registro se ha actualizado correctamente!');
            }
        }
        return redirect()->back()->with('error', '¡No se pudo actualizar el registro!');
    }

    public function destroy(Request $request)
    {
        $user = User::find($request['id']);

        if ($user) {
           if ($user->delete()) {
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

    public function get(User $user)
    {   
        if ($user) {
            return response()->json([
                'message' => 'Registro consultado correctamente',
                'code' => '200',
                'user' => $user
            ]);
        }
        return response()->json([
            'message' => 'Registro no encontrado',
            'code' => '400',
            'user' => array()
        ]);
    }
}
