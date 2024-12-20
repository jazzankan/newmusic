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
    public array $artAlbArray = [];
    public array $albums_response;
    public string $last_time;
    public bool $later = false;


    public function mount()
    {
        $this->last_time = file_get_contents('../lasttime.txt');
        $this->getalbums();
    }

    public function getall($token, $item, $response)
    {
        $next_response = Http::withHeaders(['Authorization' => 'Bearer ' . $token
        ])->get(url: $response["next"] . $item->spotify_id . '/albums')->json();
        $next_response["items"] = array_merge($response["items"], $next_response["items"]);
        if (isset($next_response["next"])) {
            $this->getall($token, $item, $next_response);
        }
        return $next_response;
    }

// isset($next_response["next"])
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
            $this->albums_response = Http::withHeaders(['Authorization' => 'Bearer ' . $this->token
            ])->get(url: 'https://api.spotify.com/v1/artists/' . $item->spotify_id . '/albums')->json();
            if (isset($this->albums_response["next"])) {
                $this->albums_response = $this->getall($this->token, $item, $this->albums_response);
            }

            $this->artAlbArray[$art_response["name"]] = $this->albums_response["items"];
        });
    }

    public function placeholder()
    {
        return <<<'HTML'
        <div>
           <b><p style="color:green;text-align:center;">Vänta! Jag letar...</p></b>
        </div>
        HTML;
    }
    public function render()
    {
        $today = date("Y-m-d");
        file_put_contents("../lasttime.txt", $today);
        foreach($this->artAlbArray as $artist => $art_album) {
            $length = count($art_album);
            for($i = 0; $i < $length; $i++) {
                if ($art_album[$i]["release_date"] < $this->last_time) {
                    unset($art_album[$i]);
            }
                $this->artAlbArray[$artist] = $art_album;
                if(count($art_album) == 0){
                    unset($this->artAlbArray[$artist]);
                }
            }
        }

        return view('livewire.search-albums');
    }
}

