<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // landing page
    public function index(){
        $latestcategories = Category::orderBy('id','desc')->get();
        $latestproducts = Product::orderBy('id','desc')->take(15)->get();
        $featuredproducts = Product::where('featured',1)->get();
        return view('frontend.index',compact('latestcategories','latestproducts','featuredproducts'));
    }

    // products
    public function product(){
        $categories = Category::orderBy('id','desc')->get();
        $products = Product::orderBy('id','desc')->paginate(12);
        return view('frontend.product.index',compact('categories','products'));
    }
}
