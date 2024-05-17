<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = ['id', 'first_name', 'last_name', 'country', 'street_address', 'postcode_zip', 'phone','email','notes','payment_type'];
}
