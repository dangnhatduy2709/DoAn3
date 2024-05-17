<?php

namespace App\Http\Controllers\AdminDottiesShoes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\order;
use App\Models\order_details;


class DonHangController extends Controller
{
    public function QLDonHang()
    {
        $hoadon = order::paginate(25);
        return view('/AdminDottiesShoes/QLDonHang', compact('hoadon'))->with('i',(request()->input('page',1)-1)*5);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function CTDonHang($id)
    {
        $order = order::find($id);
        $order_details = order_details::where('order_id',$id)->get();
        return view('/AdminDottiesShoes/CTDonHang', ['donhang'=>$order,'chitiet'=>$order_details]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
