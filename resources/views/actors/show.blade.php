@extends('layouts.app')

@section('content')

    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex">
            <div class="flex-none">
                <img src="{{ $actor['profile_path'] }}" alt="{{ $actor['name'] }}" class="w-96">
                <ul class="flex items-center mt-3">
                    @if ($socialLinks['facebook'])
                        <li class="mr-2">{{--  facebook --}}
                            <a href="{{ $socialLinks['facebook'] }}"><svg class="w-8  fill-current" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false"
                                w style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M2.89 2h14.23c.49 0
                                .88.39.88.88v14.24c0 .48-.39.88-.88.88h-4.08v-6.2h2.08l.31-2.41h-2.39V7.85c0-.7.2-1.18
                                1.2-1.18h1.28V4.51c-.22-.03-.98-.09-1.86-.09c-1.85 0-3.11 1.12-3.11
                                3.19v1.78H8.46v2.41h2.09V18H2.89a.89.89 0 0 1-.89-.88V2.88c0-.49.4-.88.89-.88z"
                                fill="white"/></svg></a></li>
                    @endif
                    @if ($socialLinks['twitter'])
                        <li class="mr-2">{{--  twitter --}}
                        <a href="{{ $socialLinks['twitter'] }}"><svg class="w-8  fill-current" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false"
                            w style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                            preserveAspectRatio="xMidYMid meet" viewBox="0 0 512 512"><path d="M400 32H48C21.5 32 0 53.5 0 80v352c0
                            26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-48.9 158.8c.2 2.8.2 5.7.2 8.5c0
                            86.7-66 186.6-186.6 186.6c-37.2 0-71.7-10.8-100.7-29.4c5.3.6 10.4.8 15.8.8c30.7 0 58.9-10.4
                            81.4-28c-28.8-.6-53-19.5-61.3-45.5c10.1 1.5 19.2 1.5 29.6-1.2c-30-6.1-52.5-32.5-52.5-64.4v-.8c8.7
                            4.9 18.9 7.9 29.6 8.3a65.447 65.447 0 0 1-29.2-54.6c0-12.2 3.2-23.4 8.9-33.1c32.3 39.8 80.8 65.8
                            135.2 68.6c-9.3-44.5 24-80.6 64-80.6c18.9 0 35.9 7.9 47.9 20.7c14.8-2.8 29-8.3 41.6-15.8c-4.9
                            15.2-15.2 28-28.8 36.1c13.2-1.4 26-5.1 37.8-10.2c-8.9 13.1-20.1 24.7-32.9 34z"
                            fill="white"/></svg></a></li>
                    @endif
                    @if ($socialLinks['instagram'])
                        <li class="mr-2">{{--  insta --}}
                        <a href="{{ $socialLinks['instagram'] }}"><svg class="w-8  fill-current" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false"
                            w style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                            preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"><path d="M16 0c-4.349
                            0-4.891.021-6.593.093c-1.709.084-2.865.349-3.885.745a7.847 7.847 0 0 0-2.833 1.849A7.757 7.757 0 0 0
                            .84 5.52C.444 6.54.179 7.696.095 9.405c-.077 1.703-.093 2.244-.093 6.593s.021 4.891.093 6.593c.084
                            1.704.349 2.865.745 3.885a7.847 7.847 0 0 0 1.849 2.833a7.757 7.757 0 0 0 2.833 1.849c1.02.391 2.181.661
                            3.885.745c1.703.077 2.244.093 6.593.093s4.891-.021 6.593-.093c1.704-.084 2.865-.355 3.885-.745a7.847 7.847 0 0
                            0 2.833-1.849a7.716 7.716 0 0 0 1.849-2.833c.391-1.02.661-2.181.745-3.885c.077-1.703.093-2.244.093-6.593s-.021-4.891-.093-6.593c-.084-1.704-.355-2.871-.745-3.885a7.847
                            7.847 0 0 0-1.849-2.833A7.716 7.716 0 0 0 26.478.838c-1.02-.396-2.181-.661-3.885-.745C20.89.016 20.349 0 16 0zm0 2.88c4.271
                            0 4.781.021 6.469.093c1.557.073 2.405.333 2.968.553a4.989 4.989 0 0 1 1.844 1.197a4.931 4.931 0 0 1 1.192 1.839c.22.563.48
                            1.411.553 2.968c.072 1.688.093 2.199.093 6.469s-.021 4.781-.099 6.469c-.084 1.557-.344 2.405-.563 2.968c-.303.751-.641
                            1.276-1.199 1.844a5.048 5.048 0 0 1-1.844 1.192c-.556.22-1.416.48-2.979.553c-1.697.072-2.197.093-6.479.093s-4.781-.021-6.48-.099c-1.557-.084-2.416-.344-2.979-.563c-.76-.303-1.281-.641-1.839-1.199c-.563-.563-.921-1.099-1.197-1.844c-.224-.556-.48-1.416-.563-2.979c-.057-1.677-.084-2.197-.084-6.459c0-4.26.027-4.781.084-6.479c.083-1.563.339-2.421.563-2.979c.276-.761.635-1.281
                            1.197-1.844c.557-.557 1.079-.917 1.839-1.199c.563-.219 1.401-.479 2.964-.557c1.697-.061 2.197-.083 6.473-.083zm0 4.907A8.21
                            8.21 0 0 0 7.787 16A8.21 8.21 0 0 0 16 24.213A8.21 8.21 0 0 0 24.213 16A8.21 8.21 0 0 0 16 7.787zm0 13.546c-2.948
                            0-5.333-2.385-5.333-5.333s2.385-5.333 5.333-5.333c2.948 0 5.333 2.385 5.333 5.333S18.948 21.333 16 21.333zM26.464
                            7.459a1.923 1.923 0 0 1-1.923 1.921a1.919 1.919 0 1 1 0-3.838c1.057 0 1.923.86 1.923 1.917z"
                            fill="white"/></svg></a></li>
                    @endif
                    @if ($actor['homepage'])
                        <li class="mr-2">{{--  homepage --}}
                        <a href="{{ $actor['homepage'] }}"><svg class="w-8  fill-current" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false"
                            w style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                            preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M9 0a9 9 0 1 0 0 18A9 9 0 0 0 9
                            0zm7.5 6.48a3.38 3.38 0 0 1-1.75 2.05a5.64 5.64 0 0 0-3.27-3.75a2 2 0 0 1
                            .79-1.09c-.43-.28-1-.42-1.34.07c-.53.69 0 1.61.21 2v.14A3.07 3.07 0 0 1 9.9 4.46a5.2 5.2 0 0
                            0-2.76.69a3.44 3.44 0 0 1 .16-1.68a2.21 2.21 0 0 0 1.92-.8c.46-.52-.13-1.18-.59-1.58h.36a7.86 7.86 0
                            0 1 3.89 1a5.61 5.61 0 0 1 2.27 4.26c.24 0 .7-.55.91-.92c.172.339.319.69.44 1.05zM9
                            16.84c-2.05-2.08.25-3.75-1-5.24c-.92-.85-2.29-.26-3.11-1.23a4.08 4.08 0 0 1 1.43-3.93c.52-.44 4-1
                            5.42.22a5.22 5.22 0 0 1 1.67 2.74a2.35 2.35 0 0 0 1.32-.29c.41 2.98-3.15 6.74-5.73 7.73zM5.15 2.09a1.84
                            1.84 0 0 1 2.16.66c-.42.38-.94.63-1.5.72A3 3 0 0 1 6 2.61l-.85-.52z"
                            fill="white"/></svg></a></li>
                    @endif
                </ul>
            </div>

            <div class="ml-24">
                <h2 class="font-semibold text-4xl">
                    {{ $actor['name'] }}
                </h2>
                <div class="flex item-center text-gray-400 text-sm mt-3">
                    <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        class="w-4  fill-current"
                        aria-hidden="true" focusable="false" style="-ms-transform: rotate(360deg);
                        -webkit-transform: rotate(360deg); transform: rotate(360deg);"preserveAspectRatio="xMidYMid meet"
                        viewBox="0 0 24 24"><path d="M11.5.5c.5.25 1.5 1.9 1.5 3S12.33 5 11.5 5S10 4.85 10 3.75S11 2 11.5.5m7
                        8.5C21 9 23 11 23 13.5c0 1.56-.79 2.93-2 3.74V23H3v-5.76c-1.21-.81-2-2.18-2-3.74C1 11 3 9 5.5
                        9H10V6h3v3h5.5M12 16a2.5 2.5 0 0 0 2.5-2.5H16a2.5 2.5 0 0 0 2.5 2.5a2.5 2.5 0 0 0 2.5-2.5a2.5 2.5 0 0
                        0-2.5-2.5h-13A2.5 2.5 0 0 0 3 13.5A2.5 2.5 0 0 0 5.5 16A2.5 2.5 0 0 0 8 13.5h1.5A2.5 2.5 0 0 0 12 16z"
                        fill="white"/></svg></span>
                    <span class="ml-1">{{ $actor['birthday'] }} ({{ $actor['age'] }} years old) in {{ $actor['place_of_birth'] }}</span>

                </div>
                <div class="mt-8">
                        {{ $actor['biography'] }}
                </div>
                <h4 class="font-semibold mt-12">Know For</h4>
                <div class="grid grid-cols-5 gap-8 mt-10">
                    @foreach($credits as $movie)
                    <div class="mt-8">
                        <a href="{{ route('movie.show',$movie['id']) }}">
                        <img src="{{ $movie['poster_path'] }}" alt="parasite" class="hover:opacity-75
                        transition esas-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('movie.show',$movie['id']) }}" class="text-lg mt-2 hover:text-gray-300">{{ $movie['title'] }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>




@endsection
