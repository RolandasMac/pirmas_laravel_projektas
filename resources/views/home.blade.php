@extends('layouts.app2')
@section('title')
    Duomenų perdavimas
@endsection('title')
@section('content')
    <h1 class="text-red-500 text-2xl">This is Duomenų perdavimas
        page</h1>

    <h2>2025-03-25 bandymai</h2>
    <x-text-input :kintamasis="'kintamasisGaidys'" :baseurl="route('home_alias')"></x-text-input>
@endsection('content')

@section('aside')
    @parent
    <h1>Papildomas tekstas</h1>

@endsection