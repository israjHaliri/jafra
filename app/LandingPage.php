<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    protected $fillable = [
        'title', 'description', 'create_by', 'active', 'category', 'image'
    ];
    public function image()
    {
        return $this->hasMany('App\Image','landing_page_id');
    }
}
