<?php

namespace App\Http\Controllers\AdminDottiesShoes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HoaDonBan;
use App\Models\ChiTietHoaDonBan;
use Illuminate\Support\Facades\DB;

class HoaDonBanController extends Controller
{
    //
    public function index(){
        $hdb = HoaDonBan::all();
        return view('AdminDottiesShoes.hoadonban.index', ['hdb' => $hdb]);
    }

    public function detailhoadonban(string $id){
        // $chitiet = ChiTietHoaDonBan::where('mahoadonban', $id)->get();
        $chitiet = DB::table('hoadonban')
            ->join('chitiethoadonban','chitiethoadonban.mahoadonban','=','hoadonban.id')
            ->join('sanpham','chitiethoadonban.masanpham','=','sanpham.ID')
            ->select('chitiethoadonban.*', 'hoadonban.thanhtien', 'sanpham.*')
            ->where('hoadonban.id', '=', $id)
            ->get();
        return view('AdminDottiesShoes.hoadonban.detail', ['chitiet' => $chitiet]);
    }
}
