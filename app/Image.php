<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

	protected $fillable = [
        'filename', 'original_name','gallery_id','landing_page_id'
    ];

    public function gallery() {
		return $this->belongsToMany('App/Gallery', 'gallery_id');
	}
	public function landing_page() {
		return $this->belongsToMany('App/Gallery', 'landing_page_id');
	}
}
