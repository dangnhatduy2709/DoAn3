<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDonBan extends Model
{
    use HasFactory;
    protected $table = 'chitiethoadonban';
    protected $fillable  = [
        'id',
        'mahoadonban',
        'masanpham',
        'soluong',
        'giaban',
    ];

    public function hoadonban()
    {
        return $this->belongsTo(HoaDonBan::class, 'mahoadonban');
    }

    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'masanpham');
    }
}
