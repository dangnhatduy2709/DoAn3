<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietAnhSP extends Model
{
    use HasFactory;
    protected $table = 'chitietanhsp';
    public function ChiTietAnhSP(){
        return $this->hasMany('App\Models\SanPham');
    }
    protected $fillable = ['ID', 'MaSP', 'Anh'];
}
