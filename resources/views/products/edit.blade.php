<!DOCTYPE html>
<html>

<head>
    <title>Edit Product</title>
</head>

<body>
    <h1>Edit Product</h1>

    <!-- Form Edit Produk -->
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $product->name }}" placeholder="Product Name" required>
        <input type="number" name="price" value="{{ $product->price }}" placeholder="Product Price" required>
        <textarea name="description" placeholder="Product Description">{{ $product->description }}</textarea>
        <button type="submit">Update Product</button>
    </form>
</body>

</html>
