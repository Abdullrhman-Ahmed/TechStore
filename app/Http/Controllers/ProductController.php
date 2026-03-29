<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // --- Admin Dashboard Functions ---
    public function index()
    {
        $products = Product::with("category")->latest()->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('products', 'public') : null;

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'stock' => $request->stock ?? 0,
        ]);
        return redirect()->route('products.index')->with('success', 'Product Added!');
    }

    // --- Shopping Cart Logic (The Core) ---
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
        session()->put('cart', $cart);
        return redirect()->route('cart')->with('success', 'Added to cart!');
    }

    public function cart()
    {
        return view('cart');
    }

    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            return response()->json(['success' => true]);
        }
    }

    public function removeFromCart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return response()->json(['success' => true]);
        }
    }

    public function show($id)
    {
        $mobile = Product::with('category')->findOrFail($id);
        return view('products.show', compact('mobile'));
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function storeOrder(Request $request)
    {
        session()->forget('cart');
        return redirect()->route('home')->with('success', 'Order Placed Successfully!');
    }
    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
