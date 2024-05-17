<?php

namespace App\Http\Controllers\WebsiteDottiesShoes;

use App\Http\Controllers\Controller;
use App\Models\ChiTietAnhSP;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\LoaiSanPham;

class ShopContronller extends Controller
{
    public function Shop( Request $request){

        $perPage = $request -> show ?? 24;
        $sortBy= $request -> sort_by ?? 'latest';
        $search = $request->search ?? '';
        $products = SanPham::where('TenSP', 'like','%'. $search .'%');
        switch($sortBy){
            case 'latest':
                $products = $products->orderBy('id');
                break;
            case 'oldest':
                $products = $products->orderByDesc('id');
                break;
            case 'name-asscending':
                $products =$products->orderBy('TenSP');
                break;
            case 'name-descending':
                $products =$products->orderByDesc('TenSP');
                break;
            case 'price-asscending':
                $products =$products->orderBy('price');
                break;
            case 'price-descending':
                $products =$products->orderByDesc('price');
                    break;
            default:
                $products =$products->orderBy('id');
                break;
        }

        $product = $products->paginate($perPage);
        $product -> appends(['sort_by' => $sortBy]);
        $loaisp = LoaiSanPham::all();

        return view('Shop',compact('loaisp','product'));
    }
    // public function category($categoryName, Request $request){
    //     $loaisp = LoaiSanPham::all();
    //     $products = LoaiSanPham::where('TenLoai',$categoryName)->first()->products->toQuery()->paginate();


    //     return view('category', compact('loaisp','products'));
    // }
}
