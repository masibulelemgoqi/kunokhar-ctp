<div class="container-fluid mt-5">
	<h1 class="font-weight-bold mb-5 text-center">Documents</h1>
		<div class="ml-5">
			<p class="font-weight-italic text-success text-center">
				Please note that for all the documents must be in pdf format.
			</p>
		</div>
		<div class="statusMsg"></div>
		<form id="upload_document" method="POST" class="mb-5" action="../controller/controller.php" enctype="multipart/form-data">
	       <div class="row ml-5 d-flex justify-content-center">
	       	    <input type="hidden" name="client_id" value="<?php print($_GET['client_id']); ?>">
		        <div class="md-form col-sm-3 ">
		          <select class="form-control border-success" name="document_description">
			          	<option value="">File description</option>

		          	<?php
		          		if($client_identification['client_person'] == "Juristic")
		          		{
		          	?>

				          	<option value="Ck">Ck</option>
				          	<option value="Share register">Share register</option>
				          	<option value="Share certificate">Share certificate</option>
				          	<option value="Resolution of idea with all requirements">Resolution of idea with all requirements</option>
				          	<option value="Notice of meeting">Notice of meeting</option>
				          	<option value="Minutes">Minutes</option>
				          	<option value="Public officer form">Public officer form</option>
		          	<?php
		          		}
		          	?>

		          	<?php
		          		if($client_identification['client_person'] == "Natural")
		          		{
							if($natural['n_marital_status'] == "Single")
							{
							?>
							  	<option value="ID Copy">ID Copy</option>
							  	<option value="Affidavit stating single">Affidavit stating single</option>
							  	<option value="Death certificate(if spouse deceased)">Death certificate(if spouse deceased)</option>
							  	<option value="Divoce certificate(if divoced)">Divoce certificate(if divoced)</option>

							<?php 	}

							if($natural['n_marital_status'] == "Married")
							{
							?>
							  	<option value="ID Copy">ID Copy</option>
							  	<option value="Marriage certificate">Marriage certificate</option>

							<?php
							}
		          		}
		          	?>
		          </select>
		        </div>
		        <div class="md-form col-sm-3">
		          <input type="file" name="file" class="form-control border-success">
		        </div>
		        <div class="md-form col-sm-3 float-right">
		        	<button class="btn btn-success" name="add_document">Upload file <i class="fa fa-save" aria-hidden="true"></i></button>
		        </div>
	       </div>
		</form>


	<div class="row ml-5">
		<?php
		$docs = $work->getDocuments($_GET['client_id']);
		$count = 0;
		$docs_size = sizeof($docs);
  		if($client_identification['client_person'] == "Juristic")
  		{
      	?>
			<div class="col-sm-4 border-right">
				<h5 class="font-weight-bold text-center">Required documents</h5>
				<div class="mt-5 ">
					<div>
					<?php
					$d1 = array();
					foreach($docs as $doc)
					{
						if($doc['document_description'] == "Ck")
						{
							$d1[] = $doc['document_description'];
						}
					}

					if(count($d1) == 1)
					{
						print("<i class='fa fa-check-square-o text-success' style='font-size: 150%;'></i>");
					}else
					{
						print("  <i class='fa fa-square-o text-danger' style='font-size: 150%;'></i>");
					}

					?>
					 &nbsp;CK
					</div>

					<div>
						<?php
						$d2 = array();
						foreach($docs as $doc)
						{
							if($doc['document_description'] == "Share register")
							{
								$d2[] = $doc['document_description'];
							}
						}
						if(count($d2) == 1)
						{
							print("<i class='fa fa-check-square-o text-success' style='font-size: 150%;'></i>");
						}else
						{
							print("  <i class='fa fa-square-o text-danger' style='font-size: 150%;'></i>");
						}
						?>
						&nbsp; Share register
					</div>

					<div>
						<?php

						$d3 = array();

						foreach($docs as $doc)
						{

							if($doc['document_description'] == "Share certificate")
							{
								$d3[] = $doc['document_description'];
							}
						}
						if(count($d3) == 1)
						{
							print("<i class='fa fa-check-square-o text-success' style='font-size: 150%;'></i>");
						}else
						{
							print("  <i class='fa fa-square-o text-danger' style='font-size: 150%;'></i>");
						}
						?>
						&nbsp; Share certificate
					</div>

					<div>

						<?php

						$d4 = array();
						foreach($docs as $doc)
						{

							if($doc['document_description'] == "Resolution of idea with all requirements")
							{
								$d4[] = $doc['document_description'];
							}
						}
						if(count($d4) == 1)
						{
							print("<i class='fa fa-check-square-o text-success' style='font-size: 150%;'></i>");
						}else
						{
							print("  <i class='fa fa-square-o text-danger' style='font-size: 150%;'></i>");
						}
						?>
						&nbsp; Resolution of idea with all requirements
					</div>

					<div>
						<?php

						$d5 = array();
						foreach($docs as $doc)
						{

							if($doc['document_description'] == "Notice of meeting")
							{
								$d5[] = $doc['document_description'];
							}
						}
						if(count($d5) == 1)
						{
							print("<i class='fa fa-check-square-o text-success' style='font-size: 150%;'></i>");
						}else
						{
							print("  <i class='fa fa-square-o text-danger' style='font-size: 150%;'></i>");
						}
						?>
						&nbsp; Notice of meeting
					</div>

					<div>
						<?php

						$d6 = array();
						foreach($docs as $doc)
						{

							if($doc['document_description'] == "Minutes")
							{
								$d6[] = $doc['document_description'];
							}
						}

						if(count($d6) == 1)
						{
							print("<i class='fa fa-check-square-o text-success' style='font-size: 150%;'></i>");
						}else
						{
							print("  <i class='fa fa-square-o text-danger' style='font-size: 150%;'></i>");
						}

						?>
						&nbsp; Minutes
					</div>

					<div>
						<?php

						$d7 = array();
						foreach($docs as $doc)
						{

							if($doc['document_description'] == "Public officer form")
							{
								$d7[] = $doc['document_description'];
							}
						}

						if(count($d7) == 1)
						{
							print("<i class='fa fa-check-square-o text-success' style='font-size: 150%;'></i>");
						}else
						{
							print("  <i class='fa fa-square-o text-danger' style='font-size: 150%;'></i>");
						}
						?>
						&nbsp; Public officer form

					</div>
				</div>
			</div>
		<?php
			}
		?>

      	<?php
      		if($client_identification['client_person'] == "Natural")
      		{
				if($natural['n_marital_status'] == "Single")
				{
				?>
					<div class="col-sm-4 border-right">
						<h5 class="font-weight-bold text-center">Required documents</h5>
						<div class="mt-5 ">
							<div>
								<?php
								$d1 = array();
								foreach($docs as $doc)
								{
									if($doc['document_description'] == "ID Copy")
									{
										$d1[] = $doc['document_description'];
									}
								}

								if(count($d1) == 1)
								{
									print("<i class='fa fa-check-square-o text-success' style='font-size: 150%;'></i>");
								}else
								{
									print("  <i class='fa fa-square-o text-danger' style='font-size: 150%;'></i>");
								}

								?>
								 &nbsp;ID Copy
							</div>

							<div>
								<?php
								$d2 = array();
								foreach($docs as $doc)
								{
									if($doc['document_description'] == "Affidavit stating single")
									{
										$d2[] = $doc['document_description'];
									}
								}

								if(count($d2) == 1)
								{
									print("<i class='fa fa-check-square-o text-success' style='font-size: 150%;'></i>");
								}else
								{
									print("  <i class='fa fa-square-o text-danger' style='font-size: 150%;'></i>");
								}

								?>
								 &nbsp;Affidavit stating single
							</div>

							<div>
								<?php
								$d3 = array();
								foreach($docs as $doc)
								{
									if($doc['document_description'] == "Death certificate(if spouse deceased)")
									{
										$d3[] = $doc['document_description'];
									}
								}

								if(count($d3) == 1)
								{
									print("<i class='fa fa-check-square-o text-success' style='font-size: 150%;'></i>");
								}else
								{
									print("  <i class='fa fa-square-o text-danger' style='font-size: 150%;'></i>");
								}

								?>
								 &nbsp;Death certificate(if spouse deceased)
							</div>

							<div>
								<?php
								$d4 = array();
								foreach($docs as $doc)
								{
									if($doc['document_description'] == "Divoce certificate(if divoced)")
									{
										$d4[] = $doc['document_description'];
									}
								}

								if(count($d4) == 1)
								{
									print("<i class='fa fa-check-square-o text-success' style='font-size: 150%;'></i>");
								}else
								{
									print("  <i class='fa fa-square-o text-danger' style='font-size: 150%;'></i>");
								}

								?>
								 &nbsp;Divoce certificate(if divoced)
							</div>
						</div>
					</div>

				<?php 	}

				if($natural['n_marital_status'] == "Married")
				{
				?>

					<div class="col-sm-4 border-right">
						<h5 class="font-weight-bold text-center">Required documents</h5>
						<div class="mt-5 ">
							<div>
								<?php
								$d1 = array();
								foreach($docs as $doc)
								{
									if($doc['document_description'] == "ID Copy")
									{
										$d1[] = $doc['document_description'];
									}
								}

								if(count($d1) == 1)
								{
									print("<i class='fa fa-check-square-o text-success' style='font-size: 150%;'></i>");
								}else
								{
									print("  <i class='fa fa-square-o text-danger' style='font-size: 150%;'></i>");
								}

								?>
								 &nbsp;ID Copy
							</div>

							<div>
								<?php
								$d2 = array();
								foreach($docs as $doc)
								{
									if($doc['document_description'] == "Marriage certificate")
									{
										$d2[] = $doc['document_description'];
									}
								}

								if(count($d2) == 1)
								{
									print("<i class='fa fa-check-square-o text-success' style='font-size: 150%;'></i>");
								}else
								{
									print("  <i class='fa fa-square-o text-danger' style='font-size: 150%;'></i>");
								}

								?>
								 &nbsp;Marriage certificate
							</div>

						</div>
					</div>

				<?php
				}
      		}
      	?>


		<div class="col-sm-8">

			<h5 class="font-weight-bold mr-2 text-center">Supporting documents</h5>
			<div class="mt-5 ml-5">
				<div class="row ml-5">
				<?php
				if(count($docs) > 0)
				{
					foreach($docs as $doc)
					{
					?>
						<div class=" col-3 border rounded-sm m-1">

							<?php
							if($doc['document_description'] != "idea_certificate" && $doc['document_description'] != "Logo")
							{
								print("<div class='mt-3'>".++$count.". ".$doc['document_description']."</div>");
								print("<div class='ml-4'>Uploaded:   ".$work->time_elapsed_string($doc['document_date'])."</div>");
								if($doc['document_status'] == 0)
								{
									print("<div class='text-danger ml-4'>Unverified</div>");
								}else if($doc['document_status'] == 1)
										{
											print("<div class='text-success ml-4'>Verified</div>");
										}

								$name = $doc['document_name'];
							?>
							<div class="mt-3 ml-3">
								<a class="btn btn-outline-dark dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Action
								</a>
								<br><br>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
									<a class=" dropdown-item" href="../controller/controller.php?doc_name=<?php print($name);?>" target="_blank">view document</a>
									<?php
										if($u_details['w_type'] != "Preparer")
										{
											if($doc['document_status'] == 0)
											{
									?>
												<a class="dropdown-item" onclick="verify_doc(<?php print($doc['document_id']);?>);">Verify</a>
									<?php
											}
									?>

									<?php
										}
									?>
									<a class="dropdown-item" href="#">Download</a>
									<a class="dropdown-item" href="#">Delete</a>
									<a class="dropdown-item" href="#">Edit</a>
								</div>
							</div>
							<?php

							}
							?>
						</div>
					<?php
					}
				}else
				{
					print("<h1 class='p-5 text-muted'>You have not uploaded any document</h1>");
				}
				?>

				</div>

			</div>
		</div>

	</div>
</div>
