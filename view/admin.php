<?php
require_once('session.php');
require 'partials/header.php';
require_once('../model/User.class.php');

$user = new User();
$u_details = $user->getUser($_SESSION['id']);

require 'partials/navbar_admin.php';
?>


<div class="container-fluid">
	<div class="d-flex justify-content-center">
		<button class="btn btn-success" id="add_user_btn">Add User</button>
	</div>
	<?php
		if($u_details['w_type'] == "Super User")
		{
	?>
	<h1><a href="./main.php"><i class="fa fa-chevron-circle-left"></i></a></h1>
	<?php
		}
	?>


	<div id="status" class="m-l-100"></div>
	<div id="add_user_container" class="container">
			<h1>Add user</h1>
		<form method="POST" action="">
			<input type="name" class="form-control" id="fname" placeholder="First name"><br>
			<input type="name" class="form-control" id="lname" placeholder="Last name"><br>
			<input type="email" class="form-control" id="email" placeholder="email address"><br>
			<input type="number" class="form-control" id="cell_number" placeholder="cell number"><br>
			<select id="position" class="form-control"><br>
				<option value="">User type</option>
				<option value="Admin">Admin</option>
				<option value="Preparer">Preparer</option>
				<option value="Super User">Super User</option>
			</select><br>
			<input type="password" class="form-control" id="password" placeholder="password"><br>
			<input type="password" class="form-control" id="verify_password" placeholder="Verify password"><br>
			<button class="btn btn-info" id="add_user">Submit user details</button>
		</form>
	</div>

	<table class="table mt-5">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">First name</th>
	      <th scope="col">Last name</th>
	      <th scope="col"><i class="fa fa-user"> User</i></th>
	      <th scope="col"><i class="fa fa-at"></i> address</th>
	      <th scope="col"><i class="fa fa-clock-o"> created</i></th>
	      <th scope="col"><i class="fa fa-user"> status</th>
		  <th scope="col"><i class="fa fa-clock-o"> Logs</th>
	      <th scope="col"><i class="fa fa-status"> Action</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php

	  		$ws = $user->getUsers();
	  		$count = 0;
	  		foreach($ws as $w)
	  		{
	  			if($_SESSION['id'] != $w['w_id'])
	  			{

	  	?>
	    <tr>
	      <th scope="row"><?php print(++$count);?></th>
	      <td><?php print($w['w_fname']);?></td>
	      <td><?php print($w['w_lfname']);?></td>
	      <td><?php print($w['w_type']);?></td>
	      <td><?php print($w['w_email']);?></td>
	      <td><?php print($w['w_datecreated']);?></td>

	      <td><?php
	      	if($w['w_active_status'] == 1)
	      	{

	      		print("<i class='font-bold text-success  fa fa-circle'> </i>");
	      	}

	      	if($w['w_active_status'] == 0)
	      	{

	      		print("<i class='font-bold text-danger  fa fa-circle'> </i>");
	      	}

	      ?></td>
	      <td>
	      <?php
	      	$logs = $user->get_logs($w['w_id']);

	      	if(count($logs) > 0)
	      	{
	      ?>
	      	<a class="btn btn-outline-dark" href="logs.php?w_id=<?php print($w['w_id']);?>">view logs</a>
	      <?php
	      	}else
	      	{
	      ?>
	      	<span class="font-italic text-muted">No logs</span>
	      <?php
	  		}
	      ?>
		  </td>
		  <?php 
		 	if($w['w_type'] !== "Admin") {
		  ?>
			<td><button class="btn btn-info">Edit</button>
				<button class="btn btn-danger" onclick="delete_user(<?php print($w['w_id']);?>);">Delete</button>
			</td>
		  <?php	 
			 } 
		  ?>

	    </tr>
	  	<?php
	  			}
	  		}
	  	?>

	  </tbody>
	</table>
</div>
<?php require 'partials/footer.php';?>
