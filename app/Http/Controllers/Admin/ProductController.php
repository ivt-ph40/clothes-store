<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Product;
use App\Size;
use App\Category;
use App\ProductImage;
use App\ProductSize;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category', 'productImage', 'size')->orderBy('id', 'desc')->paginate(10);
        return view('back-end.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sizes = Size::all();
        $categories = Category::where('parent_id', '!=', 0)->get();
        return view('back-end.products.create', compact('sizes', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('images')){
            $name = rand(1,9999) . '-' .$request->file('images')->getClientOriginalName(); //Thiết lập tên cho ảnh
            $request->file('images')->move(public_path('/images'), $name); //Lưu ảnh với tên vừa tạo vào thư mục /img
             $product_images['path'] = '/images/'.$name;                   //Tạo đường dẫn ảnh vào để lưu vào DB
            $productID = Product::create($data)->id;                       //Lưu data vào bảng product và lấy product id
            $product_images['product_id'] = $productID;                    //Gán product id cho product_id ở bảng product_detail
            ProductImage::create($product_images);                         //Lưu data vào bảng product_detail
        }
        $id = $request->only('size_id');
        for ($i=1; $i <= count($id['size_id']); $i++) {                     //Tạo các record khi có Product ID
            $product_sizes['product_id'] = $productID;
            $product_sizes['size_id'] = $i;
            ProductSize::create($product_sizes);
        }
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('productImage', 'size')->find($id);
        return view('back-end.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::where('parent_id', '!=', 0)->get();
        $product = Product::with('size', 'productImage')->find($id);
        $sizes = Size::all();
        // dd($product);
        return view('back-end.products.edit', compact('product', 'categories', 'sizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id)->delete();
        return redirect()->route('products.index');
    }
}
