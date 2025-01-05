<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use App\Http\Requests\ProductRequest;


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
    public function detail($productId){
        $product=Product::find($productId);
        $seasons=Season::all();
        $selectedSeasons=$product->seasons->pluck('id')->toArray();
        return view('detail', compact('product', 'selectedSeasons', 'seasons'));
    }
    public function add(){
        $seasons=Season::all();
        return view('register', compact('seasons'));
    }
    public function register(ProductRequest $request){
        $productData=$request->only(['name', 'price', 'image', 'description']);
        $product=Product::create($productData);
        $product->seasons()->attach($request->seasons);
        return redirect('/products');
    }
}
