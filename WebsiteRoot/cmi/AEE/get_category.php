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
	$qry="SELECT * FROM `campus_maintenance_inventory_inventory` where `category`='".$ct."'";
	if($qry_run = mysql_query($qry))
		{
			if(mysql_num_rows($qry_run)>=1)
			{
				while($query_row=mysql_fetch_array($query_run))
				{
					$d="<option value='".$query_row['description']."'>".$query_row
				}
			}
		}

?>