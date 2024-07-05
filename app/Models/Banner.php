<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use SoftDeletes;

    protected $table = 'ntbh_banner';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'link',
        'description',
        'sort_order',
        'position',
        'status',
        'image',
    ];

    protected $dates = ['deleted_at'];
}
