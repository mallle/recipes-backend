@extends('layouts.app')

@section('content')
<div class="container">
	<div class="jumbotron">
	  	<h1 class="text-center">Tag editieren</h1>
	</div>
	<div class="row">
		<div class="col-md-offset-3 col-xs-12 col-md-6">
			<div class="panel panel-primary">
				<div class="panel-body">
					@include('layouts.session')
					@include('layouts.error')
					<form method="POST" enctype="multipart/form-data" action="/tags/{{$tag->id}}" role="form" novalidate>	
							{{ csrf_field() }}
							{{ method_field('PATCH') }}
			            <div class="form-group">
			              	<label for="name">Tag</label>
			              	<input type="text" class="form-control" id="name" name="name" value="{{$tag->name}}">
			            </div>
						<div class="form-group">
							<select name="type" class="form-control" >
							  	<option>Kategorie</option>
							  	<option>Zubereitung</option>
							  	<option>Zeit</option>
							  	<option>Fleisch</option>
							</select>
						</div>
						<div class="box-footer text-right">
							<button type="submit" class="btn btn-primary">Edit</button>
						</div>
					</form>
				</div>
			</div>
			<div class="box-footer ">
				<a href="/tags" class="btn btn-primary">Zurück</a>
			</div>
		</div>
	</div>
</div>
@endsection