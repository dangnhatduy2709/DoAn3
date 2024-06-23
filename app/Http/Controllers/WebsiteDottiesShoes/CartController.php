<?php

namespace App\Http\Controllers\WebsiteDottiesShoes;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\SanPham;
use Illuminate\Http\Request;

use Session;
use DB;
// use Gloudemans\Shoppingcart\Facades\Cart;
use Darryldecode\Cart\Cart;

class CartController extends Controller
{   
    public function ShopCart(){
        $cartItems = \Cart::getContent();
        return view('ShopCart', ['cartItems' => $cartItems]);
    }
    public function AddCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->TenSP,
            'price' => $request->DonGia,
            'quantity' => $request->SoLuong,
            'attributes' => array(
                'image' => $request->HinhAnh,
            )
        ]);
        $cartItems = \Cart::getContent();
        session()->flash('success', 'Bạn đã thêm thành công vào giỏ hàng!');
        return redirect()->route('ShopCart');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Sản phẩm đã được xóa khỏi giỏ hàng!');

        return redirect()->route('ShopCart');
    }


    public function UpdateCart(Request $request){

        // if($request -> ajax()){
            
        //     Cart::update($request -> rowId, $request -> qty);
        // }
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

        return redirect()->route('ShopCart');
    }
    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'Xóa giỏ hàng thành công !');

        return redirect()->route('ShopCart');
    }

}

 