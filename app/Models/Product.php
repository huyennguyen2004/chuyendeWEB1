<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use SoftDeletes, HasFactory;
    protected $table = 'ntbh_product';

    protected $fillable = [
        'name',
        'detail',
        'desciption',
        'category_id',
        'brand_id',
        'price',
        'pricesale',
        'qty',
        'image',
        'status',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    protected $dates = ['deleted_at'];
}

