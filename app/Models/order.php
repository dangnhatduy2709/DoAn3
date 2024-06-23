<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KhachHang;

class order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable  = [
        'id',
        'makhachhang',
        'thanhtien',
        'trangthai',
    ];

    public function order_details()
    {
        return $this->hasMany(order_details::class, 'madonhang');
    }

    public function khachhang()
    {
        return $this->belongsTo(KhachHang::class, 'id');
    }
}