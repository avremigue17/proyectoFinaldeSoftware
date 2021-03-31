<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SearchController extends Controller
{
    public function find(Request $request)
	{

		$users = User::search($request->get('q'))->get();
	    return $users;
	}

}
