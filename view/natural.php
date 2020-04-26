<?php require_once('session.php');
	require 'partials/header.php';
	include 'partials/navbar_worker.php';
?>
<div class="container">
	<div id="snackbar"></div>
	<h3 class="font-weight-bold mb-4 text-center  p-4 mr-5" style="font-family: Verdana;">Personal / Individual's details</h3>
	<div class="row " id="identification">
		<div class="card border border-success" style="width: 18rem;">
			<div class="card-body p-0">
				<h4 class="card-title m-0">Basic Information
					<button class="btn edit_btn edit-identification">Edit</button>
				</h4>
				<div class="client-details"></div>
			</div>
		</div>
		<div class="card ml-5 border-success" style="width: 18rem;">
			<div class="card-body p-0">
				<h4 class="card-title m-0">Person <button class="btn edit_btn edit-natural" style="margin-left: 50%;">Edit</button></h4>
				<div class="row mx-2 mt-2 badge badge-success person-heading-div"></div>
				<div class="card-text row ml-0">
					<div id="natural_view"></div>
				</div>
			</div>
		</div>
	<div>

	<div class="card ml-5 border-success other-info" style="width: 30rem;">
		<div class="card-body p-0">
			<h4 class="card-title m-0"> <span id="natural-title"></span> </h4>
			<div class="card-text">
				<div class="row m-0" id="show-full-info"></div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="addSpouse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<form method="POST" action="">
				<div class="modal-header text-center">
					<h4 class="modal-title font-weight-bold">Spouse information</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div id="cs_status" class="ml-4 mr-4 mt-2 mb-2">

				</div>
				<div class="modal-body mx-3">
					<input type="hidden" id="cs_fk_id" value="" class="form-control validate">
					<p hidden id="hidden-spouse-id"></p>
					<div class="md-form mb-3">
					<input type="name" id="cs_fname" class="form-control validate" placeholder="First Name">
					</div>

					<div class="md-form mb-3">
					<input type="name" id="cs_lname" class="form-control validate" placeholder="Last Name">
					</div>

					<div class="md-form mb-3">
					<input type="name" id="id_number" class="form-control validate" placeholder="ID Number">
					</div>

					<div class="md-form mb-3">
					<input type="number" id="cs_stages_of_negotiation" class="form-control validate" placeholder="Stage of Negotiation">
					</div>

				</div>
				<div class="modal-footer d-flex justify-content-center">
					<button class="btn btn-success spouse-save" id="spouse_action">Add spouse</button>
				</div>
				</form>
			</div>
		</div>
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
				<div id="b_status" class="ml-4 mr-4 mt-2 mb-2"></div>
				<div class="modal-body mx-3">
				<input type="hidden" id="b_id">
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

	<div class="modal fade" id="addDeligation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header text-center border-0">
				<h4 class="modal-title font-weight-bold">Deligation(s)</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="d-flex justify-content-start">
					<button class="btn btn-success" id="deligation-add-btn"><i class="fa fa-plus"></i></button>
				</div>
				<div id="deligation-fields"></div>
				<div class="mx-2 my-4" id="deligation-show"></div>
			</div>
		</div>
		</div>
	</div>

</div>

<div class="container-fluid mt-5 documents">
	<h1 class="font-weight-bold mb-5 text-center">Documents</h1>
		<div class="ml-5">
			<p class="font-weight-italic text-success text-center">
				All the documents must be in pdf/doc/docx format.
			</p>
		</div>
		<div class="statusMsg mx-5"></div>
		<form id="upload_document" method="POST" class="mb-5" enctype="multipart/form-data">
			<div class="row ml-5 d-flex justify-content-center">
				<div class="md-form col-sm-3 ">
					<select class="form-control border-success" name="document_description" id="document_description"></select>
				</div>
				<div class="md-form col-sm-3">
					<input type="file" name="doc" id="doc" class="form-control border-success">
				</div>
				<div class="md-form col-sm-3 float-right">
					<button class="btn btn-success" name="add_document" id="add_document">Upload file <i class="fa fa-save" aria-hidden="true"></i></button>
				</div>
			</div>
		</form>


	<div class="row ml-1">
			<div class="col-sm-4 border-right">
				<h5 class="font-weight-bold text-center">Required documents</h5>
				<div class="mt-5" id="required-doc">

				</div>
			</div>
		<div class="col-sm-8">

			<h5 class="font-weight-bold mr-2 text-center">Supporting documents</h5>
			<div class="mt-5 ml-5">
				<div class="row ml-5" id="documentsView"></div>
			</div>
		</div>

	</div>
</div>
<div class="container mt-5 ideas">
		<?php require_once('idea_form.php'); ?>
		<div class="container">
			<div class='mt-5 mb-5 h3 text-center'>List of ideas</div>
			<div class="row" id="list-of-ideas"></div>
		</div>
	</div>
<?php require 'partials/footer.php';?>
