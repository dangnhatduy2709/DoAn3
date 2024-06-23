<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietKho extends Model
{
    use HasFactory;
    protected $table = 'chitietkho';
    // protected $primaryKey = 'MaLoai';
    protected $fillable  = [
        'id',
        'makho',
        'masanpham',
        'soluong',
    ];

    public function kho(){

        return $this->belongsTo(Kho::class, 'makho');

    }

    public function sanpham(){
        return $this -> belongsTo(Sanpham::class, 'masanpham');
    }
}
