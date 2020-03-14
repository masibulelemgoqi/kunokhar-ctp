<!DOCTYPE html>
<html>
<head>
	<title>Print Certificate</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="../public/css/style.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <?php 
        if(isset($_GET['idea_g_id']))
        {

        require_once('../model/Work.class.php');
        $obj = new Work();
        $idea = $obj->get_idea($_GET['idea_g_id']);
        $client = $obj->get_client($idea['fk_client_id']);

    ?>
    <section id="certificate_printing">
        <div class="certificate">
            <page size="A4" layout="landscape" id="landscapePage">
                <div class="content">
                    <div class="header">
                        <h2>CERTIFCATE</h2>
                        <h4>OF <span>IDEA REGISTRATION</span></h4>
                    </div>

                    <div class="description">
                        <p>
                            We hereby to confirm that this is a <i>Idea Registration Confirmation</i> that “<?php print($idea['idea_name']);?>” with IDEA No. <?php print($idea['idea_code']);?> was registered as a property of 

                            <?php 
                                $juristic = $obj->get_juristic($client['client_id']);

                                if($client['client_person'] == "Juristic")
                                {
                                    print($juristic['j_company_name']."  ");
                                }else
                                {
                                    print($client['client_fname']."  ".$client['client_lname']."  ");
                                }

                                print("on ".date("d M Y", strtotime($idea['idea_date'])));
                            ?>
                        </p>
                    </div>

                    <div class="applicant">
                        <p>This certificate is awarded to:</p>
                        <?php 
                            $juristic = $obj->get_juristic($client['client_id']);

                            if($client['client_person'] == "Juristic")
                            {
                        ?>
                            <h1><?php print($juristic['j_company_name'])?></h1>
                            <h4 style="margin-bottom: 40px;">Registration No: <?php print($juristic['j_registration_number'])?></h4>

                        <?php
                            }else
                            {
                                print($client['client_fname']."  ".$client['client_lname']." on ".date("d M Y", strtotime($idea['idea_date']))."<br>");
                            }

                        ?>
                            <p>Residential Address:</p>
                        </div>
                        <div class="address">
                            <p><?php print($client['client_home_address']);?></p>
                            <p><?php print($client['client_city']);?></p>
                            <p><?php print($client['client_zip_code']);?></p>
                        </div>


                    <div class="signitures">
                        <div class="names">
                            <div class="applicant-sign">
                                <h3>Applicant</h3>
                                <h4><?php print($client['client_title']);?> <?php print($client['client_initials']);?>. <?php print($client['client_lname']);?></h4>
                                
                            </div>

                            <div class="ceo-sign">
                                <h3>Director</h3>
                                <h4>Mr. R. Vuzane</h4>
                            </div>
                        </div>
                        <div class="sign-space">
                            <div class="signiture-1"></div>
                            <div class="signiture-2"></div>
                        </div>
                    </div>
                </div>
            </page>
        </div>
    </section>    
    <?php       
        }
    ?>

	<script type="text/javascript">
		window.print();
	</script>
</body>
</html>