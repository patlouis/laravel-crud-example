<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    public function create() {
        return view('products.create');
    }


    public function store(Request $request) {
        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max: 1000'],
            'category'    => ['required', 'string', 'max:255'],
            'price'       => ['required', 'numeric', 'min:0', 'regex:/^\d{1,6}(\.\d{1,2})?$/'],
            'stock'       => ['required', 'numeric', 'min:0'],
        ]);
        $product = Product::create($validated);
        return redirect(route('product.index'))->with('success', 'Product created successfully.');
    }

    public function edit(Product $product) {
        return view('products.update', ['product' => $product]);
    }

    public function update(Product $product, Request $request) {
        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max: 1000'],
            'category'    => ['required', 'string', 'max:255'],
            'price'       => ['required', 'numeric', 'min:0', 'regex:/^\d{1,6}(\.\d{1,2})?$/'],
            'stock'       => ['required', 'numeric', 'min:0'],
        ]);
        $product->update($validated);
        return redirect(route('product.index'))->with('success', 'Product updated successfully.');
    }

    public function delete(Product $product) {
        $product->delete();
        return redirect(route('product.index'))->with('success', 'Product deleted successfully.');
    }
}
