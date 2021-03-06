@extends('layouts.app')

@section('content')

<div class="movie-info border-b border-gray-800">
    <div class="container mx-auto px-4 py-16 flex">
        <img src="https://image.tmdb.org/t/p/w400{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" class="w-96">
        <div class="ml-24">
            <h2 class="font-semibold text-4xl">
                {{ $movie['title'] }}
            </h2>
            <div class="flex item-center text-gray-400 text-sm mt-2">
                <span><svg xmlns="http://www.w3.org/2000/svg"  class="w-4 fill-current text-yellow-600 bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg></span>
                <span class="ml-1">{{ $movie['vote_average'] * 10 .'%'}}</span>
                <span class="mx-2">|</span>
                <span >{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d Y') }}</span>
                <span class="mx-2">|</span>
                <span>
                    @foreach($movie['genres'] as $genre)
                        {{ $genre['name'] }}@if (!$loop->last), @endif
                    @endforeach
            </span>
            </div>
            <div class="mt-8">
                {{ $movie['overview'] }}
            </div>
            <div class="mt-8">
                <h4 class="font-semibold text-lg"> Featured Crew</h4>
                <div class="flex mt-4">
                    @foreach ($movie['credits']['crew'] as $crew)
                        @if ($loop->index < 2)

                            <div class="mr-8">
                                <div>{{ $crew['name'] }}</div>
                            <div class="text-sm">{{ $crew['job'] }}</div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
            @if (count($movie['videos']['results'])>0)
                <div class="mt-12">
                    <a href="https://youtube.com/watch?v={{ $movie['videos']['results'][0]['key'] }}" class="bg-yellow-600 rounded inline-flex  items-center text-gray-900 font-semibold px-5 py-4
                    hover:bg-yellow-700 transition ease-in-out duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 fill-current text-black font-bold bi bi-play-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445z"/>
                            </svg>
                        <div class="ml-2">Play Tarlier</div>

                    </a>
                </div>
            @endif

        </div>
    </div>
</div>
<div class="cast border-b border-gray-800">
    <div class="container mx-auto px-4 py-16">
        <div class="movie-cast">
            <h2 class="text-4xl font-semibold">Cast</h2>
            <div class="grid grid-cols-5 gap-16">


                @foreach ($movie['credits']['cast'] as $actor)
                @if($loop->index < 5)
                    <x-actor-card :actor="$actor"/>
                @endif

                @endforeach

            </div>
        </div>
    </div>
</div>

<div class="cast border-b border-gray-800">
    <div class="container mx-auto px-4 py-16">
        <div class="movie-images">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-3 gap-16">
                @foreach ($movie['images']['backdrops'] as $image)
                    @if ($loop->index < 9)
                        <x-image-card :image="$image"/>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
