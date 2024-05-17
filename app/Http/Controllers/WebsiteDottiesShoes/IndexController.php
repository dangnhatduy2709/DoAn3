<?php

namespace App\Http\Controllers\WebsiteDottiesShoes;

use App\Http\Controllers\Controller;
use App\Models\ChiTietAnhSP;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function TrangChu(){
        $nhacungcap = SanPham::where('MaNCC', true)->where('MaNCC', 1)->limit(8)->get();
        return view('Index', compact('nhacungcap'));
    }
    public function Show($ID){
        // dd($ID);
        $product = SanPham::findOrFail($ID);
        $loaisanpham = SanPham::where('MaLoai', $product->MaLoai)
        ->where('MaLoai',$product->MaLoai)
        ->limit(4)
        ->get();
        return view('ShopDetails', compact('product','loaisanpham'));
    }
    public function ShopDetails(){
        
        return view('ShopDetails');
    }

    public function ShopCart(){

        return view('ShopCart');
    }

    public function Blog(){

        return view('Blog');
    }
    public function BlogDetail(){

        return view('BlogDetail');
    }
    public function About(){

        return view('About');
    }
    public function Contact(){

        return view('Contact');
    }

}
