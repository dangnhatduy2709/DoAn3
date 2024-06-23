<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDonBan extends Model
{
    use HasFactory;
    protected $table = 'hoadonban';
    protected $fillable  = [
        'id',
        'makhachhang',
        'thanhtien',
    ];

    public function chitiethoadonban()
    {
        return $this->hasMany(ChiTietHoaDonBan::class, 'mahoadonban');
    }

    public function khachhang()
    {
        return $this->belongsTo(KhachHang::class, 'makhachhang');
    }


}
