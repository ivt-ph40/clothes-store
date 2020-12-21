<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Product;
use App\Size;
use App\Category;
use App\ProductImage;
use App\ProductSize;
use DB;
use App\Order;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductEditRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(array('category', 'productImage', 'size' => function($query) {
            $query->orderBy('size_id', 'ASC');
        }))->orderBy('id', 'desc')->paginate(10);
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
    public function store(ProductRequest $request)
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
        // Tạo record bảng Size 
        $product = Product::find($productID);
        $product->size()->attach($request->size_id);

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
        return view('back-end.products.edit', compact('product', 'categories', 'sizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductEditRequest $request, $id)
    {
        $data = $request->only('name', 'price', 'category_id', 'description', 'detail');
        Product::find($id)->update($data); 
        if ($request->hasFile('images')){
            $name = rand(1,9999) . '-' .$request->file('images')->getClientOriginalName();       //Thiết lập tên cho ảnh
            $request->file('images')->move(public_path('/images'), $name);                       //Lưu ảnh với tên vừa tạo vào thư mục /img
            ProductImage::where('product_id', $id)->update(['path' => "/images/$name"]);         //Lưu data vào bảng product_detail
        }
        // Update Size
        $product = Product::find($id);
        $product->size()->sync($request->size_id);

        return redirect()->route('products.index')->with('status', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orders = Order::all();
        $productDel = Product::with('orderDetail')->find($id);
        
        foreach($orders as $order){
            foreach($productDel->orderDetail as $orderDetail){
                if ($orderDetail->order_id == $order->id) {
                    return redirect()->back()->with(['error' => 'Sản phẩm này đang có đơn đặt hàng, không thể xoá']);
                }
            }
        }
        $product = Product::find($id)->delete();
        return redirect()->route('products.index')->with('status', 'Xoá thành công');
    }

    public function productSize($id){
        $product = Product::find($id);
        return view('back-end.products.product-size.index', compact('product'));
    }

    public function productSizeEdit($id, $sizeId){
        $product = DB::table('products')
                            ->join('product_sizes', 'products.id','=', 'product_sizes.product_id')
                            ->where('product_id', $id)
                            ->where('size_id', $sizeId)
                            ->get();
        return view('back-end.products.product-size.edit', compact('product'));
    }

    public function productSizeStore(Request $request, $id, $sizeId){
        
        $product = Product::with('size')->where('id', $id)->get();
        foreach ($product as $product) {
            foreach($product->size as $size){
                if ($size->pivot->size_id == $sizeId) {
                    $size->pivot->quantities = $request->quantities;
                    $size->pivot->update(['quantities' =>$size->pivot->quantities]);
                }
            }
        }
        return view('back-end.products.product-size.index', compact('product'));
    }
}
