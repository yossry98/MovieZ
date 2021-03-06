<?php

namespace App\Http\Controllers;

use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{

    public function index()
    {
        $populerMovies = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/popular')
        ->json()['results'];

        $moviesGenres = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/genre/movie/list')
        ->json()['genres'];

        $genres = collect($moviesGenres)->mapWithKeys(function ($genre)
            {
                return [$genre['id'] => $genre['name']];
            });

        $nowPlayingMovies = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/now_playing')
        ->json()['results'];

        return view('layouts.index' ,compact(['populerMovies', 'genres', 'nowPlayingMovies']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $movie = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3//movie/'.$id.'?append_to_response=videos,credits,images')
        ->json();

        // dump($movie);
        return view('layouts.show',compact('movie'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
