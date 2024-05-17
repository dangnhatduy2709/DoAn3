<?php

namespace App\Http\Controllers\AdminDottiesShoes;

use App\Http\Controllers\Controller;
use App\Models\NhaCungCap;
use Illuminate\Http\Request;
use App\Models\KhachHang;

class KhachHangController extends Controller
{
    public function KhachHang()
    {
        $khachhang = KhachHang::paginate(5);
        return view('/AdminDottiesShoes/KhachHang', compact('khachhang'))->with('i',(request()->input('page',1)-1)*5);
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }

    public function show()
    {
        //
    }
    public function edit()
    {
        //
    }

    public function update(Request $request)
    {
        //
    }
    public function destroy()
    {
        //
    }
}
