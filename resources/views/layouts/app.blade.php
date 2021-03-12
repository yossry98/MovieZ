<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>

    <title>@yield('title')</title>
    <livewire:styles />
</head>
<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
            <div class="container mx-auto flex items-center justify-between px-4 py-6">
                <ul class="flex items-center">
                    <li><a href="{{ route('movie.index') }}" class="flex items-center"><svg class="w-10 mr-3" xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                        <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"/>
                      </svg><h2 class=" font-semibold">MovieZ</h2></a></li>
                    <li class="ml-16"><a href="{{ route('movie.index') }}" class="hover:text-gray-300">Movies</a></li>
                    <li class="ml-6"><a href="" class="hover:text-gray-300">TV Shows</a></li>
                    <li class="ml-6"><a href="{{ route('actor.index') }}" class="hover:text-gray-300">Actors</a></li>
                </ul>
                <div class="flex items-center">
                    <livewire:search-drop-down />
                    <div class="ml-4">
                        <a href="#">
                            <img src="{{ asset('imgs/avatar.jpg') }}" alt="avatar" class="rounded-full w-8 h-8">
                        </a>
                    </div>
                </div>
            </div>
        </nav>

    @yield('content')
    <livewire:scripts />
    @yield('scripts')
</body>
</html>
