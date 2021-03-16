<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class tvShowsViewModel extends ViewModel
{
    public $populerTvshows;
    public $genres;
    public $top_rated;

    public function __construct($populerTvshows, $genres, $top_rated)
    {
        $this->populerTvshows = $populerTvshows;
        $this->genres = $genres;
        $this->top_rated = $top_rated;
    }
    public function populerTvshows()
    {
        return $this->moviesFormatter($this->populerTvshows);
    }

    public function top_rated()
    {
        return $this->moviesFormatter($this->top_rated);
    }
    public function genres()
    {
        return collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }
    private function moviesFormatter($tvshows)
    {

        return collect($tvshows)->map(function ($tvshow) {
            $genresFormatted = collect($tvshow['genre_ids'])->mapWithKeys(function($value)
            {
                return [$value => $this->genres()->get($value)];
            })->implode(', ');
            return collect($tvshow)->merge([
                'poster_path' => "https://image.tmdb.org/t/p/w400/" . $tvshow['poster_path'],
                'vote_average' => $tvshow['vote_average'] * 10 . '%',
                'release_date' => Carbon::parse($tvshow['first_air_date'])->format('M d Y'),
                'genres' => $genresFormatted,
            ])->only(
                'id', 'name', 'poster_path', 'overview', 'genres', 'vote_average','release_date'
            );
        });
    }
}
