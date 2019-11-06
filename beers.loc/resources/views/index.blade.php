@extends('app')

@section('content')

		<form method="post" action="/index/add">
			{{ csrf_field() }}
			<div class="col-5">
				<div>				
					<div class="form-group">
						<input type="text" class="form-control" id="exampleFormControlInput1" name="manufacturer" value="" placeholder="Производитель">
					</div>								
					<input type="submit" class="btn btn-primary" value="Отправить" style="margin: 5px 0 50px 0;">
				</div>				
			</div>
		</form>		
		
		<form method="post" action="/index/add1">
			{{ csrf_field() }}
			<div class="col-5">
				<div>				
					<div class="form-group">
						<input type="text" class="form-control" id="exampleForm" name="type" value="" placeholder="Тип">
					</div>				
					<input type="submit" class="btn btn-primary" value="Отправить" style="margin: 5px 0 50px 0;">
				</div>				
			</div>
		</form>	

		<h4 style="margin-bottom: 25px;">Пиво</h4>
		<form method="post" action="/index/add2">
			{{ csrf_field() }}
			<div class="col-5">
				<div>				
					<div class="form-group">
						<input type="text" class="form-control" id="beerForm" name="name" value="" placeholder="Название">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="beerTextForm" name="description" value="" placeholder="Описание">
					</div>
					<select class="form-control" name="makers" style="margin: 5px 0 15px 0;">
						<option disabled selected>Выберите производителя</option>
						@foreach($maker as $makers)
							<option value="{{$makers->id}}">{{$makers->manufacturer}}</option>
						@endforeach	
					</select>
					<select class="form-control" name="kind" style="margin: 5px 0 15px 0;">
						<option disabled selected>Выберите тип</option>
						@foreach($kind as $types)
							<option value="{{$types->id}}">{{$types->type}}</option>
						@endforeach	
					</select>	
					<input type="submit" class="btn btn-primary" value="Отправить" style="margin: 5px 0 50px 0;">
				</div>				
			</div>
		</form>

		<a href="/"><h3 style="margin-bottom: 25px;">Все марки пива</h3></a>
		
		<div><h3>Производитель</h3></div>
		<ol style="margin-top: 30px;">
			
			@foreach($maker as $makers)	
			<li style=" border: 4px  black; background: #BDBDBD; padding: 20px; margin: 15px 400px 0 0;">     
				<div>
					<a href="{{ url('index/cat/'.$makers->id) }}">{{$makers->manufacturer}} </a>{{ $makers->beers_sorts->count() }} шт</br>
					{!! Html::link(route('ManufacturerEdit',['makers'=>$makers->id]),$makers->manufacturer)!!}{{' - редактировать'}} 
					<div style="margin-top: 10px;">
						{!! Form::open(['url'=>route('ManufacturerEdit',['makers'=>$makers->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}
				
							{{ method_field('DELETE') }}
							{!! Form::button('Удалить',['class'=>'btn btn-danger','type'=>'submit']) !!}
				
						{!! Form::close() !!}
					</div>	
				</div>
				<br>
			</li>	
			@endforeach
			
		</ol>
		
		<div><h3>Тип</h3></div>
		<ol style="margin-top: 30px;">
			
			@foreach($kind as $types)				
			<li style=" border: 4px  black; background: #BDBDBD; padding: 20px; margin: 15px 400px 0 0;">     
				<div>					
					<a href="{{ url('index/cat1/0/'.$types->id) }}">{{$types->type}} </a>{{ $types->beers_sortes->count() }} шт</br>	
					{!! Html::link(route('TypeEdit',['$types'=>$types->id]),$types->type)!!}{{' - редактировать'}} 
					<div style="margin-top: 10px;">
						{!! Form::open(['url'=>route('TypeEdit',['$types'=>$types->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}
				
							{{ method_field('DELETE') }}
							{!! Form::button('Удалить',['class'=>'btn btn-danger','type'=>'submit']) !!}
				
						{!! Form::close() !!}
					</div>	
				</div>
				<br>
			</li>	
			@endforeach
			
		</ol>
		
		@if($beer->count() > 0)
			<div><h3>Пиво</h3></div>
		@else
			<div><h3>Нет товаров</h3></div>	
		@endif
		<ol style="margin-top: 30px;">
			
			@foreach($beer as $beers)				
			<li style=" border: 4px  black; background: #BDBDBD; padding: 20px; margin: 15px 400px 0 0;">     
				<div>
					<span style="background-color: #D8D8D8">{{$beers->name}}</span></br>					
					@if($beers->description)
						{{$beers->description}}</br>
					@else
						Нет описания</br>					
					@endif
					<b>Производитель:</b> {{ $beers->manufacturer->manufacturer}}</br>					
					<b>Тип пива:</b> {{ $beers->type->type}}</br>
					{!! Html::link(route('BeersEdit',['$beers'=>$beers->id]),$beers->name)!!}{{' - редактировать'}}</br>
				</div>
					<div style="margin-top: 10px;">
						{!! Form::open(['url'=>route('BeersEdit',['$beers'=>$beers->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}
				
							{{ method_field('DELETE') }}
							{!! Form::button('Удалить',['class'=>'btn btn-danger','type'=>'submit']) !!}
				
						{!! Form::close() !!}
					</div>	
				<br>
			</li>	
			@endforeach
			
		</ol>
@endsection	