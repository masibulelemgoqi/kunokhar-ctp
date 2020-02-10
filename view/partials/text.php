








				 	  <div class="row ml-0">
				 	  	<div class="text-center">
				 			
						</div>
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
								      <div id="d_status_<?php print($spouse['cs_id']); ?>" class="ml-4 mr-4 mt-2 mb-2">
								      	
								      </div>
								      <div class="modal-body mx-3">
								        <div class="md-form mb-3">
								          <i class="fa fa-user prefix grey-text"></i>
								          <input type="name" id="d_fname_<?php print($spouse['cs_id']); ?>" class="form-control validate">
								          <label data-error="wrong" data-success="right" for="d_fname_<?php print($spouse['cs_id']); ?>">First name</label>
								        </div>

								        <div class="md-form mb-3">
								          <i class="fa fa-user prefix grey-text"></i>
								          <input type="name" id="d_lname_<?php print($spouse['cs_id']); ?>" class="form-control validate">
								          <label data-error="wrong" data-success="right" for="d_lname_<?php print($spouse['cs_id']); ?>">Last name</label>
								        </div>

								        <div class="md-form mb-3">
								          <i class="fa fa-id-badge prefix grey-text"></i>
								          <input type="number" id="d_id_number_<?php print($spouse['cs_id']); ?>" class="form-control validate">
								          <label data-error="wrong" data-success="right" for="d_id_number_<?php print($spouse['cs_id']); ?>">Id number</label>
								        </div>

								      </div>
								    </form>
								      <div class="modal-footer d-flex justify-content-center">
								        <a class="btn btn-success" onclick="add_deligation(<?php print($spouse['cs_id']); ?>)">Save</a>
								      </div>
							    </div>
							  </div>
							</div>
				 	  </div> 











  	  	<?php

 	  				$deligations = $work->get_deligations($spouse['cs_id']);
		 	  		if(sizeof($deligations) > 0)
		 	  		{
		 ?>