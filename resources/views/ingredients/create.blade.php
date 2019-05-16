@extends('layouts.app')

@section('content')
<div class="container">
	<div class="">
	  	<h1 class="text-center">Zutaten für deine Rezepte</h1>
	</div>
	@include('layouts.session')
	@include('layouts.error')
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6">
			<div class="panel panel-primary">
				  <div class="panel-heading">
				    <h3 class="panel-title">Neue Zutaten hinzufügen</h3>
				  </div>
				<div class="panel-body">
					<form method="POST" enctype="multipart/form-data" action="{{ route('ingredient.store')}}" role="form" novalidate>	
						{{ csrf_field() }}
						{{-- {{ method_field('POST') }} --}}
		                <div class="form-group">
		                  	<input type="text" class="form-control" id="name" name="name" placeholder="Zutat">
		                </div>
						<div class="box-footer text-right">
							<button type="submit" class="btn btn-primary">Add</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6">
			<div class="panel panel-primary">
				  <div class="panel-heading">
				    <h3 class="panel-title">Alle verfügbare Zutaten</h3>
				  </div>
				<table class="table">
					@foreach($ingredients as $ingredient)
						<tr>
							<td>{{ $ingredient->name }}</td>
							<td><a href="/ingredients/{{$ingredient->id}}/edit" class="btn"><i class="fas fa-edit"></i></a></td>
							<td>
								<form method="POST" enctype="multipart/form-data" action="/ingredients/{{$ingredient->id}}" role="form" novalidate>	
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