<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;

    protected $table = 'ntbh_menu';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'link',
        'status',
        'position',
    ];
}
