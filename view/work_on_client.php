<?php require_once('session.php');
require 'partials/header.php';
require_once('../model/User.class.php');
require_once('../model/Work.class.php');

$user = new User();
$work = new Work();
$u_details = $user->getUser($_SESSION['id']);

include 'partials/navbar_worker.php';

?>

<?php if(isset($_GET['client_id']))
{
?>

<style type="text/css">
textarea, input {
  padding:10px;
	font-family: FontAwesome, "Open Sans", Verdana, sans-serif;
    font-style: normal;
    font-weight: normal;
    text-decoration: inherit;
}
</style>
<div class="container">
	<h3 class="font-weight-bold mb-4 text-center  p-4 mr-5" style="font-family: Verdana;">Personal / Company details</h3>
	<div class="row " id="identification">
		<?php include 'identfication_details.php';?> <!-- identification details, view and adit -->


<!-- =======================================================================================================
============================================= JURISTIC PERSON =================================================
 ===========================================================================================================-->
	<?php
		if($client_identification['client_person'] == "Juristic")
		{
     	  $juristic = array();
     	  $juristic = $work->get_juristic($_GET['client_id']);

	  	if(count($juristic) > 0)
	  	{
		  	include 'juristic.php';
		    include 'company_member.php';
		  	include 'stake_holder.php';
	?>
	</div>
</div>
<?php

            if(count($members) > 0)
            {
		  	include 'documents.php';
                if(count($docs) >= 7)
                {
                  include 'ideas.php';
                }
            }

	  	}else
	  	{

	  ?>

    <div class="card ml-5" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title font-weight-bold">Person</h5><hr>
            <p class="card-text">
                <div id="j_status" class="ml-0"></div>
                <div class="row ml-0 badge badge-success">
                    <?php print($client_identification['client_person']." :");?>
                </div>

                <div class="m-1">
                    <form method="POST" action="">
                        <input type="hidden" class="form-control mb-3" id="client_id" value="<?php print($_GET['client_id'])?>">
                        <input type="name" class="form-control mb-3" id="company_name" placeholder="company name">
                        <br>
                        <label>Registration date</label>
                        <input type="date" class="form-control mb-3" id="registration_date" placeholder="registration date">
                        <input type="name" class="form-control mb-3" id="registration_number" placeholder="registration number">
                        <button class="btn btn-success float-right" id="add_juristic">Save</button>
                    </form>
                </div>
            </p>
        </div>
    </div>

 	  <?php
 	  	}
 	  ?>
<!-- =======================================================================================================
============================================= NATURAL PERSON=================================================
 ===========================================================================================================-->
     <?php
		}else
		{

	 	  $natural = $work->get_natural($_GET['client_id']);
	 	  if($natural != null)
	 	  {
	 	  	include 'natural.php';
	 	  }else
	 	  {
	 ?>
	<div class="card ml-5 border-success" style="width: 18rem;">
	  <div class="card-body">
	    <h4 class="card-title" style="font-family: 'prataregular', Serif; font-style: italic; ">Person </h4><hr class="border-success">
	    <p class="card-text">
	      <div id="n_status" class="ml-0"></div>
     	  <div class="row ml-0 badge badge-success">
     	  	<?php print($client_identification['client_person']." :");?>
     	  </div>
     	  <div class="m-1 ">
     	  	<form method="POST" action="">
     	  		<input type="hidden" class="form-control mb-3" id="client_id__" value="<?php print($_GET['client_id'])?>">
     	  		<input type="name" class="form-control mb-3" id="fname__" value="<?php print($client_identification['client_fname']);?>" disabled>
     	  		<input type="name" class="form-control mb-3" id="lname__" value="<?php print($client_identification['client_lname']);?>" disabled>
     	  		<input type="name" class="form-control mb-3" id="mname__" placeholder="Middle name">
                <label class="font-italic">Date of birth: </label>
     	  		<input type="date" class="form-control mb-3" id="dob__" placeholder="Date of Birth">
     	  		<input type="name" class="form-control mb-3" id="id_number__" placeholder="ID number">
     	  		<select class="form-control mb-3" id="marital_status">
     	  			<option value="">Marital Status</option>
     	  			<option value="Married">Married</option>
     	  			<option value="Single">Single</option>
     	  		</select>
     	  		<select class="form-control mb-3" id="marriage_type">
     	  			<option value="">Marriage type</option>
     	  			<option value="Civil">Civil</option>
     	  			<option value="Customary">Customary</option>
     	  		</select>
     	  		<button class="btn btn-success float-right" id="add_natural">Save</button>
     	  	</form>
     	  </div>
     	</p>
     </div>
   </div>
		    	 <?php
		    	 	  }
		    		}
		    	?>
	</div>





<?php

} //if(isset($_GET['client_id']))
require 'partials/footer.php';
?>
