<?php
@session_start();
require_once('../Includes/SessionAuth.php');

require_once('../Includes/FeedbackLayout.php');

	drawHeader("Validate Category");
?>

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

$j=0;	
if(isset($_SESSION['$p']))
{

	$p=$_SESSION['$p'];
	for($i=0;$i<$p;$i++)
	{	
		$j=$i+1;
		if(isset($_POST['status'.$i]) && $_POST['status'.$i]=="allow")
		{
			$date = date('Y-m-d H:i:s');
			$query="update `campus_maintenance_inventory_category_elec` set `status`='authorized', `checked_on`= '".$date."' where `category_code`='".$_SESSION['CT_CODE'.$i]."' ";
			$qry_result=mysql_query($query);
			if(!$qry_result)
			{
				echo "Request for ".$_SESSION['CT_CODE'.$i]." cannot be updated<br/>";
			}
			

		}
		if(isset($_POST['status'.$i]) && $_POST['status'.$i]=="not_allow")
		{
			$date = date('Y-m-d H:i:s');
			$query="update `campus_maintenance_inventory_category_elec` set `status`='unauthorized' , `checked_on`= '".$date."' , `remark`='".$_POST['txt'.$i]."' where `category_code`='".$_SESSION['CT_CODE'.$i]."'  ";
			$qry_result=mysql_query($query);
			if(!$qry_result)
			{
				echo "Request for ".$_SESSION['CT_CODE'.$i]." cannot be updated<br/>";
			}
		}
	}
echo '<br/><br/><br/><br/><br/><br/><br/>';
echo "<h2 align='center'>Validation Completed</h2>";
echo "<a href='function.php'><h2 align='center'>BACK</h2></a>";
}


?>