<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Traits\Taggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes, Taggable;

    protected $hidden = [
        'commentable_type',
        'commentable_id',
        'deleted_at',
        'user_id',
        'user_email'
    ];

    protected $fillable = ['user_id' , 'content'];

    public function commentable()
    {
        return $this->morphTo();
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function scopeLatest(Builder $query)
    {
        return $query->orderBy(static::CREATED_AT, 'desc');
    }

}
