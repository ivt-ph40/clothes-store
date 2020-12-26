<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('parent_id' , 0)->get();
        $cateChild = Category::where('parent_id', '!=', 0)->get();
        $products = Product::latest()->get();
        // dd($products);
        return view('front-end.product', compact('categories', 'cateChild', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
    public function showProductWithCate($id){
        $categories = Category::where('parent_id' , 0)->get();
        $cateChild = Category::where('parent_id', '!=', 0)->get();
        $products = Product::with('category')->where('category_id', $id)->get();
        $catename = Category::find($id);
        $trending = Product::where('trending', 1)->take(8)->get();
        $productmin = Product::where('price' , '<', '200000')->take(5)->get();
        // dd($products);
        return view('front-end.shop', compact('categories', 'cateChild', 'products',  'catename', 'productmin', 'trending'));
    }

    public function productDetail($id)
    {
        $categories = Category::where('parent_id' , 0)->get();
        $cateChild = Category::where('parent_id', '!=', 0)->get();
        $productDetail = Product::with(array('productImage', 'size', 'comment' => function($query){
            $query->latest()->take(3)->get();
        }))->find($id);
        return view('front-end.detail', compact('productDetail', 'categories', 'cateChild'));
    }

    public function search(Request $request)
    {
        $data = $request->search;
        $search_products = Product::where('name', 'like', '%'.$data.'%')->get();
        // dd($search_products);
        $categories = Category::where('parent_id' , 0)->get();
        $cateChild = Category::where('parent_id', '!=', 0)->get();
        return view('front-end.search', compact('data', 'categories', 'cateChild', 'search_products'));
    }
}
