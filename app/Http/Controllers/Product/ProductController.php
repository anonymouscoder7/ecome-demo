<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Read all prodcts
    public function index()
    {
        try {
            $products = Product::orderBy('id', 'desc')->get;
            return view('admin.product.index', compact('products'));
        } catch (\Exception $e) {
            return redirect('/admin/product')->with('error', 'Error');
        }
    }

    // Display the form to create a new product
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    // store products
    public function store(Request $request)
    {
        try {
            // Validation
            $request->validate([
                'name' => 'required|string|max:255',
                'image' => 'required|image',
                'category_id' => 'required|exists:categories,id',
                'price' => 'required|numeric|min:0',
                'discounted_price' => 'nullable|numeric|min:0',
                'description' => 'nullable|string',
                'stock' => 'required|integer|min:0',
                'featured' => 'required|boolean',
            ]);
            $product = new Product();
            $product->name = $request->name;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalName();
                $image->move('images/image', $imageName);
                $product->image = 'images/image/' . $imageName;
            }
            $product->category_id = $request->category_id;
            $product->price = $request->price;
            $product->discounted_price = $request->discounted_price;
            $product->description = $request->description;
            $product->stock = $request->stock;
            $product->featured = $request->featured;
            $product->save();

            return redirect('/admin/product')->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create product. ' . $e->getMessage());
        }
    }
}
