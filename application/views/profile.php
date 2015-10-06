<?php
// var_dump($user);
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?= $user['name'] ?></title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<style>
		.brand-logo {
			margin-left: 20px;
		}
		.container {
			margin-top: 50px;
		}
		</style>
	</head>
	<body>
		<nav>
		    <div class="nav-wrapper green darken-1">
		      <a href="../" class="brand-logo"><?= $user['alias'] ?></a>
		      <ul id="nav-mobile" class="right hide-on-med-and-down">
		        <li><a href="/">Home</a></li>
		        <li><a href="../logout">Logout</a></li>
		      </ul>
		    </div>
		 </nav>
		<div class="container">
			<h3><?= $user['name'] ?>'s Profile</h3>
			<h5>Name: <?= $user['name'] ?></h5>
			<h5>Email Address: <?= $user['email'] ?></h5>
		</div>
	</body>
</html>
