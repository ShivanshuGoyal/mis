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
			
			//$query ="select * from `campus_maintenance_inventory_inventory` where `code`='".$_SESSION['ITEM_CODE'.$i]."'";
			$date = date('Y-m-d H:i:s');
			$rate=trim($_SESSION['ROP'.$i]);
			//die();
			$query="update `campus_maintenance_inventory_inventory` set `status`='authorized' , `inserted_on`='".$date."'  where `code`='".$_SESSION['ITEM_CODE'.$i]."' AND `rate_of_purchase`='".$rate."' AND `name_of_supplier`='".$_SESSION['NOS'.$i]."' AND `purchase_indent_no`='".$_SESSION['PIN'.$i]."' ";
			//$query="update `campus_maintenance_inventory_inventory` set `status`='authorized' , `inserted_on`='".$date."'";
			$qry_result=mysql_query($query);
			if(!$qry_result)
			{
				echo "Request for ".$_SESSION['ITEM_CODE'.$i]." cannot be updated<br/>";
			}
			else
			{
			//$code2=mysql_result($qry_result,0,'rate_of_purchase');
			/*if($rate==$code2)
			echo "same";
			else
			echo "different";
			die("     die  ");
			*/
			echo "aasa";
			}

		}
		if(isset($_POST['status'.$i]) && $_POST['status'.$i]=="not_allow")
		{
		$date = date('Y-m-d H:i:s');
			$query="update `campus_maintenance_inventory_inventory` set `status`='unauthorized' , `checked_on`='".$date."' , `remark`='".$_POST['txt'.$i]."' where `code`='".$_SESSION['ITEM_CODE'.$i]."' AND `rate_of_purchase`= '".$_SESSION['ROP'.$i]."' AND `name_of_supplier`='".$_SESSION['NOS'.$i]."' AND `purchase_indent_no`='".$_SESSION['PIN'.$i]."' ";
			$qry_result=mysql_query($query);
			if(!$qry_result)
			{
				echo "Request for ".$_SESSION['ITEM_CODE'.$i]." cannot be updated<br/>";
			}
			else
			{
			echo "aaa";
			}
		}
	}
echo '<br/><br/><br/><br/><br/><br/><br/>';
echo "<h2 align='center'>Validation Completed</h2>";
echo "<a href='validate_item.php'><h2 align='center'>BACK</h2></a>";
}


?>