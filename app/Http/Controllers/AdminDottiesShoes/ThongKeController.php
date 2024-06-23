<?php

namespace App\Http\Controllers\AdminDottiesShoes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HoaDonBan;
use App\Models\ChiTietHoaDonBan;
use Illuminate\Support\Facades\DB;

class ThongKeController extends Controller
{
    //
    public function index(){
        return view('AdminDottiesShoes.thongke.index');
    }

    public function theongay(Request $request){
        // $thongke = HoaDonBan::whereDate('created_at', '=', $request->ngay)->get();
        $thongke = DB::table('hoadonban')
            ->join('khachhang','hoadonban.makhachhang','=','khachhang.id')
            ->select('khachhang.*', 'hoadonban.thanhtien', 'hoadonban.id as idHDB')
            ->whereDate('hoadonban.created_at', '=', $request->ngay)->get();

        $tongtien = 0;
        $soluong = 0;
        foreach($thongke as $item){
            $tongtien += $item->thanhtien;
            $chitiet = DB::table('chitiethoadonban')
                ->join('hoadonban','hoadonban.id','=','chitiethoadonban.mahoadonban')
                ->select('chitiethoadonban.soluong')
                ->where('chitiethoadonban.mahoadonban', '=', $item -> idHDB)
                ->get();
            foreach($chitiet as $itemchitiet){
                $soluong += $itemchitiet->soluong;
                // dd($soluong);
            }
        }
        
        return view('AdminDottiesShoes.thongke.index', ['thongke' => $thongke, 'tongtien' => $tongtien, 'soluong' => $soluong]);

    }
    public function theothangget(){
        return view('AdminDottiesShoes.thongke.theothang');

    }

    public function theothang(Request $request){
        
        // $thongke = HoaDonBan::whereMonth('created_at', $request -> thang)->get();
        $thongke = DB::table('hoadonban')
            ->join('khachhang','hoadonban.makhachhang','=','khachhang.id')
            ->select('khachhang.*', 'hoadonban.thanhtien', 'hoadonban.id as idHDB')
            ->whereMonth('hoadonban.created_at', '=', $request->thang)
            ->whereYear('hoadonban.created_at', '=', $request->nam)
            ->get();

        $tongtien = 0;
        $soluong = 0;
        foreach($thongke as $item){
            $tongtien += $item->thanhtien;
            // foreach($item->chitiethoadonban as $chitiet){
            //     $soluong += $chitiet->soluong;
            //     // dd($soluong);
            // }
            $chitiet = DB::table('chitiethoadonban')
                ->join('hoadonban','hoadonban.id','=','chitiethoadonban.mahoadonban')
                ->select('chitiethoadonban.soluong')
                ->where('chitiethoadonban.mahoadonban', '=', $item -> idHDB)
                ->get();
            foreach($chitiet as $itemchitiet){
                $soluong += $itemchitiet->soluong;
                // dd($soluong);
            }
        }
        return view('AdminDottiesShoes.thongke.theothang', ['thongke' => $thongke, 'tongtien' => $tongtien, 'soluong' => $soluong]);
    }

    public function khachhang(){
        

        
        $kh = HoaDonBan::select('makhachhang', DB::raw('SUM(chitiethoadonban.soluong) as TongSoLuongDaMua'))
            -> join('chitiethoadonban', 'mahoadonban', '=', 'chitiethoadonban.mahoadonban')
            -> groupBy('hoadonban.makhachhang')
            -> orderBy('TongSoLuongDaMua', 'desc')
            -> get();
        

        return view('AdminDottiesShoes.thongke.khachhang', ['kh' => $kh]);
    }

    
    
    
}
