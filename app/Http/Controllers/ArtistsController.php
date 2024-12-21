<?php

namespace App\Http\Controllers;

use App\Models\Artists;
use Illuminate\Http\Request;

class ArtistsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artists = Artists::all()->sortBy('name');
        return view('artists.index', compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('artists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => 'required | min:4',
            'spotify_id' => 'required | min:22 | max:22',
            'comment' => 'nullable | max:200',

        ]);
        Artists::create($attributes);

        return redirect('/artists');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artists $artists)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Artists $artists)
    {
        $requesturl = $request->getRequestUri();
        preg_match_all('/\d+/', $requesturl, $matches);
        $artist_id_todelete = $matches[0][0];
        $artisttodestroy = Artists::where('id', $artist_id_todelete)->firstOrFail();
        $this->destroy($artisttodestroy);
        //$this->index();
        $artists = Artists::all()->sortBy('name');
        return view('artists.index', compact('artists'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artists $artists)
    {
        return redirect('artists.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artists $artists)
    {
        $artists->delete();
    }
}
