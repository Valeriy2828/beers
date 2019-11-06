@extends('app')

@section('content')
<div style="margin-top: 40px;">
	<h4 style="margin-bottom: 25px;">Производитель</h4> 
	{!! Form::open(['url' => route('ManufacturerEdit',array('manufacturer'=>$data['id'])),'class'=>'form-horizontal','method'=>'POST']) !!}

	<div class="form-group">
		{!!  Form::hidden('id',$data['id']) !!}
		
		<div class="col-xs-8">
			{!!  Form::text('manufacturer', $data['manufacturer'],['class' => 'form-control','placeholder'=>'Введите название производителя']) !!}
		</div>	
	</div>
	
			
	<div class="form-group">
		<div class="col-xs-offset-2 col-xs-10" >
			{!!  Form::button('Сохранить',['class' => 'btn btn-primary','type'=>'submit']) !!}
		</div>	
	</div>
			
		{!!  Form::close() !!}		
</div>
@endsection