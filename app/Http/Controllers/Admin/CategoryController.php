<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('children')->where('parent_id', 0)->get();
        return view('back-end.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id' , 0)->get();
        // dd($categories);
        return view('back-end.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->only('name', 'parent_id');
        Category::create($data);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id); 
        $products = Product::with('category', 'productImage')->where('category_id', $id)->paginate(10);
        return view('back-end.categories.show', compact('products', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::where('parent_id' , 0)->get();
        $category = Category::find($id);
        return view('back-end.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $data = $request->only('name', 'parent_id');
        Category::find($id)->update($data);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cateDel = Category::find($id);
        $allCate = Category::all();
        $cateIdProduct = Product::all();
        foreach($allCate as $value){
            if ($value->parent_id == $cateDel->id){
                return redirect()->back()->with(['error' => 'Danh mục này đang có Danh mục con, không thể xoá']);
            }
            foreach($cateIdProduct as $cateId){
                if ($cateDel->id == $cateId->category_id) {
                    return redirect()->back()->with(['error' => 'Danh mục này đang có Sản phẩm, không thể xoá']);
                }
            }
        }
        Category::find($id)->delete();
        return redirect()->route('categories.index')->with('status', 'Xoá thành công');
    }
}
