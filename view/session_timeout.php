<?php
session_start();

require '../model/User.class.php';
$user = new USER();
$user->log_out($_SESSION['id']);
exit();
