<?php
require_once 'dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

if(isset($_GET['idea_g_id']))
{
    
require 'model/Work.class.php';

$work = new Work();

$idea = $work->get_idea($_GET['idea_g_id']);
$client = $work->get_client($idea['fk_client_id']);
$juristic = $work->get_juristic($idea['fk_client_id']);
$natural = $work->get_natural($idea['fk_client_id']);


// instantiate and use the dompdf class
$dompdf = new Dompdf();

$html ='
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Print Certificate</title>
	
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  	<link href="style.php" rel="stylesheet">
  	<link href="https://fonts.googleapis.com/css?family=Anton|Archivo+Black|Baloo+Bhai|Lalezar|Passion+One|Staatliches&display=swap" rel="stylesheet">
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
                        <h4>OF IDEA REGISTRATION</h4>
                    </div>

                    <div class="description">
                        <p>
                            We hereby to confirm that this is a <b style="color: #333">Idea Registration Confirmation</b> that <b style="color: #333">"'.$idea['idea_name'].'"</b> with IDEA No. <b style="color: #333">'.$idea['idea_code'].'</b> was registered as a property of <b style="color: #333">Company Name/Individual</b>.
                        </p>
                    </div>

                    <div class="applicant">
                        <p>This certificate is awarded to:</p>
';

                    if($client['client_person'] == 'Juristic')
                    {
                        $html .= '
                          <h1>'.$juristic['j_company_name'].'</h1>
                          <h4 style="margin-bottom: 40px;">Registration No: '.$juristic['j_registration_number'].'</h4>
                        ';
                    }else
                    {
                        $html .= '
                          <h1>'.$client['client_fname'].' '.$client['client_lname'].'</h1>
                          <h4 style="margin-bottom: 40px;">ID No: '.$natural['n_id_number'].'</h4>
                        ';                        
                    }
/*                          <h1>Code Illusion</h1>
                            <h4 style="margin-bottom: 40px;">Registration No: 55525666655</h4>*/
$html .= '
                            <p style="margin-top: 70px">Residential Address:</p>
                        </div>

                        <div class="address">
                            <p>'.$client['client_home_address'].'</p>
                            <p>'.$client['client_city'].'</p>
                            <p>'.$client['client_zip_code'].'</p>
                        </div>


                    <div class="signitures">
                        <div class="names">
                            <div class="applicant-sign">
                                <h3>Applicant</h3>
                                <h4>'.$client['client_title'].'. '.$client['client_initials'].' '.$client['client_lname'].'</h4>
                                
                            </div>

                            <div class="ceo-sign " style="margin-left: 350px;">
                                <h3>Director</h3>
                                <h4>Mr. R. Vuzane</h4>
                            </div>
                        </div>
                        <div class="sign-space">
                            <div class="signiture-1"></div>
                            <div class="signiture-2" style="margin-left: 350px;"></div>
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
    
}





