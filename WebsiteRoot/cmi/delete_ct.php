<?php
//echo $_GET['CTCODE'];
require_once('../Includes/ConfigSQL.php');
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	$query="DELETE FROM `campus_maintenance_inventory_category_elec` WHERE `category_code`='".$_GET['CTCODE']."'";
	
	if($query_run=mysql_query($query))
	{
			echo "<script>alert('Successfully Deleted.')</script>";
	}
	else
	{
		echo "<script>alert('Deletion Failed.')</script>";
	}
	header('Location: check_category_elec.php');

?>