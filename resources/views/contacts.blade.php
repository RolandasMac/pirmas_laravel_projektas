{{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

@extends('layouts.app2')
@section('title')
    Duomenų perdavimas
@endsection('title')
@section('content')
    <h1 class="text-red-600 text-2xl">This is contacts page
        page</h1>

    <div class="bg-gray-200 p-4 rounded">
        <h2>Susisiekite su mumis</h2>
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-lg">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('contacts.store') }}" method="POST" class="flex flex-col">
            @csrf <!-- CSRF token -->
            <label for="name">Jūsų vardas:</label>
            <input class="p-2 rounded my-2" type="text" id="name" name="name" placeholder="Įveskite vardą"
                value="{{ old('name') }}" required>
            @error('name')
                <p class="text-red-500">{{ $message }}</p>
            @enderror

            <label for="email">El. paštas:</label>
            <input class="p-2 rounded my-2" type="email" id="email" name="email" placeholder="Įveskite el. paštą"
                value="{{ old('email') }}" required>
            @error('email')
                <p class="text-red-500">{{ $message }}</p>
            @enderror

            <label for="phone">Telefono numeris:</label>
            <input class="p-2 rounded my-2" type="tel" id="phone" name="phone" placeholder="Įveskite telefono numerią"
                value="{{ old('phone') }}" required>
            @error('phone')
                <p class="text-red-500">{{ $message }}</p>
            @enderror

            <label for="message">Žinutė:</label>
            <textarea class="p-2 rounded my-2" id="message" name="message" placeholder="Įveskite žinutę"
                required>{{ old('message') }}</textarea>
            @error('message')
                <p class="text-red-500">{{ $message }}</p>
            @enderror

            <button type="submit" class="bg-gray-500 hover:bg-blue-600 p-2 mt-4 w-1/5 rounded self-center">Siųsti
                žinutę</button>
        </form>
    </div>
@endsection('content')

@section('aside')

@endsection