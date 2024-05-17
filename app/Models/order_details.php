<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SanPham;

class order_details extends Model
{
    use HasFactory;
    protected $table = 'order_detials';
    protected $fillable = ['id', 'order_id', 'product_id', 'qty', 'amount', 'total'];

    public function SanPham(){
        return $this->hasOne(SanPham::class,'ID');
    }
}