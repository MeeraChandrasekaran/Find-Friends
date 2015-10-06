<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<style>
		p {
			color: red;
		}
		h5 {
			color: #4caf50;
		}
		</style>
	</head>
	<body>
		<div class="container">
			<h3>Welcome!</h3>
			<?php if ($this->session->Flashdata('errors')) {
					echo $this->session->Flashdata('errors');
				  }
			?>
			<div class="row">
				<div class="col s6">
					<h4>Register</h4>
					<form class="col s12" method="post" action="friends/register">
					  <div class="row">
						<div class="input-field col s6">
						  <input id="name" type="text" class="validate" name="name">
						  <label for="name">Name</label>
						</div>
						<div class="input-field col s6">
						  <input id="alias" type="text" class="validate" name="alias">
						  <label for="alias">Alias</label>
						</div>
					  </div>
					  <div class="row">
						<div class="input-field col s12">
						  <input id="email" type="email" class="validate" name="email">
						  <label for="email">Email</label>
						</div>
					  </div>
					  <div class="row">
						<div class="input-field col s12">
						  <input id="password" type="password" class="validate" name="password">
						  <label for="password">Password</label>
						</div>
						<h6>*Password should be at lest 8 characters</h6>
					  </div>
					  <div class="row">
						<div class="input-field col s12">
						  <input id="password" type="password" class="validate" name="password_confirm">
						  <label for="password_confirm">Confirm Password</label>
						</div>
					  </div>
					  <div class="row">
					  <div class="input-field col s12">
						<input type="date" class="datepicker" name="birth_date">
					  </div>
					</div>
					  <button class="btn waves-effect waves-light blue" type="submit" name="action">Submit
						 <i class="material-icons">send</i>
					   </button>
					</form>
				</div>
				<div class="col s6">
					<h4>Login</h4>
					<form class="col s12" method="post" action="friends/login">
					  <div class="row">
						<div class="input-field col s12">
						  <input id="email" type="email" class="validate" name="email">
						  <label for="email">Email</label>
						</div>
					  </div>
					  <div class="row">
						<div class="input-field col s12">
						  <input id="password" type="password" class="validate" name="password">
						  <label for="password">Password</label>
						</div>
					  </div>
					  <button class="btn waves-effect waves-light blue" type="submit" name="action">Submit
						<i class="material-icons">perm_identity</i>
					  </button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
