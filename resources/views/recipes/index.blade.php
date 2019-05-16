@extends('layouts.app')

@section('content')
<div class="container">
	<div class="">
	  	<h1 class="text-center">Deine Rezepte</h1>
	  	<div class="text-right">
	  		<a href="recipes/create"><i class="fas fa-plus-square fa-2x"></i></a>
		</div>
	</div>
	
    <div class="row">
    	@foreach($recipes as $recipe)
		<div class="col-sm-6 col-md-4">
			<div class="thumbnail">
				<div class="caption">
					{{-- {{dd($recipe->getImage())}} --}}
					<img src="{{$recipe->getImage()}}" style="max-width:330px">
					<h3>{{ $recipe->name}}</h3>
					<p><i class="fas fa-clock"></i> {{ $recipe->totalPreparationtime()}} Insgesamt</p>
					<p><i class="fas fa-clock"></i> {{ $recipe->preparationtime}} Zubereitung</p>
					<p><i class="fas fa-clock"></i> {{ $recipe->resttime}} Ruhezeit</p>
					<p><i class="fas fa-clock"></i> {{ $recipe->bakingtime}} Backzeit</p>
					@foreach($recipe->equipments as $equipment)
						{{ $equipment->name}}, 
					@endforeach
					@foreach($recipe->tags as $tag)
						<p><i class="fas fa-tag"></i> {{ $tag->name}} </p>
					@endforeach
					<p><a href="/recipes/{{$recipe->id}}" class="btn btn-primary" role="button">Make me!</a></p>
				</div>
			</div>
		</div>
		@endforeach
	</div>
@endsection	