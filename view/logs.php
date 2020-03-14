<?php
require_once('session.php');
require 'partials/header.php';
require_once('../model/User.class.php');

$user = new User();
$u_details = $user->getUser($_SESSION['id']);

require 'partials/navbar_admin.php';
?>


<?php

	if(isset($_GET['w_id']))
	{
		$worker = $user->getUser($_GET['w_id']);
?>

<div class="container-fluid border-bottom m-4">
	<div class="row m-1">
		<h1><a href="./admin.php"><i class="fa fa-chevron-circle-left"></i></a></h1> 
		<h1 class="text-center ml-5">All logs for <?php print($worker['w_fname']." ".$worker['w_lfname']);?></h1>
	</div>	
</div>

<div class="container-fluid">

	<table class="table mt-5">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Log description</th>
	      <th scope="col">Log date/time</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php 

	  		$logs = $user->get_logs($_GET['w_id']);
	  		$count = 0;
	  		foreach($logs as $log)
	  		{

	  	?>
	    <tr>
	      <td scope="row"><?php print(++$count);?></td>
	 	  <td scope="row"><?php print($log['log_report']);?></td>
	 	  <td scope="row"><?php print($log['log_date']);?></td>
	    </tr>	  	
	  	<?php
		
	  		}
	  	?>

	  </tbody>
	</table>
</div>
<?php }
 require 'partials/footer.php';
 ?>