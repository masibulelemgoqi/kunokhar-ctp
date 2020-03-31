<?php require_once('session.php');
require 'partials/header.php';
require_once('../model/User.class.php');
$user = new User();
$u_details = $user->getUser($_SESSION['id']);
include 'partials/navbar_worker.php';
?>
<div class="container">
	<div id="snackbar"></div>
	<h3 class="font-weight-bold mb-4 text-center  p-4 mr-5" style="font-family: Verdana;">Personal / Company details</h3>
	<div class="row " id="identification">
		<div class="card border border-success" style="width: 18rem;">
			<div class="card-body p-0">
				<h4 class="card-title m-0">Basic Information
					<button class="btn edit_btn edit-identification">Edit</button>
				</h4>
				<div class="client-details"></div>
			</div>
		</div>
		<div class="card ml-5 border border-success about_company" style="width: 18rem;">
			<div class="card-body p-0">
				<h4 class="card-title m-0">Company Details <button class="btn edit_btn" id="edit_juristic" style="margin-left: 50%;">Edit</button></h4>
				<div class="card-text" id="juristic_view">
					<div class="row ml-0 badge badge-success" id="juristic_header"></div>
					<div class="row ml-0 mt-4 juristic_view">
						<div class="row mb-2">
							<span class="col-sm-2">
								<i class="fa fa-institution text-success" style="font-size: 150%;"></i>
							</span>
							<span class="ml-5" id="comp-name"></span>
						</div>
						<div>
							<div class="row mb-2 ml-0">
								<span class="text-success" style="font-size: 120%;">Reg. <i class="fa fa-hashtag" ></i></span>
								<span class="ml-3" id="comp-reg-number"></span>
							</div>
						</div>
						<div>
							<div class="row mb-2 ml-0">
								<span class="text-success" style="font-size: 120%;">Reg. <i class="fa fa-calendar-plus-o" ></i></span>
								<span class="ml-3" id="comp-reg-date"></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card ml-5 border-success directors" style="width: 14rem;">
			<div class="card-body p-0">
				<h4 class="card-title m-0">Director(s) <button class="btn add-btn" data-toggle="modal" data-target="#modalAddMember"><i class="fa fa-plus"></i></button></h4>
				<div class="card-text">
					<div class="row ml-0" id="company-directors">
					</div>
				</div>
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
						<input type="hidden" id="j_id" value="">
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
		<div class="card ml-5 border-success company-share-holders" style="width: 14rem;">
			<div class="card-body p-0">
				<h4 class="card-title m-0">
				Shareholders 
					<button class="btn add-btn" data-toggle="modal" data-target="#modalAddshareholder">
						<i class="fa fa-plus"></i>
					</button>
				</h4>
				<div class="modal fade" id="modalAddshareholder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<form method="POST" action="">
								<div class="modal-header text-center">
									<h4 class="modal-title w-100 font-weight-bold">Add Shareholder</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div id="holder_status" class="ml-4 mr-4 mt-2 mb-2"></div>
									<input type="hidden" id="j_id_" value="">
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
									<p hidden></p>
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
										<input type="number" id="amount_contributed" class="form-control" placeholder="Amount Contributed">
									</div>
								</div>
								<div class="modal-footer">
									<button class="btn btn-success" id="add_share_holder">Save</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="row ml-0" id="company-share-holders">
				</div>
			</div>
		</span>
	</div>
</div>

<div class="container-fluid mt-5 documents">
	<h1 class="font-weight-bold mb-5 text-center">Documents</h1>
		<div class="ml-5">
			<p class="font-weight-italic text-success text-center">
				Please note that for all the documents must be in pdf format.
			</p>
		</div>
		<div class="statusMsg"></div>
		<form id="upload_document" method="POST" class="mb-5" enctype="multipart/form-data">
			<div class="row ml-5 d-flex justify-content-center">
				<div class="md-form col-sm-3 ">
					<select class="form-control border-success" name="document_description" id="document_description">
						
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


	<div class="row ml-1">
			<div class="col-sm-4 border-right">
				<h5 class="font-weight-bold text-center">Required documents</h5>
				<div class="mt-5" id="required-doc">

				</div>
			</div>
		<div class="col-sm-8">

			<h5 class="font-weight-bold mr-2 text-center">Supporting documents</h5>
			<div class="mt-5 ml-5">
				<div class="row ml-5" id="documentsView">

				</div>

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
