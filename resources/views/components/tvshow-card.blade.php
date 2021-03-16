@props(['tvshow'])
<div class="mt-8">
    <a href="{{ route('tvshow.show',$tvshow['id']) }}">
    <img src="{{ $tvshow['poster_path'] }}" alt="parasite" class="hover:opacity-75
    transition esas-in-out duration-150">
    </a>
    <div class="mt-2">
        <a href="{{ route('tvshow.show',$tvshow['id']) }}" class="text-lg mt-2 hover:text-gray-300">{{ $tvshow['name'] }}</a>
        <div class="flex item-center text-gray-400 text-sm mt-1">
            <span><svg xmlns="http://www.w3.org/2000/svg"  class="w-4 fill-current text-yellow-600 bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
              </svg></span>
            <span class="ml-1">{{ $tvshow['vote_average']}}</span>
            <span class="mx-2">|</span>
            <span>{{ $tvshow['release_date'] }}</span>
        </div>
        <div class="text-gray-400 text-sm">
            {{ $tvshow['genres'] }}
        </div>
    </div>
</div>
