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
    // public function edit($id)
    // {
    //     //
    // }

    public function edit($id)
    {
        $hajj = Hajj::find($id);

        if (!$hajj) {
            abort(404);
        }

        return view('admin.edit', compact('hajj'));
    }

    public function update(Request $request, $id)
    {
        $hajj = Hajj::find($id);

        if (!$hajj) {
            abort(404);
        }

        // Validasi form input sesuai kebutuhan
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'rating' => 'required|numeric|min:1|max:5',
            // Sesuaikan dengan kolom-kolom lainnya
        ]);

        // Update data di dalam database
        $hajj->update([
            'name' => $request->input('name'),
            'location' => $request->input('location'),
            'rating' => $request->input('rating'),
            // Sesuaikan dengan kolom-kolom lainnya
        ]);

        return redirect()->route('hajj.page')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request)
    // {
    //     //
    // }

    public function page()
    {
        $hajjData = Hajj::all();
        return view('admin.index', compact('hajjData'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $hajj = Hajj::find($id);
        if (isset($hajj)) {
            $hajj->delete();


            return response()->json([
                'success' => true,
                'message' => 'Berhasil menghapus data biro'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Gagal menghapus data biro'
        ], 400);
    }

}
