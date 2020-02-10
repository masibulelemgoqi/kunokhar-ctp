					<div class="card ml-5 border-success" style="width: 14rem;">
					  <div class="card-body">
					    <h4 class="card-title" style="font-family: 'prataregular', Serif; font-style: italic; ">Director(s) </h4><hr class="border-success">
					    <p class="card-text">
	                 	  <div class="row ml-0">
							<div class="text-center d-flex justify-content-center">
							  <a href="" class="btn btn-success btn-rounded mb-4 " data-toggle="modal" data-target="#modalAddMember">Add director <i class="fa fa-pencil"></i></a>
							</div>
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
		                 	  				  <a data-toggle="modal" data-target="#viewMember<?php print($member['cm_id']);?>" onclick="view_member(<?php print($member['cm_id']);?>);"><i class="fa fa-eye"></i></a> &nbsp;&nbsp;


			                 	  			  <button class="btn btn-default" onclick="delete_member(<?php echo $member['cm_id'];?>);"><i class="fa fa-trash text-danger"></i></button>


												<div class="modal fade" id="viewMember<?php print($member['cm_id']);?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
												  aria-hidden="true">
												  <div class="modal-dialog" role="document">
												    <div class="modal-content">



													      <div class="modal-header text-center">
													        <h4 class="modal-title m-0">Company member <?php print($member['cm_title']);?> <?php print($member['cm_lname']);?></h4>
													        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
													          <span aria-hidden="true">&times;</span>
													        </button>
													      </div>
														    <div id="edit_member<?php print($member['cm_id']);?>" class="modal-body mx-1">
																    <button class="btn btn-danger" onclick="cancel_cm(<?php print($member['cm_id']);?>);">Cancel</button>
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
																      <div class="modal-footer d-flex justify-content-center">
																        <button class="btn btn-success" onclick="edit_company_member(<?php print($member['cm_id']);?>);">Save</button>
																      </div>
															    </div>
															    <div id="view_member<?php print($member['cm_id']);?>" class="modal-body mx-1">
															    	<div class="row">Title: <?php print($member['cm_title']);?></div>
															    	<div class="row">First name: <?php print($member['cm_fname']);?></div>
															    	<div class="row">Last name: <?php print($member['cm_lname']);?></div>
															    	<div class="row">Id Number: <?php print($member['cm_id_number']);?></div>
															    	<div class="row">Date of appointment: <?php print($member['cm_date_of_appointment']);?></div>
																      <div class="modal-footer d-flex justify-content-center">
																        <button onclick="edit_member_view(<?php print($member['cm_id']);?>);" class="btn btn-info" id="edit_cm">Edit</button>
																      </div>
															    </div>

														   </div>
												    </div>
												  </div>
	                 	  				    </div>
	                 	  				    <hr>
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
								      <div class="modal-header text-center">
								        <h4 class="modal-title w-100 font-weight-bold">Add Company member</h4>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div id="member_status" class="ml-4 mr-4 mt-2 mb-2">

								      </div>

								      <div class="modal-body mx-1">
								        <div class="md-form mb-3">
								          <select class="form-control" id="j_title">
								          	<option value="">Title</option>
								          	<option value="Mr">Mr</option>
								          	<option value="Ms">Ms</option>
								          	<option value="Mrs">Mrs</option>
								          	<option value="Dr">Dr.</option>
								          	<option value="Proffesor">Prof.</option>
								          </select>
								        </div>
								        <input type="hidden" id="j_id" value="<?php print($juristic['j_id']);?>">
								        <div class="md-form mb-3">
								          <input type="name" id="j_fname" class="form-control" placeholder="First name...">
								        </div>

								        <div class="md-form mb-3">
								          <input type="name" id="j_lname" class="form-control" placeholder="Last name...">
								        </div>

								        <div class="md-form mb-3">
								          <input type="number" id="j_id_number" class="form-control" placeholder="ID number...">
								        </div>

								        <div class="md-form mb-3">
								          <label>Date of appointment</label>
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
	                 	 </p>

	                   </div>
	                 </div>
