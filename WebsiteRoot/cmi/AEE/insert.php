<?php
session_start();
require_once('../Includes/SessionAuth.php');
$code = $_SESSION['CODE'];
$date = $_SESSION['DATE'];
unset($_SESSION['CODE']);
unset($_SESSION['DATE']);
require_once('../Includes/FeedbackLayout.php');

	drawHeader("AEE");

require_once('../Includes/ConfigSQL.php');

	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	$flag=false;
	$query="SELECT * FROM `campus_maintenance_inventory_in_si_to_aee` WHERE `code`='".$code."' && `date_of_purchase`='".$date."' ";
	if($query_run=mysql_query($query))
	{
	if(mysql_num_rows($query_run)>=1)
	 {
	 $des=mysql_result($query_run,0,'description');
	 $quantity=mysql_result($query_run,0,'quantity');
	 $rate=mysql_result($query_run,0,'rate_of_purchase');
	 $dep=mysql_result($query_run,0,'department');
	 $nos=mysql_result($query_run,0,'name_of_supplier');
	 $pin=mysql_result($query_run,0,'purchase_indent_no');


	$query1="INSERT INTO `campus_maintenance_inventory_inventory` VALUES('".$code."','".$des."','".$quantity."','".$date."','".$rate."','".$dep."','".$nos."','".$pin."')";
	
	if($query1_run=mysql_query($query1))
	{
		$flag=true;	
		
	}
	if($flag==true)
	{
	$query3="DELETE FROM `campus_maintenance_inventory_in_si_to_aee` WHERE `code`='".$code."' && `date_of_purchase`='".$date."' ";
	if($query3_run=mysql_query($query3))
		{
			
			echo '<h1><strong>'.'SUCCESSFULLY INSERTED'.'</strong></h1>';
			echo '<a href="insert_to_inventory.php"><h2>ADD MORE</h2></a>';
			echo '<a href="function.php"><h2>BACK</h2></a>';

		}
	}
	else
	{
	echo '<h1><strong>'.'UNSUCCESSFUL'.'</strong></h1>';
			echo '<a href="insert_to_inventory.php"><h2>TRY AGAIN</h2></a>';
			echo '<a href="function.php"><h2>BACK</h2></a>';
	}
	 }
	 else
	 {
		echo '<h1><strong>'.'NO SUCH ELEMENT FOUND'.'</strong></h1>';
		echo '<a href="insert_to_inventory.php">Try Again</a>';	
	 }
	}
	

	

?>