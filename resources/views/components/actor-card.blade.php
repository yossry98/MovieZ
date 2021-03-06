@props(['actor'])
<div class="mt-8">
    <a href="">
    <img src="https://image.tmdb.org/t/p/w400{{ $actor['profile_path'] }}" alt="parasite" class="hover:opacity-75
    transition esas-in-out duration-150">
    </a>
    <div class="mt-2">
        <a href="#" class="text-lg mt-2 hover:text-gray-300">{{ $actor['name'] }}</a>
        <div class="flex item-center text-gray-400 text-sm mt-1">
            {{ $actor['character'] }}
        </div>
    </div>
</div>
