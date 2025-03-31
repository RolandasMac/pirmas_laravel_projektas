@extends('layouts.app2')
@section('title')
    {{-- {{$kintamasis1}} --}}
@endsection('title')
@section('content')
    <div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
                <h3>Customers</h3>
                <div class="card">
                    <div class="card-header">
                        <div class="row items-baseline">
                            <a href="{{ route('crud.index') }}" class="btn mb-3 col-md-2"
                                style="background-color: #4643d3; color: white;"><i class="fas fa-chevron-left"></i>
                                Back</a>
                            {{-- <div class="col-md-4">
                                <form action="{{ route('crud.index') }}" method="GET">
                                    @method('POST')
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" class="form-control"
                                            placeholder="Search anything..." aria-describedby="button-addon2">
                                        <button class="btn btn-outline-secondary" type="submit"
                                            id="button-addon2">Search</button>
                                    </div>
                                </form>
                            </div> --}}
                            {{-- <div class="col-md-2">
                                <div class="input-group mb-3">
                                    <select class="form-select" name="" id="">
                                        <option value="">Newest to Old</option>
                                        <option value="">Old to Newest</option>
                                    </select>
                                </div>
                            </div> --}}
                            {{-- <form id="delete-form" action="{{ route('crud.trash') }}" method="GET"
                                style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>

                            <button class="col-md-2 bg-slate-400 rounded"
                                onclick="document.getElementById('delete-form').submit();">
                                Trash
                            </button> --}}
                        </div>

                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div id="success-message"
                                class="bg-green-100 border-l-4 border-green-500 text-green-700 p-2 mb-2 rounded-lg">
                                {{ session('success') }}
                            </div>
                            <script>
                                setTimeout(function () {
                                    document.getElementById('success-message').style.display = 'none';
                                }, 5000); // 5000 ms = 5 seconds
                            </script>
                        @endif
                        @if ($errors->any())
                            <div id='error-message'
                                class="bg-red-100 border-l-4 border-red-500 text-red-700 p-2 mb-2 rounded-lg">
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
                        <table class="table table-bordered" style="border: 1px solid #dddddd">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Date of Birth</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">BAN</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cruds as $crud)
                                    <tr>
                                        <th scope="row">{{$crud->id}}</th>
                                        <td>{{$crud->firstName}}</td>
                                        <td>{{$crud->lastName}}</td>
                                        <td>{{$crud->birthDate}}</td>
                                        <td>{{$crud->phone}}</td>
                                        <td>{{$crud->email}}</td>
                                        <td>{{$crud->bankAccount}}</td>
                                        <td>
                                            <form id="restore-form-{{ $crud->id }}" action="{{ route('crud.restore') }}"
                                                method="POST" style="display: none;">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $crud->id }}">
                                            </form>
                                            <a href=""
                                                onclick="event.preventDefault(); document.getElementById('restore-form-{{ $crud->id }}').submit();"
                                                style="color: #2c2c2c;" class="ms-1 me-1"><i
                                                    class="fas fa-trash-restore"></i></a>
                                            {{-- <a href="{{ route('crud.show', ['crud' => $crud->id]) }}"
                                                style="color: #2c2c2c;" class="ms-1 me-1"><i class="far fa-eye"></i></a> --}}
                                            <form id="delete-form-{{ $crud->id }}" action="{{ route('crud.delete') }}"
                                                method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                                <input type="text" name="user_id" value="2" hidden>
                                                <input type="hidden" name="id" value="{{ $crud->id }}">
                                            </form>

                                            <a href="#"
                                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $crud->id }}').submit();"
                                                style="color: #2c2c2c;" class="ms-1 me-1">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{--
        <script src="./assets/js/jquery.js"></script>
        <script src="./assets/js/bootstrap.bundle.js"></script>
        <script src="./assets/js/fontawesome.js"></script> --}}
    </div>
@endsection('content')