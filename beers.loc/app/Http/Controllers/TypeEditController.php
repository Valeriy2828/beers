<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Http\Requests;
use App\Type;

class TypeEditController extends Controller
{
    public function execute(Type $type, Request $request){
		
		if($request->isMethod('delete')){
				$type->delete();
				return redirect('/');
			}
			
			if($request->isMethod('post')){
				$input = $request->except('_token');
				
				$validator = Validator::make($input,[
												
				'type'=>'required|max:255'
				
				]);
				
				if($validator->fails()){
				return redirect()
								->route('TypeEdit')
								->withErrors($validator);
			}
								
				
				$type->fill($input);
				
				if($type->update()){
					return redirect('/');
				}
								
			}
			
			$old = $type->toArray();
			if(view()->exists('type_edit')){
				$data = ['data' => $old	];							
																
				return view('type_edit',$data);		
		
			}
	}
}
