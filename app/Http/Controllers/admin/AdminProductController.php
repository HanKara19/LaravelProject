<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::with('parent')->get();

        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        $product = new Product();

        $product->category_id = $request->category_id;
        $product->user_id = Auth::id();
        $product->title = $request->title;
        $product->keywords = $request->keywords;
        $product->description = $request->description;
        $product->detail = $request->detail;
        $product->image = $imagePath;
        $product->price = $request->price;
        $product->stock = $request->stock ?? 0;
        $product->minstock = $request->minstock ?? 0;
        $product->discount = $request->discount ?? 0;
        $product->status = $request->status ?? 0;

        $product->save();
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('products/gallery', 'public');
        
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $imagePath,
                ]);
            }
        }

        return redirect(route('admin.product.index'))
            ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
{
    $product->load('category', 'images');

    return view('admin.products.show', compact('product'));
}

    public function edit(Product $product)
    {
        $categories = Category::with('parent')->get();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
{
    $product->category_id = $request->category_id;
    $product->user_id = Auth::id();
    $product->title = $request->title;
    $product->keywords = $request->keywords;
    $product->description = $request->description;
    $product->detail = $request->detail;

    if ($request->hasFile('image')) {
        $product->image = $request->file('image')->store('products', 'public');
    }

    $product->price = $request->price;
    $product->stock = $request->stock ?? 0;
    $product->minstock = $request->minstock ?? 0;
    $product->discount = $request->discount ?? 0;
    $product->status = $request->status ?? 0;

    $product->save();
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $imagePath = $image->store('products/gallery', 'public');
    
            ProductImage::create([
                'product_id' => $product->id,
                'image' => $imagePath,
            ]);
        }
    }

    return redirect(route('admin.product.index'))
        ->with('success', 'Product updated successfully.');
}

    public function destroy(string $id)
    {
            $product = Product::findOrFail($id);
            $product->delete();
    
            return redirect(route('admin.product.index'))
                ->with('success', 'Product deleted successfully.');
    }
    public function deleteImage(ProductImage $image)
{
    if ($image->image) {
        Storage::disk('public')->delete($image->image);
    }

    $image->delete();

    return back()->with('success', 'Gallery image deleted successfully.');
}
}