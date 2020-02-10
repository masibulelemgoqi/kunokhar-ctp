$(()=>
{
// ==================================ADD USER ==============================================
//=====================================ADMIN DUTY========================================
	$('#fname').on('focusout keyup paste', ()=>
	{
		if(!validate_name($('#fname').val()))
		{
				$('#fname').removeClass("border-success");
				$('#fname').addClass("border-danger");
				print_error("status");
		}else
		{
				$('#status').html("");
				$('#fname').removeClass("border-danger");
				$('#fname').addClass("border-success");
		}

	});



	$('#lname').on('focusout keyup paste', ()=>
	{
		if(!validate_name($('#lname').val()))
		{
				$('#lname').removeClass("border-success");
				$('#lname').addClass("border-danger");
				print_error("status");
		}else
		{
			$('#lname').removeClass("border-danger");
			$('#lname').addClass("border-success");
			$('#status').html("");
		}

	});

	$('#email').on('focusout keyup paste', ()=>
	{
		if(!validate_email($('#email').val()))
		{
				$('#email').removeClass("border-success");
				$('#email').addClass("border-danger");
				print_error("status");
		}else
		{
			$('#email').removeClass("border-danger");
			$('#email').addClass("border-success");
			$('#status').html("");
		}


	});

	$('#cell_number').on('focusout keyup paste', ()=>
	{
		if(!validate_cellno($('#cell_number').val()))
		{
			$('#cell_number').removeClass("border-success");
			$('#cell_number').addClass("border-danger");
			print_error("status");
		}else
		{
			$('#cell_number').removeClass("border-danger");
			$('#cell_number').addClass("border-success");
			$('#status').html("");
		}

	});

	$('#position').on('focusout change mouseup ', ()=>
	{
		if(!validate_select($('#position').val()))
		{
			$('#position').removeClass("border-success");
			$('#position').addClass("border-danger");
			print_error("status");
		}else
		{
			$('#position').removeClass("border-danger");
			$('#position').addClass("border-success");
			$('#status').html("");
		}

	});

	$('#password').on('focusout keyup paste', ()=>
	{
		if(!validate_password($('#password').val()))
		{
			$('#password').removeClass("border-success");
			$('#password').addClass("border-danger");
			print_error("status");
		}else
		{
			$('#password').removeClass("border-danger");
			$('#password').addClass("border-success");
			$('#status').html("");
		}
	});

	$('#verify_password').on('focusout keyup paste', ()=>
	{
		if(!validate_password($('#verify_password').val()))
		{
			$('#verify_password').removeClass("border-success");
			$('#verify_password').addClass("border-danger");
			print_error("status");
		}else
		{
			$('#verify_password').removeClass("border-danger");
			$('#verify_password').addClass("border-success");
			$('#status').html("");
		}
	});

	$('#add_user').click((e)=>
	{
		e.preventDefault();
		var fname = $('#fname').val();
		var lname = $('#lname').val();
		var email = $('#email').val();
		var cell_number = $('#cell_number').val();
		var position = $('#position').val();
		var password = $('#password').val();
		var verify_password = $('#verify_password').val();

		if(validate_name(fname)  && validate_name(lname)  && validate_email(email) && validate_cellno(cell_number)  && position != "" && validate_password(password) && validate_password(verify_password))
		{
			if(password == verify_password)
			{
				$.ajax(
				{
					method: "POST",
					url: '../controller/controller.php',
					data: {fname: fname, lname: lname, email: email, cell_number: cell_number, position: position, password: password, action: "add_user"},
					success: (data)=>
					{
						$('#status').html(data);
					},
					error: (data)=>
					{
						$('#status').html(data);
					}
				});
			}else
			{
				$('#status').html("<div class='text-danger'>password does not match</div>");
			}

		}else
		{
			print_error("status");
		}
	});

//=========================================ADD CLIENT===============================================
//===================================COMPANY WORKERS DUTIES=========================================
	$('#fname').on('focusout keyup paste', ()=>
	{
		if(!validate_name($('#fname').val()))
		{
				$('#fname').addClass('border-danger');
				$('#fname').removeClass('border-success');
				print_error("status");
		}else
		{
				$('#fname').removeClass('border-danger');
				$('#fname').addClass('border-success');
				$('#status').html("");
		}

	});

	$('#lname').on('focusout keyup paste', ()=>
	{
		if(!validate_name($('#lname').val()))
		{
				$('#lname').removeClass("border-success");
				$('#lname').addClass("border-danger");
				print_error("status");
		}else
		{
			$('#lname').removeClass("border-danger");
			$('#lname').addClass("border-success");
			$('#status').html("");
		}


	});

	$('#email').on('focusout keyup paste', ()=>
	{
		if(!validate_email($('#email').val()))
		{
				$('#email').removeClass("border-success");
				$('#email').addClass("border-danger");
				print_error("status");
		}else
		{
			$('#email').removeClass("border-danger");
			$('#email').addClass("border-success");
			$('#status').html("");
		}
	});

	$('#cell_number').on('focusout keyup paste', ()=>
	{
		if(!validate_cellno($('#cell_number').val()))
		{
			$('#cellnumber').removeClass("border-success");
			$('#cellnumber').addClass("border-danger");
			print_error("status");
		}else
		{
			$('#cellnumber').removeClass("border-danger");
			$('#cellnumber').addClass("border-success");
			$('#status').html("");
		}
	});

	$('#add_client').click((e)=>
	{
		e.preventDefault();

		var fname = $('#fname').val();
		var lname = $('#lname').val();
		var email = $('#email').val();
		var cell_number = $('#cell_number').val();
		var home_address = $('#home_address').val();
		var city = $('#city').val();
		var zip_code = $('#zip_code').val();
		var person = $('#person').val();
		var title = $('#title').val();
		var initials = $('#initials').val();

		if(validate_name(fname) && validate_name(lname) && validate_email(email) && validate_cellno(cell_number) && home_address != "" && zip_code != "" && city != "" && person !="" && title != "" && initials != "")
		{
			$.ajax(
			{
				method: 'POST',
				url: '../controller/controller.php',
				data: {fname: fname, lname: lname, email: email, cell_number: cell_number, home_address: home_address, zip_code: zip_code, city: city, person: person, title: title, initials: initials, action: 'add_client'},
				success: (data)=>
				{
					$('#status').html(data);
					location.reload(6000);
				},
				error: (data)=>
				{
					$('#status').html("<div class='alert alert-danger'>Error occured</div>");
				}
			});

		}else
		{
			print_error("status");
		}

	});

	$('#edit_identification').click((e)=>
	{
		e.preventDefault();

		var client_id = $('#client_id').val();
		var fname = $('#fname').val();
		var lname = $('#lname').val();
		var email = $('#email').val();
		var cell_number = $('#cell_number').val();
		var home_address = $('#client_address').val();
		var city = $('#client_city').val();
		var zip_code = $('#client_zip_code').val();
		var title = $('#client_title').val();
		var initials = $('#client_initials').val();



		if(client_id != "" && fname != "" && lname != "" && email != "" && cell_number !="" && home_address != "" && zip_code != "" && city != "" && title != "" && initials != "")
		{
			$.ajax(
			{
				method: 'POST',
				url: '../controller/controller.php',
				data: {client_id: client_id, fname: fname, lname: lname, email: email, cell_number: cell_number, home_address: home_address, zip_code: zip_code, city: city, title: title, initials: initials, action: 'edit_client'},
				success: (data)=>
				{
					$('#status').html(data);
					location.reload(6000);
				},
				error: (data)=>
				{
					$('#status').html("<div class='alert alert-danger'>Error occured</div>");
				}
			});

		}else
		{
			$('#status').html("<div class='alert alert-danger'>All fields are required</div>");
		}

	});


	$("#add_natural").click((e)=>
	{
		e.preventDefault();
		var client_id = $('#client_id__').val();
		var fname = $('#fname__').val();
		var lname = $('#lname__').val();
		var mname = $('#mname__').val();
		var dob = $('#dob__').val();
		var id_number = $('#id_number__').val();
		var marital_status = $('#marital_status').val();
		var marriage_type = $('#marriage_type').val();

		if(fname != "" && lname != "" && mname != "" && dob != "" && id_number !="" && marital_status)
		{
			$.ajax(
			{
				method: 'POST',
				url: '../controller/controller.php',
				data: {client_id: client_id, fname: fname, lname: lname, mname: mname, dob: dob, id_number: id_number, marital_status: marital_status, marriage_type: marriage_type, action: 'add_natural'},
				success: (data) =>
				{
					if(data == "1")
					{
						$("#n_status").html("<div class='alert alert-success'>Details added successfully</div>");
						location.reload(6000);
					}else
					{
						$("#n_status").html(data);
					}

				},
				error: (data)=>
				{
					$("#n_status").html(data);
				}
			});
		}else
		{
			$("#n_status").html("<div class='alert alert-danger'> All fields are required</div>");
		}

	});

	$("#edit_natural_save").click((e)=>
	{
		e.preventDefault();
		var n_id = $('#ne_id').val();
		var mname = $('#ne_middle_name').val();
		var dob = $('#ne_dob').val();
		var id_number = $('#ne_id_number').val();
		var marital_status = $('#ne_marital_status').val();
		var marriage_type = $('#ne_marriage_type').val();

		if(n_id != "" && mname != "" && dob != "" && id_number !="" && marital_status)
		{
			$.ajax(
			{
				method: 'POST',
				url: '../controller/controller.php',
				data: {n_id: n_id, mname: mname, dob: dob, id_number: id_number, marital_status: marital_status, marriage_type: marriage_type, action: 'edit_natural'},
				success: (data) =>
				{
					if(data == "1")
					{
						$("#ne_status").html("<div class='alert alert-success'>Details updated successfully</div>");
						location.reload(6000);
					}else
					{
						$("#ne_status").html(data);
					}

				},
				error: (data)=>
				{
					$("#ne_status").html(data);
				}
			});
		}else
		{
			$("#ne_status").html("<div class='alert alert-danger'> All fields are required</div>");
		}

	});


	$('#add_juristic').click((e)=>
	{
		e.preventDefault();
		var client_id = $('#client_id').val();
		var company_name = $('#company_name').val();
		var registration_date = $('#registration_date').val();
		var registration_number = $('#registration_number').val();

		if(company_name != "" && registration_number != "" && registration_date != "")
		{
			$.ajax(
			{
				method: 'POST',
				url: '../controller/controller.php',
				data: {client_id: client_id, company_name: company_name, registration_date: registration_date, registration_number: registration_number, action: 'add_juristic'},
				success: (data)=>
				{
					if(data == "1")
					{
						location.reload();
					}else
					{
						$('#j_status').html(data);
					}

				},
				error: (data)=>
				{
					$('#j_status').html(data);
				}
			});
		}else
		{
			$('#j_status').html("<div class='alert alert-danger'>All fields are required</div>");
		}

	});

	$('#edit_juristic_save').click((e)=>
	{
		e.preventDefault();
		var j_id = $('#j_id').val();
		var company_name = $('#company_name_').val();
		var registration_date = $('#registration_date_').val();
		var registration_number = $('#registration_number_').val();

		if(company_name != "" && registration_number != "" && registration_date != "")
		{
			$.ajax(
			{
				method: 'POST',
				url: '../controller/controller.php',
				data: {j_id: j_id, company_name: company_name, registration_date: registration_date, registration_number: registration_number, action: 'edit_juristic'},
				success: (data)=>
				{
					if(data == "1")
					{
						$('#j_status').html("<div class='alert alert-success'>Information edited successfully</div>");
						location.reload(6000);
					}else
					{
						$('#j_status').html(data);
					}

				},
				error: (data)=>
				{
					$('#j_status').html(data);
				}
			});
		}else
		{
			$('#j_status').html("<div class='alert alert-danger'>All fields are required</div>");
		}

	});

	$('#add_company_member').click((e)=>
	{
		e.preventDefault();
		var fname = $('#j_fname').val();
		var lname = $('#j_lname').val();
		var j_id = $('#j_id').val();
		var title = $('#j_title').val();
		var id_number = $('#j_id_number').val();
		var date_of_appointment = $('#j_date_of_appointment').val();
		alert(fname+"  "+lname+"  "+j_id+"  "+title+"  "+id_number+"  "+date_of_appointment);

		if(fname != "" && lname != "" && j_id != "" && title != "" && id_number != "" && date_of_appointment != "")
		{
			$.ajax(
			{
				method: 'POST',
				url: '../controller/controller.php',
				data: {fname: fname, lname: lname, j_id: j_id, title: title, id_number: id_number, date_of_appointment: date_of_appointment, action: 'add_company_member'},
				success: (data)=>
				{
					if(data == "1")
					{
						$('#fname').val("");
						$('#lname').val("");
						$('#title').val("");
						$('#id_number').val("");
						$('#date_of_appointment').val("");
						$('#member_status').html('<div class="alert alert-success">Company member added successfully, You can add another one or please refresh the page to see the member</div>');
					}else
					{
						$('#member_status').html(data);
					}

				},
				error: (data)=>
				{
					$('#member_status').html(data);
				}
			});
		}else
		{
			$('#member_status').html('<div class="alert alert-danger">All fields are required</div>');
		}

	});

	$('#add_share_holder').click((e)=>
	{
		e.preventDefault();

		var fname = $('#fname_').val();
		var lname = $('#lname_').val();
		var j_id = $('#j_id_').val();
		var title = $('#title_').val();
		var id_number = $('#id_number_').val();
		var amount_contributed = $('#amount_contributed').val();

		if(fname != "" && lname != "" && j_id != "" && title != "" && id_number != "" && amount_contributed != "")
		{
			$.ajax(
			{
				method: 'POST',
				url: '../controller/controller.php',
				data: {fname: fname, lname: lname, j_id: j_id, title: title, id_number: id_number, amount_contributed: amount_contributed , action: 'add_share_holder'},
				success: (data)=>
				{
					if(data == "1")
					{
						$('#fname_').val("");
						$('#lname_').val("");
						$('#title_').val("");
						$('#id_number_').val("");
						$('#amount_contributed').val("");
						$('#holder_status').html('<div class="alert alert-success">Share holder added successfully, You can add another one or please refresh the page to see the member</div>');
					}else
					{
						$('#holder_status').html(data);
					}
				},
				error: (data)=>
				{
					$('#holder_status').html(data);
				}
			});
		}else
		{
			$('#holder_status').html('<div class="alert alert-danger">All fields are required</div>');
		}
	});

	$('#add_civil').click((e)=>
	{
		e.preventDefault();

		var natural_id = $('#natural_id').val();
		var spouse_fname = $('#spouse_fname').val();
		var spouse_lname = $('#spouse_lname').val();
		var certificate_no = $('#certificate_no').val();
		var spouse_id_number = $('#spouse_id_number').val();
		var date_of_issue = $('#date_of_issue').val();
		var marriage_terms = $('#marriage_terms').val();
		var detail_of_marriage = $('#detail_of_marriage').val();


		if(natural_id != "" && spouse_fname != "" && spouse_lname != "" && certificate_no != "" && date_of_issue != "" && marriage_terms != "" && detail_of_marriage != "" && spouse_id_number !="")
		{
			$.ajax(
			{
				method: 'POST',
				url: '../controller/controller.php',
				data: {natural_id: natural_id, spouse_fname: spouse_fname, spouse_lname: spouse_lname, certificate_no: certificate_no, date_of_issue: date_of_issue, marriage_terms: marriage_terms, detail_of_marriage: detail_of_marriage, spouse_id_number: spouse_id_number, action: 'add_civil'},
				success: (data)=>
				{
					if(data == "1")
					{
						$("#c_status").html("<div class='alert alert-success'>successfully added data</div>");
					}else
					{
						$("#c_status").html(data);
					}
				},

				error: (data)=>
				{
					$("#c_status").html("<div class='alert alert-danger'>Error occured</div>");
				}
			});

		}else
		{
			$("#c_status").html("<div class='alert alert-danger'>All fields are required</div>");
		}
	});

	$('#edit_civil').click((e)=>
	{
		e.preventDefault();

		var c_id = $('#spouse_id').val();
		var spouse_fname = $('#spouse_fname').val();
		var spouse_lname = $('#spouse_lname').val();
		var certificate_no = $('#certificate_no').val();
		var spouse_id_number = $('#spouse_id_number').val();
		var date_of_issue = $('#date_of_issue').val();
		var marriage_terms = $('#marriage_terms').val();
		var detail_of_marriage = $('#detail_of_marriage').val();



		if(c_id != "" && spouse_fname != "" && spouse_lname != "" && certificate_no != "" && date_of_issue != "" && marriage_terms != "" && detail_of_marriage != "" && spouse_id_number !="")
		{
			$.ajax(
			{
				method: 'POST',
				url: '../controller/controller.php',
				data: {c_id: c_id, spouse_fname: spouse_fname, spouse_lname: spouse_lname, certificate_no: certificate_no, date_of_issue: date_of_issue, marriage_terms: marriage_terms, detail_of_marriage: detail_of_marriage, spouse_id_number: spouse_id_number, action: 'edit_civil'},
				success: (data)=>
				{
					if(data == "1")
					{
						$("#c_status").html("<div class='alert alert-success'>successfully editted data</div>");
						location.reload(600);
					}else
					{
						$("#c_status").html(data);
					}
				},

				error: (data)=>
				{
					$("#c_status").html("<div class='alert alert-danger'>Error occured</div>");
				}
			});

		}else
		{
			$("#c_status").html("<div class='alert alert-danger'>All fields are required</div>");
		}
	});

	$('#register_idea').click((e)=>
	{
		e.preventDefault();
		var client_id = $('#client_id').val();
		var idea_name = $('#idea_name').val();
		var idea_trademark = $('#idea_trademark').val();
		var idea_nature = $('#idea_nature').val();
		var idea_target_market = $('#idea_target_market').val();

		if(client_id != "" && idea_name != "" && idea_trademark != "" && idea_nature != "" && idea_target_market != "")
		{
			$.ajax(
			{
				method: 'POST',
				url: '../controller/controller.php',
				data: {client_id: client_id, idea_name: idea_name, idea_trademark: idea_trademark, idea_nature: idea_nature, idea_target_market: idea_target_market, action: 'add_idea'},
				success: (data)=>
				{
					if(data == "1")
					{
						$('#idea_status').html('<div class="alert alert-success">Successfully added the idea, note that you can now add logo of the idea</div>');
						location.reload(6000);
					}else
					{
						$('#idea_status').html(data);
					}
				}
			});
		}else
		{
			alert('<div class="alert alert-danger">All the fields are required</div>');
			$('#idea_status').html('<div class="alert alert-danger">All the fields are required</div>');
		}
	});



	$('#add_spouse').click((e)=>
	{
		e.preventDefault();
		var id = $('#cs_fk_id').val();
		var fname = $('#cs_fname').val();
		var lname = $('#cs_lname').val();
		var id_number = $('#id_number').val();
		var stages_of_negotiation = $('#cs_stages_of_negotiation').val();

		if(id !="" && fname != "" && lname != "" && stages_of_negotiation != "" && id_number != "")
		{
			$.ajax(
			{
				method: 'POST',
				url: '../controller/controller.php',
				data: {id: id, fname: fname, lname: lname, id_number:id_number, stages_of_negotiation: stages_of_negotiation, action: 'add_spouse'},
				success: (data) =>
				{
					if(data == "1")
					{
						$('#cs_status').html("<div class='alert alert-success'>Information added successfully</div>");
					}else
					{
						$('#cs_status').html(data);
					}
				}
			});
		}else
		{
			$('#cs_status').html("<div class='alert alert-danger'>All fields are required</div>");
		}


	});

	$('#add_beneficiary').click((e)=>
	{
		e.preventDefault();
		var id = $('#client_id').val();
		var fname = $('#b_fname').val();
		var lname = $('#b_lname').val();
		var id_number = $('#b_id_number').val();

		if(id !="" && fname != "" && lname != "" && id_number != "")
		{
			$.ajax(
			{
				method: 'POST',
				url: '../controller/controller.php',
				data: {id: id, fname: fname, lname: lname, id_number:id_number, action: 'add_beneficiary'},
				success: (data) =>
				{
					if(data == "1")
					{
						$('#b_status').html("<div class='alert alert-success'>Beneficiary added successfully</div>");
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


	});



	$('#log_in').click((e)=>
	{
		e.preventDefault();
		var email = $('#email').val();
		var password = $('#password').val();
		if(email != "" && password != "")
		{

			$.ajax(
			{
				method: "POST",
				url: 'controller/controller.php',
				data: {email: email, password: password, action: "log_in"},
				success: (data)=>
				{
					if(data == "1")
					{
						window.location.replace("view/main.php");
					}else
					{
						$('#status').html(data);
					}

				},
				error: (data)=>
				{
					$('#status').html(data);
				}
			});


		}else
		{
			$('#status').html("<div class='alert alert-danger'> All fields are required</div>");
		}
	});
});
