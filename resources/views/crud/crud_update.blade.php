@extends('layouts.app2')
@section('title')
    {{-- {{$kintamasis1}} --}}
@endsection('title')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <h3>Customers</h3>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-2">
                            <a href="{{ route('crud.index') }}" class="btn"
                                style="background-color: #4643d3; color: white;"><i class="fas fa-chevron-left"></i>
                                Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('crud.update', ['crud' => $crud->id]) }}" method="POST" class="row"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="">Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="">First Name</label>
                                <input type="text" class="form-control" name="firstName" value="{{$crud->firstName}}">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control" name="lastName" value="{{$crud->lastName}}">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" value="{{$crud->email}}">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{$crud->phone}}">
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="">Birth date</label>
                                <input type="date" class="form-control" name="birthDate" value="{{$crud->birthDate}}">
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="">Bank Account Number</label>
                                <input type="text" class="form-control" name="bankAccount" value="{{$crud->bankAccount}}">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Create</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection