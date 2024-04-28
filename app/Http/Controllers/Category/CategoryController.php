<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Display the form to create a new category
    public function create()
    {
        return view('admin.category.create');
    }
    // Create a new category
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'image' => 'required',

        ]);

        try {
            $category = new Category();
            $category->name = $request->name;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move('images/categories', $imageName);
                $category->image = 'images/categories/' . $imageName;
            }

            $category->save();

            return redirect('/admin/category')->with('success', 'Category created successfully');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create category.'], 500);
        }
    }

    // Read all categories
    public function index()
    {
        try {
            $categories = Category::all();
            return view('admin.category.index', compact('categories'));
        } catch (\Exception $e) {
            return redirect('/admin/category')->with('erroe', 'Error');
        }
    }

    // Read a single category
    public function show($id)
    {
        try {
            $category = Category::findOrFail($id);
            return response()->json(['category' => $category], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Category not found.'], 404);
        }
    }

    // Update a category
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Example image validation
        ], [
            'name.required' => 'Category name is required.',
            'name.max' => 'Category name cannot exceed 255 characters.',
            'image.image' => 'Category image must be an image file.',
            'image.mimes' => 'Category image must be in JPEG, PNG, JPG, or GIF format.',
            'image.max' => 'Category image size cannot exceed 2MB.',
        ]);

        try {
            $category = Category::findOrFail($id);
            $category->name = $request->name;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/categories'), $imageName);
                $category->image = $imageName;
            }

            $category->save();

            return response()->json(['message' => 'Category updated successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update category.'], 500);
        }
    }

    // Delete a category
    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return response()->json(['message' => 'Category deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete category.'], 500);
        }
    }
}
