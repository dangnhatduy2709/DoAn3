<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CT_HoaDonBan extends Model
{
    use HasFactory;
    protected $table = 'ct_hoadonban';

    protected $fillable = ['ID', 'MaHDB', 'MaSP', 'SoLuong', 'DonGia'];
}
