
	//add deligation

	function add_deligation(id)
	{

		var fname = $('#d_fname_'+id).val();
		var lname = $('#d_lname_'+id).val();
		var id_number = $('#d_id_number_'+id).val();

		if(id !="" && fname != "" && lname != "" && id_number != "")
		{
			$.ajax(
			{
				method: 'POST',
				url: '../controller/controller.php',
				data: {id: id, fname: fname, lname: lname, id_number: id_number, action: 'add_deligation'},
				success: (data) =>
				{
					if(data == "1")
					{
						$('#d_status_'+id).html("<div class='alert alert-success'>Information added successfully</div>");
					}else
					{
						$('#d_status_'+id).html(data);
					}
				}
			});
		}else
		{
			$('#d_status_'+id).html("<div class='alert alert-danger'>All fields are required</div>");
		}
	}

	//verify documents
	function verify_doc(document_id)
	{
		$.ajax(
		{
			method: 'POST',
			url: '../controller/controller.php',
			data: {document_id: document_id, action: "verify_doc"},
			success: (data)=>
			{
				if(data == "1")
				{
					$('#verify-'.document_id).html('<div class="alert alert-success">Document verified</div>');
					location.reload(6000);
				}else
				{
					$('#verify-'.document_id).html(data);
				}
			}
		});
	}
	//company member functions
	function view_member(id)
	{
		$('#edit_member'+id).hide();
		$('#view_member'+id).show();
	}

	function edit_member_view(id)
	{
		$('#edit_member'+id).show();
		$('#view_member'+id).hide();
	}

	function cancel_cm(id)
	{
		$('#edit_member'+id).hide();
		$('#view_member'+id).show();
	}

	function update_identification(id)
	{
		$('#view_ident').hide();
		$('#hidden_ident').show();

	}

	function cancel_edit_client()
	{
		$('#view_ident').show();
		$('#hidden_ident').hide();
	}

	//edit
	function edit_company_member(id)
	{
		var cm_id = id;
		var fname = $('#fname-'+id).val();
		var lname = $('#lname-'+id).val();
		var title = $('#title-'+id).val();
		var id_number = $('#id_number-'+id).val();
		var date_of_appointment = $('#date_of_appointment-'+id).val();
		alert(fname+"  "+lname+"  "+title+"  "+id_number+"  "+date_of_appointment);

		if(fname != "" && lname != "" && title != "" && id_number != "" && date_of_appointment != "")
		{
			$.ajax(
			{
				method: 'POST',
				url: '../controller/controller.php',
				data: {cm_id: cm_id, fname: fname, lname: lname, title: title, id_number: id_number, date_of_appointment: date_of_appointment, action: 'edit_company_member'},
				success: (data)=>
				{
					if(data == "1")
					{
						$('#member_status-'+id).html('<div class="alert alert-success">Company member updated successfully</div>');
					}else
					{
						$('#member_status-'+id).html(data);
					}

				},
				error: (data)=>
				{
					$('#member_status-'+id).html(data);
				}
			});
		}else
		{
			$('#member_status-'+id).html('<div class="alert alert-danger">All fields are required</div>');
		}

	}

	function edit_share_holder(id)
	{
		var sh_id = id;
		var fname = $('#fname_'+id).val();
		var lname = $('#lname_'+id).val();
		var j_id = $('#j_id_'+id).val();
		var title = $('#title_'+id).val();
		var id_number = $('#id_number_'+id).val();
		var amount_contributed = $('#amount_contributed_'+id).val();

		if(fname != "" && lname != "" && sh_id != "" && title != "" && id_number != "" && amount_contributed != "")
		{
			$.ajax(
			{
				method: 'POST',
				url: '../controller/controller.php',
				data: {sh_id: sh_id, fname: fname, lname: lname, title: title, id_number: id_number, amount_contributed: amount_contributed , action: 'edit_share_holder'},
				success: (data)=>
				{
					if(data == "1")
					{

						$('#holder_status_'+id).html('<div class="alert alert-success">Share holder Updated successfully</div>');
					}else
					{
						$('#holder_status_'+id).html(data);
					}
				},
				error: (data)=>
				{
					$('#holder_status_'+id).html(data);
				}
			});
		}else
		{
			$('#holder_status_'+id).html('<div class="alert alert-danger">All fields are required</div>');
		}
	}

	//stake holder functions
	function view_holder(id)
	{
		$('#edit_holder_view_'+id).hide();
		$('#view_holder'+id).show();
	}

	function edit_holder_view(id)
	{
		$('#edit_holder_view_'+id).show();
		$('#view_holder'+id).hide();
	}
	function cancel_sh(id)
	{
		$('#edit_holder_view_'+id).hide();
		$('#view_holder'+id).show();
	}


	function delete_member(str)
	{

		var cm_id = str;
		var r = confirm("Are you sure you want to delete a company member? press okay if yes");
		if (r == true)
		{
		  $.ajax(
		  {
		  	method: 'POST',
		  	url: '../controller/controller.php',
		  	data: {cm_id: cm_id, action: 'delete_member'},
		  	success: (data) =>
		  	{

		  		if(data == "1")
		  		{
		  			$('#member_del_status').html("<div class='alert alert-success'>member Deleted</div>");
		  			location.reload(6000);
		  		}else
		  		{
		  			$('#member_del_status').html(data);
		  		}
		  	},
		  	error: (data) =>
		  	{
		  		$('#member_del_status').html(data);
		  	}
		  });
		}


	}

	function delete_holder(str)
	{

		var r = confirm("Are you sure you want to delete a Share holder? press okay if yes");
		if (r == true)
		{
		  var sh_id = str;
		  $.ajax(
		  {
		  	method: 'POST',
		  	url: '../controller/controller.php',
		  	data: {sh_id: sh_id, action: 'delete_holder'},
		  	success: (data) =>
		  	{

		  		if(data == "1")
		  		{
		  			$('#holder_del_status').html("<div class='alert alert-success'>holder deleted</div>");
		  			location.reload(6000);
		  		}else
		  		{
		  			$('#holder_del_status').html(data);
		  		}
		  	},
		  	error: (data) =>
		  	{
		  		$('#holder_del_status').html(data);
		  	}
		  });
		}
	}

///beneficiary functions

//edit

function edit_beneficiary(id)
{
	var id = id;
	var fname = $('#b_fname'+id).val();
	var lname = $('#b_lname'+id).val();
	var id_number = $('#b_id_number'+id).val();

	if(id !="" && fname != "" && lname != "" && id_number != "")
	{
		$.ajax(
		{
			method: 'POST',
			url: '../controller/controller.php',
			data: {id: id, fname: fname, lname: lname, id_number:id_number, action: 'edit_beneficiary'},
			success: (data) =>
			{
				if(data == "1")
				{
					$('#b_status').html("<div class='alert alert-success'>Beneficiary updated successfully</div>");
					location.reload(6000);
				}else
				{
					$('#b_status').html(data);
				}
			}
		});
	}else
	{
		$('#b_status').html("<div class='alert alert-danger'>All fields are required</div>");
	}
}

//delete beneficiary
function delete_beneficiary(id)
{

	var r = confirm("Are you sure you want to delete a beneficiary? press okay if yes");
	if (r == true)
	{
	  var b_id = id;
	  $.ajax(
	  {
	  	method: 'POST',
	  	url: '../controller/controller.php',
	  	data: {b_id: b_id, action: 'delete_beneficiary'},
	  	success: (data) =>
	  	{

	  		if(data == "1")
	  		{
	  			$('#beneficiary_status').html("<div class='alert alert-success'>beneficiary deleted</div>");
	  			location.reload(6000);
	  		}else
	  		{
	  			$('#beneficiary_status').html(data);
	  		}
	  	},
	  	error: (data) =>
	  	{
	  		$('#beneficiary_status').html(data);
	  	}
	  });
	}

}


//edit idea

function idea_edit(id)
{
	$('#view_idea'+id).hide();
	$('#edit_idea'+id).removeClass('w3-hide');
	$('#edit_idea'+id).show();
}

function cancel_idea_edit(id)
{
	$('#view_idea'+id).show();
	$('#edit_idea'+id).hide();
}

function edit_idea_save(id)
{

	var idea_name = $('#idea_name_'+id).val();
	var idea_trademark = $('#idea_trademark'+id).val();
	var idea_nature = $('#idea_nature'+id).val();
	var idea_target_market = $('#idea_target_market'+id).val();

	if(id != "" && idea_name != "" && idea_trademark != "" && idea_nature != "" && idea_target_market != "")
	{
		$.ajax(
		{
			method: 'POST',
			url: '../controller/controller.php',
			data: {id: id, idea_name: idea_name, idea_trademark: idea_trademark, idea_nature: idea_nature, idea_target_market: idea_target_market, action: 'edit_idea'},
			success: (data)=>
			{
				if(data == "1")
				{
					$('#idea_status'+id).html('<div class="alert alert-success">Successfully editted idea</div>');
					location.reload(6000);
				}else
				{
					$('#idea_status'+id).html(data);
				}
			}
		});
	}else
	{
		$('#idea_status'+id).html('<div class="alert alert-danger">All the fields are required</div>');
	}
}

//delete user/ worker

function delete_user(id)
{
		var r = confirm("Are you sure you want to delete this worker? press okay if yes");
		if (r == true)
		{
		  var user_id = id;
		  $.ajax(
		  {
		  	method: 'POST',
		  	url: '../controller/controller.php',
		  	data: {user_id: user_id, action: 'delete_user'},
		  	success: (data) =>
		  	{

		  		if(data == "1")
		  		{
		  			$('#status').html("<div class='alert alert-success'>Worker deleted successfully</div>");
		  			location.reload(6000);
		  		}else
		  		{
		  			$('#status').html(data);
		  		}
		  	},
		  	error: (data) =>
		  	{
		  		$('#status').html(data);
		  	}
		  });
		}
}


//delete customary spouse

function delete_spouse(id)
{

	var r = confirm("Are you sure you want to delete the spouse? press okay if yes");
	if (r == true)
	{
		var cs_id = id;
		$.ajax(
		{
			method: 'POST',
			url: '../controller/controller.php',
			data: {cs_id: cs_id, action: 'delete_spouse'},
			success: (data) =>
			{

				if(data == "1")
				{
					$('#s_status').html("<div class='alert alert-success'>spouse deleted successfully</div>");
					location.reload(6000);
				}else
				{
					$('#s_status').html(data);
				}
			},
			error: (data) =>
			{
				$('#s_status').html(data);
			}
		});
	}

}
