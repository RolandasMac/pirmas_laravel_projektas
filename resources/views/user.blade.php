@extends('layouts.app')
@section('title')
User page
@endsection('title')
@section('content')
<h1>This is user page</h1>
{{-- <ul>
@foreach ($data as $user )
<li>
<h3>Vardas; {{$user->name}}</h3>
<h3>Pavardė: {{$user->surname}}</h3>
<h3>El. paštas : {{$user->email}}</h3>
<h3>Sukurta: {{$user->created_at}}</h3>
<h3>Atnaujinta: {{$user->updated_at}}</h3>

 </li>

@endforeach
</ul> --}}
{{-- <h1>{{$data."Gaidys"}} </h1> --}}

@endsection('content')



