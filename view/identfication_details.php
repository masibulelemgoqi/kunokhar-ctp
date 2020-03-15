<div class="card border border-success" style="width: 18rem;">
	<div class="card-body p-0">
		<h4 class="card-title m-0">Basic Information
			<button class="btn edit_btn edit-identification">Edit</button>
		</h4>
		<div class="card-text" id="view_ident">
			<?php
				$client_identification = $work->get_client($_GET['client_id']);
			?>
			<div class="row mb-2">
				<div class="col-sm-2">
						<i class="fa fa-black-tie fa-2x text-success" style="font-size: 150%;"></i>
				</div>

				<div class="col-sm-10">
							<?php print($client_identification['client_person']);?>
				</div>

			</div>

			<div class="row mb-2">
				<div class="col-sm-2 text-center">
						<i class="fa fa-user text-success" style="font-size: 150%;"></i>
				</div>

				<div class="col-sm-10">
						<?php print($client_identification['client_title']);?> <?php print($client_identification['client_fname']);?> <?php print($client_identification['client_lname']);?>
				</div>

			</div>
			<div class="row mb-2">
				<div class="col-sm-2 w3-center">
						<i class="fa fa-map-marker text-success" style="font-size: 150%;"></i>
				</div>

				<div class="col-sm-10">
						<?php print($client_identification['client_home_address']);?>, <?php print($client_identification['client_city']);?>, <?php print($client_identification['client_zip_code']);?>
				</div>
			</div>
			<div class="row mb-2">
				<div class="col-sm-2">
						<i class="fa fa-at text-success" style="font-size: 150%;"></i>
				</div>

				<div class="col-sm-10">
						<?php print($client_identification['client_email']);?>
				</div>
			</div>
			<div class="row mb-2">
				<div class="col-sm-2">
						<i class="fa fa-phone text-success" style="font-size: 150%;"></i>
				</div>
				<div class="col-sm-10">
						<?php print($client_identification['client_cellno']);?>
				</div>
			</div>
			<div class="row mb-2">
				<div class="col-sm-2">
						<i class="fa fa-calendar-plus-o text-success" style="font-size: 150%;"></i>
				</div>
				<div class="col-sm-10">
						<?php print(date("d M Y",strtotime($client_identification['client_dateCreated'])));?>
				</div>
			</div>
		</div>

		<div class="card-text" id="hidden_ident">
			<div id="status"></div>
			<form method="POST" action="">
				<input type="hidden" class="form-control m-2" id="client_id" value="<?php print($client_identification['client_id']);?>">


			<label class="mt-2 ml-2 mr-2 font-italic text-muted">Title:</label>
			<select class="form-control mb-2 ml-2 mr-2 border-success" id="client_title">
				<option value="<?php print($client_identification['client_title']);?>"><?php print($client_identification['client_title']);?>(Currently selected)</option>
				<option value="Mr">Mr</option>
				<option value="Ms">Ms</option>
				<option value="Mrs">Mrs</option>
				<option value="Dr.">Dr.</option>
				<option value="Prof.">Prof.</option>
			</select>

				<input type="name" class="form-control m-2 border-success" id="client_initials" value="<?php print($client_identification['client_initials']);?>" placeholder="Initials">

				<input type="name" class="form-control m-2 border-success" id="fname" value="<?php print($client_identification['client_fname']);?>" placeholder="first name">

				<input type="name" class="form-control m-2 border-success" id="lname" value="<?php print($client_identification['client_lname']);?>" placeholder="Last name">

				<input type="email" class="form-control m-2 border-success" id="email" value="<?php print($client_identification['client_email']);?>" placeholder="email address">

				<input type="name" class="form-control m-2 border-success" id="client_address" value="<?php print($client_identification['client_home_address']);?>" placeholder="Adress">

				<input type="name" class="form-control m-2 border-success" id="client_city" value="<?php print($client_identification['client_city']);?>" placeholder="city">

				<input type="name" class="form-control m-2 border-success" id="client_zip_code" value="<?php print($client_identification['client_zip_code']);?>" placeholder="zip code">

				<input type="number" class="form-control m-2 border-success" id="cell_number" value="<?php print($client_identification['client_cellno']);?>" placeholder="Cell number">
				<button class="btn btn-success" id="edit_identification">Save</button>
			</form>

		</div>
	</div>
</div>
