<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beer_sort extends Model
{
    protected $table = 'beer_sorts';
	
	protected $fillable = ['id', 'name', 'description', 'manufacturer_id', 'type_id', 'created_at', 'updated_at'];
	
	public function manufacturer(){  
		return $this->belongsTo('App\Manufacturer');
	}
	
	public function type(){  
		return $this->belongsTo('App\Type');
	}
		
}
