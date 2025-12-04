<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>
<body>
    <h1>Product</h1>
        @if (session()->has('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif
        <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Description</th>
            <th>Show</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id  }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->qty }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->description }}</td>
            <td>
                <a href="{{ route('show', $product->id) }}">View</a>
            </td>
            <td>
                 <a href="{{route('product.edit', ['product' => $product])}}">Edit</a>
            </td>
            <td>
                <form method="post" action="{{route('destroy', ['product' => $product])}}">@csrf @method('delete') <input type="submit" value="Delete"></form>
            </td>
        </tr>
        @endforeach
    </table>
    <a href="{{  route('tambah')}}">Tambah</a>
</body>
</html>
