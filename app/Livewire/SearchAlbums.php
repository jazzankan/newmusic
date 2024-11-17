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
    public $artAlbArray = [];

    public function getall($token, $item, $album_resp)
    {
        $next_response = Http::withHeaders(['Authorization' => 'Bearer ' . $token
        ])->get(url: $album_resp["next"] . $item->spotify_id . '/albums')->json();
        $album_resp = array_merge($album_resp, $next_response);
        if (isset($album_resp["next"])) {
            $this->getall($token, $item, $album_resp);
        }
        return $album_resp;
    }

    public function getalbums()
    {
        $artists = Artists::all();
        $lasttime = file_get_contents("../lasttime.txt");
        $lasttime = str_replace("\n", "", $lasttime);

        $this->token = (new KeyController)->index();
        $this->token = $this->token['access_token'];

        $artists->each(function ($item) {
            $art_response = Http::withHeaders(['Authorization' => 'Bearer ' . $this->token
            ])->get(url: 'https://api.spotify.com/v1/artists/' . $item->spotify_id)->json();
            $albums_response = Http::withHeaders(['Authorization' => 'Bearer ' . $this->token
            ])->get(url: 'https://api.spotify.com/v1/artists/' . $item->spotify_id . '/albums')->json();
            if (isset($albums_response["next"])) {
                $albums_response = $this->getall($this->token, $item, $albums_response);
            }
            $this->artAlbArray[$art_response["name"]] = $albums_response["items"];

        });

        //dd($this->artAlbArray);
    }

// Ellen id: 5N87utqQzCT8NHBW7JJXog
// Gulin id: 4gquwMHteaMQ0ZQOMj9CsI

    public function render()
    {
        return view('livewire.search-albums');
    }
}
