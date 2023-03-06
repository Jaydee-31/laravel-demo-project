<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'lead' => 'required',
            'heading' => 'required',
            'image' => 'required',
            'desc' => 'required',
        ]);

        Product::create($validatedData);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    // public function show(Product $product)
    // {
    //     return view('admin.products.show', compact('product'));
    // }
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'lead' => 'required',
            'heading' => 'required',
            'image' => 'required',
            'desc' => 'required',
        ]);

        $product->update
        ($validatedData);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')
        ->with('success', 'Product deleted successfully.');
    }
}