<div class="relative">
    <div class="absolute top-0">
        <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="w-4 fill-current text-gray-500 mt-3 ml-2 bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
          </svg>
    </div>
    <input wire:model.debounce.500ms='search' type="text" class="bg-gray-800 rounded-full w-64 px-4 pl-8 py-2 focus:outline-none focus:shadow-outline" placeholder="Search">
    <div wire:loading class="spinner top-0 right-0 mr-4 mt-5"></div>
    @if (strlen($search)>2)
        <div class=" absolute bg-gray-800 rounded text-sm w-64 mt-4">

                @if ($searchResults->count()>0)
                    <ul>
                        @foreach ($searchResults as $result)

                            <li class="border-b border-gray-700">

                                <a href="{{ route('movie.show', $result['id']) }}" class="hover:bg-gray-700 flex items-center px-3 py-3">
                                    @if ($result['poster_path'])
                                        <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="{{ $result['title'] }}" class="w-8"/>
                                    @else
                                    <img src="https://via.placeholder.com/50x75" alt="{{ $result['title'] }}" class="w-8"/>
                                    @endif
                                <span class="ml-4 text-sm">{{ $result['title'] }}</span>
                                </a>
                            </li>

                        @endforeach
                    </ul>
                @else
                    <div class="px-3 py-3">No Results For {{ $search }}</div>
                @endif
        </div>
    @endif
</div>
