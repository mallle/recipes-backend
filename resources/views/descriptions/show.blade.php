@extends('layouts.app')

@section('content')
<div class="container">
	<div class="">
	  	<h1 class="text-center">{{$description->descriptionnumber}}. Schritt: {{$description->description}}</h1>
	</div>
	@include('layouts.session')
	@include('layouts.error')
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6">
			<div class="panel panel-primary">
				  <div class="panel-heading">
				    <h3 class="panel-title">Neue Zutaten zur Handlungsschritt hinzufügen</h3>
				  </div>
				<div class="panel-body">
					<form method="POST" enctype="multipart/form-data" action="/descriptions/{{ $description->id }}/attach_ingredient" role="form" novalidate>  
	                    {{ csrf_field() }}
	                    {{ method_field('POST') }}
					<div class="form-group">
						<select name="ingredient_id">
							<option selected disabled>Wähle Ingredients</option>
							@foreach($recipe->ingredients as $ingredient)
								<option value="{{$ingredient->id}},{{$ingredient->pivot->type}}">{{$ingredient->name}} max {{App\RecipeIngredients::amountPersons($ingredient->pivot->amount, $description->recipe->id)}} @include('layouts.ingredient-type')
								</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
	                  	<label for="amount">Mänge</label>
	                  	<input type="text" class="form-control" id="amount" name="amount">
	                </div>
	                <input type="submit" value="Hinzufügen" class="btn btn-primary"></input>
	            </form>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6">
			<div class="panel panel-primary">
				  <div class="panel-heading">
				    <h3 class="panel-title">Alle hinzugefügte Zutaten für dieser Handlungsschritt</h3>
				  </div>
				<table class="table">
					@foreach($description->ingredients as $ingredient)
						<tr>
							<td>{{ $ingredient->name }}</td>
							<td>{{ $ingredient->pivot->amount}}
 
								@if($ingredient->pivot->type === App\RecipeIngredients::TYPE_GRAMM)
									Gramm
									@elseif($ingredient->pivot->type === App\RecipeIngredients::TYPE_STÜCK)
									Stück
									@elseif($ingredient->pivot->type === App\RecipeIngredients::TYPE_TEELÖFFEL)
									Teelöffel
									@elseif($ingredient->pivot->type === App\RecipeIngredients::TYPE_ESSLÖFFEL)
									Esslöffel
									@elseif($ingredient->pivot->type === App\RecipeIngredients::TYPE_LITER)
									Liter
									@elseif($ingredient->pivot->type === App\RecipeIngredients::TYPE_DECILITER)
									Deciliter
									@elseif($ingredient->pivot->type === App\RecipeIngredients::TYPE_MILLILITER)
									Milliliter
									@elseif($ingredient->pivot->type === App\RecipeIngredients::TYPE_PACKUNG)
									Packung
									@elseif($ingredient->pivot->type === App\RecipeIngredients::TYPE_SCHEIBE)
									Scheibe
									@endif
							</td>
							<td>
								<form method="POST" enctype="multipart/form-data" action="/descriptions/{{$description->id}}/detach_ingredient/{{$ingredient->id}}" role="form" novalidate>	
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button type="submit" class="btn"><i class="fas fa-trash-alt"></i></button>
								</form>
							</td>
						</tr>
					@endforeach	
				</table>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6">
			<div class="panel panel-primary">
				  <div class="panel-heading">
				    <h3 class="panel-title">Neue Untentilien zur Handlungsschritt hinzufügen</h3>
				  </div>
				<div class="panel-body">
					<form method="POST" enctype="multipart/form-data" action="/descriptions/{{ $description->id }}/attach_equipment" role="form" novalidate>  
	                    {{ csrf_field() }}
	                    {{ method_field('POST') }}
					<div class="form-group">
						<select name="equipment_id">
							<option selected disabled>Wähle Untentilien</option>
							@foreach($recipe->equipments as $equipment)
								<option value="{{$equipment->id}}">{{$equipment->name}}</option>
							@endforeach
						</select>
					</div>
	                <input type="submit" value="Hinzufügen" class="btn btn-primary"></input>
	            </form>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6">
			<div class="panel panel-primary">
				  <div class="panel-heading">
				    <h3 class="panel-title">Alle hinzugefügte Untenzilien für dieser Handlungsschritt</h3>
				  </div>
				<table class="table">
					@foreach($description->equipments as $equipment)
						<tr>
							<td>{{ $equipment->name }}</td>
							<td>
								<form method="POST" enctype="multipart/form-data" action="/descriptions/{{$description->id}}/detach_equipment/{{$equipment->id}}" role="form" novalidate>	
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button type="submit" class="btn"><i class="fas fa-trash-alt"></i></button>
								</form>
							</td>
						</tr>
					@endforeach	
				</table>
			</div>
		</div>
	</div>
</div>
@endsection