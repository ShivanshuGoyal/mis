<?php

		require_once('../Includes/ConfigSQL.php');
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	
	$query="DELETE FROM `campus_maintenance_inventory_inventory` WHERE `code`='".$_GET['CODE']."' AND `rate_of_purchase`='".$_GET['ROP']."' AND `name_of_supplier`='".$_GET['NOS']."' AND `purchase_indent_no`='".$_GET['PIN']."' ";
	
	$query_run=mysql_query($query);
	header('Location: check_item.php');
?>