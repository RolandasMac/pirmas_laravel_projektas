@extends('layouts.app2') <!-- Jei turite bendrą maketą -->

@section('content')
    <div class="container">
        <h1>Products page</h1>

        @if($products->isEmpty())
            <p>No products found for the users.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>User Surname</th>
                        <th>User Email</th>
                        <th>Product ID</th>
                        <th>Product Title</th>
                        <th>Product Description</th>
                        <th>Product Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        @if(auth()->user()->id == $product->user_id)
                            {{-- Rodomi tik autorizuoti įrašai --}}
                            <form id="product-form-{{ $product->id }}" action="{{ route('user.product.show', $product->id) }}"
                                method="POST">
                                {{-- <input type="hidden" name="id" value="{{ $product->id }}"> --}}
                                {{-- jeigu nori perduoto ne per url --}}
                                @csrf
                                <tr onclick="document.getElementById('product-form-{{ $product->id }}').submit();">
                                    {{-- <td>
                                        {{$product}}
                                    </td> --}}
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->user->name }}</td>
                                    <td>{{ $product->user->surname }}</td>
                                    <td>{{ $product->user->email }}</td>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ number_format($product->price, 2) }}</td>

                                </tr>
                            </form>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
