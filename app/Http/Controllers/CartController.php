<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Order;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Auth;

class CartController extends Controller
{
    public function index()
    {
	 	$categories = Category::where('parent_id' , 0)->get();
        $cateChild = Category::where('parent_id', '!=', 0)->get();
    	return view('front-end.checkout', compact('categories', 'cateChild'));
    }

    public function addCart()
    {
    	$product_id  = request()->post('product_id');
    	$quantity  = request()->post('quantity')   ? request()->post('quantity') : 1 ;
    	$sizeId  = request()->post('size_id')   ? request()->post('size_id') : null ;
    	$sizeName  = request()->post('size_name')   ? request()->post('size_name') : null ;


    	$product = Product::find($product_id);
    	if (empty($product)) {
    		return response()->json(['status'=>false ,'message'=>'Sản phẩm không tồn tại']);
    	}
    	$productInfo['id'] = $product->id;
    	$productInfo['name'] = $product->name;
    	$productInfo['qty'] = $quantity;
    	$productInfo['price'] = $product->price;
    	$productInfo['weight'] = 550;
		$productInfo['options']['image'] = $product->productImage->path;
		if ($product->size) {
			$productInfo['options']['size'] =  $sizeName ? $sizeName : $product->size->first()->name;
			$productInfo['options']['size_id'] = $sizeId ? $sizeId: $product->size->first()->pivot->size_id;
		}
    	$cart = \Cart::add($productInfo);
        // dd($cart);
		return response()->json(['status'=>true, 'data'=>$cart ,'total'=> str_replace( ',' , '.', substr(\Cart::subtotal(), 0, strrpos(\Cart::subtotal(), '.')))]);

    }

    public function removeCart()
    {
    	$rowId  = request()->post('rowId');
    	\Cart::remove($rowId);
		return response()->json(['status'=>true, 'rowId'=> $rowId ,'total'=> str_replace( ',' , '.', substr(\Cart::subtotal(), 0, strrpos(\Cart::subtotal(), '.'))), 'count'=>\Cart::count()]);
    }

    public function updateCart()
    {
        $rowId  = request()->post('rowId');
        $quantity = request()->post('quantity');
        \Cart::update($rowId, $quantity);
        return response()->json(['status'=>true, 'rowId'=> $rowId ,'total'=> str_replace( ',' , '.', substr(\Cart::subtotal(), 0, strrpos(\Cart::subtotal(), '.'))) ,'count'=>\Cart::count()]);
    }

    public function checkout(Request $request)
    {
         if (\Cart::count() == 0) {
            return redirect()->back()->with('cart-message', 'Vui lòng thêm ít nhất 1 sản phẩm');
        }
        $data =  $request->all();
        $validator = Validator::make($data, [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email'=>'required|email'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       
        $data['order_status_id'] = 1;
        $data['name'] = $data['name'];
        $data['phone'] = $data['phone'];
        $data['email'] = $data['email'];
        $data['message'] = $data['message'];
        $data['address'] = $data['address'];
        // $data['address_id'] = Auth::check() ? Auth::user()->address->id : null; 
        $data['user_id'] = Auth::check() ? Auth::user()->id : null;
        // dd($data['user_id']);
        $order = Order::create($data);
        foreach (\Cart::content() as $key => $item) {
            $datadetail['product_id'] = $item->id;
            $datadetail['quantities'] = $item->qty;
            $datadetail['size'] = $item->options->size;
            $datadetail['price'] = explode('.', $item->price)[0];
            $order->orderDetail()->create($datadetail);
        }
        \Cart::destroy();
        return redirect()->route('checkoutSuccess')->with('success', 1);
    }

    public function checkoutSuccess(Request $request)
    {
        if ($request->session()->has('success')) {
            $categories = Category::where('parent_id' , 0)->get();
            $cateChild = Category::where('parent_id', '!=', 0)->get();
            return view('front-end.success', compact('categories', 'cateChild'));
        }
        return redirect('/');
    }
}
