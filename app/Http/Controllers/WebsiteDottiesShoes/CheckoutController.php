<?php

namespace App\Http\Controllers\WebsiteDottiesShoes;

use App\Http\Controllers\Controller;
use App\Models\KhachHang;
use App\Models\order;
use App\Models\order_details;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;
use App\Models\ChiTietKho;

class CheckoutController extends Controller
{   
    public function CheckOut(){
        $cartItems = \Cart::getContent();
        foreach($cartItems as $item) {
            $ctk = ChiTietKho::where('masanpham', $item->id) -> first();

            $slkho = $ctk -> soluong;
            
            if($item -> quantity > $slkho){
                session()->flash('error', 'Số lượng sản phẩm ' .$item -> name .' đã vượt quá số lượng cho phép! Vui lòng nhập lại số lượng');

                return redirect()->route('ShopCart');
            }
        return view('CheckOut', ['cartItems' => $cartItems]);
        }
    }
    public function ThanhToan(){
        return view('ThanhToan');
    }

    // public function AddCheckOut(Request $request){
    //     $order = order ::create($request -> all());
    //     $carts = \Cart ::getcontent();
    //     foreach($carts as $cart){
    //         $data =[
    //             'order_id' => $order-> id,
    //             'product_id' => $cart-> id,
    //             'qty' => $cart ->qty,
    //             'amount' => $cart->price,
    //             'total' => $cart-> price * $cart -> qty,
    //         ];
    //         order_details::create($data);
    //     }
    //     \Cart::clear();
    //     return redirect()->route('ThanhToan');
    // }
    public function checkoutpost(Request $request){
        // dd($request -> all());
        $cartItems = \Cart::getContent();
        
        $input = $request -> all();
        $kh = new KhachHang();
        $dh = new order();


        $khachhang = KhachHang::where('Email', '=', $input['Email']) ->first();
        // dd($khachhang_id);
        if($khachhang){
            $makhachhang = $khachhang -> id;
            //lưu vào đơn hàng
            $dh -> makhachhang = $makhachhang;
            $dh -> thanhtien = \Cart::getTotal();
            $dh -> trangthai = 0;
            // dd($dh);
            $dh -> save();

            //lưu vào chi tiết đơn hàng
            foreach($cartItems as $item) {
                $ctdh = new order_details();

                $ctdh -> madonhang = $dh -> id;
                $ctdh -> masanpham = $item -> id;
                $ctdh -> soluong = $item -> quantity;
                $ctdh -> gia = $item -> price;
                $ctdh -> save();
                
            }
            \Cart::clear();

        }
        else{

            //lưu thông tin vào bảng khách hàng
            
            $kh -> HoTen = $input['HoTen'];
            $kh -> DiaChi = $input['DiaChi'];
            $kh -> Email = $input['Email'];
            $kh -> SoDT = $input['SoDT'];
            $kh -> save();

            //lưu thông tin vào đơn hàng
            $dh -> id = $kh -> id;
            $dh -> thanhtien = \Cart::getTotal();
            $dh -> trangthai = 0;

            $dh -> save();

            //lưu thông tin vào chi tiết đơn hàng
            foreach($cartItems as $item) {
                $ctdh = new order_details();

                $ctdh -> madonhang = $dh -> id;
                $ctdh -> masanpham = $item -> id;
                $ctdh -> soluong = $item -> quantity;
                $ctdh -> gia = $item -> price;
                $ctdh -> save();

            }
            \Cart::clear();

            
        }
        return redirect()->route('ThanhToan');
    }


}
