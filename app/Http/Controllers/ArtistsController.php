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
        $artists = Artists::all();
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

        return redirect('/');
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
    public function edit(Artists $artists)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artists $artists)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artists $artists)
    {
        //
    }
}
