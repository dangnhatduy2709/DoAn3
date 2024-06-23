<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;
use App\Models\KhachHang;
use App\Models\DonHang;
use App\Models\ChiTietDonHang;
use App\Models\ChiTietKho;

class CartController extends Controller
{
    //
    public function cart(){
        $cartItems = \Cart::getContent();
        // dd(
        //     $cartItems 
        // );
        return view('FptShop/cart', ['cartItems' => $cartItems]);
    }

    public function addCart(Request $request){
        // dd($request -> all());
        \Cart::add([
            'id' => $request->id,
            'name' => $request->TenSanPham,
            'price' => $request->Gia,
            'quantity' => $request->SoLuong,
            'attributes' => array(
                'image' => $request->Anh,
            )

            
        ]);
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        // dd(\Cart:: add());
        session()->flash('success', 'Bạn đã thêm thành công vào giỏ hàng !');

        return redirect()->route('FptShop/cart');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Đã cập nhập thành công giỏ hàng!');

        return redirect()->route('FptShop/cart');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Sản phẩm đã được xóa khỏi giỏ hàng!');

        return redirect()->route('FptShop/cart');
    }


    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'Xóa giỏ hàng thành công !');

        return redirect()->route('FptShop/index');
    }

    public function checkout(){
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        foreach($cartItems as $item) {
            $ctk = ChiTietKho::where('sanpham_id', $item->id) -> first();

            $slkho = $ctk -> soluong;
            
            if($item -> quantity > $slkho){
                session()->flash('error', 'Số lượng sản phẩm ' .$item -> name .' đã vượt quá số lượng cho phép! Vui lòng nhập lại số lượng');

                return redirect()->route('FptShop/cart');
            }
            

        }
        return view('FptShop/checkout', ['cartItems' => $cartItems]);

        

        
    }

    public function checkoutpost(Request $request){
        // dd($request -> all());
        $cartItems = \Cart::getContent();
        
        $input = $request -> all();
        $kh = new KhachHang();
        $dh = new DonHang();


        $khachhang = KhachHang::where('email', '=', $input['email']) ->first();
        // dd($khachhang_id);
        if($khachhang){
            $khachhang_id = $khachhang -> id;
            //lưu vào đơn hàng
            $dh -> khachhang_id = $khachhang_id;
            $dh -> thanhtien = \Cart::getTotal();
            $dh -> trangthai = 0;
            // dd($dh);
            $dh -> save();

            //lưu vào chi tiết đơn hàng
            foreach($cartItems as $item) {
                $ctdh = new ChiTietDonHang();

                $ctdh -> donhang_id = $dh -> id;
                $ctdh -> sanpham_id = $item -> id;
                $ctdh -> soluong = $item -> quantity;
                $ctdh -> gia = $item -> price;
                $ctdh -> save();
                
            }
            \Cart::clear();

        }
        else{

            //lưu thông tin vào bảng khách hàng
            $kh -> tenkhachhang = $input['tenkhachhang'];
            $kh -> sodienthoai = $input['sodienthoai'];
            $kh -> diachi = $input['diachi'];
            $kh -> email = $input['email'];

            $kh -> save();

            //lưu thông tin vào đơn hàng
            $dh -> khachhang_id = $kh -> id;
            $dh -> thanhtien = \Cart::getTotal();
            $dh -> trangthai = 0;

            $dh -> save();

            //lưu thông tin vào chi tiết đơn hàng
            foreach($cartItems as $item) {
                $ctdh = new ChiTietDonHang();

                $ctdh -> donhang_id = $dh -> id;
                $ctdh -> sanpham_id = $item -> id;
                $ctdh -> soluong = $item -> quantity;
                $ctdh -> gia = $item -> price;
                $ctdh -> save();

            }
            \Cart::clear();

            
        }
        return redirect()->route('FptShop/index');
    }

    
}
