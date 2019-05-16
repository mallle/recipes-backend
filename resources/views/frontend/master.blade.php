<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Meine Rezepte</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
		<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	</head>
	<body>
	<div id="app">
		@include ('frontend.header')

		<section class="section">
			<div class="container">
				<router-view></router-view>
			</div>
		</section>
	</div>

    <!-- Scripts -->
	<script src="{{ mix('js/recipes.js') }}"></script>

	</body>
</html>




