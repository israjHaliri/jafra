<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $table  = 'profiles';
    
    protected $fillable = [
        'fullname', 'address', 'phone_number', 'users_id'
    ];

	public function user() {
		return $this->belongsTo('App/User', 'users_id');
	}

}
