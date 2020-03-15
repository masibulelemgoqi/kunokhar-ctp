
<div class="card ml-5 border-success" style="width: 18rem;">
  <div class="card-body p-0">
    <h4 class="card-title m-0">Person <button class="btn edit_btn" id="edit_natural" style="margin-left: 50%;">Edit</button></h4>

    <div class="card-text" id="natural_view">
 	  <div class="row ml-0 badge badge-success">
 	  	<?php print($client_identification['client_person']." :");?>
 	  </div>
 	  <div class="row ml-0">
 	  	<div>Middle name: <?php print(" ".$natural['n_middle_name']);?></div><br>
 	  	<div>DOB: <?php print(" ".$natural['n_dob']);?></div><br>
 	  	<div>ID number: <?php print(" ".$natural['n_id_number']);?></div><br>
 	  	<div>Marital status: <?php print(" ".$natural['n_marital_status']);?></div><br>
 	  	<?php
 	  		if($natural['n_marital_status'] == "Married")
 	  		{
 	  			print("<div>Marriage type:  ".$natural['n_marriage_type']."</div>");
 	  		}

 	  	?>
 	  </div>
 	</div>

    <div class="card-text" id="natural_edit">
 	  <div class="row ml-0 badge badge-success">
 	  	<?php print($client_identification['client_person']." :");?>
 	  </div>
 	  <div class="row">
 	  	<div id="ne_status"></div>
 	  	<form action="" method="POST">
 	  		<input type="hidden" id="ne_id" value="<?php print($natural['n_id']);?>">
	 	  	<div class="row m-2">
	 	  		<label>Middle name:</label>
	 	  		<input type="name" id="ne_middle_name" value="<?php print($natural['n_middle_name']);?>" class="form-control mb-2 border-success" placeholder="middle name">
	 	  	</div>
	 	  	<div class="row m-2">
	 	  		<label>DOB:</label>
	 	  		<input type="date" id="ne_dob" value="<?php print($natural['n_dob']);?>" class="form-control mb-2 border-success" >
	 	  	</div>
	 	  	<div class="row m-2">
	 	  		<label>ID number:</label>
	 	  		<input type="number" id="ne_id_number" value="<?php print($natural['n_id_number']);?>" class="form-control mb-2 border-success">
	 	  	</div>
	 	  	<div class="row m-2">
	 	  		<label>Marital status:</label>
	 	  		<select id="ne_marital_status" class="form-control mb-2 border-success">
	 	  			<option class="text-disabled" value="<?php print($natural['n_marital_status']);?>"><?php print($natural['n_marital_status']);?>
	 	  			(currently selected)
	 	  			</option>
	 	  			<option value="Single">Single</option>
	 	  			<option value="Married">Married</option>
	 	  		</select>
	 	  	</div>

	 	  	<div class="row m-2 m_type">
	 	  		<label>Marriage type:</label>
	 	  		<select id="ne_marriage_type" class="form-control mb-2 border-success">
	 	  			<option class="text-disabled" value="<?php print($natural['n_marriage_type']);?>"><?php print($natural['n_marriage_type']);?>
	 	  			(currently selected)
	 	  			</option>
	 	  			<option value="Civil">Civil</option>
	 	  			<option value="Customary">Customary</option>
	 	  		</select>
	 	  	</div>
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 9d2b03d475d9f1e5961d7b245107863cb43f627b
	 	  	<div class="m-2">
	 	  		<button class="btn btn-danger" id="cancel_edit_natural"> Cancel</button>
	 	  		<button class="btn btn-success" id="edit_natural_save">Save <i class="fa fa-save"></i></button>
	 	  	</div>
<<<<<<< HEAD
=======
=======
	 	  	<button class="btn btn-success" id="edit_natural_save">Save <i class="fa fa-save"></i></button>
>>>>>>> f90380ae94e8851013b239e31b41dfaa593fc006
>>>>>>> 9d2b03d475d9f1e5961d7b245107863cb43f627b
 	  	</form>
 	  </div>
 	</div>
</div>
</div>

<?php
	if($natural['n_marital_status'] == "Married")
	{
		if($natural['n_marriage_type'] == "Civil")
		{
?>




    <?php
    	$civil = $work->get_civil($natural['n_id']);
     if($civil != null)
     {
     ?>
<div class="card ml-5 border-success" style="width: 30rem;">
  <div class="card-body p-0">
    <h4 class="card-title" style="font-family: 'prataregular', Serif; font-style: italic; "> Civil Marriage <button class="btn edit_btn " id="view_edit_civil">edit</button> </h4>
    <div class="card-text">
      <div class="row m-0" id="civil_view_container">
        <div class="ml-3">
         	<div class="row">Spouse: </div>
         	<div class="row mt-2">first name: <?php print($civil['c_spouse_fname']);?></div>
         	<div class="row mt-2">Last name: <?php print($civil['c_spouse_lname']);?></div>
         	<div class="row mt-2">Id number: <?php print($civil['c_id_number']);?></div>
          <div class="row mt-2">Certificate #: <?php print($civil['c_certificate_number']);?></div>
          <div class="row mt-2">Date of issue: <?php print($civil['c_date_of_issue']);?></div>
         	<div class="row mt-2">Terms of marriage: <?php print($civil['c_marriage_terms']);?></div>
         	<div class="row mt-2">Detail of marriage: <?php print($civil['c_detail_of_marriage']);?></div>
         </div>
      </div>

      <div class="row m-0" id="civil_edit_container">
   	  	<div id="c_status"></div>
   	  	<form method="POST" action="">
   	  		<input type="hidden" id="spouse_id" value="<?php print($civil['c_id']);?>">
   	  		<div class="row mb-2">
            <div class="col-6">
   	  			     <input type="name" id="spouse_fname" placeholder="Spouse first name" class="form-control border-success" value="<?php print($civil['c_spouse_fname']);?>">
            </div>
            <div class="col-6">
   	  			     <input type="name" id="spouse_lname" placeholder="Spouse Last name" class="form-control border-success" value="<?php print($civil['c_spouse_lname']);?>">
            </div>
   	  		</div>
   	  		<div class="row m-0">
   	  			<input type="name" id="spouse_id_number" placeholder="Spouse Id number" class=" form-control mb-2 border-success" value="<?php print($civil['c_id_number']);?>">
   	  		</div>
  				<label><i>Date of issue:</i> </label>
   	  		<div class="row  mb-2">
          <div class="col-6">
  				      <input type="date" id="date_of_issue" placeholder="" class="form-control border-success" value="<?php print($civil['c_date_of_issue']);?>">
          </div>
          <div class="col-6">
  				      <input type="name" id="certificate_no" placeholder="certificate number" class="form-control border-success" value="<?php print($civil['c_certificate_number']);?>">
          </div>

   	  		</div>
   	  		<select class="form-control border-success" id="marriage_terms">
            <option value="<?php print($civil['c_marriage_terms']);?>"><?php print($civil['c_marriage_terms']);?>(currently selected marriage term)</option>
   	  			<option value="In-community">In-community</option>
   	  			<option value="Out-of-community">Out-of-community</option>
   	  		</select>
   	  		<label class="label mt-2 "><i>Detail of marriage: </i></label>
   	  		<textarea class="form-control mb-2 border-success" id="detail_of_marriage" style="height: 80px; resize: none;"><?php print($civil['c_detail_of_marriage']);?></textarea>
   	  		<div class="d-flex justify-content-center">
            <button class="btn btn-tomato" id="cancel_edit_civil"> Cancel</button>&nbsp;
   	  			<button class="btn btn-success" id="edit_civil"> Save</button>
   	  		</div>

   	  	</form>
   	  </div>

    </div>
   </div>
 </div>
     <?php

     }else
     {
     ?>
<div class="card border-success ml-5" style="width: 30rem;">
  <div class="card-body">
    <h4 class="card-title" style="font-family: 'prataregular', Serif; font-style: italic; "> Civil Marriage </h4><hr class="border-success">
    <div class="card-text">
   	  <div class="row m-0">
   	  	<div id="c_status"></div>
   	  	<form method="POST" action="">
   	  		<input type="hidden" id="natural_id" value="<?php print($natural['n_id']);?>">
   	  		<div class="row mb-2">
            <div class="col-6">
   	  			     <input type="name" id="spouse_fname" placeholder="Spouse first name" class="form-control border-success">
            </div>
            <div class="col-6">
   	  			     <input type="name" id="spouse_lname" placeholder="Spouse Last name" class="form-control border-success">
            </div>
   	  		</div>
   	  		<div class="row m-0">
   	  			<input type="name" id="spouse_id_number" placeholder="Spouse Id number" class=" form-control mb-2 border-success">
   	  		</div>
  				<label><i>Date of issue:</i> </label>
   	  		<div class="row  mb-2">
          <div class="col-6">
  				      <input type="date" id="date_of_issue" placeholder="" class="form-control border-success">
          </div>
          <div class="col-6">
  				      <input type="name" id="certificate_no" placeholder="certificate number" class="form-control border-success">
          </div>

   	  		</div>
   	  		<select class="form-control border-success" id="marriage_terms">
   	  			<option value="">Marriage terms</option>
   	  			<option value="In-community">In-community</option>
   	  			<option value="Out-of-community">Out-of-community</option>
   	  		</select>
   	  		<label class="label mt-2 "><i>Detail of marriage: </i></label>
   	  		<textarea class="form-control mb-2 border-success" id="detail_of_marriage" style="height: 80px; resize: none;"></textarea>
   	  		<div class="d-flex justify-content-center">
   	  			<button class="btn btn-success" id="add_civil"> Save</button>
   	  		</div>

   	  	</form>
   	  </div>
 	</div>
     <?php
     }
     ?>

</div>
</div>

<?php
		if($civil !== null)
		{
			include 'documents.php';
            if(count($docs) >= 2)
            {
              include 'ideas.php';
            }
		}
	}

	if($natural['n_marriage_type'] == "Customary")
	{
?>
<div class="card ml-5 border-success" style="width: 14rem;">
  <div class="card-body">
    <h4 class="card-title m-0"  style="font-family: 'prataregular', Serif; font-style: italic; ">Spouse(s)</h4><hr class="border-success">
    <p class="card-text">

 	  <div class="row ml-0">
	  <div class="row ml-0">
 	  	<div class="text-center">
 			<a href="" class="btn btn-success btn-rounded mb-4" data-toggle="modal" data-target="#addSpouse">Add spouse</a>
		</div>
			<div class="modal fade" id="addSpouse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
			  aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <form method="POST" action="">
				      <div class="modal-header text-center">
				        <h4 class="modal-title w-100 font-weight-bold">Spouse information</h4>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div id="cs_status" class="ml-4 mr-4 mt-2 mb-2">

				      </div>
				      <div class="modal-body mx-3">

				          <input type="hidden" id="cs_fk_id" value="<?php print($natural['n_id']);?>" class="form-control validate">

				        <div class="md-form mb-3">
				          <i class="fa fa-user prefix grey-text"></i>
				          <input type="name" id="cs_fname" class="form-control validate">
				          <label data-error="wrong" data-success="right" for="fname">First name</label>
				        </div>

				        <div class="md-form mb-3">
				          <i class="fa fa-user prefix grey-text"></i>
				          <input type="name" id="cs_lname" class="form-control validate">
				          <label data-error="wrong" data-success="right" for="lname">Last name</label>
				        </div>

				        <div class="md-form mb-3">
				          <i class="fa fa-user prefix grey-text"></i>
				          <input type="name" id="id_number" class="form-control validate">
				          <label data-error="wrong" data-success="right" for="id_number">ID number</label>
				        </div>

				        <div class="md-form mb-3">
				          <i class="fa fa-id-badge prefix grey-text"></i>
				          <input type="number" id="cs_stages_of_negotiation" class="form-control validate">
				          <label data-error="wrong" data-success="right" for="stages_of_negotiation">Stages of negotiation</label>
				        </div>

				      </div>
				      <div class="modal-footer d-flex justify-content-center">
				        <button class="btn btn-success" id="add_spouse">Save</button>
				      </div>
				    </form>
			    </div>
			  </div>
			</div>
 	  </div>

 	  </div>

 	  <div class="row ml-0">
      <div id="s_status">

      </div>
 	  	<?php
 	  		$spouses = $work->get_spouses($natural['n_id']);

 	  		if(count($spouses) > 0)
 	  		{
 	  			foreach($spouses as $spouse)
 	  			{
      ?>
        <div class="row mb-2">
            <?php print($spouse['cs_fname']." ".$spouse['cs_lname']."<br>".$spouse['cs_id_number']."<br><br>  stage of negotiation: ".$spouse['cs_stages_of_negotiation']."<br><br>"); ?>
            <div class="">
              <button class="btn btn-tomato-o" onclick="delete_spouse(<?php print($spouse['cs_id']);?>);">Delete</button>
              <button class="btn btn-outline-success" onclick="edit_spouse();">Edit</button>
            </div>

        </div>
      <?php

 	  			}
 	  		}

 	  	?>

 	  </div>
 	</p>
</div>
</div>
<div class="card ml-5 border-success" style="width: 14rem;">
  <div class="card-body">
    <h4 class="card-title m-0" style="font-family: 'prataregular', Serif; font-style: italic; ">deligation(s)</h4><hr class="border-success">
    <p class="card-text">

 	  <div class=" ml-0">
 	  	<?php
 	  		$spouses = $work->get_spouses($natural['n_id']);
 	  		$s_count = 0;
 	  			foreach($spouses as $spouse)
 	  			{
 	  				print(++$s_count.". ".$spouse['cs_fname']." ".$spouse['cs_lname']."<br>");
 	  	?>
		 	  		<div class="ml-1 row">
		 	  			<a class="" href="" data-toggle="modal" data-target="#addDeligation<?php print($spouse['cs_id']); ?>"><i class="fa fa-plus-circle"></i></a>
		 	  			<a class="ml-2" href="" data-toggle="modal" data-target="#viewDeligation<?php print($spouse['cs_id']); ?>"><i class="fa fa-eye"></i></a>
		 	  		</div>

					<div class="ml-0">
						<div class="modal fade" id="addDeligation<?php print($spouse['cs_id']); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
						  aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <form method="POST" action="">
							      <div class="modal-header text-center">
							        <h4 class="modal-title w-100 font-weight-bold">Deligation information</h4>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="ml-4 mr-4 mt-2 mb-2 d_status">

							      </div>
							      <div class="modal-body mx-3">
							        <div class="md-form mb-3">
							          <i class="fa fa-user prefix grey-text"></i>
							          <input type="name" class="form-control d_fname">
							          <label data-error="wrong" data-success="right" for="d_fname">First name</label>
							        </div>

							        <div class="md-form mb-3">
							          <i class="fa fa-user prefix grey-text"></i>
							          <input type="name" class="form-control d_lname">
							          <label data-error="wrong" data-success="right" for="d_lname">Last name</label>
							        </div>

							        <div class="md-form mb-3">
							          <i class="fa fa-id-badge prefix grey-text"></i>
							          <input type="number" id="" class="form-control d_id_number">
							          <label data-error="wrong" data-success="right" for="d_id_number">Id number</label>
							        </div>

							      </div>
							    </form>
							      <div class="modal-footer d-flex justify-content-center">
									<p  hidden><?php print($spouse['cs_id']); ?></p>
							        <a class="btn btn-success add_deligation">Save</a>
							      </div>
						    </div>
						  </div>
						</div>
					</div>

					<div class="ml-0">
						<div class="modal fade" id="viewDeligation<?php print($spouse['cs_id']); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
						  aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header text-center">
									<h4 class="modal-title w-100 font-weight-bold"><?php print($spouse['cs_fname']." ".$spouse['cs_lname']);?> Deligation(s)</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
									</div>
									<div id="d_status_<?php print($spouse['cs_id']); ?>" class="ml-4 mr-4 mt-2 mb-2">

									</div>
									<div class="modal-body mx-3">
									<?php
										$deligations = $work->get_deligations($spouse['cs_id']);
										if(count($deligations) > 0)
										{
											foreach($deligations as $deligation)
											{
												print($deligation['d_fname']." ".$deligation['d_lname']."<br>  ID number: ".$deligation['d_id_number']."<br>");
											?>
											<a href="" class="btn btn-warning">edit</a> <a href="" class="btn btn-danger">Delete</a><br><br>
											<?php
											}

										}
									?>


									</div>
								</div>
							</div>
						</div>
					</div>

		 <?php

		 	}
		 ?>


 	  </div>
 	</p>
</div>
</div>

<?php

	  		if(count($spouses) > 0 && count($deligations) > 0)
	  		{
				include 'documents.php';
	            if(count($docs) >= 2)
	            {
					include 'ideas.php';
	            }
	        }
		}

	}

	if($natural['n_marital_status'] == "Single")
	{
		include 'beneficiary.php';
  		if(count($beneficiaries) > 0)
  		{
			include 'documents.php';
            if(count($docs) >= 2)
            {
				include 'ideas.php';
            }
		}
	}
?>
