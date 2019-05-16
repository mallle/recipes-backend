@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		@include('layouts.session')
		@include('layouts.error')
		<form method="POST" enctype="multipart/form-data" action="/recipes/{{$recipe->id}}" role="form" novalidate>	
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
        <div class="form-group">
            <label for="name">Name des Rezepts</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$recipe->name}}">
        </div>
        <div class="form-group">
            <label for="persons">Anzahl Person</label>
            <input type="text" class="form-control" id="persons" name="persons" value="{{$recipe->persons}}">
        </div>
        <div class="form-group">
            <label for="preparationtime">Minuten: Zubereitung</label>
            <input type="text" class="form-control" id="preparationtime" name="preparationtime" value="{{$recipe->preparationtime}}">
        </div>
        <div class="form-group">
            <label for="bakingtime">Minuten: Backzeit</label>
            <input type="text" class="form-control" id="bakingtime" name="bakingtime" value="{{$recipe->bakingtime}}">
        </div>
        <div class="form-group">
            <label for="resttime">Minuten: Ruhezeit</label>
            <input type="text" class="form-control" id="resttime" name="resttime" value="{{$recipe->resttime}}">
        </div>
        <div class="form-group">
          <label for="effort">Aufwand auswählen</label>
          <select name="effort" id="effort" class="form-control" value="{{$recipe->effort}}">
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
    			<ul class="list-inline">
            <li>          
              <div class="box-footer text-left">
                <a href="/recipes/{{$recipe->id}}" class="btn btn-primary">zurück</a>
              </div>
            </li>
            <li>
              <div class="box-footer text-right">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </li>
          </ul>
    		</div>
		</form>

@endsection	