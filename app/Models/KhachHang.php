<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'khachhang';
    public $timestamps = false;
    protected $fillable = ['id','HoTen', 'DiaChi','Email','SoDT','TaiKhoan','MatKhau'];
    public function order()
    {
        return $this->hasMany(order::class, 'makhachhang');
    }
}

