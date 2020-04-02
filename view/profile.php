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
				
				<div class="m-2">
					<form>
						<div class="mb-3 mt-2">
							<input type="password" id="old_password" class="form-control" value="" placeholder="old password">	
						</div>
						<div class="mb-3">
							<input type="password" id="password" class="form-control" value="" placeholder="new password">	
						</div>
						<div class="mb-3">
							<input type="name" id="verify_password" class="form-control" value="" placeholder="verify password">	
						</div>
						<div class="mb-3 d-flex justify-content-center">
							<button class="btn btn-success mr-1" id="edit_user">Save</button>			
						</div>
					</form>
					
				</div>
				
			</div>

		</div>	
	</div>

	
</div>

<?php
include 'partials/footer.php';
?>
