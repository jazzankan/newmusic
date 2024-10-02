<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KeyController extends Controller
{
    public function index()
    {
        $token = Http::withHeaders(['Content-Type'=> 'application/x-www-form-urlencoded'
        ])->asForm()->post('https://accounts.spotify.com/api/token', [
            'grant_type'=> 'client_credentials',
            'client_id'=> '6eded995112346d8aa49254b94d31e5b',
            'client_secret'=> '4f33f9955a6748e0b678f94d57bed679'
        ]);

        return view('/keycall')->with('token', $token);
    }
}
