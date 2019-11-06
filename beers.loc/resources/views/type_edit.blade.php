@extends('app')

@section('content')
<div style="margin-top: 40px;">
	<h4 style="margin-bottom: 25px;">Тип</h4> 
	{!! Form::open(['url' => route('TypeEdit',array('type'=>$data['id'])),'class'=>'form-horizontal','method'=>'POST']) !!}

	<div class="form-group">
		{!!  Form::hidden('id',$data['id']) !!}
		
		<div class="col-xs-8">
			{!!  Form::text('type', $data['type'],['class' => 'form-control','placeholder'=>'Введите тип пива']) !!}
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