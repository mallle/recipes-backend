@extends('layouts.app')

@section('content')
<div class="container">
	<div class="jumbotron">
	  	<h1 class="text-center">Tags für deine Rezepte</h1>
	</div>
	@include('layouts.session')
	@include('layouts.error')
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6">
			<div class="panel panel-primary">
				  <div class="panel-heading">
				    <h3 class="panel-title">Neue Tags hinzufügen</h3>
				  </div>
				<div class="panel-body">
					<form method="POST" enctype="multipart/form-data" action="{{ route('tags.store')}}" role="form" novalidate>	
							{{ csrf_field() }}
							{{-- {{ method_field('POST') }} --}}
		                <div class="form-group">
		                  	<label for="name">Name</label>
		                  	<input type="text" class="form-control" id="name" name="name" placeholder="Tagname">
		                </div>
						<div class="form-group">
							<select name="type" class="form-control">
							  <option>Kategorie</option>
							  <option>Zubereitung</option>
							  <option>Zeit</option>
							  <option>Fleisch</option>
							</select>
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
				    <h3 class="panel-title">Alle verfügbare Tags</h3>
				  </div>
				<table class="table">
					@foreach($tags as $tag)
						<tr>
							<td>
							@if( $tag->type == 1)
								<b>Kategorie:</b>
								{{ $tag->name }}
							@elseif( $tag->type == 2)
								<b>Zubereitung:</b>
								{{ $tag->name }}
							@elseif( $tag->type == 3)
								<b>Zeit</b>
								{{ $tag->name }}
							@elseif( $tag->type == 4)
								<b>Fleisch:</b>
								{{ $tag->name }}
							@endif
								
							</td>
							<td><a href="/tags/{{$tag->id}}/edit" class="btn"><i class="fas fa-edit"></i></a></td>
							<td>
								<form method="POST" enctype="multipart/form-data" action="/tags/{{$tag->id}}" role="form" novalidate>	
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
