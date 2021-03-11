<?php

namespace App\ViewModels;

use Illuminate\Support\Carbon;
use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
    public $populerMovies;
    public $genres;
    public $nowPlayingMovies;

    public function __construct($populerMovies, $genres, $nowPlayingMovies)
    {
        $this->populerMovies = $populerMovies;
        $this->genres = $genres;
        $this->nowPlayingMovies = $nowPlayingMovies;
    }
    public function populerMovies()
    {
        return $this->moviesFormatter($this->populerMovies);
    }

    public function nowPlayingMovies()
    {
        return $this->moviesFormatter($this->nowPlayingMovies);
    }
    public function genres()
    {
        return collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }
    private function moviesFormatter($movies)
    {

        return collect($movies)->map(function ($movie) {
            $genresFormatted = collect($movie['genre_ids'])->mapWithKeys(function($value)
            {
                return [$value => $this->genres()->get($value)];
            })->implode(', ');
            return collect($movie)->merge([
                'poster_path' => "https://image.tmdb.org/t/p/w400/" . $movie['poster_path'],
                'vote_average' => $movie['vote_average'] * 10 . '%',
                'release_date' => Carbon::parse($movie['release_date'])->format('M d Y'),
                'genres' => $genresFormatted,
            ])->only(
                'id', 'title', 'poster_path', 'overview', 'genres', 'vote_average','release_date'
            );
        });
    }
}
