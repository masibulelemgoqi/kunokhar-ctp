<?php
require_once('session.php');

require_once('../model/User.class.php');

$user = new User();
$u_details = $user->getUser($_SESSION['id']);


if($u_details['w_type'] == "Admin")
{
	include 'admin.php';
}else
{
	include 'worker.php';
}