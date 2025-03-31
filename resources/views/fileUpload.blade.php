{{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

@extends('layouts.app2')
@section('title')
    Duomenų perdavimas
@endsection('title')
@section('content')
    <h1 class="text-red-600 text-2xl">This is file upload page
        page</h1>

    <div class="bg-gray-200 p-4 rounded">

        @if (session('success'))
            <div id="success-message" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-2 mb-2 rounded-lg">
                {{ session('success') }}
            </div>
            <script>
                setTimeout(function () {
                    document.getElementById('success-message').style.display = 'none';
                }, 5000); // 5000 ms = 5 seconds
            </script>
        @endif
        @if ($errors->any())
            <div id='error-message' class="bg-red-100 border-l-4 border-red-500 text-red-700 p-2 mb-2 rounded-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <script>
                setTimeout(function () {
                    document.getElementById('error-message').style.display = 'none';
                }, 5000); // 5000 ms = 5 seconds
            </script>
        @endif
        <form action="{{route('file.store')}}" method="POST" class="flex flex-col" enctype="multipart/form-data">
            @csrf <!-- CSRF token -->
            <label for="name">Jūsų vardas:</label>
            <input class="p-2 rounded my-2" type="file" id="" name="file">
            @error('name')
                <p class="text-red-500">{{ $message }}</p>
            @enderror

            <button type="submit" class="bg-gray-500 hover:bg-blue-600 p-2 mt-4 w-1/5 rounded self-center">Siųsti
                žinutę</button>
        </form>
        <div class="flex flex-row flex-wrap gap-2">
            @foreach ($files as $file)
                <div>
                    <div class="overflow-hidden" style="width: 40px; height: 50px;">
                        <a href="{{ route('file.download', ['file_path' => $file->file_path]) }}">
                            <img class="w-full h-full object-cover" src="{{ asset('uploads/' . $file->file_path) }}" alt="">
                        </a>
                    </div>
                    <a href="{{ route('file.delete', ['file_path' => $file->file_path]) }}">Delete</a>
                </div>
            @endforeach

        </div>



    </div>
@endsection('content')

@section('aside')

@endsection