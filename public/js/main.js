$(()=>
{

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


	$('#view_edit_civil').click((e)=>
	{
		e.preventDefault();
		$('#civil_edit_container').show();
		$('#civil_view_container').hide();
	});

	$('#cancel_edit_civil').click((e)=>
	{
		e.preventDefault();
		$('#civil_edit_container').hide();
		$('#civil_view_container').show();
	});
	$('#idea_edit').click((e)=>
	{
		e.preventDefault();
		$('.idea_show_first').hide();
		$('.idea_hide_first').show();

	})

	$('#cancel_idea_edit').click((e)=>
	{
		e.preventDefault();
		$('.idea_show_first').show();
		$('.idea_hide_first').hide();
	});


	$('#add_user_btn').click((e)=>
	{
		$('#add_user_container').toggle();
	});

	$('#idea_container').click(()=>
	{
		$('#idea_add').toggle();
		$('html, body').animate({
        scrollTop: $("#idea_add").offset().top}, 200);
	});

	$("#marital_status").change((e)=>
	{
	  e.preventDefault();
	  if ($("#marital_status").val() == "Married")
	  {
	    $('#marriage_type').show();
	  }else
	  {
	    $('#marriage_type').hide();

	  }
	});
	$("#marital_status").trigger("change");

	$("#ne_marital_status").change((e)=>
	{
	  e.preventDefault();
	  if ($("#ne_marital_status").val() == "Married")
	  {
	    $('#ne_marriage_type').show();
	    $('.m_type').show();
	  }else
	  {
	    $('#ne_marriage_type').hide();
	    $('.m_type').hide();

	  }
	});
	$("#ne_marital_status").trigger("change");

	$('#edit_cm').click((e)=>
	{
		e.preventDefault();
		$('#view_member').hide();
		$('#edit_member').show();
	});

	$('.close').click(()=>
	{
		window.location.reload(1);
	});

	$('#user-edit').click(()=>
	{
		$('.show_first').hide();
		$('.hide_first').show();

	});

	$('#cancel_edit').click(()=>
	{
		$('.show_first').show();
		$('.hide_first').hide();
	});

	$('#edit_juristic').click(()=>
	{
		$('#juristic_view').hide();
		$('#juristic_edit').show();
	});

	$('#cancel_edit_juristic').click((e)=>
	{
		e.preventDefault();
		$('#juristic_view').show();
		$('#juristic_edit').hide();
	});

	$('#edit_natural').click(()=>
	{
		$('#natural_view').hide();
		$('#natural_edit').show();
	});

	$('#cancel_edit_natural').click((e)=>
	{
		e.preventDefault();
		$('#natural_view').show();
		$('#natural_edit').hide();
	});


});
