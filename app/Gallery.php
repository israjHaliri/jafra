<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public $table = 'galleries';

    protected $fillable = [
        'category'
    ];

    public function image()
    {
        return $this->hasMany('App\Image','gallery_id');
    }
}
