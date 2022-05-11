<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Bill;
use App\Http\Requests\Bill\create;
use Illuminate\Support\Facades\Auth;
class BillController extends Controller
{
    //
    public function booking(){
        $category = Category::all();
        $cart = Cart::where('id_user','=',Auth::User()->id)->where('status','=',0)->get();
        $product = Product::all();
        $total =0;
        foreach ($cart as $key => $v) {
            $pro = new Product;
            $pro = $pro->find($v->id_product);
            $total+=$v->amount*$pro->price;
        }
        return view('home.layout.infobook', compact(['cart','product','category','total']));
    }
    public function postbooking(create $request){
        $bill = new Bill;
        $id_user= Auth::User()->id;
        $cart = Cart::where('id_user','=',$id_user)->where('status','=',0)->get();
        foreach ($cart as $key => $ca) {
            $car = new Cart;
            $car =$car->find($ca->id);
            $car->status = 1;
            $car->save();
        }
        //dd($request->all());
        $bill->id_user = $id_user;
        $bill->address = $request->address;
        $bill->numberPhone = $request->numberPhone;
        $bill->price_product = $request->price;
        $bill->status = 0;
        $bill->save();
        return redirect()->Route('home')->with('success',"Đặt Thành công");
    }
}
