<?php

namespace App\Http\Controllers\WebsiteDottiesShoes;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\order_details;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;

class CheckoutController extends Controller
{   
    public function CheckOut(){
        $carts = \Cart::getContent();
        // $sum =0.0;
        // foreach ($carts as $item){
        //     $sum += $item->price * $item->qty;
        // }
        // return view('CheckOut', compact('carts','sum'));
        return view('CheckOut', ['carts' => $carts]);
    }
    public function ThanhToan(){
        return view('ThanhToan');
    }

    public function AddCheckOut(Request $request){
        $order = order ::create($request -> all());
        $carts = \Cart ::getcontent();
        foreach($carts as $cart){
            $data =[
                'order_id' => $order-> id,
                'product_id' => $cart-> id,
                'qty' => $cart ->qty,
                'amount' => $cart->price,
                'total' => $cart-> price * $cart -> qty,
            ];
            order_details::create($data);
        }
        \Cart::clear();
        return redirect()->route('ThanhToan');
    }


}
