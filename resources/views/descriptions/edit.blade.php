@extends('layouts.app')

@section('content')
<div class="container">
	<div class="">
	  	<h1 class="text-center">Anleitung editieren</h1>
	</div>
	<div class="row">
		<div class="col-md-offset-3 col-xs-12 col-md-6">
			<div class="panel panel-primary">
				<div class="panel-body">
					@include('layouts.session')
					@include('layouts.error')
				<form method="POST" enctype="multipart/form-data" action="/descriptions/{{$description->id}}" role="form" novalidate>	
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
                        <div class="form-group">
		                  	<label for="descriptionnumber">Anleitungs schrit nummer: </label>
		                  	<input type="text" class="form-control" id="descriptionnumber" name="descriptionnumber" value="{{$description->descriptionnumber}}">
		                </div>
						<div class="form-group">
		                  	<label for="description">Anleitungsschritt</label>
		                  	<input type="text" class="form-control" id="description" name="description" value="{{$description->description}}">
		                </div>
		                <div class="text-right">
		                	<input type="submit" value="Update" class="btn btn-primary"></input>
		                </div>
	                </form>
				</div>
			</div>
			<div class="box-footer ">
				<a href="/recipes/{{$description->recipe_id}}" class="btn btn-primary">Zurück</a>
			</div>
		</div>
	</div>
</div>
@endsection