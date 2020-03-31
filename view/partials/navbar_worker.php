
<nav class="nav navbar sticky-top navbar-expand-lg navbar-light bg-light border-bottom mb-3">
   <a class="navbar-brand ml-5" href="worker.php">
     <img src="../public/img/Logo/kunokharK.png" width="30" height="30" class="d-inline-block align-top" alt="">
      <span style="font-size: 80%; font-weight: bold;">Ctp</span>
     <span class="sr-only">(current)</span>
   </a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
   </button>

   <div class="collapse navbar-collapse ml-1" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <?php
          if($u_details['w_type'] == "Super User")
          {
        ?>
          <a class="nav-link text-dark" href="./admin.php"> Admin space</a>
          <?php
          }
        ?>

      </li>

    </ul>
    <ul class="navbar-nav navbar-nav-right mr-5 px-5">
      <li class="nav-item">
        <a class="nav-link text-dark" href="profile.php">
            <?php print($u_details['w_fname']."@"."<span class='badge badge-warning'>".$u_details['w_type']."</span>"); ?>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn btn-default text-right text-dark" href="../controller/controller.php?worker_id=<?php print($u_details['w_id']);?>">
            Logout&nbsp;<i class="fa fa-sign-out"></i>
        </a>
      </li>
    </ul>

   </div>
</nav>
