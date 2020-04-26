<?php require_once('session.php');
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="author" content="Some Code pty ltd">
   <link rel="shortcut icon" href="../public/img/Logo/kunokharK.ico">
   <title>Kunokhar ctp (pty) Ltd</title>
   <link rel="stylesheet" type="text/css" href="../public/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="../public/css/font-awesome/css/font-awesome.css">
   <link rel="stylesheet" type="text/css" href="../public/css/w3.css">
   <link rel="stylesheet" type="text/css" href="../public/css/style.css">
</head>
<body class="bg-work">
<?php include 'partials/navbar_worker.php';?>

<div class="work-content">
<div id="snackbar"></div>
  	<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="POST" action="">
  	      	<div class="modal-header">
  	        	<h4 class="font-weight-bold" style="text-align: center; margin: 0;">Client Basic Information</h4>
  	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  	          		<span aria-hidden="true">&times;</span>
  	        	</button>
  	      	</div>

  	      	<div id="status" class="ml-4 mr-4 mt-2 mb-2">

  	      	</div>

  	      <div class="modal-body mx-3">
  	        <div class="md-form mb-2 row">
  	        	<div class="col-sm-12 mb-2">
	  		        <select class="form-control" id="person">
	  		        	<option selected disabled>- Select Registrar -</option>
	  		        	<option value="Juristic">Juristic</option>
	  		          	<option value="Natural">Natural</option>
	  		        </select>
	  	        </div>
  				<div class="col-sm-6">
  					<select class="form-control" id="title">
  						<option disabled selected>- Select Title -</option>
  						<option>Mr</option>
						<option>Ms</option>
  						<option>Mrs</option>
  						<option>Dr.</option>
  						<option>Prof.</option>
  					</select>
  	      		</div>
  	      		<div class="col-sm-6">
  					<input type="name" id="initials" class="form-control validate" placeholder="Initial(s)">
  	      		</div>
  	        </div>

  	        <div class="md-form mb-2 row">
  	          	<div class="col-sm-6">
  	          		<input type="name" id="fname" class="form-control validate" placeholder="First Name">
  	          	</div>
  	          	<div class="col-sm-6">
  		          	<input type="name" id="lname" class="form-control validate" placeholder="Last Name">
  	          	</div>
  	        </div>

  	        <div class="md-form mb-2 row">
  	        	<div class="col-sm-6">
  					<input type="email" id="email" class="form-control validate" placeholder="Email">
  				</div>
  				<div class="col-sm-6">
  					<input type="number" id="cell_number" class="form-control validate" placeholder="Cell Number">
  				</div>
  	        </div>

  	        <h3 style="font-size: 18px; font-weight: 700;">Residential Address</h3>
  	        <div class="md-form mb-3 row">
  	          	<div class="col-sm-12 mb-2">
  		          	<input type="name" id="home_address" class="form-control validate" placeholder="Street Name">
  		      	</div>
  		      	<div class="col-sm-12 mb-2">
  		          	<input type="name" id="city" class="form-control validate" placeholder="City">
  		      	</div>
  		      	<div class="col-sm-12 mb-2">
  		          	<input type="number" id="zip_code" class="form-control validate" placeholder="Zip Code">
  	          	</div>
  	        </div>

  	      </div>
  	      <div class="modal-footer d-flex justify-content-center">
  	        <button class="btn btn-success" id="add_client">Save</button>
  	      </div>
  	    </form>
      </div>
    </div>
  </div>

  <div class="text-center pt-3">
    <a href="" class="btn btn-tomato-o btn-rounded" data-toggle="modal" data-target="#modalLoginForm">Add Client</a>
  </div>

	<div class="container">
		<div class="mb-0 ml-0 mr-4 d-flex align-items-baseline" id="search-zone">
			<div class="col-lg-6">
				<div class="d-flex py-5">
					<div class="d-flex mr-auto" id="person-type">
						<a href="" class=" text-tomato py-2 rounded mr-4 h5" @click="getClients()">Juristic</a>
						<a href="" class=" text-tomato px-1 py-2 rounded ml-4 h5" @click="getClients()">Natural</a>	
					</div>
					<div>
						<div class="input-group">
							<input type="month" min="2019-02" id="date-filter" max="<?php print(date("Y-m")); ?>" value="<?php print(date("Y-m")); ?>" aria-describedby="button-addon5" class="form-control border-tomato">
						</div>			
					</div>
				</div>
			</div>
			<div class="col-lg-6 ">
				<div class="pl-5 py-5">
					<form action="">
						<div class="input-group ">
							<input type="search" placeholder="Search person or company here..." aria-describedby="button-addon5" class="form-control border-tomato">
							<div class="input-group-append">
								<button id="button-addon5" type="submit" class="btn btn-tomato-o"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</form>
				</div>
			</div>
  		</div>
		<div class="row" id="view-all-clients">

		</div>
  </div>
</div>



<?php require 'partials/footer.php';?>
