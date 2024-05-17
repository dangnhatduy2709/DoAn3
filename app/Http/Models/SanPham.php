<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LoaiSanPham;
use App\Models\NhaCungCap;

class SanPham extends Model
{
    use HasFactory;
    protected $table = 'sanpham';
    protected $fillable = ['ID', 'HinhAnh', 'MaLoai', 'MaNCC', 'TenSP', 'MauSac', 'DonGia','GiaSale','GhiChu','SoLuong','KichThuoc'];
    public function LoaiSanPham(){
        return $this->belongsTo (LoaiSanPham::class,'MaLoai','ID');
    }
    public function NhaCungCap(){
        return $this->belongsTo (NhaCungCap::class,'MaNCC','ID');
    }
    public function ChiTietAnhSP(){
        return $this->hasMany('App\Models\ChiTietAnhSP');
    }
}
