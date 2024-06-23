<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDonNhap extends Model
{
    use HasFactory;
    protected $table = 'hoadonnhap';
    protected $fillable = [
        'id',
        'manhacungcap',
        'thanhtien',
    ];

    public function chitiethoadonnhap()
    {
        return $this -> hasMany(ChiTietHoaDonNhap::class, 'mahoadonnhap');
    }

    public function nhacungcap()
    {
        return $this -> belongsTo(NhaCungCap::class, 'manhacungcap');
    }
}
