<html>
	<head>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

		<link rel="stylesheet" href="<?php echo e(URL::asset('static/css/style.css')); ?>">
	</head>
	<body>

		<header class="container">
			<div class="row">
				<div class="col-md-9">
					<a href="/">Home</a>|
					<?php if(!isset($user)): ?>
						<a href="<?php echo e(route('registration')); ?>">Registration</a>|<a href="<?php echo e(route('login')); ?>">Enter</a>
					<?php else: ?>
						<a href="<?php echo e(route('logout')); ?>">Log out</a>|<a href="<?php echo e(route('profile')); ?>">Profile: <?php echo e($user->name); ?></a>
					<?php endif; ?>
				</div>
				<div class="col-md-3">
					<?php if(isset($user)): ?>
					<a href="<?php echo e(route('cart')); ?>">Cart</a>
						<?php endif; ?>
				</div>
			</div>

		</header>
		<hr>
		<div class="content container">
			<?php echo $__env->yieldContent('content'); ?>
		</div>
		<footer class="container">
			<hr></footer>
		<script
				src="https://code.jquery.com/jquery-3.2.1.min.js"
				integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
				crossorigin="anonymous"></script>
		<script src="<?php echo e(URL::asset('static/js/script.js')); ?>"></script>
	</body>
</html>