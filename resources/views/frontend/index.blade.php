@extends('frontend.master')

@section('content')

	<div id="app">


		<section class="section">
			<div class="container">
				<router-view></router-view>
			</div>
		</section>

	</div>




			  {{--<h1 class="title" v-for="recipe in recipes">--}}
			  	{{--<ul>--}}
			  		{{--<li>--}}
			  			{{--Rezept: @{{ recipe.name}}--}}
			  		{{--</li>--}}
			  		{{--<li>--}}
			  			{{--Personen: @{{ recipe.persons}}--}}
			  		{{--</li>--}}
			  		{{--<li>--}}
			  			{{--<img src=""> @{{ recipe.persons}}--}}
			  		{{--</li>--}}
			  		{{--<li v-for="description in recipe.descriptions">--}}
			  			{{--@{{ description.descriptionnumber }}. @{{ description.description}}--}}
			  		{{--</li>--}}
			  		{{--<li v-for="ingredient in recipe.ingredients">--}}
			  			{{--@{{ ingredient.name }} Amount:@{{ ingredient.amount}} @{{ingredient.type}}--}}
			  		{{--</li>--}}
			  		{{--<li v-for="tag in recipe.tags">--}}
			  			{{--@{{ tag.name }}--}}
			  		{{--</li>--}}

			  	{{--</ul>--}}

			  {{--</h1>--}}


@endsection