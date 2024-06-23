<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kho extends Model
{
    use HasFactory;
    protected $table = 'kho';
    // protected $primaryKey = 'MaLoai';
    protected $fillable  = [
        'id',
        'tenkho',
        'diachi',
    ];

    public  function chitietkho(){

        return $this->hasMany(ChiTietKho::class, 'tenkho');
    }
}
