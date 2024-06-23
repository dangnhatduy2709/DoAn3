<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaCungCap extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'nhacungcap';
    protected $fillable = ['id','tennhacungcap', 'DiaChi', 'SoDT'];
}
