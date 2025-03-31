@extends('layouts.app2')
@section('title')
    User page
@endsection('title')
@section('content')
    <h1>This is the user page</h1>
    <a href="{{ route('user.orders') }}" class="btn btn-secondary mb-2">Gauti vartotojus su produktais </a>
    <a href="{{ route('user.products') }}" class="btn btn-secondary mb-2">Rodyti tik vartotojo produktus </a>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Vardas</th>
                <th>Pavardė</th>
                <th>El. paštas</th>
                <th>Sukurta</th>
                <th>Atnaujinta</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->surname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('Y-m-d H:i') }}</td>
                    <td>{{ $user->updated_at->format('Y-m-d H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection