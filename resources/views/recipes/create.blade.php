@extends('layouts.app')

@section('content')
<div class="container">
  <div class="">
      <h1 class="text-center">Erstelle ein neuen Rezept</h1>
  </div>
		@include('layouts.session')
		@include('layouts.error')
		<form method="POST" enctype="multipart/form-data" action="{{ route('recipes.store')}}" role="form" novalidate>	
				{{ csrf_field() }}
				{{-- {{ method_field('POST') }} --}}
                <div class="form-group">
                  	<label for="name">Name des Rezepts</label>
                  	<input type="text" class="form-control" id="name" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                  	<label for="persons">Anzahl Person</label>
                  	<input type="text" class="form-control" id="persons" name="persons" placeholder="Anzahl Person">
                </div>
                <div class="form-group">
                  	<label for="preparationtime">Minuten: Zubereitung</label>
                  	<input type="text" class="form-control" id="preparationtime" name="preparationtime" placeholder="Minuten: Zubereitung">
                </div>
                <div class="form-group">
                    <label for="bakingtime">Minuten: Backzeit</label>
                    <input type="text" class="form-control" id="bakingtime" name="bakingtime" placeholder="Minuten: Backzeit ">
                </div>
                <div class="form-group">
                    <label for="resttime">Minuten: Ruhezeit</label>
                    <input type="text" class="form-control" id="resttime" name="resttime" placeholder="Minuten: Ruhezeit">
                </div>
                <div class="form-group">
                  <label for="effort">Aufwand auswählen</label>
                  <select name="effort" id="effort" class="form-control" >
                    <option>Einfach</option>
                    <option>Mittel</option>
                    <option>Aufwendig</option>
                  </select>
                </div>

                <div class="form-group">
                  	<label for="image">Photo</label>
                    <input type="file" id="image" name="image" lable="file">
                </div>
			<div class="box-footer text-right">
				<button type="submit" class="btn btn-primary">Hinzufügen</button>
			</div>
		</form>

@endsection	