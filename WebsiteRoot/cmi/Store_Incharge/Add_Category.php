<?php


@session_start();

 $ct_code=$_SESSION['CT_CODE'];
 $des=$_SESSION['TXT'];

	


	require_once('../Includes/ConfigSQL.php');
	
	
	$errflag = false;
	
	
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}

	
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	$date = date('Y-m-d H:i:s');
 	if($_SESSION['DEP']=="Electrical")
	$query="INSERT INTO `campus_maintenance_inventory_category_elec` VALUES('".$ct_code."','".$des."','".$date."','','pending','')";
	else
	$query="INSERT INTO `campus_maintenance_inventory_category_civil` VALUES('".$ct_code."','".$des."','".$date."','','pending','')";
	
	if($query_run=mysql_query($query))
	{
		$count=$_SESSION['CT_COUNT'];
		if($_SESSION['DEP']=='Electrical')
		$query1 = "INSERT INTO `campus_maintenance_inventory_code_count` VALUES('".$count."','0')";
		else
		$query1 ="INSERT INTO `campus_maintenance_inventory_code_count1` VALUES('".$count."','0')";
		
		if($query_run=mysql_query($query1))
		
		header('Location: insert_success.php');
	}
	else
	echo "Unsuccessful";


	require_once('../Includes/SessionAuth.php');
 
  	require_once('../Includes/FeedbackLayout.php');

	drawHeader("Store Incharge");

	

?>