<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_time',
        'total_price',
        'total_item',
        'payment_method',
        'kasir_id'
    ];

    public function kasir(){
        return $this->belongsTo(User::class, 'kasir_id', 'id');
    }
}