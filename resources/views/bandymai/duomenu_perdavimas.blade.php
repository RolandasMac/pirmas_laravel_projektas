@extends('layouts.app2')
@section('title')
    {{$kintamasis1}}
@endsection('title')
@section('content')
    <h1 class="text-red-500 text-2xl">This is {{$kintamasis2}} page</h1>



    <ul>
        @foreach ($kintamasis3 as $knyga)
            <li>
                <h1>{{$knyga['title']}}</h1>
                <h2>{{$knyga['author']}}</h2>
                <h2>{{$knyga['year']}}</h2>
                <h2>{{$knyga['description']}}</h2>
                <h3>Kaina: {{$knyga['price']}} €</h3>
            </li>
        @endforeach
    </ul>


    {{-- <ul>
        @for ($i = 0; $i < count($kintamasis3); $i++) <li>{{$kintamasis3[$i]}} </li>
            @endfor
    </ul> --}}




@endsection('content')

@section('aside')
    @parent
    <h1>Papildomas tekstas</h1>

@endsection