<?php
// var_dump($this->session->all_userdata());
// var_dump($friends);
// echo "Other users";
// var_dump($other_users);
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Friends</title>
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
		.others {
			margin-top: 60px;
		}
		</style>
	</head>
	<body>
		<nav>
		    <div class="nav-wrapper green darken-1">
		      <a class="brand-logo">Hello, <?= $this->session->userdata('alias') ?>!</a>
		      <ul id="nav-mobile" class="right hide-on-med-and-down">
		        <li><a href="logout">Logout</a></li>
		      </ul>
		    </div>
		  </nav>
		<div class="container">
			<?php if ($friends) { ?>
					<h4>Here is the list of your friends:</h4>
			<?php } else {
				?>  <h4>You don't have any friends yet</h4><?php
			} ?>
			<table>
		        <thead>
		          <tr>
		              <th data-field="id">Alias</th>
		              <th data-field="name">Action</th>
		          </tr>
		        </thead>
		        <tbody>
				  <?php foreach ($friends as $friend) {
					  if ($friend['name'] == $this->session->userdata('name')) {
				?><tr>
						<td><?= $friend['friend_alias'] ?></td>
						<td><a class="waves-effect waves-light btn blue" href="user/<?= $friend['friend_id'] ?>">View Profile</a></td>
						<td>
							<form action="remove" method="post">
								<input type="hidden" name="remove" value="<?= $friend['friend_table_id'] ?>">
								  <button class="btn waves-effect waves-light red" type="submit" name="action">Remove as friend</button>
							</form>
						</td>
					</tr>
				 <?php } else {
					 ?><tr>
	 						<td><?= $friend['name'] ?></td>
	 						<td><a class="waves-effect waves-light btn blue" href="user/<?= $friend['id'] ?>">View Profile</a></td>
	 						<td>
								<form action="remove" method="post">
									<input type="hidden" name="remove" value="<?= $friend['friend_table_id'] ?>">
	 								  <button class="btn waves-effect waves-light red" type="submit" name="action">Remove as friend</button>
	 							</form>
	 						</td>
	 					</tr>
				<?php }
				} ?>
		        </tbody>
	       </table>
		   <div class="row others">
			   <h5>Other users not on your friend list:</h5>
			   <table>
				   <thead>
					 <tr>
						 <th data-field="id">Alias</th>
						 <th data-field="name">Action</th>
					 </tr>
				   </thead>
				   <tbody>
					   <?php foreach ($other_users as $other_user) {
					   	?><tr>
							<td><a href="user/<?= $other_user['id'] ?>"><?= $other_user['alias'] ?></a></td>
							<td>
								<form action="add_friend" method="post">
									<input type="hidden" name="to_add" value="<?= $other_user['id'] ?>">
									<input type="hidden" name="adding" value="<?= $this->session->userdata('id') ?>" >
									  <button class="btn waves-effect waves-light green" type="submit" name="action">Add as Friend</button>
								</form>
							</td>
						</tr>
					  <?php } ?>
				   </tbody>
				</table>
			</div>
		</div>
	</body>
</html>
