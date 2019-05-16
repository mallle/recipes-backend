@extends('layouts.app')

@section('content')
<div class="container">
	<div class="">
	  	<h1 class="text-center">Utensilien für deine Rezepte</h1>
	</div>
	@include('layouts.session')
	@include('layouts.error')
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6">
			<div class="panel panel-primary">
				  <div class="panel-heading">
				    <h3 class="panel-title">Neue Utensil hinzufügen</h3>
				  </div>
				<div class="panel-body">
					<form method="POST" enctype="multipart/form-data" action="{{ route('equipments.store')}}" role="form" novalidate>	
						{{ csrf_field() }}
						
		                <div class="form-group">
		                  	<input type="text" class="form-control" id="name" name="name" placeholder="Untensiel">
		                </div>
						<div class="box-footer text-right">
							<button type="submit" class="btn btn-primary">Hinzufügen</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6">
			<div class="panel panel-primary">
				  <div class="panel-heading">
				    <h3 class="panel-title">Alle verfügbare Utensilien</h3>
				  </div>
				<table class="table">
					@foreach($equipments as $equipment)
						<tr>
							<td>{{ $equipment->name }}</td>
							<td><a href="/equipments/{{$equipment->id}}/edit" class="btn"><i class="fas fa-edit"></i></a></td>
							<td>
								<form method="POST" enctype="multipart/form-data" action="/equipments/{{$equipment->id}}" role="form" novalidate>	
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