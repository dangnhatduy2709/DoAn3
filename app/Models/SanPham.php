<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LoaiSanPham;
use App\Models\NhaCungCap;

class SanPham extends Model
{
    use HasFactory;
    protected $primaryKey = 'ID'; // Sửa từ $primarykey thành $primaryKey
    protected $table = 'sanpham';
    protected $fillable = ['ID', 'HinhAnh', 'MaLoai', 'MaNCC', 'TenSP', 'MauSac', 'DonGia', 'GhiChu', 'SoLuong', 'KichThuoc']; // Sửa từ $filliable thành $fillable
    public function LoaiSanPham(){
        return $this->belongsTo (LoaiSanPham::class,'MaLoai');
    }
    public function NhaCungCap(){
        return $this->belongsTo (NhaCungCap::class,'id');
    }
    public function order_details()
    {
        return $this->hasMany(order_details::class, 'masanpham');
    }
    public function chitiethoadonban()
    {
        return $this->hasMany(ChiTietHoaDonBan::class, 'masanpham');
    }
    public function ChiTietAnhSP(){
        return $this->hasMany('App\Models\ChiTietAnhSP');
    }
}
