<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Bill;

class CartController extends Controller
{
    public function checkout(){
         $id_user= Auth::User()->id;
         $products = Product::all();
         $data1 = Cart::where('id_user','=',$id_user)->where('status','=',1)->get();// đã đă
         $data2 = Cart::where('id_user','=',$id_user)->where('status','=',2)->get();
         $data3 = Book::where('id_user','=',$id_user)->get();
         return view('home.layout.checkout', compact('data3','data1','data2','products'));
    }
    public function empty($id_user, $id_product){
        $tets =Cart::where('id_user','=',$id_user)->where('id_product','=',$id_product)->get();
        if(isset($tets[0]) == true){
            $data = new Cart;
            $data = $data->find($tets[0]->id);
            $data->amount++;
            $data->save();
            return back()->with('success',"oke");
        }
    }
    public function add($id_user, $id_product){
        $tets =Cart::where('id_user','=',$id_user)->where('id_product','=',$id_product)->where('status','=',0)->get();
        if(isset($tets[0]) == true){
            $data = new Cart;
            $data = $data->find($tets[0]->id);
            $data->amount++;
            $data->save();
            return back()->with('success',"Thành công");
        }else{
        $data = new Cart;
        $data->id_user = $id_user;
        $data->id_product = $id_product;
        $data->amount = 1;
        $data->status = 0;
        $data->save();
        return back()->with('success',"Thành công");
        }
        
    }
    public function tru($id_user, $id_product){
        $tets =Cart::where('id_user','=',$id_user)->where('id_product','=',$id_product)->where('status','=',0)->get();
        if($tets[0]->amount == 1){
            $data = Cart::find($tets[0]->id);
            $data->delete();
            return back()->with('success',"Đã xóa sản phẩm");
        }
        $data = new Cart;
        $data = $data->find($tets[0]->id);
        $data->amount--;
        $data->save();
        return back()->with('success',"Bớt đi 1");
    }
    public function update(){
        $this->add($id_user, $id_product);
        return back()->with('success',"Thành công");
    }
    public function delete($id){
        $data = new Cart;
        $data = Cart::find($id);
        $data->delete();
        return back()->with('success',"Xóa Sản Phẩm Thành Công");
    }
    public function mycart(){
        $amount = 0;
        $total =0;
        $idUser = Auth::User()->id;
        $cart = Cart::where('id_user','=',$idUser)->where('status','=',0)->get();
        $products = Product::all();
        foreach($cart as $car){
            if($car->id_user == $idUser && $car->status == 0){
                $product =Product::find($car->id_product);
                if(!empty($product)) 
                {
                    $total = $total + ($product->price * $car->amount);
                    $amount++;
                }
                else
                {
                    $total = 0;
                    $amount = 0;
                }
            }
        }
        $bill = Bill::where('status','=',1)->where('id_user','=',$idUser)->get();
        $data = Cart::where('id_user','=',$idUser)->where('status','=',0)->get();
        //dd(empty($data[0]->id));
        $datanext = Cart::where('id_user','=',$idUser)->where('status','=',1)->get();
        return view('home.layout.cart', compact('products','data', 'total','amount','datanext', 'bill'));
    }

}
