<div class="card ml-5 border-success" style="width: 20rem;">
  <div class="card-body p-0">
    <h4 class="card-title m-0">Beneficiaries <button data-toggle="modal" class="btn add-btn" data-target="#addBeneficiary"><i class="fa fa-plus"></i></button></h4>
    <div class="card-text">

 	  <div class="row ml-0">
	  <div class="row ml-0">
 	  	<div class="text-center d-flex justify-content-center">
 			
		</div>
			<div class="modal fade" id="addBeneficiary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
			  aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <form method="POST" action="">
				      <div class="modal-header text-center">
				        <h4 class="modal-title font-weight-bold">Beneficiary Information</h4>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div id="b_status" class="ml-4 mr-4 mt-2 mb-2">

				      </div>
				      <div class="modal-body mx-3">

				          <input type="hidden" id="client_id" value="<?php print($_GET['client_id']);?>" class="form-control validate">

				        <div class="md-form mb-3">
				          <input type="name" id="b_fname" class="form-control validate" placeholder="First Name">
				        </div>

				        <div class="md-form mb-3">
				          <input type="name" id="b_lname" class="form-control validate" placeholder="Last Name">
				        </div>

				        <div class="md-form mb-3">
				          <input type="name" id="b_id_number" class="form-control validate" placeholder="ID Number">
				        </div>

				      </div>
				      <div class="modal-footer d-flex justify-content-center">
				        <button class="btn btn-success" id="add_beneficiary">Save</button>
				      </div>
				    </form>
			    </div>
			  </div>
			</div>
 	  </div>

 	  </div>

 	  <div class=" ml-0">
 	  	<div id="beneficiary_status"></div>
 	  	<?php
 	  		$beneficiaries = $work->get_beneficiaries($_GET['client_id']);
 	  		if(count($beneficiaries) > 0)
 	  		{
 	  			foreach($beneficiaries as $beneficiary)
 	  			{
        ?>

           <div class="row">
             <div class="col-sm-2">
               <i class="fa fa-user text-success" style="font-size: 120%;"></i>
             </div>
             <div class="col-sm-10">
               <?php print($beneficiary['b_fname']." ".$beneficiary['b_lname']);?>
             </div>

           </div>

           <div class="row">
             <div class="col-sm-2">
               <i class="fa fa-info text-success" style="font-size: 120%;"></i>
             </div>
             <div class="col-sm-10">
               <?php print($beneficiary['b_id_number']); ?>
             </div>

           </div>

           <div class="row">
             <div class="col-sm-2">
               <i class="fa fa-calendar-plus-o text-success" style="font-size: 120%;"></i>
             </div>
             <div class="col-sm-10">
               <?php print($beneficiary['b_date_added']); ?>
             </div>

           </div>
 	  			<div class="float-left mt-1">
 	  				<a class="btn btn-outline-success" onclick="delete_beneficiary(<?php print($beneficiary['b_id']);?>)">Delete</a>
 	  				<a class="btn btn-outline-success" data-toggle="modal" data-target="#editBeneficiary<?php print($beneficiary['b_id']);?>">Edit</a>
 	  			</div>
			<div class="modal fade" id="editBeneficiary<?php print($beneficiary['b_id']);?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
			  aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <form method="POST" action="">
				      <div class="modal-header text-center">
				        <h4 class="modal-title font-weight-bold">Beneficiary Information</h4>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div id="b_status" class="ml-4 mr-4 mt-2 mb-2">

				      </div>
				      <div class="modal-body mx-3">


				        <div class="md-form mb-3">
				          <input type="name" placeholder="First Name" id="b_fname<?php print($beneficiary['b_id']);?>" class="form-control validate" value="<?php print($beneficiary['b_fname']);?>">
				        </div>

				        <div class="md-form mb-3">
				          <input type="name" placeholder="Last Name" id="b_lname<?php print($beneficiary['b_id']);?>" class="form-control validate" value="<?php print($beneficiary['b_lname']);?>">
				        </div>

				        <div class="md-form mb-3">
				          <input type="name" placeholder="ID Number" id="b_id_number<?php print($beneficiary['b_id']);?>" class="form-control validate" value="<?php print($beneficiary['b_id_number']);?>">
				        </div>

				      </div>
				    </form>
				      <div class="modal-footer d-flex justify-content-center">
				        <button class="btn btn-success" onclick="edit_beneficiary(<?php print($beneficiary['b_id']);?>)">Save</button>
				      </div>
			    </div>
			  </div>
			</div>
 	  		<?php
 	  			}
 	  		}

 	  	?>

 	  </div>
 	</div>
</div>
</div>