<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDonNhap extends Model
{
    use HasFactory;
    protected $table = 'chitiethoadonnhap';
    protected $fillable = [
        'id',
        'mahoadonnhap',
        'masanpham',
        'dongia',
        'soluong',

    ];

    public function hoadonnhap(){
        return $this -> belongsTo(HoaDonNhap::class, 'mahoadonnhap');
    }
    public function sanpham(){
        return $this -> belongsTo(SanPham::class, 'masanpham');
    }
}
