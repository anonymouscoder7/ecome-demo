<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Read all categories
    public function index()
    {
        try {
            $categories = Category::all();
            return view('admin.category.index', compact('categories'));
        } catch (\Exception $e) {
            return redirect('/admin/category')->with('error', 'Error');
        }
    }   

    // Display the form to create a new category
    public function create()
    {
        return view('admin.category.create');
    }
    // Create a new category
    public function store(Request $request)
    {
        

        $request->validate([
            'name' => 'required|string|max:50',
            'image' => 'required',
        ]);

        try {
            $category = new Category();
            $category->name = $request->name;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalName();
                $image->move('images/categories', $imageName);
                $category->image = 'images/categories/' . $imageName;
            }

            $category->save();

            return redirect('/admin/category')->with('success', 'Category created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error');
        }
    }


    // Display the form to edit a  category
    public function edit($id)
    {
        try {
            $category = Category::findOrFail($id);
            return view('admin.category.edit', compact('category'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error');
        }
    }

    // Update a category
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $category = Category::findOrFail($id);
            $category->name = $request->name;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move('images/categories', $imageName);
                $category->image = 'images/categories/' . $imageName;
            }
            $category->save();
            return redirect('/admin/category')->with('success', 'Category updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error');
        }
    }

    // Delete a category
    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return redirect()->back()->with('success', 'Category Deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error');
        }
    }
}
