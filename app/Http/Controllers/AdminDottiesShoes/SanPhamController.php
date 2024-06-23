<?php

namespace App\Http\Controllers\AdminDottiesShoes;

use App\Http\Controllers\Controller;
use App\Models\LoaiSanPham;
use App\Models\NhaCungCap;
use Illuminate\Http\Request;
use App\Models\SanPham;
use Illuminate\Support\Facades\DB;

class SanPhamController extends Controller
{
    public function QLSanPham()
    {
        $product = SanPham::all();
        $product = DB::table('sanpham')
            ->join('loaisanpham', 'sanpham.MaLoai', '=' ,'loaisanpham.MaLoai')
            ->join('nhacungcap', 'sanpham.MaNCC', '=', 'nhacungcap.id')
            ->select('sanpham.*', 'nhacungcap.tennhacungcap', 'loaisanpham.TenLoai')
            ->paginate(50);
        // dd($product);
        return view('/AdminDottiesShoes/QLSanPham', compact('product'));
    }

    public function CreateSP()
    {
        $nhasanxuat = NhaCungCap::all();
        $loaisanpham = LoaiSanPham::all();
        return view('/AdminDottiesShoes/CreateSP', ['loaisanpham' => $loaisanpham],['nhasanxuat' => $nhasanxuat]);
    }

    public function StoreSP(Request $request)
    {
        $sp = new SanPham();
        $sp->HinhAnh = $request->input('HinhAnh');
        $sp->MaLoai = $request->input('MaLoai');
        $sp->MaNCC = $request->input('MaNCC');
        $sp->TenSP = $request->input('TenSP');
        $sp->MauSac = $request->input('MauSac');
        $sp->DonGia = $request->input('DonGia');
        $sp->GhiChu = $request->input('GhiChu');
        $sp->SoLuong = $request->input('SoLuong');
        $sp->KichThuoc = $request->input('KichThuoc');
        $sp->save();
        
        return redirect()->route('QLSanPham')->with('ThongBao', 'Thêm Sản Phẩm Thành Công!');
    }

    public function show($id)
    {
        //
    }

    public function EditSP(  $ID)
    {
        $nhasanxuat = NhaCungCap::all();
        $loaisanpham = LoaiSanPham::all();
        $product = SanPham::find($ID);
        //   dd($loaisanpham);
        return view('/AdminDottiesShoes/UpdateSP', compact('product','loaisanpham','nhasanxuat'));
    }

    public function UpdateSP(Request $request,  $ID)
    {
        $input = $request -> all();
        $sp = SanPham::find($ID);
        $sp->HinhAnh = $request->input('HinhAnh');
        $sp->MaLoai = $request->input('MaLoai');
        $sp->MaNCC = $request->input('MaNCC');
        $sp->TenSP = $request->input('TenSP');
        $sp->MauSac = $request->input('MauSac');
        $sp->DonGia = $request->input('DonGia');
        $sp->GhiChu = $request->input('GhiChu');
        $sp->SoLuong = $request->input('SoLuong');
        $sp->KichThuoc = $request->input('KichThuoc');
        $sp->save();
        
        // dd($request->all());

        return redirect()-> route ('QLSanPham');

    }
        
    public function destroy(string $iding)
    {
        $product = SanPham::where('ID', $iding)->delete();
        return redirect()->route('QLSanPham')->with('ThongBao', 'Xoá Sản Phẩm Thành Công');
    }
}
