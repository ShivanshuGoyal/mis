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
	
	$ct=$_GET['q'];
	
	$query="SELECT sum(quantity) as count FROM `campus_maintenance_inventory_inventory` where `description`='".$ct."'";
	if($query_run=mysql_query($query))
	{
		if(mysql_num_rows($query_run)>=1)
			{
			echo mysql_result($query_run,0,'count');
			}
			else
			{
				echo "error1";
			}
	}
	else
			{
				echo "error";
			}
?>