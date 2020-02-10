<?php 
require_once('session.php');
include 'partials/header.php';
require_once('../model/User.class.php');
$user = new User();
$u_details = $user->getUser($_SESSION['id']);

?>

<div class="container">
	<a href="main.php"><i class="fa fa-home fa-5x"></i></a>		
</div>

<div class="container">
	<div class="row d-flex justify-content-center p-5">
		<div class="col-md-6 border">
			<div class="row justify-content-center">
				<div>
					<img src="../public/img/user-png-icon-15.jpg">
				</div>
				
				<div class="m-2">
					<form>
						<div class="show_first">
							First name : <?php print($u_details['w_fname']); ?>
						</div>	
						<div class="hide_first mb-3">
							<label>First name </label>
							<input type="name" id="fname" class="form-control" value="<?php print($u_details['w_fname']); ?>">								
						</div>
						<div class="show_first mb-3">
							Last name : <?php print($u_details['w_lfname']); ?>
						</div>
						<div class="hide_first mb-3">
							<label>Last name </label>
							<input type="name" id="lname" class="form-control" value="<?php print($u_details['w_lfname']); ?>">	
						</div>
						<div class="show_first">
							Email : <?php print($u_details['w_email']); ?>
						</div>	
						<div class="hide_first mb-3">
							<label>Email address </label>
							<input type="email" id="email" class="form-control" value="<?php print($u_details['w_email']); ?>">	
						</div>				
						<div class="show_first">
							Position : <?php print($u_details['w_type']); ?>
						</div>	
						<div class="show_first">
							Date appointed : <?php print($u_details['w_datecreated']); ?>
						</div>
						<div class="hide_first mb-3 mt-2">
							<label>Old Password </label>
							<input type="password" id="old_password" class="form-control" value="" placeholder="old password">	
						</div>
						<div class="hide_first mb-3">
							<label>Password </label>
							<input type="password" id="password" class="form-control" value="" placeholder="password">	
						</div>
						<div class="hide_first mb-3">
							<label>verify password </label>
							<input type="name" id="verify_password" class="form-control" value="" placeholder="verify password">	
						</div>
						<div class="hide_first">
							<div class="mb-3 d-flex justify-content-center">
								<button class="btn btn-success mr-1" id="edit_user">Save</button>
								<button class="btn btn-danger ml-1" id="cancel_edit">Cancel</button>			
							</div>
						</div>
					</form>

					<div class="show_first">
						<div class="d-flex justify-content-center ">
							<button class="btn btn-info" id="user-edit">edit</button>
						</div>
					</div>
					
				</div>
				
			</div>

		</div>	
	</div>

	
</div>

<?php
include 'partials/footer.php';
?>
