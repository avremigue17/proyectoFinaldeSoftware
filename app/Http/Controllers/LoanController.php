<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Movie;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Auth;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->id!=1) 
        {
            $loans = Loan::with('movie','user')->where('user_id',auth()->user()->id)->get();
            $categories = Category::all();
        }
        else
        {
            $loans = Loan::with('movie')->get(); 
            $categories = Category::all();
        }

       return view('loans.index',compact('loans','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         if (Auth::user()->hasPermissionTo('add loans')) { 

            if ($loan = Loan::create($request->all())) {
            return redirect()->back()->with('success', '¡Solicitud Exitosa!');
        }
        return redirect()->back()->with('error', '¡Solicitud Fallida!');
            return redirect()->back();
        
        }
        return redirect()->back()->with('error','no tienes permisos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $loan = Loan::find($request['idloan']);

        if ($loan) {
            if ($loan->update($request->all())) {
                return redirect()->back()->with('success', '¡Solicitud Exitosa!');
            }
        }
        return redirect()->back()->with('error', '¡Solicitud Fallida!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Loan::find($id);
        
        $note->delete();
        
        return redirect('/');
    }

    public function get(Loan $loan)
    {   
        if ($loan) {
            return response()->json([
                'message' => 'Registro consultado correctamente',
                'code' => '200',
                'loan' => $loan
            ]);
        }
        return response()->json([
            'message' => 'Registro no encontrado',
            'code' => '400',
            'loan' => array()
        ]);
    }
}
