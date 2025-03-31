<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/css/bootstrap.css', 'resources/css/fontawesome.min.css', 'resources/css/style.css', 'resources/js/app.js', 'resources/js/jquery.js', 'resources/js/bootstrap.bundle.js', 'resources/js/fontawesome.js'])
</head>
@php
    $prefix1 = 'gaidys';
@endphp

<body>
    <div class="h-screen flex flex-col justify-between ">
        <div class=" bg-gray-300">
            <div class="container mx-auto py-4 rounded flex gap-4 text-white">
                <a href="/">Welcom</a>
                <a href="/{{$prefix1}}/home">Home</a>
                <a href="/{{$prefix1}}/bandymai/1Argumentas/2argumentas">Bandymai</a>
                @if(true)
                    <a href="{{route('home_alias')}}">Home_Alias</a> {{-- pagal alias --}}
                    <a href="{{route('alias')}}">Alias be layout</a>{{-- pagal alias --}}
                @endif
                <a href="/duomenu_perdavimas">Duomenų perdavimas</a>
                <a href="/single_action">Single action</a>
                <a href="/get_users">Get users</a>
                <a href="{{route('user.roles') }}">Get user roles</a>
                <a href="/contacts">Contacts</a>
                <a href="/file-upload">Upload file</a>
                <a href="/crud">CRUD</a>
                <a href="{{route('get.cities')}}">Cities</a>
                <a href="{{ route('email') }}">Siųsti laišką</a>
                <a href="{{ route('session') }}">Session</a>
            </div>
        </div>
        <div class="container mx-auto">
            @yield(section: 'content')
        </div>
        <div class=" bg-gray-500">
            <div class="container mx-auto">
                @include('inc.aside')
            </div>
        </div>
    </div>
    {{-- Įterpiame scriptą iš vaikinių failų --}}
    @stack('scripts')
</body>

</html>