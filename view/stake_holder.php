					<div class="card ml-5 border-success" style="width: 14rem;">
					  <div class="card-body p-0">
					    <h4 class="card-title m-0">
					    	Shareholders 
					    	<button class="btn add-btn" data-toggle="modal" data-target="#modalAddshareholder">
					    		<i class="fa fa-plus"></i>
					    	</button>
					    </h4>
	                 	  <div class="row ml-0">
							<div id="holder_del_status"></div>
	                 	  	<div>
	                 	  		<?php
	                 	  			$holders = $work->getShare_holders($juristic['j_id']);
	                 	  			$count = 0;
	                 	  			if(sizeof($holders) > 0)
	                 	  			{
	                 	  				foreach($holders as $holder)
	                 	  				{
	                 	  		?>
	                 	  				  <div class="row m-3">
	                 	  				  	  <?php print(++$count.".".$holder['sh_title']);?> <?php print($holder['sh_lname']);?>&nbsp; &nbsp;
		                 	  				  <a data-toggle="modal" class="mr-3" style="cursor: pointer;" data-target="#viewHolder<?php print($holder['sh_id']);?>" onclick="view_holder(<?php print($holder['sh_id']);?>)"><i class="fa fa-eye"></i>
		                 	  				  </a>
		                 	  				  <a onclick="delete_holder(<?php print($holder['sh_id']);?>);"><i class="fa fa-trash text-danger"></i></a>

												<div class="modal fade"  id="viewHolder<?php print($holder['sh_id']);?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
												  aria-hidden="true">
												  <div class="modal-dialog" role="document">
												    <div class="modal-content">



													      <div class="modal-header text-center">
													        <h4 class="modal-title m-0 font-weight-bold">Shareholder <?php print($holder['sh_title']);?> <?php print($holder['sh_lname']);?></h4>
													        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
													          <span aria-hidden="true">&times;</span>
													        </button>
													      </div>
														    <div id="edit_holder_view_<?php print($holder['sh_id']);?>" class="modal-body m-2">
														    	<form method="POST" action="">
															      <div id="holder_status_<?php print($holder['sh_id']);?>">

															      </div>
															        <div class="md-form mb-3">
															          <select class="form-control" id="title_<?php print($holder['sh_id']);?>">
															          	<option value="<?php print($holder['sh_title']);?>"><?php print($holder['sh_title']);?></option>
															          	<option value="Mr">Mr</option>
															          	<option value="Ms">Ms</option>
															          	<option value="Mrs">Mrs</option>
															          	<option value="Dr">Dr.</option>
															          	<option value="Proffesor">Prof.</option>
															          </select>
															        </div>

															        <div class="md-form mb-3">
															          <input type="name" id="fname_<?php print($holder['sh_id']);?>" class="form-control" value="<?php print($holder['sh_fname']);?>">
															        </div>

															        <div class="md-form mb-3">
															          <input type="name" id="lname_<?php print($holder['sh_id']);?>" class="form-control" value="<?php print($holder['sh_lname']);?>">
															        </div>

															        <div class="md-form mb-3">
															          <input type="number" id="id_number_<?php print($holder['sh_id']);?>" class="form-control" value="<?php print($holder['sh_id_number']);?>">
															        </div>

															        <div class="md-form mb-3">
															          <input type="number" id="amount_contributed_<?php print($holder['sh_id']);?>" class="form-control" value="<?php print($holder['sh_amount_contributed']);?>">
															        </div>

																    </form>
																      <div class="modal-footer p-2">
																      	<button class="btn btn-danger" onclick="cancel_sh(<?php print($holder['sh_id']);?>);">Cancel</button>
																        <button class="btn btn-success" onclick="edit_share_holder(<?php print($holder['sh_id']);?>);">Save</button>
																      </div>
															    </div>
															    <div id="view_holder<?php print($holder['sh_id']);?>" class="modal-body m-2">
															    	<div class="row">First name: <?php print($holder['sh_fname']);?></div>
															    	<div class="row">Last name: <?php print($holder['sh_lname']);?></div>
															    	<div class="row">Id Number: <?php print($holder['sh_id_number']);?>
															    	</div>
															    	<div class="row mb-3">Amount contributed: <?php print($holder['sh_amount_contributed']);?>
															    	</div>

																      <div class="modal-footer p-2">
																        <button onclick="edit_holder_view(<?php print($holder['sh_id']);?>);" class="btn btn-info">Edit</button>
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
							<div class="modal fade" id="modalAddshareholder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
							  aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <form method="POST" action="">
								      <div class="modal-header text-center">
								        <h4 class="modal-title w-100 font-weight-bold">Add Shareholder</h4>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div id="holder_status" class="ml-4 mr-4 mt-2 mb-2">
								      </div>
								      <input type="hidden" id="j_id_" value="<?php print($juristic['j_id']);?>">
								      <div class="modal-body mx-1">
								        <div class="md-form mb-3">
								          <select class="form-control" id="title_">
								          	<option selected disabled>- Select Title -</option>
								          	<option value="Mr">Mr</option>
								          	<option value="Ms">Ms</option>
								          	<option value="Mrs">Mrs</option>
								          	<option value="Dr">Dr.</option>
								          	<option value="Proffesor">Prof.</option>
								          </select>
								        </div>
								        <div class="md-form mb-3">
								          <input type="name" id="fname_" class="form-control" placeholder="First Name">
								        </div>

								        <div class="md-form mb-3">
								          <input type="name" id="lname_" class="form-control" placeholder="Last Name">
								        </div>

								        <div class="md-form mb-3">
								          <input type="number" id="id_number_" class="form-control" placeholder="ID Number">
								        </div>

								        <div class="md-form mb-3">
								          <input type="name" id="amount_contributed" class="form-control" placeholder="Amount Contributed">
								        </div>

								      </div>
								      <div class="modal-footer">
								        <button class="btn btn-success" id="add_share_holder">Save</button>
								      </div>
								    </form>
							    </div>
							  </div>
							</div>
	                 	  </div>
	                   </div>
	                 </div>
