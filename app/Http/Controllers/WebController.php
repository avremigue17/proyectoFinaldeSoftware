<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function contact(){

    	$name = 'juanito';
    	$lastname = 'aviles';

    	$parrafo = 'fsakdgkjagjñsjdlkgjajdgkljadflkgjalñjgajdfgsklfjdgksdfgjklñsjdfklgjajflkjglkadfjglkjdflkgjdf';

    	return view('casa',compact('name','lastname','parrafo'));
    }
}
