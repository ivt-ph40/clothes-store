<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Order;
use App\OrderStatus;
use App\OrderDetail;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('orderStatus')->where('order_status_id', '<=', 5)->orderBy('order_status_id', 'asc')->get();
        $orderStatus = OrderStatus::all();
        // dd($orders);
        return view('back-end.orders.index', compact('orders', 'orderStatus'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orderDetails = OrderDetail::with('product', 'order')->where('order_id', $id)->get();
        // dd($orderDetails);
        $total =0;
        foreach($orderDetails as $orderDetail){
            $total += $orderDetail->price; 
        }
        
        return view('back-end.orders.show', compact('orderDetails', 'total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
    public function orderStatusEdit(Request $request, $id){
        $order = Order::find($id);
        if($order->order_status_id == 6){
            return redirect()->back()->with('error', 'Không thể sửa trạng thái đơn hàng');
        }
        $order->order_status_id = $request->orderStatus;
        $order->save();

        return redirect()->route('orders.index');
    }
    public function orderStatusFilter(Request $request){
        $orders = Order::with('orderStatus')->where('order_status_id', $request->status_order_id)->orderBy('order_status_id', 'asc')->get();
        $orderStatus = OrderStatus::where('id', '<=', 5)->get();
        // dd($orders);
        return view('back-end.orders.index', compact('orders', 'orderStatus'));
    }
    public function orderStatus1(){
        $orders = Order::with('orderStatus')->where('order_status_id', 1)->get();
        $orderStatus = OrderStatus::where('id', '<=', 5)->get();
        // dd($orders);
        return view('back-end.orders.index', compact('orders', 'orderStatus'));
    }

    public function showOrderCancel(){
        $orders = Order::with('orderStatus')->where('order_status_id', 6)->get();
        $orderStatus = OrderStatus::where('id', '<=', 5)->get();
        // dd($orders);
        return view('back-end.orders.index', compact('orders', 'orderStatus'));
    }
}
