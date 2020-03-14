<div class="container mt-5">

	<div class="d-flex justify-content-center">
		<h3 class="font-weight-bold text-center">Ideas</h3>
   		 <button class="btn btn-outline-dark ml-3" id="idea_container"> <i class="fa fa-lightbulb-o" aria-hidden="true"></i>+</button> &nbsp;&nbsp;
	</div><hr>

	<div id="idea_add" class="mt-5">
		<div id="idea_status" class="ml-3 mr-3"></div>
		<form method="POST" action="">
			<input type="hidden" id="client_id" value="<?php print($_GET['client_id']); ?>">
			<input type="name" id="idea_name" placeholder="Enter the name of idea" class="form-control mb-3">
			<input type="name" id="idea_trademark" placeholder="Enter idea trademark" class="form-control mb-3">
			<label class="mb-3 font-italic text-danger">Nature of idea(2000 characters)</label>
			<textarea style="height: 150px; resize: none;" class="form-control" id="idea_nature"></textarea>
			<label class="mb-3 font-italic text-danger">Target market(1000 characters)</label>
			<textarea style="height: 150px; resize: none;" class="form-control" id="idea_target_market"></textarea>
			<div class="mt-3">
				<button type="submit" class="btn btn-primary float-right" id="register_idea">Save <i class="fa fa-save"></i></button>
			</div>

		</form>
	</div>
	<div class="container">
		<?php
			$ideas = $work->get_ideas($_GET['client_id']);
			$count = 0;
			if(count($ideas) > 0)
			{
				print("<div class='mt-5 mb-5 h3 text-center'>List of ideas</div>");
			?>
			<div class="row">
			<?php
				foreach($ideas as $idea)
				{
		?>
				<div class="col-6 mb-4">
					<div class="card border-success mb-3" style="max-width: 540px;">
					  <div class="row no-gutters">
					    <div class="col-md-8">
					      <div class="card-body">
					        <h5 class="card-title">Idea <?php print($idea['idea_code']);?></h5>
					        <p class="card-text"><?php print("Idea name: ".$idea['idea_name']."<br> Idea trademark: ". $idea['idea_trademark']);?></p>
					        <p class="card-text"><small class="text-muted"><?php print($idea['idea_date']);?></small></p>

					        <form method="POST" action="">
					        	<input type="hidden" id="idea_name<?php print($idea['idea_id']);?>" value="<?php print($idea['idea_name']);?>">

					        </form>
					        <button class="btn btn-outline-success" data-toggle="modal" data-target="#more-info-idea<?php print($idea['idea_id']);?>">more info</button>
							<div class="modal fade" id="more-info-idea<?php print($idea['idea_id']);?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
							  aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
								      <div class="modal-header text-center">
								        <h4 class="modal-title w-100 font-weight-bold">Idea: <?php print($idea['idea_code']);?> </h4>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div id="cs_status" class="ml-4 mr-4 mt-2 mb-2">

								      </div>
								      <div class="modal-body mx-3">

								        <div class="md-form mb-3 border text-disable">
								          <label data-error="wrong" data-success="right" for="fname">Idea code</label>
								          <div>
								          	<?php print($idea['idea_code']);?>
								          </div>
								        </div>

								      	<div id="view_idea<?php print($idea['idea_id']);?>">
									        <div class="md-form mb-3">
												<label data-error="wrong" data-success="right" for="lname">Idea name</label>
												<div>
													<?php print($idea['idea_name']);?>
												</div><hr>
									        </div>

									        <div class="md-form mb-3">
												<label data-error="wrong" data-success="right" for="idea_trademark">Idea trademark</label>
												<div>
													<?php print($idea['idea_trademark']);?>
												</div><hr>
									        </div>

									        <div class="md-form mb-3">
												<label data-error="wrong" data-success="right" for="lname">Idea target market
												</label>
												<div>
													<?php print($idea['idea_target_market']);?>
												</div><hr>
									        </div>
									        <div class="md-form mb-3">
												<label data-error="wrong" data-success="right" for="lname">Idea nature</label>
												<div>
													<?php print($idea['idea_nature']);?>
												</div><hr>
									        </div>

											<div class="modal-footer d-flex justify-content-center">
												<button class="btn btn-info" onclick="idea_edit(<?php print($idea['idea_id']);?>);">Edit</button>
											</div>
								      	</div>

								      	<div id="edit_idea<?php print($idea['idea_id']);?>" class="w3-hide">
								      		<div id="idea_status<?php print($idea['idea_id']);?>"></div>
									        <div class="md-form mb-3">
												<div id="">
													<input type="name" id="idea_name_<?php print($idea['idea_id']);?>" class="form-control validate" value="<?php print($idea['idea_name']);?>">
												</div>
												<label data-error="wrong" data-success="right" for="lname">Idea name</label>
									        </div>

									        <div class="md-form mb-3">
												<div id="">
													<input type="name" id="idea_trademark<?php print($idea['idea_id']);?>" class="form-control validate" value="<?php print($idea['idea_trademark']);?>">
												</div>
												<label data-error="wrong" data-success="right" for="idea_trademark">Idea trademark</label>
									        </div>

									        <div class="md-form mb-3">
									        	<div>
										        	<textarea id="idea_target_market<?php print($idea['idea_id']);?>" style="height: 70px; resize: none;" class="form-control">
										        		<?php print($idea['idea_target_market']);?>
										        	</textarea>
									        	</div>
												<label data-error="wrong" data-success="right" for="lname">Idea target market
												</label>
									        </div>

									        <div class="md-form mb-3">
									        		<div>
														<textarea id="idea_nature<?php print($idea['idea_id']);?>" style="height: 70px; resize: none;" class="form-control">
														<?php print($idea['idea_nature']);?>
														</textarea>
									        		</div>
													<label data-error="wrong" data-success="right" for="lname">Idea nature</label>
									        </div>
											<div class="modal-footer d-flex justify-content-center">
												<button class=" btn btn-danger" onclick="cancel_idea_edit(<?php print($idea['idea_id']);?>);">cancel</button>
												<button class="btn btn-success" onclick="edit_idea_save(<?php print($idea['idea_id']);?>);">Save <i class="fa fa-save"></i></button>
											</div>

								      	</div>

								      </div>
							    </div>
							  </div>
							</div>
				        <?php
				        	if($u_details['w_type'] == "CEO")
				        	{
				        ?>
				        <a class="btn btn-outline-dark" href="../generate_certificate.php?idea_g_id=<?php print($idea['idea_id']);?>" target="_blank">Gerate certificate</a>
				        <?php
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
		<?php
			}
		?>
	</div>
</div>
