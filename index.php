<?php
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
		header("location: login.php");
		exit();
	}
?>