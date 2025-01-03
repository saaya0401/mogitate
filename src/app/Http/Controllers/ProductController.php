<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index(){
        $products=Product::with('seasons')->get();
        $products=Product::Paginate(6);
        return view('index', compact('products'));
    }
    public function search(Request $request){
        $products=Product::with('seasons')->KeywordSearch($request->keyword)->Paginate(6);
        return view('index', compact('products'));
    }
}
