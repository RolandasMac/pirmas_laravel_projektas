@extends('layouts.app2') <!-- Jei turite bendrą maketą -->

@section('content')
    <div class="container">
        <h1>Products and Users</h1>

        @if($products1->isEmpty() || $products2->isEmpty() || $products3->isEmpty())
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
                    @foreach($products1 as $product1)
                        <tr>
                            <td>{{ optional($product1->product)->user_id ?? 'No product' }}</td>
                            <td>{{ $product1->name }}</td>
                            <td>{{ $product1->surname }}</td>
                            <td>{{ $product1->email }}</td>
                            <td>{{ optional($product1->product)->id ?? '' }}</td>
                            <td>{{ optional($product1->product)->title ?? '' }}</td>
                            <td>{{ optional($product1->product)->description ?? '' }}</td>
                            <td>{{ number_format(optional($product1->product)->price, 2) }}</td>

                        </tr>
                    @endforeach
                    @foreach($products2 as $product2)
                        <tr>

                            <td>{{ optional($product2->user)->id ?? 'No product' }}</td>
                            <td>{{ optional($product2->user)->name ?? '---' }}</td>
                            <td>{{ optional($product2->user)->surname ?? '---' }}</td>
                            <td>{{ optional($product2->user)->email ?? '---' }}</td>
                            <td>{{ optional($product2)->id ?? '' }}</td>
                            <td>{{ optional($product2)->title ?? '' }}</td>
                            <td>{{ optional($product2)->description ?? '' }}</td>
                            <td>{{ number_format(optional($product2->products)->price, 2) }}</td>

                        </tr>
                    @endforeach
                    @foreach($products3 as $product3)
                        @if($product3->products->isEmpty())
                            <tr>
                                <td>No product</td>
                                <td>{{ $product3->name }}</td>
                                <td>{{ $product3->surname }}</td>
                                <td>{{ $product3->email }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @else
                            @foreach($product3->products as $productMany)
                                <tr>
                                    <td>{{ optional($productMany)->user_id ?? 'No product' }}</td>
                                    <td>{{ $product3->name }}</td>
                                    <td>{{ $product3->surname }}</td>
                                    <td>{{ $product3->email }}</td>
                                    <td>{{ optional($productMany)->id ?? '' }}</td>
                                    <td>{{ optional($productMany)->title ?? '' }}</td>
                                    <td>{{ optional($productMany)->description ?? '' }}</td>
                                    <td>{{ number_format(optional($productMany)->price, 2) }}</td>
                                </tr>
                            @endforeach
                        @endif
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection