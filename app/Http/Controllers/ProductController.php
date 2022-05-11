<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function list($id){
        $category = Category::all();
        $dataProduct = Product::where('id_category','=',$id)->get();
        return view('home.layout.home', compact(['dataProduct','category']));
    }
    public function product(Product $id){
        $data = $id;
        return view('home.layout.product', compact(['data']));
    }
    public function search(Request $request){
        $category = Category::all();
        $dataProduct  = Product::where('name','like','%'.$request->key.'%')->orWhere('decription','like','%'.$request->key.'%')->get();
        return view('home.layout.search', compact(['dataProduct','category']));
    }
}
