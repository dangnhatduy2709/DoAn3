<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SanPham;

class order_details extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $fillable  = [
        'id',
        'madonhang',
        'masanpham',
        'soluong',
        'gia',
    ];

    public function order()
    {
        return $this->belongsTo(order::class, 'madonhang');
    }

    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'masanpham');
    }
}