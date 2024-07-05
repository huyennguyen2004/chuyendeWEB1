<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use SoftDeletes;
    protected $table = 'ntbh_brand';
    public $timestamps = false;

    protected $fillable = ['name', 'slug', 'description', 'image', 'status', 'sort_order'];
    protected $dates = ['deleted_at'];
}
