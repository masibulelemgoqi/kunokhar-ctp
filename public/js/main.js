
// ANCHOR  Load pages

window.onload = function() {
	var url = window.location.href.split("/");
	page = url[url.length - 1].trim();

	switch(page) {
		case 'main.php':
			loadMain();
		break;
	}
}
// ANCHOR  variables
var error = null;
var companyName = null;
var companyRegNumber = null;
var companyRegDate = null;
var sector = null;
var documentsCount = 0;
var ideasCount = 0;

// ANCHOR  All events
$(()=> {
	$('.hide_first').hide();
	$('#idea_add').hide();
	$('#hidden_ident').hide();
	$('#marriage_type').hide();
	$('#ne_marriage_type').hide();
	$('#add_user_container').hide();
	$('.idea_hide_first').hide();
	$('#juristic_edit').hide();
	$('#natural_edit').hide();
    $('.m_type').hide();
	$('#civil_edit_container').hide();

	$('#idea_edit').click(function(e) {
		e.preventDefault();
		$('.idea_show_first').hide();
		$('.idea_hide_first').show();

	});

	$('#cancel_idea_edit').click(function(e) {
		e.preventDefault();
		$('.idea_show_first').show();
		$('.idea_hide_first').hide();
	});


	$('#add_user_btn').click(function(e) {
		$('#add_user_container').toggle();
	});

	$('#idea_container').click(function(e) {
		$('#idea_add').toggle();
		$('html, body').animate({
        scrollTop: $("#idea_add").offset().top}, 2000);
	});

	$("#marital_status").change(function(e) {
	  e.preventDefault();
	  if ($("#marital_status").val() == "Married") {
	    $('#marriage_type').show();
	  }else {
	    $('#marriage_type').hide();
	  }
	});

	$("#marital_status").trigger("change");

	$("#ne_marital_status").change(function(e) {
	  e.preventDefault();
	  if ($("#ne_marital_status").val() == "Married") {
	    $('#ne_marriage_type').show();
	    $('.m_type').show();
	  }else {
	    $('#ne_marriage_type').hide();
	    $('.m_type').hide();
	  }
	});

	$("#ne_marital_status").trigger("change");

	$('#edit_cm').click(function(e) {
		e.preventDefault();
		$('#view_member').hide();
		$('#edit_member').show();
	});

	$('.close').click(function(e) {
		window.location.reload(1);
	});

	$('#user-edit').click(function(e) {
		$('.show_first').hide();
		$('.hide_first').show();
		
	});

	$('#cancel_edit').click(function(e) {
		$('.show_first').show();
		$('.hide_first').hide();
	});

	$('#edit_natural').click(function(e) {
		$('#natural_view').hide();
		$('#natural_edit').show();
	});

	// SECTION  Authentification
	$('#log_in').click(function(e) {
		e.preventDefault();
		var email = $('#email').val();
		var password = $('#password').val();
		if(email == "" || password == ""){
			$('#status').html("<div class='alert alert-danger'> All fields are required</div>");
			return;
		}

		$.ajax({
			method: "POST",
			url: 'controller/controller.php',
			data: {email: email, password: password, action: "log_in"}
		}).then(function(data) {
			if(data == "1"){
				window.location.replace("view/main.php");
			}else{
				$('#status').html(data);						
			}
		}).catch(function(error) {
			console.error(error);
			$('#status').html(error);
		});
	});

	// SECTION Trigger
	$('.edit-identification').click(function(e) {
		
		if($(this).text() == "Edit") {
			$(this).text('Cancel');
			$('#view_ident').hide();
			$('#hidden_ident').show();
		}else {
			$(this).text('Edit');
			$('#view_ident').show();
			$('#hidden_ident').hide();
		}
	});

	$('.edit-natural-class').click(function(e) {
		
		if($(this).text() == "Edit") {
			$(this).text('Cancel');
			$('#natural_view').hide();
			$('#natural_edit').show();
		}else {
			$(this).text('Edit');
			$('#natural_view').show();
			$('#natural_edit').hide();
		}
	});

	$('#view_edit_civil').click(function(e) {
		e.stopPropagation();
		if($(this).text() == "Edit") {
			$(this).text('Cancel');
			$('#civil_view_container').hide();
			$('#civil_edit_container').show();
		}else {
			$(this).text('Edit');
			$('#civil_view_container').show();
			$('#civil_edit_container').hide();
		}
	});

	$('#edit_juristic').click(function(e) {
		e.preventDefault();

		if($(this).text() == "Edit") {
			$(this).text('Cancel');
			$('#juristic_view').hide();
			$('#juristic_edit').show();
			
		}else {
			$(this).text('Edit');
			$('#juristic_edit').hide();
			$('#juristic_view').show();
		}
	});

	$('.sector-input').change(function() {
		sector = $('.sector-input').val();
	});

	$('#idea_nature').keyup(function(e) {
		$('#nature-char-left').empty();
		$('#nature-char-left').text(2000 - $('#idea_nature').val().length);
	});

	// SECTION add events
	$('#add_user').click(function(e) {
		e.preventDefault();
		var fname = $('#fname').val();
		var lname = $('#lname').val();
		var email = $('#email').val();
		var cell_number = $('#cell_number').val();
		var position = $('#position').val();
		var password = $('#password').val();
		var verify_password = $('#verify_password').val();

		if(fname == "" || lname == "" || email == "" || cell_number == "" || position == "" || password == "" || verify_password == "") {
			$('#status').html("<div class='alert alert-danger'> All fields are required</div>");
			return;
		}
		if(password != verify_password) {
			$('#status').html("<div class='alert alert-danger'>password does not match</div>");
			return;
		}
		$.ajax({
			method: "POST",
			url: '../controller/controller.php',
			data: {fname: fname, lname: lname, email: email, cell_number: cell_number, position: position, password: password, action: "add_user"}
				
		}).then(function(data) {
			$('#status').html(data);
		}).catch(function(error) {
			$('#status').html(error);
		});

	
	});

	$('#add_client').click(function(e) {
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

		if(fname == "" || lname == "" || email == "" || cell_number =="" || home_address == "" || zip_code == "" || city == "" || person =="" || title == "" || initials == "") {
			$('#status').html("<div class='alert alert-danger'>All fields are required</div>");	
			return;
		}

		if(!cell_number(cell_number)) {
			$('#status').html(`<div class='alert alert-danger'>${error}</div>`);	
			return;		
		}

		if(!isZipCode(zip_code)) {
			$('#status').html(`<div class='alert alert-danger'>${error}</div>`);	
			return;		
		}

		if(!isName(fname)) {
			$('#status').html(`<div class='alert alert-danger'>${error}</div>`);	
			return;			
		}

		if(!isName(lname)) {
			$('#status').html(`<div class='alert alert-danger'>${error}</div>`);	
			return;			
		}

		$.ajax({
			method: 'POST',
			url: '../controller/controller.php',
			data: {fname: fname, lname: lname, email: email, cell_number: cell_number, home_address: home_address, zip_code: zip_code, city: city, person: person, title: title, initials: initials, action: 'add_client'},
		}).then(function(data) {
			$('#status').html(data);
		}).catch(function(error) {
			console.error(error);
			$('#status').html("<div class='alert alert-danger'>Error occured</div>");
		});
	});

	$("#add_natural").click(function(e) {
		e.preventDefault();
		var client_id = $('#client_id__').val();
		var fname = $('#fname__').val();
		var lname = $('#lname__').val();
		var mname = $('#mname__').val();
		var dob = $('#dob__').val();
		var id_number = $('#id_number__').val();
		var marital_status = $('#marital_status').val();
		var marriage_type = $('#marriage_type').val();

		if(fname == "" || lname == "" || dob == "" || id_number =="" || marital_status == null) {
			$("#n_status").html("<div class='alert alert-danger'> All fields are required</div>");
			return;
		}

		if(!valid_idnumber(id_number)) {
			$("#n_status").html(`<div class='alert alert-danger'>${error}</div>`);
			return;
		}

		if(!isDob(dob)) {
			$("#n_status").html(`<div class='alert alert-danger'>${error}</div>`);
			return;		
		}

		if(!isName(fname)) {
			$("#n_status").html(`<div class='alert alert-danger'>${error}</div>`);
			return;
		}

		if(!isName(lname)) {
			$("#n_status").html(`<div class='alert alert-danger'>${error}</div>`);
			return;
		}

		if(!isCorrectDate(dob)) {
			$("#n_status").html(`<div class='alert alert-danger'>${error}</div>`);
			return;		
		}
		$.ajax({
			method: 'POST',
			url: '../controller/controller.php',
			data: {client_id: client_id, fname: fname, lname: lname, mname: mname, dob: dob, id_number: id_number, marital_status: marital_status, marriage_type: marriage_type, action: 'add_natural'}
		}).then(function(data) {
			if(data == "1") {
				$("#n_status").html("<div class='alert alert-success'>Details added successfully</div>");
				location.reload(6000);
			}else {
				$("#n_status").html(data);	
			}
		}).catch(function(error) {
			console.error(error);
			$("#n_status").html(error);
		});


	});

	$('#add_juristic').click(function(e) {
		e.preventDefault();
		var client_id = $('#client_id').val();
		var company_name = $('#company_name').val();
		var registration_date = $('#registration_date').val();
		var registration_number = $('#registration_number').val();

		if(company_name == "" || registration_number == "" || registration_date == "") {
			$('#j_status').html("<div class='alert alert-danger'>All fields are required</div>");
			return;
		}

		if(!isCompany(company_name, registration_date, registration_number)) {
			$('#j_status').html(`<div class='alert alert-danger'>${error}</div>`);
			return;		
		}

		if(!isCorrectDate(registration_date)) {
			$('#j_status').html(`<div class='alert alert-danger'>${error}</div>`);
			return;			
		}

		$.ajax(
		{
			method: 'POST',
			url: '../controller/controller.php',
			data: {client_id: client_id, company_name: company_name, registration_date: registration_date, registration_number: registration_number, action: 'add_juristic'}
		}).then(function(data) {
			if(data == "1"){
				location.reload();
			}else{
				$('#j_status').html(data);	
			}
		}).catch(function(error) {
			console.error(error);
			$('#j_status').html(error);
		});

	});

	$('#add_company_member').click(function(e) {
		e.preventDefault();
		var fname = $('#j_fname').val();
		var lname = $('#j_lname').val();
		var j_id = $('#j_id').val();
		var title = $('#j_title').val();
		var id_number = $('#j_id_number').val();
		var date_of_appointment = $('#j_date_of_appointment').val();

		if(fname == "" || lname == "" || j_id == "" || title == "" || id_number == "" || date_of_appointment == "") {
			$('#member_status').html('<div class="alert alert-danger">All fields are required</div>');
			return;
		}

		if(!valid_idnumber(id_number)) {
			$('#member_status').html(`<div class="alert alert-danger">${error}</div>`);
			return;			
		}

		if(!isSameIdNumber(id_number)) {
			$('#member_status').html(`<div class="alert alert-danger">${error}</div>`);
			return;			
		}

		if(!isCorrectDate(date_of_appointment)) {
			$('#member_status').html(`<div class="alert alert-danger">${error}</div>`);
			return;	
		}

		if(!isName(fname)) {
			$('#member_status').html(`<div class="alert alert-danger">${error}</div>`);
			return;			
		}

		if(!isName(lname)) {
			$('#member_status').html(`<div class="alert alert-danger">${error}</div>`);
			return;			
		}
		$.ajax({
			method: 'POST',
			url: '../controller/controller.php',
			data: {fname: fname, lname: lname, j_id: j_id, title: title, id_number: id_number, date_of_appointment: date_of_appointment, action: 'add_company_member'}
		}).then(function(data) {
			if(data == "1") {
				$('#fname').val("");
				$('#lname').val("");
				$('#title').val("");
				$('#id_number').val("");
				$('#date_of_appointment').val("");
				$('#member_status').html('<div class="alert alert-success">Company member added successfully, You can add another one or please refresh the page to see the member</div>');
			}else {
				$('#member_status').html(data);
			}
		}).catch(function(error) {
			console.error(error);
			$('#member_status').html(error);
		});
	});

	$('#add_share_holder').click(function(e) {
		e.preventDefault();

		var fname = $('#fname_').val();
		var lname = $('#lname_').val();
		var j_id = $('#j_id_').val();
		var title = $('#title_').val();
		var id_number = $('#id_number_').val();
		var amount_contributed = $('#amount_contributed').val();

		if(fname == "" || lname == "" || j_id == "" || title == "" || id_number == "" || amount_contributed == "") {
			$('#holder_status').html('<div class="alert alert-danger">All fields are required</div>');
			return;
		}

		if(!valid_idnumber(id_number)) {
			$('#holder_status').html(`<div class="alert alert-danger">${error}</div>`);
			return;			
		}

		if(isNaN(amount_contributed)) {
			$('#holder_status').html('<div class="alert alert-danger">Amount contributed should be a number</div>');
			return;		
		}

		if(amount_contributed < 0) {
			$('#holder_status').html('<div class="alert alert-danger">Amount contributed should be greater than 0</div>');
			return;		
		}

		if(!isName(fname)) {
			$('#holder_status').html(`<div class="alert alert-danger">${error}</div>`);
			return;			
		}

		if(!isName(lname)) {
			$('#holder_status').html(`<div class="alert alert-danger">${error}</div>`);
			return;			
		}

		$.ajax({
			method: 'POST',
			url: '../controller/controller.php',
			data: {fname: fname, lname: lname, j_id: j_id, title: title, id_number: id_number, amount_contributed: amount_contributed , action: 'add_share_holder'}
		}).then(function(data) {
			if(data == "1") {
				$('#fname_').val("");
				$('#lname_').val("");
				$('#title_').val("");
				$('#id_number_').val("");
				$('#amount_contributed').val("");
				$('#holder_status').html('<div class="alert alert-success">Share holder added successfully, You can add another one or please refresh the page to see the member</div>');
			}else {
				$('#holder_status').html(data);
			}
		}).catch(function(error) {
			console.error(error);
			$('#holder_status').html(error);
		});

	});

	$('#add_civil').click(function(e)
	{
		e.preventDefault();

		var natural_id = $('#natural_id').val();
		var spouse_fname = $('#spouse_fname').val();
		var spouse_lname = $('#spouse_lname').val();
		var certificate_no = $('#certificate_no').val();
		var spouse_id_number = $('#spouse_id_number').val();
		var date_of_issue = $('#date_of_issue').val();
		var marriage_terms = $('#marriage_terms').val();
		var detail_of_marriage = $('#detail_of_marriage').val().trim();
		

		if(natural_id == "" || spouse_fname == "" || spouse_lname == "" || certificate_no == "" || date_of_issue == "" || marriage_terms == "" || detail_of_marriage == "" || spouse_id_number =="") {
			$("#c_status").html("<div class='alert alert-danger'>All fields are required</div>");
			return;
		}

		if(!valid_idnumber(spouse_id_number)) {
			$("#c_status").html(`<div class='alert alert-danger'>${error}</div>`);
			return;		
		}

		if(!isSameIdNumber(spouse_id_number)) {
			$("#c_status").html(`<div class='alert alert-danger'>${error}</div>`);
			return;			
		} 

		if(!isName(spouse_fname)) {
			$("#c_status").html(`<div class='alert alert-danger'>${error}</div>`);
			return;		
		}

		if(!isName(spouse_lname)) {
			$("#c_status").html(`<div class='alert alert-danger'>${error}</div>`);
			return;		
		}

		if(!isCorrectDate(date_of_issue)) {
			$("#c_status").html(`<div class='alert alert-danger'>${error}</div>`);
			return;		
		}
		$.ajax({
			method: 'POST',
			url: '../controller/controller.php',
			data: {natural_id: natural_id, spouse_fname: spouse_fname, spouse_lname: spouse_lname, certificate_no: certificate_no, date_of_issue: date_of_issue, marriage_terms: marriage_terms, detail_of_marriage: detail_of_marriage, spouse_id_number: spouse_id_number, action: 'add_civil'}
		}).then(function(data) {
			if(data == "1") {
				$("#c_status").html("<div class='alert alert-success'>successfully added data</div>");
				$('#spouse_fname').val("");
				$('#spouse_lname').val("");
				$('#certificate_no').val("");
				$('#spouse_id_number').val("");
				$('#date_of_issue').val("");
				$('#marriage_terms').val("");
				$('#detail_of_marriage').val("");
			}else {
				$("#c_status").html(data);
			}
		}).catch(function(error) {
			console.error(error);
			$("#c_status").html("<div class='alert alert-danger'>Error occured</div>");
			
		});
	});

	$('#register_idea').click(function(e) {
		e.preventDefault();
		var client_id = $('#client_id').val();
		var idea_name = $('#idea_name').val();
		var idea_trademark = $('#idea_trademark').val();
		var idea_nature = $('#idea_nature').val();
		var idea_target_market = $('#idea_target_market').val();

		if(client_id == "" || idea_name == "" || idea_trademark == "" || idea_nature == "" || idea_target_market == "") {
			$('#idea_status').html('<div class="alert alert-danger">All the fields are required</div>');
			return;
		}

		if(sector == null) {
			$('#idea_status').html('<div class="alert alert-danger">Sector or industory can\'t be empty</div>');
			return;	
		}

		if(idea_name.length < 3) {
			$('#idea_status').html('<div class="alert alert-danger">Idea name should be at least 3 characters</div>');
			return;
		}

		if(idea_trademark.length < 2) {
			$('#idea_status').html('<div class="alert alert-danger">Idea trademark should be at least 2 characters</div>');
			return;
		}

		if(idea_nature.length < 2000) {
			$('#idea_status').html('<div class="alert alert-danger">Idea nature should be at least 2000 characters</div>');
			return;
		}

		if(idea_target_market.length < 1000) {
			$('#idea_status').html('<div class="alert alert-danger">Idea target market should be at least 2000 characters</div>');
			return;
		}

		$.ajax({
			method: 'POST',
			url: '../controller/controller.php',
			data: {client_id: client_id, idea_name: idea_name, idea_trademark: idea_trademark, idea_nature: idea_nature, idea_target_market: idea_target_market, sector: sector, action: 'add_idea'}
		}).then(function(data) {
			if(data == "1") {
				$('#idea_status').html('<div class="alert alert-success">Successfully added the idea</div>');	
				$('#client_id').val("");
				$('#idea_name').val("");
				$('#idea_trademark').val("");
				$('#idea_nature').val("");
				$('#idea_target_market').val("");
			}else {
				$('#idea_status').html(data);
			}
		}).catch(function(error) {
			console.error(error);
		});

	});

	$('#add_spouse').click(function(e)
	{
		e.preventDefault();
		var id = $('#cs_fk_id').val();
		var fname = $('#cs_fname').val();
		var lname = $('#cs_lname').val();
		var id_number = $('#id_number').val();
		var stages_of_negotiation = $('#cs_stages_of_negotiation').val();

		if(id =="" || fname == "" || lname == "" || stages_of_negotiation == "" || id_number == "") {
			$('#cs_status').html("<div class='alert alert-danger'>All fields are required</div>");
			return;
		}

		if(!valid_idnumber(id_number)) {
			$('#cs_status').html(`<div class='alert alert-danger'>${error}</div>`);
			return;	
		}

		if(!isSameIdNumber(id_number)) {
			$('#cs_status').html(`<div class='alert alert-danger'>${error}</div>`);
			return;		
		}

		if(!isName(fname)) {
			$('#cs_status').html(`<div class='alert alert-danger'>${error}</div>`);
			return;			
		}

		if(!isName(lname)) {
			$('#cs_status').html(`<div class='alert alert-danger'>${error}</div>`);
			return;			
		}
		$.ajax({
			method: 'POST',
			url: '../controller/controller.php',
			data: {id: id, fname: fname, lname: lname, id_number:id_number, stages_of_negotiation: stages_of_negotiation, action: 'add_spouse'}
		}).then(function(data) {
			if(data == "1") {
				$('#cs_status').html("<div class='alert alert-success'>Information added successfully</div>");
				$('#cs_fname').val("");
				$('#cs_lname').val("");
				$('#id_number').val("");
				$('#cs_stages_of_negotiation').val("");
			}else {
				$('#cs_status').html(data);
			}
		});
	});

	$('#add_beneficiary').click(function(e)
	{
		e.preventDefault();
		var id = $('#client_id').val();
		var fname = $('#b_fname').val();
		var lname = $('#b_lname').val();
		var id_number = $('#b_id_number').val();

		if(id =="" || fname == "" || lname == "" || id_number == "") {
			$('#b_status').html("<div class='alert alert-danger'>All fields are required</div>");
			return;
		}

		if(!valid_idnumber(id_number)) {
			$('#b_status').html(`<div class='alert alert-danger'>${error}</div>`);
			return;			
		}

		if(!isSameIdNumber(id_number)) {
			$('#b_status').html(`<div class='alert alert-danger'>${error}</div>`);
			return;			
		}

		if(!isName(fname)) {
			$('#b_status').html(`<div class='alert alert-danger'>${error}</div>`);
			return;		
		}

		if(!isName(lname)) {
			$('#b_status').html(`<div class='alert alert-danger'>${error}</div>`);
			return;		
		}

		$.ajax({
			method: 'POST',
			url: '../controller/controller.php',
			data: {id: id, fname: fname, lname: lname, id_number:id_number, action: 'add_beneficiary'}
		}).then(function(data) {
			if(data == "1") {
				$('#b_status').html("<div class='alert alert-success'>Beneficiary added successfully</div>");
				$('#client_id').val("");
				$('#b_fname').val("");
				$('#b_lname').val("");
				$('#b_id_number').val("");
			}else {
				$('#b_status').html(data);
			}
		}).catch(function(error) {
			console.error(error);
		});
	});

	$('.add_deligation').click(function(e) {
		e.preventDefault();
		e.stopPropagation();
		console.log("hi");
		
		var id = $(this).closest('.modal-footer').find('p').text();
		var fname = $('.d_fname').val();
		var lname = $('.d_lname').val();
		var id_number = $('.d_id_number').val();

		if(id =="" || fname == "" || lname == "" || id_number == ""){
			$('.d_status').html("<div class='alert alert-danger'>All fields are required</div>");
			return;
		}

		if(!valid_idnumber(id_number)) {
			$('.d_status').html(`<div class='alert alert-danger'>${error}</div>`);
			return;		
		}

		if(!isSameIdNumber(id_number)) {
			$('.d_status').html(`<div class='alert alert-danger'>${error}</div>`);
			return;	
		}

		if(!isName(fname)) {
			$('.d_status').html(`<div class='alert alert-danger'>${error}</div>`);
			return;			
		}

		if(!isName(lname)) {
			$('.d_status').html(`<div class='alert alert-danger'>${error}</div>`);
			return;			
		}
		$.ajax({
			method: 'POST',
			url: '../controller/controller.php',
			data: {id: id, fname: fname, lname: lname, id_number: id_number, action: 'add_deligation'},
			success: (data) =>
			{

			}
		}).then(function(data) {
			if(data == "1") {
				$('.d_status').html("<div class='alert alert-success'>Information added successfully</div>");
			}else {
				$('.d_status').html(data);
			}
		});
		
	});

	//SECTION edit events
	$('#edit_identification').click(function(e) {
		e.preventDefault();

		var client_id = $('#client_id').val();
		var fname = $('#fname').val();
		var lname = $('#lname').val();
		var email = $('#email').val();
		var cellNumber = $('#cell_number').val();
		var home_address = $('#client_address').val();
		var city = $('#client_city').val();
		var zip_code = $('#client_zip_code').val();
		var title = $('#client_title').val();
		var initials = $('#client_initials').val();
		console.log(cellNumber);

		if(client_id == "" || fname == "" || lname == "" || email == "" || cellNumber =="" || home_address == "" || zip_code == "" || city == "" || title == "" || initials == "") {
			$('#status').html("<div class='alert alert-danger'>All fields are required</div>");	
			return;
		}

		if(!cell_number(cellNumber)) {
			$('#status').html(`<div class='alert alert-danger'>${error}</div>`);	
			return;	
		}

		if(!isName(fname)) {
			$('#status').html(`<div class='alert alert-danger'>${error}</div>`);	
			return;			
		}

		if(!isName(lname)) {
			$('#status').html(`<div class='alert alert-danger'>${error}</div>`);	
			return;			
		}

		if(!isZipCode(zip_code)) {
			$('#status').html(`<div class='alert alert-danger'>${error}</div>`);	
			return;		
		}
		$.ajax({
			method: 'POST',
			url: '../controller/controller.php',
			data: {client_id: client_id, fname: fname, lname: lname, email: email, cell_number: cellNumber, home_address: home_address, zip_code: zip_code, city: city, title: title, initials: initials, action: 'edit_client'}
		}).then(function(data) {
			console.log(data);
			
			$('#status').html(data);
		}).catch(function(error) {
			console.error(error);
			$('#status').html("<div class='alert alert-danger'>Error occured</div>");
		});
	});
	
	$("#edit_natural_save").click(function(e) {
		e.preventDefault();
		var n_id = $('#ne_id').val();
		var mname = $('#ne_middle_name').val();
		var dob = $('#ne_dob').val();
		var id_number = $('#ne_id_number').val();
		var marital_status = $('#ne_marital_status').val();
		var marriage_type = $('#ne_marriage_type').val();

		if(n_id == "" || dob == "" || id_number =="" || marital_status == null) {
			$("#ne_status").html("<div class='alert alert-danger'> All fields are required</div>");
			return;
		}

		if(!valid_idnumber(id_number)) {
			$("#ne_status").html(`<div class='alert alert-danger'>${error}</div>`);
			return;	
		}

		if(!isDob(dob)) {
			$("#ne_status").html(`<div class='alert alert-danger'>${error}</div>`);
			return;	
		}

		$.ajax({
			method: 'POST',
			url: '../controller/controller.php',
			data: {n_id: n_id, mname: mname, dob: dob, id_number: id_number, marital_status: marital_status, marriage_type: marriage_type, action: 'edit_natural'}
		}).then(function(data) {
			if(data == "1") {
				$("#ne_status").html("<div class='alert alert-success'>Details updated successfully</div>");
				location.reload(6000);
			}else {
				$("#ne_status").html(data);	
			}
		}).catch(function(error) {
			console.error(error);
			$("#ne_status").html(error);
		});


	});

	$('#edit_juristic_save').click(function(e)
	{
		e.preventDefault();
		var j_id = $('#j_id').val();
		var company_name = $('#company_name_').val();
		var registration_date = $('#registration_date_').val();
		var registration_number = $('#registration_number_').val();

		if(company_name == "" || registration_number == "" || registration_date == "") {
			$('#j_status').html("<div class='alert alert-danger'>All fields are required</div>");
			return;
		}

		if(!isCompany(company_name, registration_date, registration_number)) {
			$('#j_status').html(`<div class='alert alert-danger'>${error}</div>`);
			return;		
		}

		if(!isCorrectDate(registration_date)) {
			$('#j_status').html(`<div class='alert alert-danger'>${error}</div>`);
			return;		
		}

		$.ajax({
			method: 'POST',
			url: '../controller/controller.php',
			data: {j_id: j_id, company_name: company_name, registration_date: registration_date, registration_number: registration_number, action: 'edit_juristic'}
		}).then(function(data) {
			if(data == "1") {
				$('#j_status').html("<div class='alert alert-success'>Information edited successfully</div>");	
				location.reload(6000);
			}else {
				$('#j_status').html(data);	
			}
		}).catch(function(error) {
			console.error(error);
			$('#j_status').html(error);
		});

	});
	
	$('#edit_civil').click(function(e)
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
		if(c_id == "" || spouse_fname == "" || spouse_lname == "" || certificate_no == "" || date_of_issue == "" || marriage_terms == "" || detail_of_marriage == "" || spouse_id_number =="") {
			$("#c_status").html("<div class='alert alert-danger'>All fields are required</div>");
			return;
		}
		if(!isCorrectDate(date_of_issue)) {
			$("#c_status").html(`<div class='alert alert-danger'>${error}</div>`);
			return;
		}
		if(!isName(spouse_fname)) {
			$("#c_status").html(`<div class='alert alert-danger'>${error}</div>`);
			return;	
		}
		if(!isName(spouse_lname)) {
			$("#c_status").html(`<div class='alert alert-danger'>${error}</div>`);
			return;	
		}
		if(!valid_idnumber(spouse_id_number)) {
			$("#c_status").html(`<div class='alert alert-danger'>${error}</div>`);
			return;		
		}
		if(!isSameIdNumber(spouse_id_number)) {
			$("#c_status").html(`<div class='alert alert-danger'>${error}</div>`);
			return;	
		}

		$.ajax(
		{
			method: 'POST',
			url: '../controller/controller.php',
			data: {c_id: c_id, spouse_fname: spouse_fname, spouse_lname: spouse_lname, certificate_no: certificate_no, date_of_issue: date_of_issue, marriage_terms: marriage_terms, detail_of_marriage: detail_of_marriage, spouse_id_number: spouse_id_number, action: 'edit_civil'},
			success: function(data) {
				if(data == "1") {
					$("#c_status").html("<div class='alert alert-success'>successfully editted data</div>");
					location.reload(600);
				}else {
					$("#c_status").html(data);
				}
			},

			error: function(data) {
				$("#c_status").html("<div class='alert alert-danger'>Error occured</div>");
			}
		});
	});	

	//SECTION delete events
	
});


// ANCHOR functions


//verify documents
function verify_doc(document_id)
{
	$.ajax(
	{
		method: 'POST',
		url: '../controller/controller.php',
		data: {document_id: document_id, action: "verify_doc"},
		success: function(data)
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

function cancel_edit_client()
{
	$('#view_ident').show();
	$('#hidden_ident').hide();		
}

//SECTION  edit
function edit_company_member(id) {
	var cm_id = id;
	var fname = $('#fname-'+id).val();
	var lname = $('#lname-'+id).val();
	var title = $('#title-'+id).val();
	var id_number = $('#id_number-'+id).val();
	var date_of_appointment = $('#date_of_appointment-'+id).val();

	if(fname == "" || lname == "" || title == "" || id_number == "" || date_of_appointment == "") {
		$('#member_status-'+id).html('<div class="alert alert-danger">All fields are required</div>');
		return;
	}
	if(!isName(fname)) {
		$('#member_status-'+id).html(`<div class="alert alert-danger">${error}</div>`);
		return;	
	}
	if(!isName(fname)) {
		$('#member_status-'+id).html(`<div class="alert alert-danger">${error}</div>`);
		return;	
	}
	if(!valid_idnumber(id_number)) {
		$('#member_status-'+id).html(`<div class="alert alert-danger">${error}</div>`);
		return;	
	}
	if(!isCorrectDate(date_of_appointment)) {
		$('#member_status-'+id).html(`<div class="alert alert-danger">${error}</div>`);
		return;	
	}

	$.ajax({
		method: 'POST',
		url: '../controller/controller.php',
		data: {cm_id: cm_id, fname: fname, lname: lname, title: title, id_number: id_number, date_of_appointment: date_of_appointment, action: 'edit_company_member'}
	}).then(function(data) {
		if(data == "1") {
			$('#member_status-'+id).html('<div class="alert alert-success">Company member updated successfully</div>');
		}else {
			$('#member_status-'+id).html(data);
		}
	}).catch(function(error) {
		$('#member_status-'+id).html(error);
	});

}

function edit_share_holder(id)
{
	var sh_id = id;
	var fname = $('#fname_'+id).val();
	var lname = $('#lname_'+id).val();
	var title = $('#title_'+id).val();
	var id_number = $('#id_number_'+id).val();
	var amount_contributed = $('#amount_contributed_'+id).val();

	if(fname == "" || lname== "" || sh_id == "" || title == "" || id_number == "" || amount_contributed == "") {
		$('#holder_status_'+id).html('<div class="alert alert-danger">All fields are required</div>');
		return;
	}
	if(!isName(fname)) {
		$('#holder_status_'+id).html(`<div class="alert alert-danger">${error}</div>`);
		return;		
	}
	if(!isName(lname)) {
		$('#holder_status_'+id).html(`<div class="alert alert-danger">${error}</div>`);
		return;		
	}
	if(!valid_idnumber(id_number)) {
		$('#holder_status_'+id).html(`<div class="alert alert-danger">${error}</div>`);
		return;		
	}
	if(isNaN(amount_contributed)) {
		$('#holder_status_'+id).html(`<div class="alert alert-danger">Amount must be in numbers</div>`);
		return;		
	}

	$.ajax({
		method: 'POST',
		url: '../controller/controller.php',
		data: {sh_id: sh_id, fname: fname, lname: lname, title: title, id_number: id_number, amount_contributed: amount_contributed , action: 'edit_share_holder'},
		success: function(data) {
			if(data == "1") {
				$('#holder_status_'+id).html('<div class="alert alert-success">Share holder Updated successfully</div>');
			}else {
				$('#holder_status_'+id).html(data);
			}
		},
		error: function(data) {
			$('#holder_status_'+id).html(data);
		}
	});

}

//stake holder functions
function view_holder(id)
{
	$('#edit_holder_view_'+id).hide();
	$('#view_holder'+id).show();
}	

function edit_holder_view(id){
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

	if(id =="" || fname == "" || lname == "" || id_number == "") {
		$('.b_status').html("<div class='alert alert-danger'>All fields are required</div>");
		console.log('error');
		return;
	}
	if(!isName(fname)) {
		$('.b_status').html(`<div class='alert alert-danger'>${error}</div>`);
		console.log(error);
		return;	
	}
	if(!isName(lname)) {
		$('.b_status').html(`<div class='alert alert-danger'>${error}</div>`);
		console.log(error);
		return;	
	}
	if(!valid_idnumber(id_number)) {
		$('.b_status').html(`<div class='alert alert-danger'>${error}</div>`);
		console.log(error);
		return;	
	}
	if(!isSameIdNumber(id_number)) {
		$('.b_status').html(`<div class='alert alert-danger'>${error}</div>`);
		console.log(error);
		return;	
	}

	$.ajax({
		method: 'POST',
		url: '../controller/controller.php',
		data: {id: id, fname: fname, lname: lname, id_number:id_number, action: 'edit_beneficiary'},
		success: function(data) {
			if(data == "1") {
				$('.b_status').html("<div class='alert alert-success'>Beneficiary updated successfully</div>");
				location.reload(6000);
			}else {
				$('.b_status').html(data);
			}
		}
	});

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
			success: function(data)
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

// ANCHOR validations

function valid_idnumber(id_number) {
	var year = id_number.slice(0, 2);
	var month = id_number.slice(2, 4);
	var day = id_number.slice(4, 6);

	if(id_number.length < 13) {
		error = "Id number should be 13 digits";
	}else if(isNaN(id_number)) {
		error = "Id number should be numbers";	
	}else if(year < 0) {
		error = "year in id number should be a number bigger than or equal to zero";		
	}else if(month < 0 || month > 12) {
		error = "month in id number should be from 1 - 12";
	}else if(day < 0 || day > 31) {
		error = "day in id number should be from 1 - 31";	
	}else if(month == 02 && day > 29) {
		error = "day in id number should be from 1 - 29";
	}else if((month == 4 || month == 6 || month == 9 || month == 11) && day > 30) {
		error = "day in id number should be from 1 - 30";
	}else {
		error = null;
	}

	if(error != null) {
		return false;
	}else {
		return true;
	}
}

function cell_number(cell_number) {

	if(isNaN(cell_number)) {
		error = "Cell number should consist of numbers only";
	}else if(cell_number.length != 10) {
		error = "Cell number should be 10 digits";
	}else {
		error = null;
	}

	if(error !== null) {
		return false;
	}else {
		return true;
	}
}

function isName(name) {
	if(!isNaN(name)) {
		error = "Name can't contain a number";
		return false;
	}else if(name.length < 3) {
		error = "name should be at least 3 characters";
		return false;
	}else {
		error = null;
		return true;
	}
}

function isDob(dob) {
	var your_year = parseInt(dob.slice(0,4));
	var dateNow = new Date();
	var current_year = parseInt(dateNow.getFullYear().toString().slice(0,4));

	if(your_year >= current_year) {
		error = "Your date of birth can't be a future year";
		return false;
	}else if(current_year - your_year < 13) {
		error = "Client should be 13 and above";
		return false;
	}else {
		error = null;
		return true;
	}

}

function isZipCode(zip_code) {
	if(isNaN(zip_code)) {
		error = "Zip code should be numbers";
	}else if(zip_code.length !== 4) {
		error = "Zip code should be 4 digits";
	}else {
		error = null;
	}

	if(error !== null) {
		return false;
	}else {
		return true;
	}
}

function isCompany(company_name, company_date_reg, company_reg_number) {
	var dateNow = new Date();
	var current_year = dateNow.getFullYear();

	if(company_name.length < 3) {
		error = "Company name can't be less than 3 characters";
	}else if(parseInt(company_date_reg.slice(2,4)) > parseInt(current_year.toString().slice(2,4))) {
		error = "Your company registration date can't be in the future";
	}else if(!isRegistrationNumber(company_reg_number, parseInt(company_date_reg.slice(0,4)))) {
		error;
	}else {
		error = null;
	}

	if(error !== null) {
		return false;
	}else {
		return true;
	}
}

function isRegistrationNumber(reg_number, reg_year) {
	var arr = reg_number.split("/");
	if(arr.length !== 3) {
		error = "This is an invalid company registration number";
	}else if(arr.length == 3 && arr[0].length !== 4) {
		error = "The First part is a year of company registration, it should be 4 like YYYY";
	}else if(arr.length == 3 && arr[1].length !== 7) {
		error = "The Second part should be 7 digits";
	}else if(arr.length == 3 && arr[2].length !== 2) {
		error = "The last part should be 2 digits";
	}else if(parseInt(arr[0]) !== reg_year) {
		error = "Incorrect company registration date/ first part of the registration number";
	}else {
		error = null;
	}

	if(error !== null) {
		return false;
	}else {
		return true;
	}
}

function isSameIdNumber(compare_id_number) {
	var client_id_number = $('.person-id-number').text().slice(10).trim();
	if(client_id_number == compare_id_number) {
		error = "Id number can't be the same as the one of the client";
		return false
	}else {
		error = null;
		return true;
	}
}

function isCorrectDate(date) {
	var current_year = parseInt((((new Date).getFullYear()).toString()).slice(0, 4));
	var current_month = parseInt(( ((new Date).getMonth()).toString()).slice(0,2));
	var your_year = parseInt(date.slice(0, 4));
	var your_month = parseInt(date.slice(5, 7));
	
	if(your_year > current_year) {
		error = "This is the future date, use a correct year";
	}else if(your_year == current_year && your_month > current_month){
		error = "This is the future date, use a correct month";
	}else {
		error = null;
	}

	if(error !== null) {
		return false;
	}else {
		return true;
	}
}

//TODO registration number

function isEmail(email) {

}




