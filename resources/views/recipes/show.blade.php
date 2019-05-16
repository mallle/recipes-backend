@extends('layouts.app')

@section('content')
<div class="container">
	<div class="jumbotron" style="background-image:url({{$recipe->getImage()}});">
	  	<h1 class="text-center">{{$recipe->name}}</h1>
	</div>


	@include('layouts.session')
	@include('layouts.error')
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6">
			
			<div class="panel panel-default">
				<div class="panel-body">

					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<p><i class="fas fa-users"></i> {{ $recipe->persons}}</p>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<ul class="list-inline text-right">
								<li><a href="/recipes/{{$recipe->id}}/edit" class="btn" ><i class="fas fa-edit"></i></a></li>
								<li>
									<form method="POST" enctype="multipart/form-data" action="/recipes/{{$recipe->id}}" role="form" novalidate>	
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<button type="submit" class="btn"><i class="fas fa-trash-alt"></i></button>
									</form>
								</li>
							</ul>
						</div>
					</div>
					<ul class="list-inline">
						<li>
							<p><i class="fas fa-clock"></i> {{ $recipe->totalPreparationtime()}} Insgesamt</p>
						</li>
						<li>
							<p class="recipe"><i class="fas fa-clock"></i> {{ $recipe->preparationtime}} Zubereitung</p>
						</li>
						<li>
							<p><i class="fas fa-clock"></i> {{ $recipe->resttime}} Ruhezeit</p>
						</li>
						<li>
							<p><i class="fas fa-clock"></i> {{ $recipe->bakingtime}} Backzeit</p>
						</li>
					</ul>
					<h4>Zutaten</h4>
					<table class="table">
						@foreach($recipe->ingredients as $ingredient)
						<tr>
							<td>
								{{$ingredient->name}}
							</td>
							<td>
								{{App\RecipeIngredients::amountPersons($ingredient->pivot->amount, $recipe->id)}} 
								@include('layouts.ingredient-type')
							</td>
							<td>
								<form method="POST" enctype="multipart/form-data" action="/recipes/{{$recipe->id}}/detach_ingredient/{{$ingredient->id}}" role="form" novalidate>	
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<button class="btn"><i class="fas fa-trash-alt"></i></button>
								</form>
							</td>
						</tr>
						@endforeach
					</table>
					<hr>
					<h4>Utensilien</h4>
					<table class="table">
						@foreach($recipe->equipments as $equipment)
						<tr>
							<td>
								<ul class="list-inline">
									<li>
										<i class="fas fa-tag"></i> {{$equipment->name}}
									</li>
									<li>
										<form method="POST" enctype="multipart/form-data" action="/recipes/{{$recipe->id}}/detach_equipment/{{$equipment->id}}" role="form" novalidate>	
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button class="btn"><i class="fas fa-trash-alt"></i></button>
										</form>
									</li>
								</ul>
							</td>
						</tr>
						@endforeach
					</table>
					<hr>
					<h4>Anleitung</h4>
					@foreach($descriptions as $description)
						<ul class="list-inline">
							<li><a href="/descriptions/{{$description->id}}">{{$description->descriptionnumber}}. {{ $description->description }}</a>
							</li>
							<li>
								<a href="/descriptions/{{$description->id}}/edit" class="btn" ><i class="fas fa-edit"></i></a>
							</li>
							<li>
								<form method="POST" enctype="multipart/form-data" action="/descriptions/{{$description->id}}" role="form" novalidate>	
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
									<button class="btn"><i class="fas fa-trash-alt"></i></button>
								</form>
							</li>
							@foreach($description->ingredients as $ingredient)
							<ul>
								<li>{{ $ingredient->name }} {{ $ingredient->pivot->amount}} @include('layouts.ingredient-type')

								</li>
							</ul>
							@endforeach
							@foreach($description->equipments as $equipment)
							<ul>
								<li>{{ $equipment->name }}</li>
							</ul>
							@endforeach
						</ul>
					@endforeach
					<hr>
					<h4>Tags</h4>
					<table class="table">
						@foreach($recipe->tags as $tag)
						<tr>
							<td>
								<ul class="list-inline">
									<li>
										<i class="fas fa-tag"></i> {{$tag->name}}
									</li>
									<li>
										<form method="POST" enctype="multipart/form-data" action="/recipes/{{$recipe->id}}/detach_tag/{{$tag->id}}" role="form" novalidate>	
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button class="btn"><i class="fas fa-trash-alt"></i></button>
										</form>
									</li>
								</ul>
							</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6">
			<div class="panel panel-primary">
				  <div class="panel-heading">
				    <h3 class="panel-title">Zutaten hinzufügen</h3>
				  </div>
				<div class="panel-body">
					<form method="POST" enctype="multipart/form-data" action="/recipes/{{ $recipe->id }}/attach_ingredient" role="form" novalidate>  
                            {{ csrf_field() }}
                            {{ method_field('POST') }}
                        <div class="form-group">
		                    <select name="ingredient_id">
		                        <option selected disabled>Wähle Ingredients</option>
		                        @foreach($ingredients as $ingedient)
		                            <option value="{{$ingedient->id}}">{{$ingedient->name}}</option>
		                        @endforeach
		                    </select>
	               		</div>
						<div class="form-group">
		                  	<label for="amount">Menge</label>
		                  	<input type="text" class="form-control" id="amount" name="amount" placeholder="Menge">
		                </div>
		                <div class="form-group">
							<select name="type" class="form-control">
								<option>Gramm</option>
								<option>Stück</option>
								<option>Teelöffel</option>
								<option>Esslöffel</option>
								<option>Liter</option>
								<option>Deciliter</option>
								<option>Milliliter</option>
								<option>Packung</option>
								<option>Scheibe</option>
							</select>
						</div>
	                    <input type="submit" value="Hinzufügen" class="btn btn-primary"></input>
	                </form>
		        </div>
			</div>
			<div class="panel panel-primary">
				  <div class="panel-heading">
				    <h3 class="panel-title">Utensilien hinzufügen</h3>
				  </div>
				<div class="panel-body">
					<form method="POST" enctype="multipart/form-data" action="/recipes/{{ $recipe->id }}/attach_equipment" role="form" novalidate>  
	                            {{ csrf_field() }}
	                            {{ method_field('POST') }}
			                <div class="form-group">
		                    <select name="equipment_id">
		                        <option selected disabled>Wähle untensilien</option>
		                        @foreach($equipments as $equipment)
		                            <option value="{{$equipment->id}}">{{$equipment->name}}</option>
		                        @endforeach
		                    </select>
	               		</div>
	                    <input type="submit" value="Hinzufügen" class="btn btn-primary"></input>
	                </form>
				</div>
			</div>
			<div class="panel panel-primary">
				  <div class="panel-heading">
				    <h3 class="panel-title">Anleitungs schritte hinzufügen</h3>
				  </div>
				<div class="panel-body">
					<form method="POST" enctype="multipart/form-data" action="/descriptions/store/{{ $recipe->id }}" role="form" novalidate>  
                            {{ csrf_field() }}
                            {{ method_field('POST') }}
                        <div class="form-group">
		                  	<label for="descriptionnumber">Anleitungs schrit nummer: </label>
		                  	<input type="text" class="form-control" id="descriptionnumber" name="descriptionnumber" placeholder="1, 2, 3...">
		                </div>
						<div class="form-group">
		                  	<label for="description">Anleitungsschritt</label>
		                  	<input type="text" class="form-control" id="description" name="description" placeholder="Salat wachen...">
		                </div>
	                    <input type="submit" value="Hinzufügen" class="btn btn-primary"></input>
	                </form>
		        </div>
			</div>
			<div class="panel panel-primary">
				  <div class="panel-heading">
				    <h3 class="panel-title">Tags hinzufügen</h3>
				  </div>
				<div class="panel-body">
					<form method="POST" enctype="multipart/form-data" action="/recipes/{{ $recipe->id }}/attach_tag" role="form" novalidate>  
	                            {{ csrf_field() }}
	                            {{ method_field('POST') }}
			                <div class="form-group">
		                    <select name="tag_id">
		                        <option selected disabled>Wähle Tags</option>
		                        @foreach($tags as $tag)
		                            <option value="{{$tag->id}}">{{$tag->name}}</option>
		                        @endforeach
		                    </select>
	               		</div>
	                    <input type="submit" value="Hinzufügen" class="btn btn-primary"></input>
	                </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection