<?php

namespace App\Models;
use App\Models\OrderItem;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable= [
        'user_id',
        'fname',
        'lname',
        'email',
        'phone',
        'address',
        'city',
        'pincode',
        'state',
        'status',
        'message',
        'tracking_no',
    ];
    public function orderitem()
    {
        return $this->hasMany(OrderItem::class);
    }
}
