<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    // Tampilkan semua produk
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Simpan produk baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable',
        ]);

        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    // Tampilkan form untuk mengedit produk
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Perbarui produk di database
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable',
        ]);

        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // Hapus produk dari database
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
