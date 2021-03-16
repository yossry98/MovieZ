@extends('layouts.app')
@section('title','Moviez')

@section('content')
<div class="container mx-auto px-4 py-16">
    <div class="populer-show">
        <h2 class="uppercase tracking-wider text-yellow-600 font-semibold">Populer Shows</h2>
        <div class="grid grid-cols-5 gap-16">
            @foreach ($populerTvshows as $tvshow)
                <x-tvshow-card :tvshow="$tvshow" />
            @endforeach

        </div>
    </div>
</div>
<div class="container mx-auto px-4 py-16">
    <div class="top-rated-tvshows">
        <h2 class="uppercase tracking-wider text-yellow-600 font-semibold">Top Rate Shows</h2>
        <div class="grid grid-cols-5 gap-16">


            @foreach ($top_rated as $tvshow)
                <x-tvshow-card :tvshow="$tvshow" />
            @endforeach

        </div>
    </div>
</div>
@endsection
