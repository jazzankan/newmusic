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
        ])->get(url:'https://api.spotify.com/v1/artists/4gquwMHteaMQ0ZQOMj9CsI/albums')->json();
       dd($this->response["items"][2]);
        return $this->response;
    }

// Ellen id: 5N87utqQzCT8NHBW7JJXog
// Gulin id: 4gquwMHteaMQ0ZQOMj9CsI

    public function render()
    {
        return view('livewire.search-albums');
    }
}
