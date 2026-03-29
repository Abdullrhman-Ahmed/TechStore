<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $meals = Product::with('category')->latest()->get();
        $categories = Category::all();
        return view('home', compact('meals', 'categories'));
    }

    public function category($id)
    {
        $categories = Category::all();
        $meals = Product::where('category_id', $id)->with('category')->latest()->get();
        return view('home', compact('meals', 'categories'));
    }
}