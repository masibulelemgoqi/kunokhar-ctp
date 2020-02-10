<?php
if(isset($_SESSION['id']))
{
	header('Location: view/main.php');
}

?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="author" content="Some Code pty ltd">
   <title>Kunokhar ctp (pty) Ltd</title>
   <link rel="shortcut icon" href="public/img/Logo/kunokharK.ico">
   <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="public/css/font-awesome/css/font-awesome.css">
   <link rel="stylesheet" type="text/css" href="public/css/w3.css">
   <link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>
<body class="bg-login">

<div class="container" style="margin-top: 10%;">
	<div class="row d-flex justify-content-center">
<!--             <div class="col-sm-6 py-5 bg-login text-white text-center">
                    <div class="card-body">
                    	<div class="mb-5 ml-1 row d-flex justify-content-center">
                    		<img src="public/img/Logo/kunokharK.png" style="width:70px; height: 70px;">
                    		&nbsp;<p class="font-weight-bold">ctp</p>
                    	</div>
                    </div>
            </div> -->
            <div class="col-sm-6 py-5 border">
              <div class="row">
                    <span class="row" style="margin-left: 10%;">
                        <img src="public/img/Logo/kunokharK.png" style="width:70px; height: 70px;">&nbsp;<p class="font-weight-bold text-white">ctp</p>
                    </span>

                    <h3 class="mb-2 text-center text-danger font-weight-bold" style="margin-left: 17%;">Log in here</h3>
              </div>


               <div class="row">
                    <div class="form-group col-md-10">
                      <div id="status"></div>
                    </div>
                </div>
                <form method="POST" action="">
                   <div class="row justify-content-center">
                        <div class="form-group col-md-10 login">
                          <input type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group col-md-10 login">
                            <input id="password" name="password" placeholder="password" class="form-control" type="password">
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <button type="button" class="btn btn-danger" id="log_in">Sign in <i class="fa fa-sign-in"></i></button>
                    </div>
                </form>
            </div>
	</div>
</div>

<script src="public/js/jquery.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/ajax.js"></script>
<script src="public/js/main.js"></script>
<script src="public/js/somefunctions.js"></script>
<script src="public/js/validate.js"></script>

</body>
</html>
