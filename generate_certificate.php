<?php

require_once 'dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$html ='
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Some Code pty ltd">
    <link rel="shortcut icon" href="public/img/Logo/kunokharK.ico">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  	<link href="style.php" rel="stylesheet">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

    <section id="certificate_printing">
        <div class="certificate">
            <page size="A4" layout="landscape" id="landscapePage">
                <div class="content">
                    <div class="header">
                        <h2>CERTIFICATE</h2>
                        <h4>OF <span>IDEA REGISTRATION</span></h4>
                    </div>

                    <div class="description">
                        <p>
                            We hereby to confirm that this is a <i>Idea Registration Confirmation</i> that “Break namks” with IDEA No. KU190002 was registered as a property of 
                        </p>
                    </div>

                    <div class="applicant">
                        <p>This certificate is awarded to:</p>
                            <h1>Code Illusion</h1>
                            <h4 style="margin-bottom: 40px;">Registration No: 55525666655</h4>

                            <p>Residential Address:</p>
                        </div>
                        <div class="address">
                            <p>Bende A/A</p>
                            <p>Dutywa</p>
                            <p>5000</p>
                        </div>


                    <div class="signitures">
                        <div class="names">
                            <div class="applicant-sign">
                                <h3>Applicant</h3>
                                <h4>Mr M Mgoqi</h4>
                                
                            </div>

                            <div class="ceo-sign ">
                                <h3>Director</h3>
                                <h4>Mr. R. Vuzane</h4>
                            </div>
                        </div>
                        <div class="sign-space mt-2">
                            <div class="signiture-1 "></div>
                            <div class="signiture-2"></div>
                        </div>
                    </div>
                </div>
            </page>
        </div>
    </section>    

</body>
</html>
';
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('certificate.pdf', array("Attachment" => false));


exit(0);




