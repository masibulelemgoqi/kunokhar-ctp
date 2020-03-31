
// ANCHOR  variables
var error = null;
var companyName = null;
var companyRegNumber = null;
var companyRegDate = null;
var person = "Natural";
var juristic = null;
var natural = null;
var client = null;
var civil = null;
var companyDirector = null;
var shareHolder = null;
var idea = null;
var dateFilter = $('#date-filter').val();

// ANCHOR  Load pages

window.onload = function() {
	var url = window.location.href.split("/");
	page = url[url.length - 1].trim();
	
	switch(page) {
		case 'main.php':
			if(sessionStorage.getItem('person') === null || sessionStorage.getItem('person').undefined) {
				sessionStorage.setItem('person', person);
				person = sessionStorage.getItem('person');
				
			}else {
				person = sessionStorage.getItem('person');
			}
			loadMain();
		break;
		case 'worker.php':
			if(sessionStorage.getItem('person') === null || sessionStorage.getItem('person').undefined) {
				sessionStorage.setItem('person', person);
				person = sessionStorage.getItem('person');
				
			}else {
				person = sessionStorage.getItem('person');
			}
			loadMain();
		break;
		case 'juristic.php':
			getClient();
		break;
		case 'natural.php':
			getClient();
		break;
	}
}



// ANCHOR  All events
$(()=> {
	$('#idea_add').hide();
	$('#marriage_type').hide();
	$('#ne_marriage_type').hide();
	$('#add_user_container').hide();
    $('.m_type').hide();

	$('#add_user_btn').click(function(e) {
		$('#add_user_container').toggle();
	});

	$('#idea_container').click(function(e) {
		$('#idea_add').toggle();
		$('html, body').animate({
        scrollTop: $(".ideas").offset().top}, 2000);
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
			dataType: 'json',
			data: {email: email, password: password, action: "log_in"}
		}).then(function(data) {
			console.log(data);
			
			if(data.success){
				sessionStorage.setItem('user_role', data.user.w_type);
				window.location.href = "view/main.php";
			}else{
				$('#status').html("<div class='alert alert-danger'>Cannot login, make sure you provide correct details</div>");						
			}
		});
	});

	// SECTION Trigger
	$('.edit-identification').click(function(e) {
		
		if($(this).text() == "Edit") {
			$(this).text('Cancel');
			$('.client-details').empty();
			var html = `
			<div class="card-text" id="hidden_ident">
			<div id="status"></div>
			<form method="POST" action="">
				<input type="hidden" class="form-control m-2" id="client_id" value="${client.client_id}">


			<label class="mt-2 ml-2 mr-2 font-italic text-muted">Title:</label>
			<select class="form-control mb-2 ml-2 mr-2 border-success" id="client_title">
				<option value="${client.client_title}">${client.client_title}(Currently selected)</option>
				<option value="Mr">Mr</option>
				<option value="Ms">Ms</option>
				<option value="Mrs">Mrs</option>
				<option value="Dr.">Dr.</option>
				<option value="Prof.">Prof.</option>
			</select>
			<input type="name" class="form-control m-2 border-success" id="client_initials" value="${client.client_initials}" placeholder="Initials">

			<input type="name" class="form-control m-2 border-success" id="fname" value="${client.client_fname}" placeholder="first name">

			<input type="name" class="form-control m-2 border-success" id="lname" value="${client.client_lname}" placeholder="Last name">

			<input type="email" class="form-control m-2 border-success" id="email" value="${client.client_email}" placeholder="email address">

			<input type="name" class="form-control m-2 border-success" id="client_address" value="${client.client_home_address}" placeholder="Adress">

			<input type="name" class="form-control m-2 border-success" id="client_city" value="${client.client_city}" placeholder="city">

			<input type="name" class="form-control m-2 border-success" id="client_zip_code" value="${client.client_zip_code}" placeholder="zip code">

			<input type="number" class="form-control m-2 border-success" id="cell_number" value="${client.client_cellno}" placeholder="Cell number">
			<button class="btn btn-success" id="edit_identification">Save</button>
			</form>
		</div>
			`;
			$('.client-details').append(html);
		}else {
			$(this).text('Edit');
			window.location.reload();
		}
	});

	$('#edit_juristic').click(function(e) {
		e.preventDefault();
		if($(this).text() == "Edit") {
			$('#juristic_view').empty();
			$(this).text('Cancel');
			var html = `
			<div class="m-1">
				<div id="j_status"></div>
				<form method="POST" action="">
					<input type="hidden" class="form-control mb-3" id="j_id" value="${juristic.j_id}">
					<input type="name" class="form-control mb-3" id="company_name" placeholder="Company_name" value="${juristic.j_company_name}">
					<br>
					<label>Registration date</label>
					<input type="date" class="form-control mb-3" id="registration_date" placeholder="Registration date" value="${juristic.j_registration_date}">
					<input type="name" class="form-control mb-3" id="registration_number" placeholder="registration number" value="${juristic.j_registration_number}">
					<button class="btn btn-success float-right mb-3" id="edit_save_juristic">Save</button>
				</form>
			</div>`;
		$('#juristic_view').append(html);
			
		}else {
			$(this).text('Edit');
			window.location.reload();
		}
	});

	$('#idea_nature').on('keyup input',function(e) {
		$('#nature-char-left').empty();
		var nature = document.getElementById('idea_nature');
		$('#nature-char-left').text(nature.maxLength - nature.value.length +" Characters remaining");
		if(nature.maxLength - natural.value.length == 0) {
			nature.style.border = '1px solid red';
		} else {
			nature.style.border = '1px solid green';
		}
	});

	$('#idea_target_market').keyup(function(e) {
		$('#market-char-left').empty();
		var market = document.getElementById('idea_target_market');
		$('#market-char-left').text(market.maxLength - market.value.length +" Characters remaining");

		if(market.maxLength - market.value.length == 0) {
			market.style.border = '1px solid red';
		} else {
			market.style.border = '1px solid green';
		}
	});

	$('.add-btn').click( function(e) {
		$('#spouse_action').text("Add spouse");
		$('#cs_fname').val("");
		$('#cs_lname').val("");
		$('#id_number').val("");
		$('#cs_stages_of_negotiation').val("");
		$('#cs_status').html("");
		$('#addSpouse').modal();
	});

	$('#view-all-clients').on('click', 'a',function(e) {
		e.preventDefault();
		e.stopPropagation();
		var id = $(this).find('p').text();
		sessionStorage.setItem('client_id', id);
		sessionStorage.setItem('person', person);
		getClient();
		if(person == "Juristic") {
			location.href = "juristic.php";
		}else if(person == "Natural") {
			location.href = "natural.php";
		}
		
	});

	$('#company-directors').on('click', '.view', function(e) {
		var id = $(this).closest('div').find('p')[0].innerHTML;
		getDirector(id);
		setTimeout(()=>{
			var director = companyDirector.director;
			$('#modalAddMember').find('.modal-title').text("Edit Director");
			$('#modalAddMember').find('#add_company_member').text("Update");
			$('#modalAddMember').find('#j_title').val(director.cm_title);
			$('#modalAddMember').find('#j_fname').val(director.cm_fname);
			$('#modalAddMember').find('#j_lname').val(director.cm_lname);
			$('#modalAddMember').find('#j_id_number').val(director.cm_id_number);
			console.log(moment(director.cm_date_of_appointment).format("L"));
			
			$('#modalAddMember').find('#j_date_of_appointment').val("05-02-2020");
			$('#modalAddMember').modal();
		}, 1500);


	});

	$('#company-share-holders').on('click', '.view', function(e) {
		e.stopPropagation();
		var id = $(this).closest('div').find('p')[0].innerHTML;
		
		getShareHolder(id);
		setTimeout(()=>{
			var holder = shareHolder.holder;
			$('#modalAddshareholder').find('.modal-title').text("Edit ShareHolder");
			$('#modalAddshareholder').find('#add_share_holder').text("Update");
			$('#modalAddshareholder').find('#title_').val(holder.sh_title);
			$('#modalAddshareholder').find('#fname_').val(holder.sh_fname);
			$('#modalAddshareholder').find('#lname_').val(holder.sh_lname);
			$('#modalAddshareholder').find('#id_number_').val(holder.sh_id_number);
			$('#modalAddshareholder').find('#amount_contributed').val(holder.sh_amount_contributed);
			$('#modalAddshareholder').modal();
		}, 1500);


	});

	$('#list-of-ideas').on('click', '#more-info-idea', function(e) {
		id = $(this).closest('.card-body').find('span')[0].innerHTML;
		idea = getIdea(id);
		setTimeout(() => {

			$('#idea_add').show();
			var target = $(".ideas");
			var i = idea.idea;
			$('#sector-input').val(i.idea_sector);
			$('#idea_name').val(i.idea_name);
			$('#idea_trademark').val(i.idea_trademark);
			$('#idea_nature').val(i.idea_nature);
			$('#idea_target_market').val(i.idea_target_market);
			$('#register_idea').text("Update");
			if (target.length) {
				$('html,body').animate({
					scrollTop: target.offset().top
				}, 1000);
				return false;
			}
		}, 1000);
	});

	$('#show-full-info').on('click', '.edit', function(e) {
		e.preventDefault()
		e.stopPropagation();
		var action = $(this).closest('.actions').find('span')[0].innerHTML;
		var id = $(this).closest('.actions').find('p')[0].innerHTML;
		if(action == "Spouse") {
			$('#spouse_action').text("Edit spouse");
			getSpouse(id);
		}else if(action == "Beneficiary") {
			getBeneficiary(id);
		}
	});

	$('#show-full-info').on('click', '.deligations', function(e) {
		e.preventDefault()
		e.stopPropagation();
		var id = $(this).closest('.spouse-actions').find('p')[0].innerHTML;
		$('#spouse_action').text("Edit spouse");
		getSpouse(id);
		
	});

	$('.edit-natural').click(function(e) {

		if($(this).text() == "Edit") {
			$(this).text("Cancel");
			$('#natural_view').empty();
			var html = `
				<div class="m-1">
					<div id="n_status"></div>
					<form method="POST" action="" class="add-natural">
						<input type="name" class="form-control mb-3" id="mname__" placeholder="Middle name" value="${natural.n_middle_name}">
						<label class="font-italic">Date of birth: </label>
						<input type="date" class="form-control mb-3" id="dob__" placeholder="Date of Birth" value="${natural.n_dob}">
						<input type="name" class="form-control mb-3" id="id_number__" placeholder="ID number" value="${natural.n_id_number}">
						<select class="form-control mb-3" id="marital_status">
							<option value="" disabled>Marital Status</option>
							<option value="${natural.n_marital_status}" selected>${natural.n_marital_status}</option>
							<option value="Married">Married</option>
							<option value="Single">Single</option>
						</select>
						<select class="form-control mb-3" id="marriage_type">
							<option value="" disabled>Marriage type</option>
							<option value="${natural.n_marriage_type}" selected>${natural.n_marriage_type}</option>
							<option value="Civil">Civil</option>
							<option value="Customary">Customary</option>
						</select>
						<button class="btn btn-success float-right" id="add_natural">Update</button>
					</form>
				</div>
			`;
			$('#natural_view').append(html);
		}else {
			$(this).text("Edit");
			window.location.reload();
		}

	});

	$('#documentsView').on('click', 'a', function(e) {
		e.stopPropagation();
		var action = $(this).text();
		var id = $(this).closest('.document-action').find('p').text();

		switch (action) {
			case "Verify":
				verifyDoc(id);
			break;
			case "Download":
				
			break;
			case "view document":
				
			break;
			case "Edit":
				var doc = getDocument(id);
				$('html, body').animate({scrollTop: $(".documents").offset().top}, 2000);

			break;	
			case "Delete":
				deleteDoc(id);
			break;
		}
	})
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
		    if(data == "1") {
		       $('#status').html("<div class='alert alert-success'>User has been successfully added</div>");
		       setTimeout(function(){location.reload()}, 2000);
		    }else {
		        $('#status').html(data);
		    }
			
		}).catch(function(error) {
			$('#status').html(error);
		});

	
	});

	$('#add_client').click(function(e) {
		e.preventDefault();
		var fname = $('#fname').val();
		var lname = $('#lname').val();
		var email = $('#email').val();
		var cellNumber = $('#cell_number').val();
		var home_address = $('#home_address').val();
		var city = $('#city').val();
		var zip_code = $('#zip_code').val();
		var person = $('#person').val();
		var title = $('#title').val();
		var initials = $('#initials').val();

		if(fname == "" || lname == "" || email == "" || cellNumber =="" || home_address == "" || zip_code == "" || city == "" || person =="" || title == "" || initials == "") {
			$('#status').html("<div class='alert alert-danger'>All fields are required</div>");	
			return;
		}

		if(!cell_number(cellNumber)) {
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
			dataType: 'json',
			data: {fname: fname, lname: lname, email: email, cell_number: cellNumber, home_address: home_address, zip_code: zip_code, city: city, person: person, title: title, initials: initials, action: 'add_client'},
		}).then(function(data) {
			if(data.success) {
				sessionStorage.setItem('client_id' , data.id);
				if(person == "Juristic") {
					window.location.href = 'juristic.php';
				}else if(person == "Juristic") {
					window.location.href = 'natural.php';
				}
			}else {
				$('#status').html(data.error);
			}
		});
	});

	$('#natural_view').on('click', '#add_natural', function(e) {
		e.preventDefault();
		var input = $(this).closest('#natural_view');
		var status = input.find("#n_status");
		var client_id = client.client_id;
		var action = $(this).text();
		var fname = input.find('#fname__').val();
		var lname = input.find('#lname__').val();
		var mname = input.find('#mname__').val();
		var dob = input.find('#dob__').val();
		var id_number = input.find('#id_number__').val();
		var marital_status = input.find('#marital_status').val();
		var marriage_type = input.find('#marriage_type').val();

		if(dob == "" || id_number =="" || marital_status == "") {
			status.html("<div class='alert alert-danger'> All fields are required</div>");
			return;
		}

		if(!valid_idnumber(id_number)) {
			status.html(`<div class='alert alert-danger'>${error}</div>`);
			return;
		}

		if(!isDob(dob)) {
			status.html(`<div class='alert alert-danger'>${error}</div>`);
			return;		
		}

		if(!isCorrectDate(dob)) {
			status.html(`<div class='alert alert-danger'>${error}</div>`);
			return;		
		}

		if(marital_status == "Married") {
			if(marriage_type == "") {
				status.html("<div class='alert alert-danger'>Marriage has to be selected</div>");
				return;		
			}
		}

		if(marital_status == "Single") {
			marriage_type == "";
		}
		if(action == "Save") {
			if(!isName(fname)) {
				status.html(`<div class='alert alert-danger'>${error}</div>`);
				return;
			}
	
			if(!isName(lname)) {
				status.html(`<div class='alert alert-danger'>${error}</div>`);
				return;
			}
			addNatural(client_id, fname, lname, mname, dob, id_number, marital_status, marriage_type, status);
		}else if(action == "Update") {
			console.log(action);
			
			editNatural(mname, dob, id_number, marital_status, marriage_type, status);
		}

	});

	$('#juristic_view').on('click', '#add_juristic', function(e) {
		e.preventDefault();
		var add = $(this).closest('#juristic_view');
		var client_id = add.find('#client_id').val();
		var company_name = add.find('#company_name').val();
		var registration_date = add.find('#registration_date').val();
		var registration_number = add.find('#registration_number').val();

		if(company_name == "" || registration_number == "" || registration_date == "") {
			add.find('#j_status').html("<div class='alert alert-danger'>All fields are required</div>");
			return;
		}

		if(!isCompany(company_name, registration_date, registration_number)) {
			add.find('#j_status').html(`<div class='alert alert-danger'>${error}</div>`);
			return;		
		}

		if(!isCorrectDate(registration_date)) {
			add.find('#j_status').html(`<div class='alert alert-danger'>${error}</div>`);
			return;			
		}

		$.ajax(
		{
			method: 'POST',
			url: '../controller/controller.php',
			data: {client_id: client_id, company_name: company_name, registration_date: registration_date, registration_number: registration_number, action: 'add_juristic'}
		}).then(function(data) {
			if(data == "1"){
				getClient();
			}else{
				add.find('#j_status').html(data);	
			}
		}).catch(function(error) {
			console.error(error);
			add.find('#j_status').html(error);
		});

	});

	$('#add_company_member').click(function(e) {
		e.preventDefault();
		var action = $(this).text();
		var fname = $('#j_fname').val();
		var lname = $('#j_lname').val();
		var j_id = $('#j_id').val();
		var title = $('#j_title').val();
		var id_number = $('#j_id_number').val();
		var date_of_appointment = $('#j_date_of_appointment').val();
		if(fname == "" || lname == "" || title == "" || id_number == "" || date_of_appointment == "") {
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

		if(action === "Save") {
			addDirector(fname, lname, j_id, title, id_number, date_of_appointment);
		} else if(action === "Update") {
			editDirector(fname, lname, title, id_number, date_of_appointment);
		}
	});

	$('#add_share_holder').click(function(e) {
		e.preventDefault();
		var action = $(this).text();
		var fname = $('#fname_').val();
		var lname = $('#lname_').val();
		var j_id = $('#j_id_').val();
		var title = $('#title_').val();
		var id_number = $('#id_number_').val();
		var amount_contributed = $('#amount_contributed').val();

		if(fname == "" || lname == "" || title == "" || id_number == "" || amount_contributed == "") {
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

		if(action === "Save") {
			addShareHolder(j_id, fname, lname, title, id_number, amount_contributed);
		}else if(action === "Update") {
			editShareHolder(fname, lname, title, id_number, amount_contributed);
		}
	});

	$('#show-full-info').on('click', '#add_civil', function(e) {
		e.preventDefault();
		var action = $(this).text();
		var add = $(this).closest('#show-full-info');
		var natural_id = natural.n_id
		var spouse_fname = add.find('#spouse_fname').val();
		var spouse_lname = add.find('#spouse_lname').val();
		var certificate_no = add.find('#certificate_no').val();
		var spouse_id_number = add.find('#spouse_id_number').val();
		var date_of_issue = add.find('#date_of_issue').val();
		var marriage_terms = add.find('#marriage_terms').val();
		var detail_of_marriage = add.find('#detail_of_marriage').val().trim();

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

		if(action == "Save") {
			addCivil(natural_id, spouse_fname, spouse_lname, certificate_no, date_of_issue, marriage_terms, detail_of_marriage, spouse_id_number);
		}else if(action == "Update") { 
			editCivil(natural_id, spouse_fname, spouse_lname, certificate_no, date_of_issue, marriage_terms, detail_of_marriage, spouse_id_number);
		}
	});

	$('#register_idea').click(function(e) {
		e.preventDefault();
		var action = $(this).text();
		var client_id = client.client_id;
		var idea_name = $('#idea_name').val();
		var idea_trademark = $('#idea_trademark').val();
		var idea_nature = $('#idea_nature').val();
		var idea_target_market = $('#idea_target_market').val();
		var sector = $('#sector-input').val();

		console.log(sector);
		

		if(sector == "" || client_id == "" || idea_name == "" || idea_trademark == "" || idea_nature == "" || idea_target_market == "") {
			$('#idea_status').html('<div class="alert alert-danger">All the fields are required</div>');
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

		if(idea_nature.length < 500) {
			$('#idea_status').html('<div class="alert alert-danger">Idea nature should be at least 500 characters</div>');
			return;
		}

		if(idea_target_market.length < 250) {
			$('#idea_status').html('<div class="alert alert-danger">Idea target market should be at least 250 characters</div>');
			return;
		}

		if(action == "Save") {
			addIdea(client_id, sector, idea_name, idea_trademark, idea_nature, idea_target_market);
		}else if(action == "Update") {
			editIdea(sector, idea_name, idea_trademark, idea_nature, idea_target_market);
		}
	});

	$('#spouse_action').click(function(e) {
		e.preventDefault();
		var id = natural.n_id;
		var fname = $('#cs_fname').val();
		var lname = $('#cs_lname').val();
		var id_number = $('#id_number').val();
		var stages_of_negotiation = $('#cs_stages_of_negotiation').val();
		var spouse_action = $(this).text().trim();
		 

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

		if(spouse_action == "Add spouse") {
			addSpouse(id, fname, lname, stages_of_negotiation, id_number);
		}else if(spouse_action == "Edit spouse") {
			editSpouse(fname, lname, stages_of_negotiation, id_number);
		}
	});

	$('#add_beneficiary').click(function(e) {
		e.preventDefault();
		var action = $(this).text();
		var id = client.client_id;
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

		if(action == "Save") {
			addBeneficiary(id, fname, lname, id_number);
		}else if (action == "Update") {
			editBeneficiary(fname, lname, id_number);
		}
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

	$('#upload_document').submit(function(e) {
		e.preventDefault();
		var form = $(this)[0]; // You need to use standard javascript object here
		var formData = new FormData(form);	
		formData.append('client_id', client.client_id);
		$.ajax({
			url: '../controller/controller.php',
			method : 'POST',
			data: formData,
			dataType: 'json',
			processData: false,
			contentType: false,
		}).then(function(data) {
			if(data.success) {
				$('.statusMsg').html("<div class='alert alert-success mx-5 text-center'>Document uploaded successfully</div>");
				getClient();
			}else {
				$('.statusMsg').html("<div class='alert alert-danger mx-5 text-center'>"+data.error+"</div>");
			}
		});
	});

	//SECTION edit events
	$('.client-details').on('click', '#edit_identification', function(e) {
		e.preventDefault();
		var edit = $(this).closest('.client-details');
		var client_id = edit.find('#client_id').val();
		var fname = edit.find('#fname').val();
		var lname = edit.find('#lname').val();
		var email = edit.find('#email').val();
		var cellNumber = edit.find('#cell_number').val();
		var home_address = edit.find('#client_address').val();
		var city = edit.find('#client_city').val();
		var zip_code = edit.find('#client_zip_code').val();
		var title = edit.find('#client_title').val();
		var initials = edit.find('#client_initials').val();

		if(client_id == "" || fname == "" || lname == "" || email == "" || cellNumber =="" || home_address == "" || zip_code == "" || city == "" || title == "" || initials == "") {
			edit.find('#status').html("<div class='alert alert-danger'>All fields are required</div>");	
			return;
		}

		if(!cell_number(cellNumber)) {
			edit.find('#status').html(`<div class='alert alert-danger'>${error}</div>`);	
			return;	
		}

		if(!isName(fname)) {
			edit.find('#status').html(`<div class='alert alert-danger'>${error}</div>`);	
			return;			
		}

		if(!isName(lname)) {
			edit.find('#status').html(`<div class='alert alert-danger'>${error}</div>`);	
			return;			
		}

		if(!isZipCode(zip_code)) {
			edit.find('#status').html(`<div class='alert alert-danger'>${error}</div>`);	
			return;		
		}
		$.ajax({
			method: 'POST',
			url: '../controller/controller.php',
			data: {client_id: client_id, fname: fname, lname: lname, email: email, cell_number: cellNumber, home_address: home_address, zip_code: zip_code, city: city, title: title, initials: initials, action: 'edit_client'}
		}).then(function(data) {
			edit.find('#status').html(data);
			setTimeout(() => {
				window.location.reload();
			}, 1500);
		}).catch(function(error) {
			console.error(error);
			edit.find('#status').html("<div class='alert alert-danger'>Error occured</div>");
		});
	});

	$('#juristic_view').on('click', '#edit_save_juristic', function(e) {
		e.preventDefault();
		var edit = $(this).closest('#juristic_view');
		var j_id = edit.find('#j_id').val();
		var company_name = edit.find('#company_name').val();
		var registration_date = edit.find('#registration_date').val();
		var registration_number = edit.find('#registration_number').val();

		if(company_name == "" || registration_number == "" || registration_date == "") {
			edit.find('#j_status').html("<div class='alert alert-danger'>All fields are required</div>");
			return;
		}

		if(!isCompany(company_name, registration_date, registration_number)) {
			edit.find('#j_status').html(`<div class='alert alert-danger'>${error}</div>`);
			return;		
		}

		if(!isCorrectDate(registration_date)) {
			edit.find('#j_status').html(`<div class='alert alert-danger'>${error}</div>`);
			return;		
		}

		$.ajax({
			method: 'POST',
			url: '../controller/controller.php',
			data: {j_id: j_id, company_name: company_name, registration_date: registration_date, registration_number: registration_number, action: 'edit_juristic'}
		}).then(function(data) {
			if(data == "1") {
				edit.find('#j_status').html("<div class='alert alert-success'>Information edited successfully</div>");	
				location.reload(6000);
			}else {
				edit.find('#j_status').html(data);	
			}
		}).catch(function(error) {
			console.error(error);
			edit.find('#j_status').html(error);
		});

	});

	//SECTION delete events
	$('#company-directors').on('click', '.delete', function(e) {
		e.stopPropagation();
		var id = $(this).closest('div').find('p')[0].innerHTML;
		deleteDirector(id);
	});

	$('#company-share-holders').on('click', '.delete', function(e) {
		e.stopPropagation();
		var id = $(this).closest('div').find('p')[0].innerHTML;
		deleteShareHolder(id);
	});

	$('#show-full-info').on('click', '.delete', function(e) {
		e.preventDefault()
		e.stopPropagation();
		var action = $(this).closest('.actions').find('span')[0].innerHTML;
		var id = $(this).closest('.actions').find('p')[0].innerHTML;
		if(action == "Spouse") {
			deleteSpouse(id);
		}else if(action == "Beneficiary") {
			deleteBeneficiary(id);
		}
		
	});
	//SECTION get events

	$('#date-filter').change(function(e) {
		e.preventDefault();
		e.stopPropagation();
		dateFilter = $(this).val();
		getClientsByMonth();
	});

	$('#person-type').on('click', 'a' ,function(e) {
		e.preventDefault();
		e.stopPropagation();
		person = $(this).text();
		$('#person-type a').removeClass('selected-person');
		$(this).addClass('selected-person');
		getClientsByPerson();
	});
	
});


// ANCHOR functions

//SECTION  add
function addSpouse(id, fname, lname, stages_of_negotiation, id_number) {
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
}

function addDirector(fname, lname, j_id, title, id_number, date_of_appointment) {
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
}

function addShareHolder(j_id, fname, lname, title, id_number, amount_contributed) {

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
			getClient();
		}else {
			$('#holder_status').html(data);
		}
	}).catch(function(error) {
		console.error(error);
		$('#holder_status').html(error);
	});

}

function addIdea(client_id, sector, idea_name, idea_trademark, idea_nature, idea_target_market) {
	$.ajax({
		method: 'POST',
		url: '../controller/controller.php',
		data: {client_id: client_id, idea_name: idea_name, idea_trademark: idea_trademark, idea_nature: idea_nature, idea_target_market: idea_target_market, sector: sector, action: 'addIdea'}
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
}

function addNatural(client_id, fname, lname, mname, dob, id_number, marital_status, marriage_type, status) {
	$.ajax({
		method: 'POST',
		url: '../controller/controller.php',
		data: {client_id: client_id, fname: fname, lname: lname, mname: mname, dob: dob, id_number: id_number, marital_status: marital_status, marriage_type: marriage_type, action: 'add_natural'}
	}).then(function(data) {
		if(data == "1") {
			status.html("<div class='alert alert-success'>Details added successfully</div>");
			setTimeout(function(){location.reload()}, 2000);
		}else {
			status.html(data);	
		}
	}).catch(function(error) {
		console.error(error);
		status.html(error);
	});
}

function addCivil(natural_id, spouse_fname, spouse_lname, certificate_no, date_of_issue, marriage_terms, detail_of_marriage, spouse_id_number) {
	console.log("here");
	
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
}

function addBeneficiary(id, fname, lname, id_number) {
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
}

//SECTION edit
function editSpouse(fname, lname, stages_of_negotiation, id_number) {
	var id = $('#hidden-spouse-id').text();
	$.ajax({
		method: 'POST',
		url: '../controller/controller.php',
		data: {id: id, fname: fname, lname: lname, id_number:id_number, stages_of_negotiation: stages_of_negotiation, action: 'edit_spouse'}
	}).then(function(data) {
		if(data == 1) {
			$('#cs_status').html("<div class='alert alert-success'>Information Edited successfully</div>");
		}else {
			$('#cs_status').html(data);
		}
	});
}

function verifyDoc(document_id) {
	$.ajax({
		method: 'POST',
		url: '../controller/controller.php',
		data: {document_id: document_id, action: "verify_doc"},
		success: function(data) {
			if(data == "1") {
				getClient();
			}else {
				console.log(data);
				
			}
		}
	});
}

function editDirector(fname, lname, title, id_number, date_of_appointment) {
	var cm_id = companyDirector.director.cm_id;
	$.ajax({
		method: 'POST',
		url: '../controller/controller.php',
		data: {cm_id: cm_id, fname: fname, lname: lname, title: title, id_number: id_number, date_of_appointment: date_of_appointment, action: 'edit_company_member'}
	}).then(function(data) {
		if(data == "1") {
			$('#member_status').html('<div class="alert alert-success">Company member updated successfully</div>');
		}else {
			$('#member_status').html(data);
		}
	}).catch(function(error) {
		$('#member_status').html(error);
	});

}

function editShareHolder(fname, lname, title, id_number, amount_contributed) {
	var sh_id = shareHolder.holder.sh_id;

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

function editIdea(sector, idea_name, idea_trademark, idea_nature, idea_target_market) {
	$.ajax({
		method: 'POST',
		url: '../controller/controller.php',
		data: {id: idea.idea.idea_id, idea_name: idea_name, idea_trademark: idea_trademark, idea_nature: idea_nature, idea_target_market: idea_target_market, sector: sector, action: 'editIdea'}
	}).then(function(data) {
		if(data == "1") {
			$('#idea_status').html('<div class="alert alert-success">Successfully edited the idea</div>');	
			setTimeout(() => {window.location.reload()}, 1000);
		}else {
			$('#idea_status').html(data);
		}
	}).catch(function(error) {
		console.error(error);
	});
}

function editNatural(mname, dob, id_number, marital_status, marriage_type, status) {
	var n_id = natural.n_id;
	$.ajax({
		method: 'POST',
		url: '../controller/controller.php',
		data: {n_id: n_id, mname: mname, dob: dob, id_number: id_number, marital_status: marital_status, marriage_type: marriage_type, action: 'edit_natural'}
	}).then(function(data) {
		if(data == "1") {
			status.html("<div class='alert alert-success'>Details edited successfully</div>");
			setTimeout(function(){location.reload();}, 2000);
		}else {
			status.html(data);	
		}
	}).catch(function(error) {
		console.error(error);
		status.html(error);
	});
}

function editCivil(spouse_fname, spouse_lname, certificate_no, date_of_issue, marriage_terms, detail_of_marriage, spouse_id_number) {
	$.ajax({
		method: 'POST',
		url: '../controller/controller.php',
		data: {c_id: civil.c_id, spouse_fname: spouse_fname, spouse_lname: spouse_lname, certificate_no: certificate_no, date_of_issue: date_of_issue, marriage_terms: marriage_terms, detail_of_marriage: detail_of_marriage, spouse_id_number: spouse_id_number, action: 'edit_civil'},
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
}

function editBeneficiary(fname, lname, id_number) {
	var id = $('#b_id').val();
	$.ajax({
		method: 'POST',
		url: '../controller/controller.php',
		data: {id: id, fname: fname, lname: lname, id_number:id_number, action: 'edit_beneficiary'},
		success: function(data) {
			if(data == "1") {
				$('#b_status').html("<div class='alert alert-success'>Beneficiary updated successfully</div>");
			}else {
				$('#b_status').html(data);
			}
		}
	});
}


//SECTION delete

function deleteDirector(str) {
	var cm_id = str;
	var r = confirm("Are you sure you want to delete a company member? press okay if yes");
	if (r == true) {
		$.ajax({
			method: 'POST',
			url: '../controller/controller.php',
			data: {cm_id: cm_id, action: 'delete_member'},
			success: (data) => {
				
				if(data == "1") {
					$('#member_del_status').html("<div class='alert alert-success'>member Deleted</div>");
					location.reload(6000);
				}else {
					$('#member_del_status').html(data);
				}
			},
			error: (data) => {
				$('#member_del_status').html(data);
			}
		});		  
	}
}

function deleteShareHolder(str) {
	var r = confirm("Are you sure you want to delete a Share holder? press okay if yes");
	if (r == true) {
		var sh_id = str;
		$.ajax({
			method: 'POST',
			url: '../controller/controller.php',
			data: {sh_id: sh_id, action: 'delete_holder'},
			success: (data) => {
				
				if(data == "1") {
					$('#holder_del_status').html("<div class='alert alert-success'>holder deleted</div>");
					location.reload(6000);
				}else {
					$('#holder_del_status').html(data);
				}
			},
			error: (data) => {
				$('#holder_del_status').html(data);
			}
		});
	}
}

function deleteBeneficiary(id) {
	var r = confirm("Are you sure you want to delete a beneficiary? press okay if yes");
	if (r == true) {
	  var b_id = id;
	  $.ajax({
	  	method: 'POST',
	  	url: '../controller/controller.php',
	  	data: {b_id: b_id, action: 'delete_beneficiary'},
	  	success: (data) => {
	  		if(data == "1") {
				$('#beneficiary_status').html("<div class='alert alert-success'>beneficiary deleted</div>");
				setTimeout(() => {window.location.reload();}, 1000);  
	  		}else {
	  			$('#beneficiary_status').html(data);
	  		}
	  	},
	  	error: (data) => {
	  		$('#beneficiary_status').html(data);
	  	}
	  });
	}
}

function deleteSpouse(id) {
	var r = confirm("Are you sure you want to delete the spouse? press okay if yes");
	if (r == true) {
		var cs_id = id;
		$.ajax({
			method: 'POST',
			url: '../controller/controller.php',
			data: {cs_id: cs_id, action: 'delete_spouse'},
			success: (data) => {
				if(data == "1") {
					$('#s_status').html("<div class='alert alert-success'>spouse deleted successfully</div>");
					location.reload(6000);
				}else {
					$('#s_status').html(data);
				}
			},
			error: (data) => {
				$('#s_status').html(data);
			}
		});
	}

}

function deleteDoc(id) {
	var r = confirm("Are you sure you want to delete the spouse? press okay if yes");
	if (r == true) {
		$.ajax({
			url: '../controller/controller.php',
			method: 'POST',
			data: {id: id, action: 'deleteDoc'}
		}).then(function(data) {
			console.log(data);
			getClient();
		})
	}
}

//SECTION  Get functions

function loadMain() {
	getClientsByPerson();
}

function getClientsByMonth() {
	$.ajax({
		url: '../controller/controller.php',
		method: 'POST',
		dataType: 'json',
		data: {dateFilter: dateFilter, person: person,  action: 'getClientsByMonth'}
	}).then(function(clients) {
		console.log(client);
		clientFinalView(clients);
	});
}

function getClientsByPerson() {
	$.ajax({
		url: '../controller/controller.php',
		method: 'POST',
		dataType: 'json',
		data: {dateFilter: dateFilter, person: person, action: 'getClientsByPerson'}
	}).then(function(clients) {
		clientFinalView(clients);
	});
}

function getDirector(id) {
	$.ajax({
		url: '../controller/controller.php',
		method: 'POST',
		dataType: 'json',
		data: {id: id, action: 'getDirector'}
	}).then(function(director) {
		if(director.success) {
			companyDirector = director;
		}else {
			console.log(director);
		}
	});
}

function getShareHolder(id) {
	$.ajax({
		url: '../controller/controller.php',
		method: 'POST',
		dataType: 'json',
		data: {id: id, action: 'getShareHolder'}
	}).then(function(holder) {
		if(holder.success) {
			shareHolder = holder;
		}else {
			console.log(holder);
		}
	});
}
function clientFinalView(clients) {
	$('#view-all-clients').empty();
	if(Object.entries(clients).length !== 0 && clients.constructor !== Object) {
		$.each(clients, function(key, client) {
			
			var companyName = "";
			var client_status = ``;
			if(client.client_person == "Juristic") {
				if(client.j_company_name !== null) {
					companyName = client.j_company_name;
				}
				
			}

			if(client.client_person === "Juristic") {
				if(client.document_count < 7) {
					client_status = `
						<span class="jumbotron rounded-sm py-1 px-2">
							<i class="fa fa-file-pdf-o text-danger" aria-hidden="true" style="font-size: 100%;"></i> 
							<span class="ml-0 text-white badge badge-danger">${7 - client.document_count}</span>
						</span>
						`;
				}else {
					if(client.idea_count > 0) {
						client_status = `<i class="fa fa-check-square-o text-success" aria-hidden="true" style="font-size: 120%;"></i>`;
					}else {
						client_status = `<i class="fa fa-minus-circle text-danger" aria-hidden="true" style="font-size: 120%;"></i>`;
					}
				}

			} else if(client.client_person === "Natural"){
				if(client.document_count < 2) {
					client_status = `
						<span class="jumbotron rounded-sm py-1 px-2">
							<i class="fa fa-file-pdf-o text-danger" aria-hidden="true" style="font-size: 100%;"></i> 
							<span class="ml-0 text-white badge badge-danger">${2 - client.document_count}</span>
						</span>
					`;
				}else {
					if(client.idea_count > 0) {
						client_status = `<i class="fa fa-check-square-o text-success" aria-hidden="true" style="font-size: 120%;"></i>`;
					}else {
						client_status = `<i class="fa fa-minus-circle text-danger" aria-hidden="true" style="font-size: 120%;"></i>`;
					}
				}
			}
			var html = `
				<div class="m-3 folders col-2">
					<a class="clients">
						<p hidden>${client.client_id}</p>
						<div class="d-flex justify-content-center">
							<i class="fa fa-folder-open fa-5x " style="color: #D0BB96;" aria-hidden="true"></i>
						</div>
						<div>
							${client.client_fname} ${client.client_lname}
						</div>
						<div class="font-italic h6">
							${companyName}
						</div>
						<div>
							${moment(client.client_dateCreated).fromNow()}
						</div>
						<div>
							${client_status}
						</div>
						
					</a>	
				</div>
			`;
			$('#view-all-clients').append(html);

		});
	}else {
		$('#view-all-clients').append("<h1 class='m-5 text-white'>No clients for this month!!</h1>");
	} 
}

function getIdea(id) {
	$.ajax({
		url: '../controller/controller.php',
		method: 'POST',
		dataType: 'json',
		data: {id: id, action: 'getIdea'}
	}).then(function(data) {
		if(data.success) {
			idea = data;
		}else {
			console.log(data);
		}
	});
}

function getDeligations(id) {

}

function getDeligation(id) {

}

function getDocument(id) {
	$.ajax({
		url: '../controller/controller.php',
		method: 'POST',
		dataType: 'json',
		data: {id: id, action: 'getDocument'}
	}).then(function(data) {
		console.log(data);
		
	});
}

function getSpouse(id) {
	$.ajax({
		url: '../controller/controller.php',
		method: 'POST',
		dataType: 'json',
		data: {id: id, action: 'get_spouse'}
	}).then(function(spouse) {
		if(spouse.success) {
			$('#cs_fname').val(spouse.fname);
			$('#cs_lname').val(spouse.lname);
			$('#id_number').val(spouse.id_number);
			$('#cs_stages_of_negotiation').val(spouse.stages);
			var save = $('.spouse-save');
			save.attr('id', 'edit-spouse');
			$('#hidden-spouse-id').text(id);
			$('#addSpouse').modal();
			
		}else {
			$('#addSpouse').modal();
		}
	});
}

function getBeneficiary(id) {
	$.ajax({
		url: '../controller/controller.php',
		method: 'POST',
		dataType: 'json',
		data: {id: id, action: 'getBeneficiary'}
	}).then(function(data) {
		if(data.success) {
			var beneficiary = data.beneficiary;
			$('#b_fname').val(beneficiary.b_fname);
			$('#b_lname').val(beneficiary.b_lname);
			$('#b_id_number').val(beneficiary.b_id_number);
			$('#b_id').val(beneficiary.b_id);
			$('#add_beneficiary').text("Update");
			$('#addBeneficiary').modal();
		}else {
			console.log(data);
		}
	});
}

function getClient() {
	var id = sessionStorage.getItem('client_id');
	$.ajax({
		url: '../controller/controller.php',
		method: 'POST',
		dataType: 'json',
		data: {id: id, action: 'getClient'}
	}).then(function(data) {
		console.log(data);
		client = data.client;
		showIdentification(client);
		if(client.client_person === "Juristic") {
			juristic = data.juristic;
			showJuristic(client, juristic, data.company_members, data.share_holders, data.documents, data.ideas);
		}else if(client.client_person === "Natural") {
			natural = data.natural;
			civil =  data.civil;
			showNatural(client, natural, data.beneficiaries, civil, data.spouses, data.documents, data.ideas);
		}
		
	});
}

function showIdentification(client) {

	var html = `
	<div class="card-text" id="view_ident">
		<div class="row mb-2">
			<div class="col-sm-2">
				<i class="fa fa-black-tie fa-2x text-success" style="font-size: 150%;"></i>
			</div>
			<div class="col-sm-10">
				${client.client_person}
			</div>
		</div>
		<div class="row mb-2">
			<div class="col-sm-2 text-center">
				<i class="fa fa-user text-success" style="font-size: 150%;"></i>
			</div>
			<div class="col-sm-10">
				${client.client_title} ${client.client_fname} ${client.client_lname}
			</div>
		</div>
		<div class="row mb-2">
			<div class="col-sm-2 w3-center">
				<i class="fa fa-map-marker text-success" style="font-size: 150%;"></i>
			</div>
			<div class="col-sm-10">
				${client.client_home_address}, ${client.client_city}, ${client.client_zip_code}
			</div>
		</div>
		<div class="row mb-2">
			<div class="col-sm-2">
				<i class="fa fa-at text-success" style="font-size: 150%;"></i>
			</div>
			<div class="col-sm-10">
				${client.client_email}
			</div>
		</div>
		<div class="row mb-2">
			<div class="col-sm-2">
				<i class="fa fa-phone text-success" style="font-size: 150%;"></i>
			</div>
			<div class="col-sm-10">
				${client.client_cellno}
			</div>
		</div>
		<div class="row mb-2">
			<div class="col-sm-2">
				<i class="fa fa-calendar-plus-o text-success" style="font-size: 150%;"></i>
			</div>
			<div class="col-sm-10">
				${moment(client.client_dateCreated).format("Do MMM Y")}
			</div>
		</div>
	</div>
	`;

	$('.client-details').empty();
	$('.client-details').append(html);
}

function showJuristic(client ,juristic, company_members, share_holders, docs, ideas) {
	$('#juristic_header').empty();
	$('#juristic_header').html(client.client_person);

	if(juristic !== null) {
		$('#j_id').val(juristic.j_id);
		$('#j_id_').val(juristic.j_id);
		$('#comp-name').html(juristic.j_company_name);
		$('#comp-reg-number').html(juristic.j_registration_number);
		$('#comp-reg-date').html(moment(juristic.j_registration_date).format('Do MMM Y'));
		if(Object.entries(company_members).length !== 0 && company_members.constructor !== Object) {
			showDirectors(company_members);
			showDocuments(null, client, docs, ideas);
			showIdeas(ideas);
		}else {
			$('.documents').hide();
		}
		showShareHolders(share_holders);
		
	}else {
		$('#edit_juristic').hide();
		$('.directors').hide();
		$('.documents').hide();
		$('.ideas').hide();
		$('.company-share-holders').hide();
		var html = `
		<div class="m-1">
			<div id="j_status"></div>
			<form method="POST" action="">
				<input type="hidden" class="form-control mb-3" id="client_id" value="${client.client_id}">
				<input type="name" class="form-control mb-3" id="company_name" placeholder="company name">
				<br>
				<label>Registration date</label>
				<input type="date" class="form-control mb-3" id="registration_date" placeholder="registration date">
				<input type="name" class="form-control mb-3" id="registration_number" placeholder="registration number">
				<button class="btn btn-success float-right mb-3" id="add_juristic">Save</button>
			</form>
		</div>
	`;
	$('#juristic_view').empty();
	$('#juristic_view').append(html);
	}
}

function showDirectors(directors) {
	var count = 0;
	$('#company-directors').empty();
	directors.forEach(function(member) {
		var director = `
			<div class="ml-0">
				${++count}. ${member.cm_fname} ${member.cm_lname}
				<div>
					<p hidden>${member.cm_id}</p>
					<a class="mr-3 view" style="cursor: pointer;"><i class="fa fa-eye"></i></a> 
					<a style="cursor: pointer;" class="delete"><i class="fa fa-trash text-danger"></i></a>
				</div>
			</div>
		`;
		$('#company-directors').append(director);
	});
}

function showShareHolders(holders) {
	var count = 0;
	$('#company-share-holders').empty();
	holders.forEach(function(holder) {
		var html = `
			<div class="m-2">
				${++count}. ${holder.sh_fname} ${holder.sh_lname}
				<div>
					<p hidden>${holder.sh_id}</p>
					<a class="mr-3 view" style="cursor: pointer;"><i class="fa fa-eye"></i></a> 
					<a style="cursor: pointer;" class="delete"><i class="fa fa-trash text-danger"></i></a>
				</div>
			</div>
		`;
		$('#company-share-holders').append(html);
	});
}

function showNatural(client, natural, beneficiaries, civil, spouses, documents, ideas) {
	$('.person-heading-div').append(client.client_person);
	if(natural !== null) {
		var middleName = ``;
		var marriageStatus = ``;
		if(natural.n_middle_name == "") {
			middleName = ``;
		}else {
			middleName = `<div>Middle name: ${natural.n_middle_name}</div>`;
		}
	
		if(natural.n_marital_status == "Married") {
			marriageStatus = `<div>Marriage type:  ${natural.n_marriage_type}</div>`;
		}
	
		$('#natural_view').html(`
			${middleName}
			<div>DOB: ${natural.n_dob}</div>
			<div>ID number: ${natural.n_id_number}</div>
			<div>Marital status: ${natural.n_marital_status}</div>
			${marriageStatus}
		`);
		if(natural.n_marital_status == "Single") {
			$('#natural-title').html("Beneficiary");
			showBeneficiary(beneficiaries);	
			if(beneficiaries.length > 0) {
				showDocuments(natural, client, documents, ideas);
			}else {
				$('.documents').hide();
				$('.ideas').hide();
			}
		}else if(natural.n_marital_status == "Married") {
			if(natural.n_marriage_type == "Civil") {
				showCivil(civil);
				if(civil !== null) {
					showDocuments(natural, client, documents, ideas);
				}else {
					$('.documents').hide();
					$('.ideas').hide();
				}
			}else if(natural.n_marriage_type == "Customary") {
				$('#natural-title').html("Customary spouse(s)");
				showSpouses(spouses);
				if(spouses.length > 0) {
					showDocuments(natural, client, documents, ideas);
				}else {
					$('.documents').hide();
					$('.ideas').hide();
				}
			}
		}	
	}else {
		var html = `
			<div class="m-1">
				<form method="POST" action="" class="add-natural">
					<input type="hidden" class="form-control mb-3" id="client_id__" value="">
					<input type="name" class="form-control mb-3" id="fname__" value="${client.client_fname}" disabled>
					<input type="name" class="form-control mb-3" id="lname__" value="${client.client_fname}" disabled>
					<input type="name" class="form-control mb-3" id="mname__" placeholder="Middle name">
					<label class="font-italic">Date of birth: </label>
					<input type="date" class="form-control mb-3" id="dob__" placeholder="Date of Birth">
					<input type="name" class="form-control mb-3" id="id_number__" placeholder="ID number">
					<select class="form-control mb-3" id="marital_status">
						<option value="">Marital Status</option>
						<option value="Married">Married</option>
						<option value="Single">Single</option>
					</select>
					<select class="form-control mb-3" id="marriage_type">
						<option value="">Marriage type</option>
						<option value="Civil">Civil</option>
						<option value="Customary">Customary</option>
					</select>
					<button class="btn btn-success float-right" id="add_natural">Save</button>
				</form>
			</div>
		`;

		$('#natural_view').empty();
		$('#natural_view').append(html);
	}

}

function showBeneficiary(beneficiaries) {
	$('#show-full-info').empty();
	$('#natural-title').after('<button data-toggle="modal" class="btn add-btn" data-target="#addBeneficiary"><i class="fa fa-plus"></i></button>');
	if(beneficiaries.length > 0) {
		beneficiaries.forEach(function(beneficiary){
			var html = `
			<div>
				<div class="row">
					<div class="col-sm-2">
						<i class="fa fa-user text-success" style="font-size: 120%;"></i>
					</div>
					<div class="col-sm-10">
						${beneficiary.b_fname} ${beneficiary.b_lname}
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2">
						<i class="fa fa-info text-success" style="font-size: 120%;"></i>
					</div>
					<div class="col-sm-10">
						${beneficiary.b_id_number}
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2">
						<i class="fa fa-calendar-plus-o text-success" style="font-size: 120%;"></i>
					</div>
					<div class="col-sm-10">
						${moment(beneficiary.b_date_added).format("Do MMM Y")}
					</div>
				</div>
				<div class="float-left mt-1 actions">
					<span hidden>Beneficiary</span>
					<p hidden>${beneficiary.b_id}</p>
					<a class="btn btn-outline-success delete">Delete</a>
					<a class="btn btn-outline-success edit">Edit</a>
				</div>	
			</div>`;
			$('#show-full-info').append(html);
		});
	}else {
		$('#show-full-info').append("<div class='m-3 h5 text-secondary'>No beneficiaries has been added</div>");
	}
}

function showCivil(civil) {
	$('#natural-title').html("Civil Spouse");
	$('#show-full-info').empty();
	
	if(civil !== null) {
		$('#natural-title').after('<button class="btn edit_btn " id="edit_natural_beneficiary">Edit</button>');
		var html = `
			<div class="ml-3">
				<div class="row">Spouse: </div>
				<div class="row mt-2">first name: ${civil.c_spouse_fname}</div>
				<div class="row mt-2">Last name: ${civil.c_spouse_lname}</div>
				<div class="row mt-2 person-id-number">Id number: ${civil.c_id_number}</div>
				<div class="row mt-2">Certificate #: ${civil.c_certificate_number}</div>
				<div class="row mt-2">Date of issue: ${civil.c_date_of_issue}</div>
				<div class="row mt-2">Terms of marriage: ${civil.c_marriage_terms}</div>
				<div class="row mt-2">Detail of marriage: ${civil.c_detail_of_marriage}</div>
			</div>
		`;
		$('#show-full-info').append(html);
	}else {
		var html = `
				<div class="row m-0">
					<div id="c_status"></div>
					<form method="POST" action="">
						<input type="hidden" id="natural_id" value="<?php print($natural['n_id']);?>">
						<div class="row mb-2">
						<div class="col-6">
								<input type="name" id="spouse_fname" placeholder="Spouse first name" class="form-control border-success">
						</div>
						<div class="col-6">
								<input type="name" id="spouse_lname" placeholder="Spouse Last name" class="form-control border-success">
						</div>
						</div>
						<div class="row m-0">
							<input type="name" id="spouse_id_number" placeholder="Spouse Id number" class=" form-control mb-2 border-success">
						</div>
							<label><i>Date of issue:</i> </label>
						<div class="row  mb-2">
					<div class="col-6">
								<input type="date" id="date_of_issue" placeholder="" class="form-control border-success">
					</div>
					<div class="col-6">
								<input type="name" id="certificate_no" placeholder="certificate number" class="form-control border-success">
					</div>

						</div>
						<select class="form-control border-success" id="marriage_terms">
							<option value="" disabled selected>Marriage terms</option>
							<option value="In-community">In-community</option>
							<option value="Out-of-community">Out-of-community</option>
						</select>
						<label class="label mt-2 "><i>Detail of marriage: </i></label>
						<textarea class="form-control mb-2 border-success" id="detail_of_marriage" style="height: 80px; resize: none;"></textarea>
						<div class="d-flex justify-content-center">
							<button class="btn btn-success" id="add_civil"> Save</button>
						</div>

					</form>
				</div>
		`;
		$('#show-full-info').append(html);
	}
}

function showSpouses(spouses) {
	$('#show-full-info').empty();
	$('#natural-title').after('<button class="btn add-btn" data-toggle="modal" data-target="#addSpouse"><i class="fa fa-plus"></i></button>');
	if(spouses.length > 0) {
		spouses.forEach(function(spouse) {
			html = `
					
					<div class="m-3 actions">
						<span hidden>Spouse</span>
						<p hidden>${spouse.cs_id}</p>
						<div>${spouse.cs_fname} ${spouse.cs_lname}</div>
						<div>${spouse.cs_id_number}</div>
						<div>stage of negotiation: ${spouse.cs_stages_of_negotiation}</div>
						<div class="d-flex justify-content-between">
							<a class='ml-2 delete'><i class="fa fa-trash-o"></i></a>
							<a class='ml-0 edit'><i class="fa fa-edit"></i></a>
							<a class='mr-2 delegations'><i class="fa fa-users"></i></a>
						</div>
					</div>
			`;
			$('#show-full-info').append(html);
		});
	}else {
		$('#show-full-info').append("<div class='text-muted m-2 h4'>No Spouses</div>");
	}
}

function showDocuments(natural, client, docs, ideas) {
	var docsArray = [];
	var requiredDocuments = [];
	var availableDocs = [];
	var count = 0;
	var unverified = 0;
	var duties = `
		<a class="dropdown-item" target="_blank">view document</a>
		<a class="dropdown-item">Download</a>
		<a class="dropdown-item">Delete</a>
		<a class="dropdown-item">Edit</a>`;
	var user_role = sessionStorage.getItem('user_role');
	$('#document_description').empty();
	$('#documentsView').empty();
	$('#required-doc').empty();

	if(client.client_person == "Juristic") {
		docsArray = ["Ck", "Share register", "Share certificate", 
				"Resolution of idea with all requirements", "Notice of meeting",
				"Minutes", "Public officer form"];
		
	}else if(client.client_person == "Natural") {
		if(natural.n_marital_status == "Single") {
			docsArray = ["ID Copy", "Affidavit stating single", 
					"Death certificate(if spouse deceased)", "Divorce certificate(if divorced)"];

		}else if(natural.n_marital_status == "Married") {
			docsArray = ["ID Copy", "Marriage certificate"];
		}
	}

	if(user_role == "Super User") {
		duties = `
			<a class=" dropdown-item" target="_blank">view document</a>
			<a class="dropdown-item">Verify</a>
			<a class="dropdown-item ">Download</a>
			<a class="dropdown-item">Delete</a>
			<a class="dropdown-item">Edit</a>
		`;
	}
	requiredDocuments = Array.from(docsArray);

	if(docs.length !== 0) {
		$.each(docs, function(key, doc) {
			var documentStatus = ``;
			if(doc.document_status === "0") {
				var documentStatus = `<div class='text-danger ml-1'>Unverified</div>`;
				++unverified;
			}else if(doc.document_status === "1") {
				var documentStatus = `<div class='text-success ml-1'>Verified</div>`;
			}
			var html = `
				<div class=" col-3 border rounded-sm m-1">
					<div class='mt-3'>${++count}. ${doc.document_description} </div>
					<div class='ml-0'>${moment(doc.document_date).fromNow()} </div>
					${documentStatus}
					<div class="mt-3 ml-3">
						<button class="btn btn-outline-dark dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Action
						</button>
						<br><br>
						<div class="dropdown-menu document-action" aria-labelledby="dropdownMenuLink">
							<p hidden>${doc.document_id}</p>
							${duties}
						</div>
					</div>
				</div>
			`;
			$('#documentsView').append(html);
			if(docsArray.includes(doc.document_description)) {
				availableDocs.push(doc.document_description);
				var index = docsArray.indexOf(doc.document_description);
				docsArray.splice(index, 1);
			}
		});

	} else {
		$('#documentsView').append("<h1 class='p-5 text-muted'>You have not uploaded any document</h1>");
	}

	$('#document_description').append(`<option selected disabled> - File description - </option>`);
	for(var i = 0; i < docsArray.length ; i++) {
		$('#document_description').append(`<option> ${docsArray[i]} </option>`);
	}

	for(var i = 0; i < requiredDocuments.length ; i++) {
		if(availableDocs.includes(requiredDocuments[i])) {
			$('#required-doc').append(
				`<div>
					<i class='fa fa-check-square-o text-success' style='font-size: 150%;'></i>
					&nbsp; ${requiredDocuments[i]}
				</div>`);
		}else {
			$('#required-doc').append(
				`<div>
					<i class='fa fa-square-o text-danger' style='font-size: 150%;'></i>
					&nbsp; ${requiredDocuments[i]}
				</div>`);
		}
	}

	if(natural == null) {
		if(docs.length >= 7 && unverified == 0) {
			showIdeas(ideas);
		}else {
			$('.ideas').hide();
		}
	} else {
		if(docs.length >= 2 && unverified == 0) {
			showIdeas(ideas);
		}else {
			$('.ideas').hide();
		}
	}
}

function showIdeas(ideas) {
	$('#list-of-ideas').empty();
	if(ideas.length > 0) {
		ideas.forEach(function(idea) {
			var html = `
				<div class="col-6 mb-4">
					<div class="card border-success mb-3" style="max-width: 540px;">
						<div class="row no-gutters">
							<div class="col-md-8">
								<div class="card-body">
									<span hidden>${idea.idea_id}</span>
									<h5 class="card-title">Idea ${idea.idea_code}</h5>
									<p class="card-text">Idea name: ${idea.idea_name} <br> Idea trademark: ${idea.idea_trademark}</p>
									<p class="card-text"><small class="text-muted">${idea.idea_date}</small></p>
									<button class="btn btn-outline-success" id="more-info-idea">more info</button>
									<a class="btn btn-outline-dark" target="_blank">Gerate certificate</a>
								</div>
							</div>
						</div>
					</div>
				</div>`;
			$('#list-of-ideas').append(html);
		});
	} else {
		$('#list-of-ideas').append("<div class='text-muted h2 text-center'>There are currently no ideas</div>")
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
	}else if(arr.length == 3 && arr[1].length < 6) {
		error = "The Second part should be at least 6 digits";
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
	var client_id_number = client.client_id_number;
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
	var your_date = date.split('/');
	var your_year = parseInt(your_date[0]);
	var your_month = parseInt(your_date[1]);
	
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

/* ||||																	 ||||
   ||||------------------------------------------------------------------||||
   ||||						|  OTHER FUNCTIONS  |						 ||||
   ||||------------------------------------------------------------------||||
   ||||																	 ||||
*/

function snackBar() {
	// Get the snackbar DIV
	var x = document.getElementById("snackbar");
	// Add the "show" class to DIV
	x.className = "show";
	// After 3 seconds, remove the show class from DIV
	setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
  }




