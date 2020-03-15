<div class="card ml-5 border border-success" style="width: 18rem;">
  <div class="card-body p-0">
    <h4 class="card-title m-0">Company Details <button class="btn edit_btn" id="edit_juristic" style="margin-left: 50%;">Edit</button></h4>
    <div class="card-text" id="juristic_view">
 	  <div class="row ml-0 badge badge-success">
 	  	<?php print($client_identification['client_person']." :");?>
 	  </div>
	 	  <div class="row ml-0 mt-4">
	 	  	<div>
          <div class="row mb-2">
    				<div class="col-sm-2">
    						<i class="fa fa-institution text-success" style="font-size: 150%;"></i>
    				</div>

    				<div class="col-sm-10">
    						<?php print(" ".$juristic['j_company_name']);?>
    				</div>
    			</div>
        </div>
	 	  	<div>
            <div class="row mb-2 ml-0">
                <span class="text-success" style="font-size: 120%;">Reg. <i class="fa fa-hashtag" ></i></span>
      					<span class="ml-3"><?php print(" ".$juristic['j_registration_number']);?></span>
      			</div>
        </div>
        <div>
            <div class="row mb-2 ml-0">
                <span class="text-success" style="font-size: 120%;">Reg. <i class="fa fa-calendar-plus-o" ></i></span>
      					<span class="ml-3"><?php print(date("d M Y",strtotime($juristic['j_registration_date'])));?></span>
      			</div>
        </div>
 	  </div>

 	 </div>
    <div class="card-text" id="juristic_edit">
 	  <div class="row ml-0 badge badge-success">
 	  	<?php print($client_identification['client_person']." :");?>
 	  </div>
	 	  <div class="row mt-2">
	 	  	<div id="j_status"></div>
     	  	<form method="POST" action="">
     	  		<input type="hidden" class="form-control" id="j_id" value="<?php print($juristic['j_id']);?>">
     	  		<div class="row m-2">
	     	  		<label>Company name</label>
	     	  		<input type="name" class="form-control" id="company_name_" value="<?php print($juristic['j_company_name']);?>">
     	  		</div>
                <div class="row m-2">
	                <label>Registration date</label>
	     	  		<input type="date" class="form-control" id="registration_date_" value="<?php print(date('Y-m-d', strtotime($juristic['j_registration_date'])));?>">
                </div>

                <div class="row m-2">
                	<label>Registration number</label>
     	  			<input type="name" class="form-control" id="registration_number_" value="<?php print($juristic['j_registration_number']);?>">
                </div>

                <div class="m-2">
                    <button class="btn btn-success" id="edit_juristic_save">Save <i class="fa fa-save"></i></button>
                </div>
     	  	</form>
 	  </div>

 	 </div>
   </div>
 </div>
