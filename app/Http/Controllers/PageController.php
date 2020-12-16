<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class PageController extends Controller
{
    public function about()
    {
    	$categories = Category::where('parent_id' , 0)->get();
        $cateChild = Category::where('parent_id', '!=', 0)->get();
    	return view('front-end.about', compact('categories', 'cateChild'));
    }

    public function contact()
    {
    	$categories = Category::where('parent_id' , 0)->get();
        $cateChild = Category::where('parent_id', '!=', 0)->get();
    	return view('front-end.contact', compact('categories', 'cateChild'));
    }
}
