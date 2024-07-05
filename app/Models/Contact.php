<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use SoftDeletes;
    protected $table = 'ntbh_contact';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'title',
        'content',
        'status',
    ];
    public function scopeContactBy($query, $column, $direction = 'DESC')
    {
        return $query->orderBy($column, $direction);
    }
    protected $dates = ['deleted_at'];

}
