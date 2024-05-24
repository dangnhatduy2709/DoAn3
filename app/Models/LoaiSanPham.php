<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    use HasFactory;
    protected $primaryKey = 'MaLoai';
    protected $table = 'loaisanpham';
    protected $fillable = ['MaLoai', 'TenLoai', 'GhiChu'];
}
