<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaCungCap extends Model
{
    use HasFactory;
    protected $primaryKey = 'MaNCC';
    protected $table = 'nhacungcap';
    protected $fillable = ['MaNCC', 'TenNCC', 'DiaChi', 'SoDT'];
}
