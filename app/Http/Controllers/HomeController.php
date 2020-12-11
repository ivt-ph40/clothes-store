<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Category;
use App\Product;
=======
>>>>>>> master

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
<<<<<<< HEAD

        $categories = Category::where('parent_id' , 0)->get();
        $cateChild = Category::where('parent_id', '!=', 0)->get();
        $products = Product::latest()->take(8)->get();
        // dd($products);
        return view('front-end.home', compact('categories', 'cateChild', 'products'));
=======
        $this->middleware('auth');
>>>>>>> master
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
