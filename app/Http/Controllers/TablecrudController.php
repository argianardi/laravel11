<?php

namespace App\Http\Controllers;

use App\Models\tablecrud;
use Illuminate\Http\Request;

class TablecrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allString = tablecrud::all();
        return view('poststring', ['qa' => $allString]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        tablecrud::create([
            'title' => $request->title,
            'charLeng' => $request->charLeng
        ]);
        return redirect('/showdata');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('post-data');
    }

    /**
     * Display the specified resource.
     */
    public function show(tablecrud $tablecrud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tablecrud $tablecrud, Request $request)

    {
        $string = tablecrud::find($request->id);
        return view('edit-string', ['qa' => $string]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tablecrud $tablecrud)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tablecrud $tablecrud)
    {
        //
    }
}
