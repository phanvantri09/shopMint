<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\User\create;
use App\Http\Requests\User\login;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function login(){
        return view('home.account.login');
    }
    public function register(){
        return view('home.account.register');
    }
    public function postregister(create $request){
        if(! Hash::check($request->password, $request->password2))
        {
            if(User::create([
                'email'=>$request->email, 
                'password'=>Hash::make($request->password),
                ])){
                return redirect()->route('login')->with('success',"Đăng ký thành công");
            }else
            {
                return redirect()->route('register')->with('error',"Không hợp lệ vui lòng làm lại!");
            }
        }else
        return redirect()->route('register')->with('error',"Lỗi mật khẩu không giống nhau!");
    }
    public function postlogin(login $request){
        //dd($request->all());
        $rememberMe = $request->has('rememberMe') ? TRUE : FALSE;
        $dataUser =[
            'email'=>$request->email,
            'password'=>$request->password
        ];
        if (Auth::attempt($dataUser, $rememberMe))
        {
            $user = User::where(["email" => $request->email])->first();
            $level = $user->level;
            Auth::login($user, $rememberMe);
            return redirect()->route('home')->with('success','Successfully Register, You can login!');
        }
        else if(Auth::attempt($dataUser))
        {
            $user = User::where(["email" => $request->email])->first();
           
            Auth::login($user); 
            return redirect()->route('home')->with('success','Successfully Register, You can login!');
            }
        else{
            return redirect()->route('login')->with('error','Error Register, Again!');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
