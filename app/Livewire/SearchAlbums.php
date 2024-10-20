<?php

namespace App\Livewire;

use App\Http\Controllers\KeyController;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use App\Models\Artists;
use Illuminate\Support\Facades\Storage;

class SearchAlbums extends Component
{
    public $token;
    public $response;
    public function getalbums(){
        $artists = Artists::all();
        $lasttime = file_get_contents("../lasttime.txt");
        $lasttime = str_replace("\n", "", $lasttime);

        $this->token = (new KeyController)->index();
        $this->token = $this->token['access_token'];
        $artists->each(function ($item) {
        $this->response = Http::withHeaders(['Authorization'=> 'Bearer '.$this->token
        ])->get(url:'https://api.spotify.com/v1/artists/' . $item->id)->json();
        dd($item->id);
        });
    }

// Ellen id: 5N87utqQzCT8NHBW7JJXog
// Gulin id: 4gquwMHteaMQ0ZQOMj9CsI

    public function render()
    {
        return view('livewire.search-albums');
    }
}
