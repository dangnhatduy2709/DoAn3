<?php

namespace App\Http\Controllers\WebsiteDottiesShoes;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\KhachHang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function Login(){
        return view('Login');
    }
    public function CheckLogin(Request $request){
        $credentials = [
            'email' => $request -> email,
            'password' => $request -> password,
        ];
        $remember = $request -> remember_token;
        if(Auth::attempt($credentials, $remember)){
            return redirect('/');
        }else{
            session()->flash('Fail','Đăng Nhập Thất Bại');
            return redirect('Login');
        }
    }

    public function Logout(){
        Auth::logout();
        return back();
    }
    public function Singnup(){
        return view('Singnup');
    }
    public function CheckSingnup(LoginRequest $request){

        User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>bcrypt($request->password),
        'remember_token' =>bcrypt($request->remember_token)
        ]);
        session()->flash('Fail','Đăng Ký Thành Công Xin Mời Đăng Nhập');
        return redirect('Singnup');
    }
}
