<?php

namespace App\Http\Controllers\AdminDottiesShoes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\order;
use App\Models\order_details;
use App\Models\HoaDonBan;
use App\Models\ChiTietHoaDonBan;
use App\Models\ChiTietKho;
use Illuminate\Support\Facades\DB;

class DonHangController extends Controller
{
    //
    public function index(){
        $db = DB::table('order')
            ->leftJoin('khachhang', 'order.makhachhang', '=' ,'khachhang.id')
            ->select('order.*', 'khachhang.HoTen', 'khachhang.SoDT', 'khachhang.DiaChi', 'khachhang.Email')
            ->get();
        // dd($db);
        $trangthai = '';
        foreach($db as $dbs){
            if($dbs -> trangthai == 0){
                $trangthai = "Chờ xử lý";
            }
            else if($dbs -> trangthai == 1){
                $trangthai = "Đã xác nhận";
            }
            else if($dbs -> trangthai == 2){
                $trangthai = "Đã hủy";
                
            }
            $dbs -> trangthai = $trangthai;
        }
        
        return view('AdminDottiesShoes.donhang.index',['db' => $db]);
    }

    public function OderDetail(string $id) {
        // $ctdh = order_details::where('madonhang' ,'=', $id) -> get();
        $ctdh = DB::table('order_details')
                ->join('order','order_details.madonhang','=' ,'order.id')
                ->join('sanpham','order_details.masanpham','=' ,'sanpham.ID')
                ->select('order.*','order_details.*', 'sanpham.*')
                ->where('order_details.madonhang' ,'=', $id)
                ->get();
        // dd($ctdh);

        $dh = DB::table('order')
                ->join('khachhang', 'order.makhachhang', '=' ,'khachhang.id')
                ->select('order.*', 'khachhang.*')
                ->first();
        return view('AdminDottiesShoes.donhang.chitietdonhang', ['ctdh' => $ctdh, 'dh' => $dh]);
    }
    
    public function OderConfirm(){
        // $dh = order::where('trangthai', '=', 1) -> get();
        $dh = DB::table('order')
            ->leftJoin('khachhang', 'order.makhachhang', '=' ,'khachhang.id')
            ->select('order.*', 'khachhang.HoTen', 'khachhang.SoDT', 'khachhang.DiaChi', 'khachhang.Email')
            ->where('trangthai', '=', 1)
            ->get();

        foreach($dh as $dhcf){
            $dhcf -> trangthai = 'Đã xác nhận';
        }
        // dd($dh);
        return view('AdminDottiesShoes.donhang.donhangdaxacnhan', ['dh' => $dh]);
    }

    public function OderUnConfirm(){
        // $dh = order::where('trangthai', '=', 0) -> get();
        $dh = DB::table('order')
            ->leftJoin('khachhang', 'order.makhachhang', '=' ,'khachhang.id')
            ->select('order.*', 'khachhang.HoTen', 'khachhang.SoDT', 'khachhang.DiaChi', 'khachhang.Email')
            ->where('trangthai', '=', 0)
            ->get();
        // dd($dh);
        foreach($dh as $dhucf){
            $dhucf -> trangthai = 'Chờ xử lý';
        }

        return view('AdminDottiesShoes.donhang.donhangchuaxacnhan', ['dh' => $dh]);
    }

    public function ConfirmCheckout(string $id){
        $db = order::all();

        
        $hdb = new HoaDonBan();
        
        $dh = order::find($id);
        
        if((int)$dh->trangthai == 0){
            //lưu thông tin từ đơn hàng sang hóa đơn bán
            $hdb -> makhachhang = $dh -> makhachhang;
            $hdb -> thanhtien = $dh -> thanhtien;

            $hdb -> save();

            //lưu thông tin từ chi tiết đơn hàng sang chi tiết hóa đơn bán

            $ctdh = order_details::where('madonhang', '=', $dh -> id) -> get();
            foreach($ctdh as $item){
                $cthdb = new ChiTietHoaDonBan();

                $cthdb -> mahoadonban = $hdb -> id;
                $cthdb -> masanpham = $item -> masanpham;
                $cthdb -> soluong = $item -> soluong;
                $cthdb -> giaban = $item -> gia;



                $sl = $this -> checksoluong($item -> masanpham);

                $getchitietkho = ChiTietKho::where('masanpham', $item -> masanpham) ->first();

                if($item ->soluong < $getchitietkho -> soluong){
                    $getchitietkho -> soluong = (int)$sl - (int)($item -> soluong);
                    $getchitietkho -> save();
                }
                else{
                    session()->flash('error', 'Có lỗi xảy ra khi thực hiện thanh toán ');

                }

                $cthdb -> save();

                
            }

            $dh -> trangthai = 1;
            $dh -> save();

            session()->flash('sucess', 'Thanh toán thành công');
            return $this -> ViewOder($id);
        }
        else{
            session()->flash('error', 'Vui lòng kiểm tra lại ');
            return redirect()->route('admin.donhang.index');

        }
    }

    public function CancelCheckout(string $id){

        $dh = order::find($id);
        if($dh->trangthai == 0){
            $dh -> trangthai = 2;
            $dh -> save();
            session()->flash('sucess', 'Đơn hàng đã được hủy');
 
        }
        else{
            session()->flash('error', 'Vui lòng kiểm tra lại ');

        }

        return redirect()->route('admin.donhang.index');

    }

    public function checksoluong(string $id){
        $sp = SanPham::find($id);

        $sl = $sp -> id;

        $ctk = ChiTietKho::where('masanpham', $sl) -> first();

        return $ctk -> soluong;        

        
    }

    public function ViewOder(string $id) {
        $test = DB::table('order')
                ->join('order_details','order_details.madonhang','=','order.id')
                ->join('sanpham','order_details.masanpham','=' ,'sanpham.ID')
                ->select('order_details.*', 'sanpham.*', 'order.thanhtien')
                ->where('order.id','=', $id)
                ->get();
        // dd($ctdh);

        $dh = DB::table('order')
                ->join('khachhang', 'order.makhachhang', '=' ,'khachhang.id')
                ->select('order.*', 'khachhang.*')
                ->where('order.id' ,'=', $id)
                ->first();
        // dd($test);
        return view('AdminDottiesShoes.donhang.viewoder', ['dh' => $dh, 'ctdh' => $test]);
    }

}