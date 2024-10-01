<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeyController extends Controller
{
    public function index()
    {
       //$artists = Artist::latest()->limit(10)->get();
        //$totalartists = Artist::all();
        $token = "bertil";

        return view('/keycall')->with('token', $token);
    }
}
