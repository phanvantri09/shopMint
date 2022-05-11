<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Distance;
use App\Http\Requests\Book\create;
use Illuminate\Support\Facades\Auth;
class BookController extends Controller
{
    public function add(){
        $distance = Distance::all();
        return view('home.layout.booknow', compact(['distance']));
    }
    public function postadd(create $request){
        $n = new Book;
        $n->id_user= Auth::User()->id;
        $n->type_driver= $request->type_driver;
        $n->id_distance= $request->id_distance;
        $n->content= $request->content;
        $n->numberPhone= $request->numberPhone;
        $n->name= $request->name;
        $n->location= $request->location;
        $n->save();
        return redirect()->Route('home')->with('success',"Đặt khẩn cấp Thành công");
    }

}
