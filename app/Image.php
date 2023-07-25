<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    protected $fillable = ['path' , 'product_id'];

    public function imagable()
    {
        return $this->morphTo('App\BlogPost');
    }

    public function url()
    {
        return Storage::url($this->path);
    }
}
