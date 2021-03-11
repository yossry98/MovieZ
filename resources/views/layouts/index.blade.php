@extends('layouts.app')
@section('title','Moviez')

@section('content')
<div class="container mx-auto px-4 py-16">
    <div class="populer-movies">
        <h2 class="uppercase tracking-wider text-yellow-600 font-semibold">Populer Movies</h2>
        <div class="grid grid-cols-5 gap-16">
            @foreach ($populerMovies as $movie)
                <x-movie-card :movie="$movie" />
            @endforeach

        </div>
    </div>
</div>
<div class="container mx-auto px-4 py-16">
    <div class="new-movies">
        <h2 class="uppercase tracking-wider text-yellow-600 font-semibold">Now Playing</h2>
        <div class="grid grid-cols-5 gap-16">


            @foreach ($nowPlayingMovies as $movie)
                <x-movie-card :movie="$movie" />
            @endforeach

        </div>
    </div>
</div>
@endsection
