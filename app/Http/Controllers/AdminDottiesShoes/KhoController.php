<?php

namespace App\Http\Controllers\AdminDottiesShoes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kho;
use App\Models\ChiTietKho;
use Illuminate\Support\Facades\DB;

class KhoController extends Controller
{
    //
    public function index(){
        $db = DB::table('kho')
            ->join('chitietkho','chitietkho.makho','=','kho.id')
            ->join('sanpham','sanpham.ID','=','chitietkho.masanpham')
            ->select('kho.*', 'chitietkho.soluong', 'sanpham.TenSP', 'sanpham.HinhAnh')
            ->get();
        // dd($kho);
        return view('AdminDottiesShoes.kho.index', ['kho' => $db]);
    }
}
