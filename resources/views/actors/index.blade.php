@extends('layouts.app')
@section('title', 'Moviez')

@section('content')
    <div class="container mx-auto px-4 py-16">
        <div class="populer-actor">
            <h2 class="uppercase tracking-wider text-yellow-600 font-semibold">Populer Actors</h2>
            <div class="grid grid-cols-5 gap-16">
                @foreach ($populerActors as $actor)
                    <div class="actor mt-8">
                        <a href="{{ route('actor.show', $actor['id']) }}">
                            <img src="{{ $actor['profile_path'] }}" alt="poster" class="hover:opacity-75
                                                        transition esas-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('actor.show', $actor['id']) }}"
                                class="text-lg mt-2 hover:text-gray-300">{{ $actor['name'] }}</a>
                            <div class="text-sm truncate text-gray-400">{{ $actor['works'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="page-load-status my-8">
            <div class="flex justify-center">
                <div class="infinite-scroll-request spinner my-4 text-4xl">&nbsp;</div>
            </div>
            <p class="infinite-scroll-last">End of content</p>
            <p class="infinite-scroll-error">No more pages to load</p>
        </div>

    </div>
@endsection

@section('scripts')
    <script>
        let elem = document.querySelector('.grid');
        let infScroll = new InfiniteScroll(elem, {
            // options
            path: '/actor/page/@{{#}}',
            append: '.actor',
            history: false,
            status: '.page-load-status',
        });

    </script>
@endsection
