<div>
    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>title</th>
            <th>description</th>
        </tr>
        @foreach($tableData as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->title }}</td>
                <td>{{ $product->description }}</td>
            </tr>
        @endforeach
    </table>
</div>