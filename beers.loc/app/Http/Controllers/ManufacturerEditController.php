<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Http\Requests;
use App\Manufacturer;

class ManufacturerEditController extends Controller
{
    //
	public function execute(Manufacturer $manufacturer, Request $request){
		
		if($request->isMethod('delete')){
				$manufacturer->delete();
				return redirect('/');
			}
			
			if($request->isMethod('post')){
				$input = $request->except('_token');
				
				$validator = Validator::make($input,[
												
				'manufacturer'=>'required|max:255'
				
				]);
				
				if($validator->fails()){
				return redirect()
								->route('ManufacturerEdit')
								->withErrors($validator);
			}
								
				
				$manufacturer->fill($input);
				
				if($manufacturer->update()){
					return redirect('/');
				}
				
				
			}
			
			$old = $manufacturer->toArray();
			if(view()->exists('manufacturer_edit')){
				$data = ['data' => $old	];							
						
				
						
				return view('manufacturer_edit',$data);		
		

			}
	}
}
