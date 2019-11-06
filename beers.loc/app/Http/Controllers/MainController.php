<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Manufacturer;
use App\Type;
use App\Beer_sort;

class MainController extends Controller
{
   public function index(Request $request, $manufacturer = null, $type = null){
	    $maker = Manufacturer::groupBy('manufacturer')->get();
	                                         	   
	    $kind = Type::groupBy('type')->get();

	   if($manufacturer){
			$beer = Beer_sort::where('manufacturer_id', $manufacturer)->groupBy('name')->get();		   
	   }else if($type){
		   $beer = Beer_sort::where('type_id', $type)->groupBy('name')->get();
	   }else{
		   $beer = Beer_sort::groupBy('name')->get();
	   }
	   	    	   
        return view('index', ['maker' => $maker, 'kind' => $kind, 'beer' => $beer]);		
    }
	
	public function ManufacturerAdd(Request $request){        
        
	$this->validate($request, [
		'manufacturer' => 'unique:manufacturers|required|max:255',              
    ]);

        $addManufacturer = new Manufacturer([
            'manufacturer' => $request->input('manufacturer'),           
        ]);		
			$addManufacturerAdd = $addManufacturer->save();
		
        return back();
    }
	
	public function TypeAdd(Request $request){        
        
		$this->validate($request, [
			'type' => 'unique:types|required|max:255',              
		]);
		
        $addType = new Type([
            'type' => $request->input('type'),           
        ]);		
			$addTypeAdd = $addType->save();
		
        return back();
    }
	
	public function BeerAdd(Request $request){        
        
		$this->validate($request, [
			'name' => 'required|max:255',              			              
		]);
		
        $addBeer = new Beer_sort([
            'name' => $request->input('name'),           
            'description' => $request->input('description'),           
            'manufacturer_id' => $request->input('makers'),           
            'type_id' => $request->input('kind'),           
        ]);		
			$addBeerAdd = $addBeer->save();
		
        return back();
    }
	
	
}
