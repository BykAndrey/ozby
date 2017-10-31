<html>
	<head>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

		<link rel="stylesheet" href="{{URL::asset('static/css/style.css')}}">
	</head>
	<body>

		<header class="container">
			<div class="row">
				<div class="col-md-9">
					<a href="/">Home</a>|
					@if(!isset($user))
						<a href="{{route('registration')}}">Registration</a>|<a href="{{route('login')}}">Enter</a>
					@else
						<a href="{{route('logout')}}">Log out</a>|<a href="{{route('profile')}}">Profile: {{$user->name}}</a>
					@endif
				</div>
				<div class="col-md-3">
					@if(isset($user))
					<a href="{{route('cart')}}">Cart</a>
						@endif
				</div>
			</div>

		</header>
		<hr>
		<div class="content container">
			@yield('content')
		</div>
		<footer class="container">
			<hr></footer>
		<script
				src="https://code.jquery.com/jquery-3.2.1.min.js"
				integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
				crossorigin="anonymous"></script>
		<script src="{{URL::asset('static/js/script.js')}}"></script>
	</body>
</html>