<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use SoftDeletes;
    protected $table = 'ntbh_order';
    public function orderDetails()
    {
        return $this->hasMany(Orderdetail::class, 'order_id');
    }
    public $timestamps = false;
    protected $dates = ['deleted_at'];
}
