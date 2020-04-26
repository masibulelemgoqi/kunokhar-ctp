<?php require_once('session.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Some Code pty ltd">
	<link rel="shortcut icon" href="../public/img/Logo/kunokharK.ico">
	<link rel="stylesheet" type="text/css" href="../public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../public/css/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../public/css/w3.css">
	<link rel="stylesheet" type="text/css" href="../public/css/certificate.css">
</head>
<body>
	<div class="generate-cetificate">
		<div class="page" size="A4">
			<div class="content text-center">
				<div class="applicant">
					<div class="basic-details" id="basic-details">
						<h5 class="sub-titile">Presented to:</h5>
						<h1 class="name">Mr. Simamkele Ndabeni</h1>
						<h4 class="identification">ID No: 981015 6709 083</h4>
						<p class="address">Luthengele A/A, Port Saint John's, 5120</p>
					</div>
                </div>

                <div class="description mx-auto">
					We hereby confirm that the Idea “<span class="idea-name">Photography With No Cameras</span>” was registered with us, with IDEA Registration No. <span class="idea-number">KU200002</span> as a property of <span class="name-of-owner">Mr. Simamkele Ndabeni</span>.
				</div>

				<div class="signitures">
                    <div class="applicant-sign">
                    	<h4 class="sign-name">Mr. S. Ndabeni</h4>
                        <h4 class="signing">Idea Applicant</h4>
                        <h4 class="sign-date">17 Nov 2020</h4>
                    </div>

                    <div class="kuno-diractor">
                    	<h4 class="sign-name">Mr. R. Vuzane</h4>
                        <h4 class="signing">Kunokhar Director</h4>
                        <h4 class="sign-date">17 Nov 2020</h4>
                    </div>
                </div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="changeWhoSigns" tabindex="-1" role="dialog" aria-labelledby="changeWhoSigns" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<h1 class="p-2">Who Signs?</h1>
					<select id="whoSigns" class="form-control">
						
					</select>
					<div class="d-flex justify-content-center mt-3">
						<button class="btn btn-success text-white">Done</button>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include('partials/footer.php') ?>