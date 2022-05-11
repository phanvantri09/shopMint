<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\User\create;
use App\Http\Requests\User\login;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index(){
        $category = Category::all();
        $dataProduct =Product::all();
        return view('home.layout.home', compact(['dataProduct','category']));
    }
    
}
