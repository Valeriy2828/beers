@extends('app')

@section('content')
<div style="margin-top: 40px;">
	<h4 style="margin-bottom: 25px;">Редактирование пива</h4> 
	{!! Form::open(['url' => route('BeersEdit',array('beer'=>$data['id'])),'class'=>'form-horizontal','method'=>'POST']) !!}

	<div class="form-group">
		{!!  Form::hidden('id',$data['id']) !!}
		
		<div class="col-xs-8">
			{!!  Form::text('name', $data['name'],['class' => 'form-control','placeholder'=>'Введите название пива']) !!}
		</div>
		<div class="col-xs-8">
			{!!  Form::text('description', $data['description'],['class' => 'form-control','placeholder'=>'Введите описание']) !!}
		</div>
		<select class="form-control" name="manufacturer_id" style="margin: 5px 0 15px 0;">				
			@foreach($maker as $makers)
				<option value="{{$makers->id}}">{{$makers->manufacturer}}</option>
			@endforeach	
		</select>
		<select class="form-control" name="type_id" style="margin: 5px 0 15px 0;">						
			@foreach($kind as $types)
				<option value="{{$types->id}}">{{$types->type}}</option>
			@endforeach	
		</select>	
	</div>
	
			
	<div class="form-group">
		<div class="col-xs-offset-2 col-xs-10" >
			{!!  Form::button('Сохранить',['class' => 'btn btn-primary','type'=>'submit']) !!}
		</div>	
	</div>
			
		{!!  Form::close() !!}		
</div>
@endsection