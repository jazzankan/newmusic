<?php

namespace App\Livewire;

use App\Http\Controllers\KeyController;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchAlbums extends Component
{
    public $token;
    public $response;
    public function getalbums(){
        $this->token = (new KeyController)->index();
        $this->token = $this->token['access_token'];
        $this->response = Http::withHeaders(['Authorization'=> 'Bearer '.$this->token
        ])->get(url:'https://api.spotify.com/v1/artists/5N87utqQzCT8NHBW7JJXog')['genres'][2];
    }

// Ellen id: 5N87utqQzCT8NHBW7JJXog

    public function render()
    {
        return view('livewire.search-albums');
    }
}
