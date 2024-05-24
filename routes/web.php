<?php

use App\Http\Controllers\AdminDottiesShoes\DonHangController;
use Illuminate\Support\Facades\Route;

Route::controller(App\Http\Controllers\WebsiteDottiesShoes\AccountController::class)->group(function(){

    Route::get('/Login','Login')->name('Login');

    Route::post('/Login','CheckLogin')->name('CheckLogin');

    Route::get('/Logout','Logout')->name('Logout');

    Route::get('/Singnup','Singnup')->name('Singnup');

    Route::post('/Singnup','CheckSingnup')->name('CheckSingnup');
});

Route::controller(App\Http\Controllers\WebsiteDottiesShoes\IndexController::class)->group(function(){
    Route::get('/','TrangChu')->name('TrangChu');

    Route::get('/Shop/SanPham/{ID}','Show')->name('ShopDetails');

    Route::get('/ShopDetails','ShopDetails')->name('ShopDetails');

    Route::get('/ShopCart','ShopCart')->name('ShopCart');

    Route::get('/Blog','Blog')->name('Blog');

    Route::get('/BlogDetail','BlogDetail')->name('BlogDetail');

    Route::get('/About','About')->name('About');

    Route::get('/Contact','Contact')->name('Contact');
});

Route::controller(App\Http\Controllers\WebsiteDottiesShoes\ShopContronller::class)->group(function(){

    Route::get('/Shop','Shop')->name('Shop');
    Route::get('/ShopCart','ShopCart')->name('ShopCart');


    // Route::get('/{categoryName}','category')->name('category');

});

Route::controller(App\Http\Controllers\WebsiteDottiesShoes\CartController::class)->group(function(){

    Route::get('/ShopCart/AddCart/{ID}','AddCart')->name('AddCart');
    Route::post('/addcart', 'AddCart') -> name('cart.AddCart');
    Route::post('/removeCart', 'removeCart')->name('cart.removeCart');
    Route::get('/ShopCart','ShopCart')->name('ShopCart');

    Route::post('/UpdateCart','UpdateCart')->name('cart.update');
    Route::post('clear', 'clearAllCart')->name('cart.clear');
    Route::get('/checkout', ' CheckOut')->name('checkout');

});

Route::controller(App\Http\Controllers\WebsiteDottiesShoes\CheckoutController::class)->group(function(){

    Route::get('/CheckOut','CheckOut')->name('CheckOut');

    Route::get('/ThanhToan','ThanhToan')->name('ThanhToan');
    
    Route::post('/AddCheckOut','AddCheckOut')->name('AddCheckOut');
    Route::post('/ThanhToan', 'AddCheckOut')->name('ThanhToan');

});


Route::controller(App\Http\Controllers\AdminDottiesShoes\IndexController::class)->group(function(){

    Route::get('/LoginAD','LoginAD')->name('LoginAD');
    
    Route::post('/LoginAD','CheckLoginAD')->name('CheckLoginAD');

    Route::get('/Admin/Home','Home')->name('Home');

    Route::get('/Admin/KhachHang','KhachHang')->name('KhachHang');

    Route::get('/Admin/NhanVien','NhanVien')->name('NhanVien');

});
Route::controller(App\Http\Controllers\AdminDottiesShoes\SanPhamController::class)->group(function(){

    Route::get('/Admin/QLSanPham','QLSanPham')->name('QLSanPham');

    Route::get('/Admin/QLSanPham/CreateSP','CreateSP')->name('CreateSP');

    Route::post('/Admin/QLSanPham/StoreSP','StoreSP')->name('StoreSP');

    Route::get('/Admin/QLSanPham/EditSP/{ID}','EditSP')->name('EditSP');

    Route::post('/Admin/QLSanPham/UpdateSP/{ID}','UpdateSP')->name('UpdateSP');


    Route::delete('/Admin/QLSanPham/destroy/{iding}','destroy')->name('deletesp');
});
Route::controller(App\Http\Controllers\AdminDottiesShoes\DonHangController::class)->group(function(){

    Route::get('/Admin/QLDonHang','QLDonHang')->name('QLDonHang');
    
    Route::get('/Admin/QLDonHang/CTDonHang/{ID}','CTDonHang')->name('CTDonHang');
    
    Route::delete('/orders/{id}', [DonHangController::class, 'destroy'])->name('deleteOrder');
});
Route::controller(App\Http\Controllers\AdminDottiesShoes\KhachHangController::class)->group(function(){

    Route::get('/Admin/KhachHang','KhachHang')->name('KhachHang');
});