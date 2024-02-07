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
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'rating' => 'required|numeric',
            'description' => 'required|string',
            'link' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle file upload
        $imagePath = $request->file('image')->store('hajj_images', 'public');

        // Create a new Hajj instance and fill it with the form data
        $hajj = new Hajj([
            'name' => $request->input('name'),
            'location' => $request->input('location'),
            'price' => $request->input('price'),
            'rating' => $request->input('rating'),
            'link' => $request->input('link'),
            'description' => $request->input('description'),
            'image' => $imagePath,
        ]);

        // Save the instance to the database
        $hajj->save();

        // Redirect to a specific route or perform any other desired action
        return redirect()->route('hajj.page')->with('success', 'Hajj data saved successfully!');
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
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'rating' => 'required|numeric',
            'description' => 'required|string',
            'link' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // Sesuaikan dengan kolom-kolom lainnya
        ]);

        // Update data di dalam database
        $hajj->update([
            'name' => $request->input('name'),
            'location' => $request->input('location'),
            'price' => $request->input('price'),
            'rating' => $request->input('rating'),
            'description' => $request->input('description'),
            'link' => $request->input('link'),
            'image' => $request->input('image'),
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
        $hajjCount = Hajj::count();
        return view('admin.index', compact('hajjData', 'hajjCount'));
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

    public function search(Request $request)
    {
        $hajjData = Hajj::all();

        $country = $request->all();

        $price = escapeshellarg($request->filled('price') ? $request->price : '');
        $rating = escapeshellarg($request->filled('rating') ? $request->rating : '');
        $duration = escapeshellarg($request->filled('duration') ? $request->duration : '');
        $country = escapeshellarg($request->filled('country') ? $request->country : '');
        $airline = escapeshellarg($request->filled('airline') ? $request->airline : '');
        $category = escapeshellarg($request->filled('category') ? $request->category : '');

        $command = "python C:\Users\HP\Documents\PROJECTS\lomba\biro-hajj-app\app\Http\Controllers\ml\main.py $price $rating $duration $country $airline $category";
        $output = shell_exec($command);

        // dd($duration, $price);
        dd($output);

        $results = json_decode($output, true);



        return view('index', compact('results','hajjData'));
    }

}
