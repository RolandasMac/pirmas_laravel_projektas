@extends('layouts.app')
@section('title')
    {{-- {{$kintamasis1}} --}}
@endsection('title')
@section('content')
    <div class="row py-5 px-4">
        <div class="col-md-5 mx-auto"> <!-- Profile widget -->
            <a href="{{ route('crud.index') }}" class="btn mb-3" style="background-color: #4643d3; color: white;"><i
                    class="fas fa-chevron-left"></i> Back</a>
            <div class="bg-white shadow rounded overflow-hidden">
                <div class="px-4 pt-0 pb-4 cover">
                    <div class="media align-items-end profile-head d-flex">
                        <div class="profile mr-3">
                            <img src="{{$crud->file_path ? asset('uploads/' . $crud->file_path) : 'https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80' }}"
                                alt="..." width="130" class="rounded mb-2 img-thumbnail">
                        </div>
                        <div class="media-body mb-5 text-white">
                            <h4 class="mt-0 mb-0">{{$crud->firstName . ' ' . $crud->lastName}}</h4>
                            <p class="small mb-4">{{$crud->email}}</p>
                        </div>
                    </div>
                </div>

                <div class="px-4 py-3">
                    <div class="p-4 rounded shadow-sm bg-light">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td style="width: 250px;">First Name</td>
                                    <td>{{$crud->firstName}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px;">Last Name</td>
                                    <td>{{$crud->lastName}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px;">Email</td>
                                    <td>{{$crud->email}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px;">Phone</td>
                                    <td>{{$crud->phone}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px;">Birth date</td>
                                    <td>{{$crud->birthDate}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px;">Account Number</td>
                                    <td>{{$crud->bankAccount}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px;">About</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam labore hic
                                        reprehenderit cum!.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection