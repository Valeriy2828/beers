<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';
	
	protected $fillable = ['id', 'type', 'created_at', 'updated_at'];
	
	public function beers_sortes(){ 
		return $this->hasMany('App\Beer_sort');
	}
	
}
