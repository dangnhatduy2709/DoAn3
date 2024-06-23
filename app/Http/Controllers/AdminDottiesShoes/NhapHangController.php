<?php

namespace App\Http\Controllers\AdminDottiesShoes;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\HoaDonNhap;
use App\Models\ChiTietHoaDonNhap;
use App\Models\NhaCungCap;
use App\Models\SanPham;
use App\Models\Kho;
use App\Models\ChiTietKho;
use Illuminate\Support\Facades\DB;


class NhapHangController extends Controller
{
    //
    public function index(){
        // $db = HoaDonNhap::all();
        $db = DB::table('hoadonnhap')
            ->join('nhacungcap','nhacungcap.id','=','hoadonnhap.manhacungcap')
            ->select('nhacungcap.*', 'hoadonnhap.thanhtien', 'hoadonnhap.id as idHDN', 'hoadonnhap.manhacungcap as idNCC')
            ->get();
        return view('AdminDottiesShoes.hoadonnhap.index', ['db' => $db]);
    }

    public function create(){

        $sp = SanPham::all();
        $ncc = NhaCungCap::all();
        $kho = Kho::all();
        return view('AdminDottiesShoes.hoadonnhap.create', ['ncc' => $ncc, 'sp' => $sp , 'kho' => $kho]);
    }

    public function store(Request $request){
        $input = $request-> all();
        // dd($input);

        $hdn = new HoaDonNhap();
        $cthdn = new ChiTietHoaDonNhap();

        //lưu thông tin hóa đơn nhập
        $hdn -> manhacungcap = $input['manhacungcap'];
        $hdn -> thanhtien = $input['thanhtien'];

        $hdn ->save();

        //lưu thông tin chi tiết hóa đơn nhập

        $cthdn -> mahoadonnhap = $hdn -> id;
        $cthdn -> masanpham = $input['masanpham'];
        $cthdn -> dongia = $input['dongia'];
        $cthdn -> soluong = $input['soluong'];
        
        $cthdn -> save();

        $makho = ChiTietKho::where('makho', '=', $input['makho'])
                ->where('masanpham', '=', $input['masanpham'])
                ->first();

        if($makho){
            $makho -> soluong += $input['soluong'];
            $makho -> save();
        }
        else{
            $ctkho = new ChiTietKho();

            $ctkho -> makho = $input['makho'];
            $ctkho -> masanpham = $input['masanpham'];
            $ctkho -> soluong = $input['soluong'];

            $ctkho -> save();

        }

        return redirect()->route('admin.hoadonnhap.index');

    }

    public function details(string $id){
        // $detail = ChiTietHoaDonNhap::where('mahoadonnhap', '=', $id)->get();
        $detail = DB::table('hoadonnhap')
            ->join('chitiethoadonnhap','chitiethoadonnhap.mahoadonnhap','=','hoadonnhap.id')
            ->join('sanpham','chitiethoadonnhap.masanpham','=','sanpham.ID')
            ->select('chitiethoadonnhap.*', 'hoadonnhap.thanhtien', 'sanpham.*')
            ->where('hoadonnhap.id', '=', $id)
            ->get();

        // dd($detail);
        return view('AdminDottiesShoes.hoadonnhap.detail', ['detail' => $detail]);
    }

    
}
