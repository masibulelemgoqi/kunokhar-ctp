<?php
require('../model/User.class.php');
require('../model/Work.class.php');

$user_obj = new User();
$work_obj = new Work();

if(isset($_POST['action']))
{
	$action = $_POST['action'];

	switch ($action) {
		//add
		case 'add_user':
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$email = $_POST['email'];
			$position = $_POST['position'];
			$password = $_POST['password'];
			$cell_number = $_POST['cell_number'];
			if($user_obj->add_user($fname, $lname, $email, $position, $password, $cell_number))
			{
				print("<div class='alert alert-success'>User has been successfully added</div>");
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


			if($work_obj->add_client($fname, $lname, $email, $cell_number, $home_address, $city, $zip_code, $person, $title, $initials))
			{
				print("<div class='alert alert-success'>Client added successfully, now refresh the page to work more on this client</div>");
			}

			break;

		case 'add_juristic':
			$client_id = $_POST['client_id'];
			$company_name = $_POST['company_name'];
			$registration_date = $_POST['registration_date'];
			$registration_number = $_POST['registration_number'];

			if($work_obj->add_juristic($client_id, $company_name, $registration_number, $registration_date))
			{
				print("1");
			}else
			{
				print("<div class='alert alert-danger'>Could not add data</div>");
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

			if($work_obj->add_natural($client_id, $fname, $lname, $mname, $dob, $id_number, $marital_status, $marriage_type))
			{
				print("1");
			}else
			{
				print("<div class='alert alert-danger'>Could not add data</div>");
			}
			break;

		case 'add_company_member':

			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$title = $_POST['title'];
			$j_id = $_POST['j_id'];
			$id_number = $_POST['id_number'];
			$date_of_appointment = $_POST['date_of_appointment'];

			if($work_obj->add_company_member($j_id, $fname, $lname, $title, $id_number, $date_of_appointment))
			{
				print('1');
			}else
			{
				print('<div class="alert alert-danger">Sorry we were unable to add the member, please try again...</div>');
			}
			break;

		case 'add_share_holder':

			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$title = $_POST['title'];
			$j_id = $_POST['j_id'];
			$id_number = $_POST['id_number'];
			$amount_contributed = $_POST['amount_contributed'];

			if($work_obj->add_share_holder($j_id, $fname, $lname, $title, $id_number, $amount_contributed))
			{
				print('1');
			}else
			{
				print('<div class="alert alert-danger">Sorry we were unable to add the share holder, please try again...</div>');
			}
			break;

		case 'add_idea':

			$client_id = $_POST['client_id'];
			$idea_name = $_POST['idea_name'];
			$idea_trademark = $_POST['idea_trademark'];
			$idea_nature = $_POST['idea_nature'];
			$idea_target_market = $_POST['idea_target_market'];

			if($work_obj->add_idea($client_id, $idea_name, $idea_trademark, $idea_nature, $idea_target_market))
			{
				print("1");
			}else
			{
				print("<div class='alert alert-danger'>Error adding idea</div>");
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

			if($work_obj->add_civil($natural_id, $spouse_fname, $spouse_lname, $spouse_id_number, $certificate_no, $date_of_issue, $marriage_terms, $detail_of_marriage))
			{
				print("1");
			}else
			{
				print("<div class='alert alert-danger'>Could not add information</div>");
			}
			break;

			case 'edit_civil':
				$c_id = $_POST['c_id'];
				$spouse_fname = $_POST['spouse_fname'];
				$spouse_lname = $_POST['spouse_lname'];
				$certificate_no = $_POST['certificate_no'];
				$date_of_issue = $_POST['date_of_issue'];
				$marriage_terms = $_POST['marriage_terms'];
				$detail_of_marriage = $_POST['detail_of_marriage'];
				$spouse_id_number = $_POST['spouse_id_number'];

				if($work_obj->edit_civil($c_id, $spouse_fname, $spouse_lname, $spouse_id_number, $certificate_no, $date_of_issue, $marriage_terms, $detail_of_marriage))
				{
					print("1");
				}else
				{
					print("<div class='alert alert-danger'>Could not edit information</div>");
				}
				break;

		case 'upload_document':

			$doc_description = $_POST['doc_description'];
			/*$filename = $_FILES['fd']['name'];*/

			echo $doc_description;
			break;

		case 'add_deligation':

				$id = $_POST['id'];
				$fname = $_POST['fname'];
				$lname = $_POST['lname'];
				$id_number = $_POST['id_number'];

				if($work_obj->add_customary_deligation($id, $fname, $lname, $id_number))
				{
					print("1");
				}else
				{
					print("<div class='alert alert-danger'>Could not add information</div>");
				}
			break;

		case 'add_spouse':

				$id = $_POST['id'];
				$fname = $_POST['fname'];
				$lname = $_POST['lname'];
				$stages_of_negotiation = $_POST['stages_of_negotiation'];
				$id_number = $_POST['id_number'];

				if($work_obj->add_customary_spouse($id, $fname, $lname, $id_number, $stages_of_negotiation))
				{
					print("1");
				}else
				{
					print("<div class='alert alert-danger'>Could not add information</div>");
				}
			break;

		case 'add_beneficiary':

				$id = $_POST['id'];
				$fname = $_POST['fname'];
				$lname = $_POST['lname'];
				$id_number = $_POST['id_number'];

				if($work_obj->add_beneficiary($id, $fname, $lname, $id_number))
				{
					print("1");
				}else
				{
					print("<div class='alert alert-danger'>Could not add information</div>");
				}
			break;



			//edit
		case 'edit_company_member':

			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$title = $_POST['title'];
			$cm_id = $_POST['cm_id'];
			$id_number = $_POST['id_number'];
			$date_of_appointment = $_POST['date_of_appointment'];

			if($work_obj->edit_company_member($cm_id, $fname, $lname, $title, $id_number, $date_of_appointment))
			{
				print('1');
			}else
			{
				print('<div class="alert alert-danger">Sorry we were unable to edit the member, please try again...</div>');
			}
			break;

		case 'edit_share_holder':

			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$title = $_POST['title'];
			$sh_id = $_POST['sh_id'];
			$id_number = $_POST['id_number'];
			$amount_contributed = $_POST['amount_contributed'];

			if($work_obj->edit_share_holder($sh_id, $fname, $lname, $title, $id_number, $amount_contributed))
			{
				print('1');
			}else
			{
				print('<div class="alert alert-danger">Sorry we were unable to edit the share holder, please try again...</div>');
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

			if($work_obj->edit_client($id ,$fname, $lname, $email, $cell_number, $home_address, $zip_code, $city, $title, $initials))
			{
				print("<div class='alert alert-success'>Client updated successfully</div>");
			}else
			{
				print("<div class='alert alert-danger'>Could not update Client</div>");
			}

			break;


		case 'verify_doc':

			$document_id = $_POST['document_id'];

			if($work_obj->verify_doc($document_id))
			{
				print("1");
			}else
			{
				print("<div class='alert alert-danger'>Could not verify document</div>");
			}
			break;

		case 'edit_juristic':
			$j_id = $_POST['j_id'];
			$company_name = $_POST['company_name'];
			$registration_date = $_POST['registration_date'];
			$registration_number = $_POST['registration_number'];

			if($work_obj->edit_juristic($j_id, $company_name, $registration_number, $registration_date))
			{
				print("1");
			}else
			{
				print("<div class='alert alert-danger'>Could not add data</div>");
			}
			break;


		case 'edit_beneficiary':

				$id = $_POST['id'];
				$fname = $_POST['fname'];
				$lname = $_POST['lname'];
				$id_number = $_POST['id_number'];

				if($work_obj->edit_beneficiary($id, $fname, $lname, $id_number))
				{
					print("1");
				}else
				{
					print("<div class='alert alert-danger'>Could not add information</div>");
				}
			break;

		case 'edit_natural':
			$n_id = $_POST['n_id'];
			$mname = $_POST['mname'];
			$dob = $_POST['dob'];
			$id_number = $_POST['id_number'];
			$marital_status = $_POST['marital_status'];
			$marriage_type = $_POST['marriage_type'];

			if($work_obj->edit_natural($n_id, $mname, $dob, $id_number, $marital_status, $marriage_type))
			{
				print("1");
			}else
			{
				print("<div class='alert alert-danger'>Could not add data</div>");
			}
			break;

		case 'edit_idea':

			$id = $_POST['id'];
			$idea_name = $_POST['idea_name'];
			$idea_trademark = $_POST['idea_trademark'];
			$idea_nature = $_POST['idea_nature'];
			$idea_target_market = $_POST['idea_target_market'];

			if($work_obj->edit_idea($id, $idea_name, $idea_trademark, $idea_nature, $idea_target_market))
			{
				print("1");
			}else
			{
				print("<div class='alert alert-danger'>Error while editting idea</div>");
			}
			break;


			//delete
		case 'delete_member':

			$cm_id = $_POST['cm_id'];

			if($work_obj->delete_member($cm_id))
			{
				print("1");
			}else
			{
				print('<div class="alert alert-danger">Sorry we were unable to delete a company member, please try again...</div>');
			}
			break;

		case 'delete_holder':

			$sh_id = $_POST['sh_id'];

			if($work_obj->delete_holder($sh_id))
			{
				print("1");
			}else
			{
				print('<div class="alert alert-danger">Sorry we were unable to delete a share holder, please try again...</div>');
			}
			break;

		case 'delete_beneficiary':

			$b_id = $_POST['b_id'];

			if($work_obj->delete_beneficiary($b_id))
			{
				print("1");
			}else
			{
				print('<div class="alert alert-danger">Sorry we were unable to delete a beneficiary, please try again...</div>');
			}
			break;

		case 'delete_user':

			$id = $_POST['user_id'];
			if($user_obj->delete_user($id))
			{
				print("1");
			}else
			{
				print('<div class="alert alert-danger">Sorry we were unable to delete a worker, please try again...</div>');
			}
			break;

		case 'delete_spouse':

			$id = $_POST['cs_id'];
			if($work_obj->delete_customary_spouse($id))
			{
				print("1");
			}else
			{
				print('<div class="alert alert-danger">Sorry we were unable to delete a spouse, please try again...</div>');
			}

			break;

		//other functions
		case 'log_in':

			$email = $_POST['email'];
			$password = $_POST['password'];
			if($user_obj->log_in($email, $password))
			{
				echo "1";
			}else
			{
				print("<div class='alert alert-danger'>Cannot login, make sure you provide correct details</div>");
			}
			break;


		default:
			# code...
			break;
	}
}



if(isset($_POST['document_description']) && isset($_FILES['file']['name']) && isset($_POST['add_document']))
{
	$description = $_POST['document_description'];
	$id = $_POST['client_id'];
	$filename = $_FILES['file']['name'];

      // destination of the file on the server
      $destination = '../public/uploads/'. $filename;
      // get the file extension
      $extension = pathinfo($filename, PATHINFO_EXTENSION);
      // the physical file on a temporary uploads directory on the server
      $file = $_FILES['file']['tmp_name'];
      $size = $_FILES['file']['size'];
      if (!in_array($extension, ['pdf', 'docx', 'png', 'jpg']))
      {

         header("Location: ../view/work_on_client.php?client_id=".$id."");
      } elseif ($_FILES['file']['size'] > 100000000) { // file shouldn't be larger than 1Megabyte
         header("Location: ../view/work_on_client.php?client_id=".$id."");
      } else
      {
         // move the uploaded (temporary) file to the specified destination
         if (move_uploaded_file($file, $destination) && $work_obj->add_document($id, $description, $filename, $size, $extension))
         {
        	 header("Location: ../view/work_on_client.php?client_id=".$id."");
         } else
         {
         	header("Location: ../view/work_on_client.php?client_id=".$id."");
         }
      }

}

if(isset($_GET['doc_name']))
{
	$work_obj->readPDF($_GET['doc_name']);
}

if(isset($_GET['idea_g_id']))
{
	$work_obj->generateCertificate($_GET['idea_g_id']);
}


if(isset($_GET['worker_id']))
{
	$user_obj->log_out($_GET['worker_id']);
}
