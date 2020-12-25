<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Slide;
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
        $categories = Category::where('parent_id' , 0)->get();
        $cateChild = Category::where('parent_id', '!=', 0)->get();
        $products = Product::latest()->take(8)->get();
        // dd($products);
        return view('front-end.home', compact('categories', 'cateChild', 'products'));
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
        $trending = Product::where('trending', 1)->take(8)->get();
        return view('front-end.home', compact('categories', 'cateChild', 'products', 'trending'));
    }
    public function search(Request $request){
        $search = $request->search;
        $result = Product::with('category')->where('name', 'like', '%'.$search.'%')->orWhereHas('category', function($query) use($search){
            return $query->where('name', 'like', '%'.$search.'%');
        })->paginate(10);
        return view('back-end.search', compact('result', 'search'));
    }
    public function autocompleteAjax(Request $request){
        $data = $request->get('query');
        if($data){
            $products = Product::with('productImage')->where('name', 'like', '%'.$data.'%')->get();
            $output = '<ul class="style="display:block;position:absolute;width: 482px;top: 120px;left: 14px;z-index:999">';
            foreach($products as $product){
                $output .= '<li class="search-product-list pt-1 pb-1 pl-3">'.$product->name.'</li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
}
