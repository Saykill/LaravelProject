<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::with('parent')->get();
        $product = new Product();
        return view('admin.products.create', compact('categories', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

            $product = new Product();
            $product->category_id = $request->category_id;
            $product->user_id = 1;
            $product->title = $request->title;
            $product->keywords = $request->keywords;
            $product->description = $request->description;
            $product->detail = $request->detail;
            $product->image = $imagePath;
            $product->stock = $request->stock;
            $product->price = $request->price;
            $product->minstock = $request->minstock ?? 0;
            $product->discount = $request->discount ?? 0;
            $product->status = $request->status ?? 0;
            $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = new Product();
        $product->load('parent', 'children');
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::with('parent')->get();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , Product $product)
    {
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        $product->category_id = $request->category_id;
        $product->user_id = 1;
        $product->title = $request->title;
        $product->keywords = $request->keywords;
        $product->description = $request->description;
        $product->detail = $request->detail;
        $product->image = $imagePath;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->minstock = $request->minstock ?? 0;
        $product->discount = $request->discount ?? 0;
        $product->status = $request->status ?? 0;
        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Product Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product.index')->with('success', 'Product deleted successfully.');
    }
}
