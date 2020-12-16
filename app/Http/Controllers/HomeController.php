<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::where('parent_id' , 0)->get();
        $cateChild = Category::where('parent_id', '!=', 0)->get();
        $products = Product::latest()->take(8)->get();
        // dd($products);
        return view('front-end.home', compact('categories', 'cateChild', 'products'));
        // return view('home');
    }
}
