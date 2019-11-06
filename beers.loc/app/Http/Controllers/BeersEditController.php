<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Http\Requests;
use App\Beer_sort;
use App\Manufacturer;
use App\Type;

class BeersEditController extends Controller
{
    public function execute(Beer_sort $beer, Request $request){
		
		if($request->isMethod('delete')){
				$beer->delete();
				return redirect('/');
			}
			
			if($request->isMethod('post')){
				$input = $request->except('_token');
				
				$validator = Validator::make($input,[
												
				'name'=>'required|max:255'				
				
				]);
				
				if($validator->fails()){
				return redirect()
								->route('BeersEdit')
								->withErrors($validator);
			}
								
				
				$beer->fill($input);
				
				if($beer->update()){
					return redirect('/');
				}
								
			}
			
			$old = $beer->toArray();
			if(view()->exists('beers_edit')){
				$data = ['data' => $old	];							
			
			$maker = Manufacturer::where('id', '>' , 0)->groupBy('manufacturer')->get();
			
			$kind = Type::groupBy('type')->get();
			
				return view('beers_edit' ,$data ,['maker' => $maker, 'kind' => $kind ]);		
		
			}
	}
}
