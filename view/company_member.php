					<div class="card ml-5 border-success" style="width: 14rem;">
					  <div class="card-body p-0">
					    <h4 class="card-title m-0">Director(s) <button class="btn add-btn" data-toggle="modal" data-target="#modalAddMember"><i class="fa fa-plus"></i></button></h4>
					    <div class="card-text">
	                 	  <div class="row ml-0">
					    	<div id="member_del_status"></div>
	                 	  	<div>
	                 	  		<?php
	                 	  			$members = $work->getCompany_members($juristic['j_id']);
	                 	  			$count = 0;
	                 	  			if(sizeof($members) > 0)
	                 	  			{
	                 	  				foreach($members as $member)
	                 	  				{
	                 	  		?>
	                 	  				  <div class="row ml-0">
	                 	  				  	  <?php print(++$count.".".$member['cm_title']);?> <?php print($member['cm_lname']);?>&nbsp; &nbsp;
		                 	  				  <a data-toggle="modal" class="mr-3" style="cursor: pointer;" data-target="#viewMember<?php print($member['cm_id']);?>" onclick="view_member(<?php print($member['cm_id']);?>);"><i class="fa fa-eye"></i></a> 

			                 	  			  <a style="cursor: pointer;" onclick="delete_member(<?php echo $member['cm_id'];?>);"><i class="fa fa-trash text-danger"></i></a>


												<div class="modal fade" id="viewMember<?php print($member['cm_id']);?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
												  aria-hidden="true">
												  <div class="modal-dialog" role="document">
												    <div class="modal-content">



													      <div class="modal-header text-center">
													        <h4 class="modal-title m-0 font-weight-bold">Director: <?php print($member['cm_title']);?> <?php print($member['cm_lname']);?></h4>
													        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
													          <span aria-hidden="true">&times;</span>
													        </button>
													      </div>
														    <div id="edit_member<?php print($member['cm_id']);?>" class="modal-body p-2">
															  
														    	<form method="POST" action="">
															      <div id="member_status-<?php print($member['cm_id']);?>" class="ml-4 mr-4 mt-2 mb-2">

															      </div>
															        <div class="md-form mb-3">
															          <select class="form-control" id="title-<?php print($member['cm_id']);?>">
															          	<option value="<?php print($member['cm_title']);?>"><?php print($member['cm_title']);?></option>
															          	<option value="Mr">Mr</option>
															          	<option value="Ms">Ms</option>
															          	<option value="Mrs">Mrs</option>
															          	<option value="Dr">Dr.</option>
															          	<option value="Proffesor">Prof.</option>
															          </select>
															        </div>


															        <div class="md-form mb-3">
															          <input type="name" id="fname-<?php print($member['cm_id']);?>" class="form-control" value="<?php print($member['cm_fname']);?>">
															        </div>

															        <div class="md-form mb-3">
															          <input type="name" id="lname-<?php print($member['cm_id']);?>" class="form-control" value="<?php print($member['cm_lname']);?>">
															        </div>

															        <div class="md-form mb-3">
															          <input type="number" id="id_number-<?php print($member['cm_id']);?>" class="form-control" value="<?php print($member['cm_id_number']);?>">
															        </div>

															        <div class="md-form mb-3">
															          <label>Date of appointment</label>
															          <input type="date" id="date_of_appointment-<?php print($member['cm_id']);?>" class="form-control" value="<?php print(date('Y-m-d', strtotime($member['cm_date_of_appointment'])));?>">
															        </div>
																    </form>
																      <div class="modal-footer">
																      	<button class="btn btn-danger" onclick="cancel_cm(<?php print($member['cm_id']);?>);">Cancel</button>
																        <button class="btn btn-success" onclick="edit_company_member(<?php print($member['cm_id']);?>);">Save</button>
																      </div>
															    </div>
															    <div id="view_member<?php print($member['cm_id']);?>" class="modal-body m-2">
															    	<div class="row">Title: <?php print($member['cm_title']);?></div>
															    	<div class="row">First name: <?php print($member['cm_fname']);?></div>
															    	<div class="row">Last name: <?php print($member['cm_lname']);?></div>
															    	<div class="row">Id Number: <?php print($member['cm_id_number']);?></div>
															    	<div class="row mb-2">Date of appointment: <?php print($member['cm_date_of_appointment']);?></div>
																      <div class="modal-footer p-1">
																        <button onclick="edit_member_view(<?php print($member['cm_id']);?>);" class="btn btn-info" id="edit_cm">Edit</button>
																      </div>
															    </div>

														   </div>
												    </div>
												  </div>
	                 	  				    </div>
	                 	  		<?php
	                 	  				}
	                 	  			}
	                 	  		?>
	                 	  	</div>
							<div class="modal fade" id="modalAddMember" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
							  aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <form method="POST" action="">
								      <div class="modal-header">
								        <h4 class="modal-title m-0 font-weight-bold">Add Director</h4>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div id="member_status" class="ml-4 mr-4 mt-2 mb-2">

								      </div>

								      <div class="modal-body mx-1">
								        <div class="md-form mb-3">
								          <select class="form-control" id="j_title">
								          	<option disabled selected>- Select Title -</option>
								          	<option value="Mr">Mr</option>
								          	<option value="Ms">Ms</option>
								          	<option value="Mrs">Mrs</option>
								          	<option value="Dr">Dr.</option>
								          	<option value="Proffesor">Prof.</option>
								          </select>
								        </div>
								        <input type="hidden" id="j_id" value="<?php print($juristic['j_id']);?>">
								        <div class="md-form mb-3">
								          <input type="name" id="j_fname" class="form-control" placeholder="First Name">
								        </div>

								        <div class="md-form mb-3">
								          <input type="name" id="j_lname" class="form-control" placeholder="Last Name">
								        </div>

								        <div class="md-form mb-3">
								          <input type="number" id="j_id_number" class="form-control" placeholder="ID Number">
								        </div>

								        <div class="md-form mb-3">
								          <label>Date Appointed</label>
								          <input type="date" id="j_date_of_appointment" class="form-control">
								        </div>

								      </div>
								      <div class="modal-footer d-flex justify-content-center">
								        <button class="btn btn-success" id="add_company_member">Save</button>
								      </div>
								    </form>
							    </div>
							  </div>
							</div>
	                 	  </div>
	                 	 </div>

	                   </div>
	                 </div>
