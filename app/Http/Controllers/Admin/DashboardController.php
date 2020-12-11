<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\User;
use App\Order;
use DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cateCount = Category::where('parent_id', 0)->count();
        $cateChildCount = Category::where('parent_id','!=', 0)->count();
        $product = Product::count();
        $user = User::count();
        $order = Order::count();
        $orderWaitConfirm = Order::where('order_status_id', 1)->count();
        // dd($cateChildCount);
        return view('back-end.dashboard.index', compact('cateCount', 'cateChildCount', 'product', 'user', 'order', 'orderWaitConfirm'));
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
        //
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
    public function search(Request $request){
        $search = $request->search;
        // $result = DB::table('products')
        //                 ->join('categories', 'products.category_id', '=', 'categories.id')
        //                 ->select('products.*', 'categories.*', 'products.name as product_name', 'categories.name as category_name')
        //                 ->where('products.name', 'like', '%'.$search.'%')
        //                 ->orWhere('categories.name', 'like', '%'.$search.'%')
        //                 ->paginate(10);
        $result = Product::where('name', 'like', '%'.$search.'%')->paginate(10);
        // dd($result);
        return view('back-end.search', compact('result', 'search'));
    }
    public function autocompleteAjax(Request $request){
        $data = $request->get('query');
        // dd($request->query);
        if($data){
            $products = Product::where('name', 'like', '%'.$data.'%')->get();
            // dd($products);
            $output = '<ul class="dropdown-menu" style="display:block; position:absolute; width:360px">';
            foreach($products as $product){
                $output .= '<li>'.$product->name.'</li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
}
