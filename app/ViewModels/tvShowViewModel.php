<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class tvShowViewModel extends ViewModel
{
    public $tvshow;
    public function __construct($tvshow)
    {
        $this->tvshow = $tvshow;
    }
    public function tvshow()
    {
        return $this->showFormatter($this->tvshow);
    }

    private function showFormatter($tvshow)
    {

            // $genresFormatted = collect($movie['genre_ids'])->mapWithKeys(function($value)
            // {
            //     return [$value => $this->genres()->get($value)];
            // })->implode(', ');
            return collect($tvshow)->merge([
                'poster_path' => "https://image.tmdb.org/t/p/w400/" . $tvshow['poster_path'],
                'vote_average' => $tvshow['vote_average'] * 10 . '%',
                'release_date' => Carbon::parse($tvshow['first_air_date'])->format('M d Y'),
                'genres' => collect($this->tvshow['genres'])->pluck('name')->flatten()->implode(', '),
                'created_by'=> collect($this->tvshow['created_by'])->take(2),
                'cast'=> collect($this->tvshow['credits']['cast'])->take(5),
                'images'=> collect($this->tvshow['images']['backdrops'])->take(9),
                'video' => $tvshow['videos']['results']?'https://youtube.com/embed/'. $tvshow['videos']['results'][0]['key']
                :'https://youtube.com',
            ])->only(
                'id', 'name', 'poster_path', 'overview', 'genres', 'vote_average','release_date','created_by',
                'cast','images', 'video','videos'
            );;

    }
}
