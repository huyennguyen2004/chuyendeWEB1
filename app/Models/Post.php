<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use SoftDeletes;

    protected $table = 'ntbh_post';

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    public $timestamps = false;

    protected $fillable = [
        'title',
        'topic_id',
        'detail',
        'description',
        'slug',
        'image',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $dates = ['deleted_at'];
}
