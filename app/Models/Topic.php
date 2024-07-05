<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use SoftDeletes;

    protected $table = 'ntbh_topic';

    public function posts()
    {
        return $this->hasMany(Post::class, 'post_id');
    }

    public $timestamps = false;

    protected $dates = ['deleted_at'];
}
