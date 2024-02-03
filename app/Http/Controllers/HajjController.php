<?php

namespace App\Http\Controllers;

use App\cr;
use App\Models\Hajj;
use Illuminate\Http\Request;

class HajjController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hajjData = Hajj::all();
        return view('index', compact('hajjData'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cr  $cr
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
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    public function page()
    {
        $hajjData = Hajj::all();
        return view('index-admin', compact('hajjData'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    // public function destroy(cr $cr)
    // {
    //     //
    // }
}
