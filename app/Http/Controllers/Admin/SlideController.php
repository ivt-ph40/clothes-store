<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Slide;
use App\Http\Controllers\Controller;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::all();
        return view('back-end.slide.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        if ($request->hasFile('photo_path')){
            $name = rand(1,10) . '-' .$request->file('photo_path')->getClientOriginalName(); //Thiết lập tên cho ảnh
            $request->file('photo_path')->move(public_path('/images/slide'), $name); //Lưu ảnh với tên vừa tạo vào thư mục /img
            $data['photo_path'] = '/images/slide/'.$name;                   //Tạo đường dẫn ảnh vào để lưu vào DB
            // dd($data);
            Slide::create($data);                       //Lưu data vào bảng product và lấy product id
        }
        return redirect()->route('slides.index')->with('status', 'Thêm slide thành công');
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slide::find($id)->delete();
        return redirect()->route('slides.index')->with('status', 'Xoá thành công');
    }
}
