<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropDown extends Component
{
    public $search = '';

    public function render()
    {

        $searchResults = [];
        if(strlen($this->search)>1)
        {
            $searchResults = collect(Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/search/movie?query='. $this->search)
            ->json()['results'])->take(7);

            // dump($searchResults);
        }

        return view('livewire.search-drop-down',compact('searchResults'));
    }
}
