<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Manufacturer extends Model
{
    protected $table = 'manufacturers';
	
	protected $fillable = ['id', 'manufacturer', 'created_at', 'updated_at'];
	
	 public function beers_sorts(){ 
		return $this->hasMany('App\Beer_sort');
	}
}
