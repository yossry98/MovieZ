<?php

namespace App\ViewModels;

use Illuminate\Support\Carbon;
use Spatie\ViewModels\ViewModel;

class MovieViewModel extends ViewModel
{
    public $movie;
    public function __construct($movie)
    {
        $this->movie = $movie;
    }
    public function movie()
    {
        return $this->movieFormatter($this->movie);
    }

    private function movieFormatter($movie)
    {

            // $genresFormatted = collect($movie['genre_ids'])->mapWithKeys(function($value)
            // {
            //     return [$value => $this->genres()->get($value)];
            // })->implode(', ');
            return collect($movie)->merge([
                'poster_path' => "https://image.tmdb.org/t/p/w400/" . $movie['poster_path'],
                'vote_average' => $movie['vote_average'] * 10 . '%',
                'release_date' => Carbon::parse($movie['release_date'])->format('M d Y'),
                'genres' => collect($this->movie['genres'])->pluck('name')->flatten()->implode(', '),
                'crew'=> collect($this->movie['credits']['crew'])->take(2),
                'cast'=> collect($this->movie['credits']['cast'])->take(5),
                'images'=> collect($this->movie['images']['backdrops'])->take(9),
            ])->only(
                'id', 'title', 'poster_path', 'overview', 'genres', 'vote_average','release_date','crew',
                'cast','images', 'videos'
            );;

    }
}
