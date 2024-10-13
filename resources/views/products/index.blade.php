<!DOCTYPE html>
<html>

<head>
    <title>Products</title>

    <!-- DataTables CSS CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- DataTables JS CDN -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- Custom CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            margin-top: 5px;
        }

        button:hover {
            background-color: #45a049;
        }

        form {
            display: inline-block;
            margin-right: 10px;
        }

        .product-form {
            margin-top: 40px;
        }

        .product-form input,
        .product-form textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
        }

        .product-form button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        .product-form button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h1>Product List</h1>

    <!-- Tampilkan pesan sukses -->
    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <!-- Tabel Produk -->
    <table id="products-table" class="display">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <!-- Form Edit Produk -->
                        <a href="{{ route('products.edit', $product) }}">
                            <button>Edit</button>
                        </a>

                        <!-- Form Hapus Produk -->
                        <form action="{{ route('products.destroy', $product) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $('#products-table').DataTable();
        });
    </script>

    <!-- Form Tambah Produk Baru -->
    <h2>Add New Product</h2>
    <form class="product-form" action="{{ route('products.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Product Name" required>
        <input type="number" name="price" placeholder="Product Price" required>
        <textarea name="description" placeholder="Product Description"></textarea>
        <button type="submit">Add Product</button>
    </form>
</body>

</html>
