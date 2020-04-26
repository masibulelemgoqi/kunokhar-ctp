<?php
require('../model/User.class.php');
require('../model/Work.class.php');

$user_obj = new User();
$work_obj = new Work();

if(isset($_POST['action'])){
	$action = $_POST['action'];
	switch ($action) {

		//SECTION  add
		case 'add_user':
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$email = $_POST['email'];
			$position = $_POST['position'];
			$password = $_POST['password'];
			$cell_number = $_POST['cell_number'];
			if($user_obj->add_user($fname, $lname, $email, $position, $password, $cell_number)) {
				print("<div class='text-success'>User has been successfully added</div>");
			}
		break;

		case 'add_client':
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$email = $_POST['email'];
			$cell_number = $_POST['cell_number'];
			$home_address = $_POST['home_address'];
			$zip_code = $_POST['zip_code'];
			$city = $_POST['city'];
			$person = $_POST['person'];
			$title = $_POST['title'];
			$initials = $_POST['initials'];
			$work_obj->add_client($fname, $lname, $email, $cell_number, $home_address, $city, $zip_code, $person, $title, $initials);
		break;

		case 'add_juristic':
			$client_id = $_POST['client_id'];
			$company_name = $_POST['company_name'];
			$registration_date = $_POST['registration_date'];
			$registration_number = $_POST['registration_number'];

			if($work_obj->add_juristic($client_id, $company_name, $registration_number, $registration_date)) {
				print("1");
			}else {
				print("<div class='text-danger'>Could not add data</div>");
			}
		break;

		case 'add_natural':
			$client_id = $_POST['client_id'];
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$mname = $_POST['mname'];
			$dob = $_POST['dob'];
			$id_number = $_POST['id_number'];
			$marital_status = $_POST['marital_status'];
			$marriage_type = $_POST['marriage_type'];

			if($work_obj->add_natural($client_id, $fname, $lname, $mname, $dob, $id_number, $marital_status, $marriage_type)) {
				print("1");
			}else {
				print("<div class='text-danger'>Could not add data</div>");
			}
		break;

		case 'add_company_member':
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$title = $_POST['title'];
			$j_id = $_POST['j_id'];
			$id_number = $_POST['id_number'];
			$date_of_appointment = $_POST['date_of_appointment'];

			if($work_obj->add_company_member($j_id, $fname, $lname, $title, $id_number, $date_of_appointment)) {
				print('1');
			}else {
				print('<div class="text-danger">Sorry we were unable to add the member, please try again...</div>');
			}
		break;

		case 'add_share_holder':
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$title = $_POST['title'];
			$j_id = $_POST['j_id'];
			$id_number = $_POST['id_number'];
			$amount_contributed = $_POST['amount_contributed'];

			if($work_obj->add_share_holder($j_id, $fname, $lname, $title, $id_number, $amount_contributed)) {
				print('1');
			}else {
				print('<div class="text-danger">Sorry we were unable to add the share holder, please try again...</div>');
			}
		break;

		case 'addIdea':
			$client_id = $_POST['client_id'];
			$idea_name = $_POST['idea_name'];
			$idea_trademark = $_POST['idea_trademark'];
			$idea_nature = $_POST['idea_nature'];
			$idea_target_market = $_POST['idea_target_market'];
			$sector = $_POST['sector'];

			if($work_obj->add_idea($client_id, $idea_name, $idea_trademark, $idea_nature, $idea_target_market, $sector)) {
				print("1");
			}else {
				print("<div class='text-danger'>Error adding idea</div>");
			}
		break;

		case 'add_civil':
			$natural_id = $_POST['natural_id'];
			$spouse_fname = $_POST['spouse_fname'];
			$spouse_lname = $_POST['spouse_lname'];
			$certificate_no = $_POST['certificate_no'];
			$date_of_issue = $_POST['date_of_issue'];
			$marriage_terms = $_POST['marriage_terms'];
			$detail_of_marriage = $_POST['detail_of_marriage'];
			$spouse_id_number = $_POST['spouse_id_number'];

			if($work_obj->add_civil($natural_id, $spouse_fname, $spouse_lname, $spouse_id_number, $certificate_no, $date_of_issue, $marriage_terms, $detail_of_marriage)) {
				print("1");
			}else {
				print("<div class='text-danger'>Could not add information</div>");
			}
		break;

		case 'add_deligation':
			$id = $_POST['id'];
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$id_number = $_POST['id_number'];

			if($work_obj->add_customary_deligation($id, $fname, $lname, $id_number)) {
				print("1");
			}else {
				print("<div class='text-danger'>Could not add information</div>");
			}
		break;

		case 'add_spouse':
			$id = $_POST['id'];
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$stages_of_negotiation = $_POST['stages_of_negotiation'];
			$id_number = $_POST['id_number'];

			if($work_obj->add_customary_spouse($id, $fname, $lname, $id_number, $stages_of_negotiation)) {
				print("1");
			}else {
				print("<div class='text-danger'>Could not add information</div>");
			}
		break;

		case 'add_beneficiary':
			$id = $_POST['id'];
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$id_number = $_POST['id_number'];

			if($work_obj->add_beneficiary($id, $fname, $lname, $id_number)) {
				print("1");
			}else {
				print("<div class='text-danger'>Could not add information</div>");
			}
		break;

		//SECTION get

		case 'get_spouse':
			$id = $_POST['id'];
			$work_obj->getSpouse($id);
		break;

		case 'getClientsByMonth':
			$dateFilter = $_POST['dateFilter'];
			$person = $_POST['person'];
			echo json_encode($work_obj->getClients($dateFilter, $person, "month"));	
		break;

		case 'getClientsByPerson':
			$dateFilter = $_POST['dateFilter'];
			$person = $_POST['person'];
			echo json_encode($work_obj->getClients($dateFilter, $person, "person"));	
		break;

		case 'getClient':
			$id = $_POST['id'];
			$work_obj->getClient($id);
		break;

		case 'getDirector':
			$id = $_POST['id'];
			$work_obj->getDirector($id); 
		break;

		case 'getShareHolder':
			$id = $_POST['id'];
			$work_obj->getShareHolder($id); 
		break;

		case 'getIdea':
			$id = $_POST['id'];
			$work_obj->getIdea($id);
		break;

		case 'getBeneficiary': 
			$id = $_POST['id'];
			$work_obj->getBeneficiary($id);
		break;

		case 'getDocument':
			$id = $_POST['id'];
			$doc = $work_obj->getDocument($id);
			if($doc !== null) {
				echo json_encode(array(
					'success'	=> true,
					'doc'		=> $doc
				));
			}else {
				echo json_encode(array(
					'success'	=> false
				));
			}
		break;



		case 'getDeligations':
			$id = $_POST['id'];
			$deligations = $work_obj->getDeligations($id);
			if(count($deligations) > 0) {
				echo json_encode(array(
					'success'		=> true,
					'deligations'	=> $deligations
				));
			}else {
				echo json_encode(array(
					'success'	=> false
				));
			}
		break;

		case 'getDeligation':
			$id = $_POST['id'];
			$deligation = $work_obj->getDeligation($id);
			if($deligation !== null) {
				echo json_encode(array(
					'success'		=> true,
					'deligation'	=> $deligation
				));
			}else {
				echo json_encode(array(
					'success'	=> false
				));
			}
		break;
		//SECTION  edit

		case 'edit_civil':
			$c_id = $_POST['c_id'];
			$spouse_fname = $_POST['spouse_fname'];
			$spouse_lname = $_POST['spouse_lname'];
			$certificate_no = $_POST['certificate_no'];
			$date_of_issue = $_POST['date_of_issue'];
			$marriage_terms = $_POST['marriage_terms'];
			$detail_of_marriage = $_POST['detail_of_marriage'];
			$spouse_id_number = $_POST['spouse_id_number'];

			if($work_obj->edit_civil($c_id, $spouse_fname, $spouse_lname, $spouse_id_number, $certificate_no, $date_of_issue, $marriage_terms, $detail_of_marriage)) {
				print("1");
			}else {
				print("<div class='text-danger'>Could not edit information</div>");
			}
		break;

		case 'edit_company_member':
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$title = $_POST['title'];
			$cm_id = $_POST['cm_id'];
			$id_number = $_POST['id_number'];
			$date_of_appointment = $_POST['date_of_appointment'];

			if($work_obj->edit_company_member($cm_id, $fname, $lname, $title, $id_number, $date_of_appointment)) {
				print('1');
			}else {
				print('<div class="text-danger">Sorry we were unable to edit the member, please try again...</div>');
			}
		break;

		case 'edit_share_holder':
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$title = $_POST['title'];
			$sh_id = $_POST['sh_id'];
			$id_number = $_POST['id_number'];
			$amount_contributed = $_POST['amount_contributed'];

			if($work_obj->edit_share_holder($sh_id, $fname, $lname, $title, $id_number, $amount_contributed)) {
				print('1');
			}else {
				print('<div class="text-danger">Sorry we were unable to edit the share holder, please try again...</div>');
			}
		break;

		case 'edit_client':
			$id = $_POST['client_id'];
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$email = $_POST['email'];
			$cell_number = $_POST['cell_number'];
			$home_address = $_POST['home_address'];
			$zip_code = $_POST['zip_code'];
			$city = $_POST['city'];
			$title = $_POST['title'];
			$initials = $_POST['initials'];

			if($work_obj->edit_client($id ,$fname, $lname, $email, $cell_number, $home_address, $zip_code, $city, $title, $initials)) {
				print("<div class='text-success'>Client updated successfully</div>");
			}else {
				print("<div class='text-danger'>Could not update Client</div>");
			}
		break;


		case 'verify_doc':
			$document_id = $_POST['document_id'];

			if($work_obj->verify_doc($document_id)) {
				print("1");
			}else {
				print("<div class='text-danger'>Could not verify document</div>");
			}
		break;

		case 'edit_juristic':
			$j_id = $_POST['j_id'];
			$company_name = $_POST['company_name'];
			$registration_date = $_POST['registration_date'];
			$registration_number = $_POST['registration_number'];

			if($work_obj->edit_juristic($j_id, $company_name, $registration_number, $registration_date)) {
				print("1");
			}else {
				print("<div class='text-danger'>Could not add data</div>");
			}
		break;

		case 'edit_beneficiary':
			$id = $_POST['id'];
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$id_number = $_POST['id_number'];

			if($work_obj->edit_beneficiary($id, $fname, $lname, $id_number)) {
				print("1");
			}else {
				print("<div class='text-danger'>Could not add information</div>");
			}
		break;

		case 'edit_natural':
			$n_id = $_POST['n_id'];
			$mname = $_POST['mname'];
			$dob = $_POST['dob'];
			$id_number = $_POST['id_number'];
			$marital_status = $_POST['marital_status'];
			$marriage_type = $_POST['marriage_type'];

			if($work_obj->edit_natural($n_id, $mname, $dob, $id_number, $marital_status, $marriage_type)) {
				print("1");
			}else {
				print("<div class='text-danger'>Could not add data</div>");
			}
		break;

		case 'editIdea':

			$id = $_POST['id'];
			$idea_name = $_POST['idea_name'];
			$idea_trademark = $_POST['idea_trademark'];
			$idea_nature = $_POST['idea_nature'];
			$idea_target_market = $_POST['idea_target_market'];
			$sector = $_POST['sector'];

			if($work_obj->edit_idea($id, $idea_name, $idea_trademark, $idea_nature, $idea_target_market, $sector)) {
				print("1");
			}else {
				print("<div class='text-danger'>Error while editing idea</div>");
			}
		break;

		case 'edit_spouse':
			$id = $_POST['id'];
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$stages_of_negotiation = $_POST['stages_of_negotiation'];
			$id_number = $_POST['id_number'];

			if($work_obj->edit_customary_spouse($id, $fname, $lname, $id_number, $stages_of_negotiation)) {
				print(1);
			}else {
				print("<div class='text-danger'>Could not edit information</div>");
			}
		break;

		case 'editDeligation':
			$id = $_POST['id'];
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$id_number = $_POST['id_number'];

			if($work_obj->editDeligation($id, $fname, $lname, $id_number)) {
				print("1");
			}else {
				print("<div class='text-danger'>Could not update information</div>");
			}
		break;

		//SECTION delete
		case 'delete_member':
			$cm_id = $_POST['cm_id'];

			if($work_obj->delete_member($cm_id)) {
				print("1");
			}else {
				print('<div class="text-danger">Sorry we were unable to delete a company member, please try again...</div>');
			}
		break;

		case 'delete_holder':
			$sh_id = $_POST['sh_id'];

			if($work_obj->delete_holder($sh_id)) {
				print("1");
			}else {
				print('<div class="text-danger">Sorry we were unable to delete a share holder, please try again...</div>');
			}
		break;

		case 'delete_beneficiary':
			$b_id = $_POST['b_id'];

			if($work_obj->delete_beneficiary($b_id)) {
				print("1");
			}else {
				print('<div class="text-danger">Sorry we were unable to delete a beneficiary, please try again...</div>');
			}
		break;

		case 'delete_user':
			$id = $_POST['user_id'];

			if($user_obj->delete_user($id)) {
				print("1");
			}else {
				print('<div class="text-danger">Sorry we were unable to delete a worker, please try again...</div>');
			}
		break;

		case 'delete_spouse':
			$id = $_POST['cs_id'];

			if($work_obj->delete_customary_spouse($id)) {
				print("1");
			}else {
				print('<div class="text-danger">Sorry we were unable to delete a spouse, please try again...</div>');
			}
		break;

		case 'deleteDoc':
			$id = $_POST['id'];
			if($work_obj->deleteDoc($id)) {
				print(1);
			}else {
				print('<div class="text-danger">Sorry we were unable to delete a document, please try again...</div>');
			}		
		break;

		case 'deleteDeligation':
			$id = $_POST['id'];
			if($work_obj->deleteDeligation($id)) {
				print('<div class="text-success">Deligation deleted successfully</div>');
			}else {
				print('<div class="text-danger">Sorry we were unable to delete the deligation, please try again...</div>');
			}
		break;

		//SECTION Authentification
		case 'log_in':
			$email = $_POST['email'];
			$password = $_POST['password'];
			$user_obj->log_in($email, $password);
		break;

		case 'logout': 
			$user_obj->logout();
		break;

		//SECTION Default
		default:
			Echo "Oop, page requested is not available yet";
		break;
	}
}

if(isset($_FILES['doc']['name'])) {

	$description = $_POST['document_description'];
	$id = $_POST['client_id'];
	$fileN = $_FILES['doc']['name'];
	// get the file extension
	$extension = pathinfo($fileN, PATHINFO_EXTENSION);
	$filename = time().'.'.$extension;
	$error = null;
	// destination of the file on the server
	$destination = '../public/uploads/'. $filename;
	// the physical file on a temporary uploads directory on the server
	$file = $_FILES['doc']['tmp_name'];
	$size = $_FILES['doc']['size'];

	if (!in_array($extension, ['pdf', 'docx', 'doc'])) {
		$error = "document should be either pdf / docx / doc";
	} elseif ($_FILES['doc']['size'] > 10000000) { // file shouldn't be larger than 1Megabyte
		$error = "document size should not be above 10MB";
	} else {
		// move the uploaded (temporary) file to the specified destination
		if (move_uploaded_file($file, $destination) && $work_obj->addDocument($id, $description, $filename, $size, $extension))
		{
			$error = null;
		} else
		{
			$error = "An error ocurred while uploading document, please try again";
		}
	}

	if($error == null) {
		echo json_encode(array('success' => true));
	}else {
		echo json_encode(array(
			'success' => false,
			'error'   => $error
		));
	}
}



if(isset($_GET['worker_id']))
{
	$user_obj->log_out($_GET['worker_id']);
}
