<?php
session_start();

        require_once('../Includes/SessionAuth.php');
	
	

	
?>

<div>
  

	



<?php


if(isset($_POST['quantity'])&&isset($_POST['dop'])&&isset($_POST['rop'])&&isset($_POST['dep'])&&isset($_POST['nos'])&&isset($_POST['pin']))
{
	if(!empty($_POST['quantity'])&&!empty($_POST['dop'])&&!empty($_POST['rop'])&&!empty($_POST['dep'])&&!empty($_POST['nos'])&&!empty($_POST['pin']))
	{



	$quantity=$_POST['quantity'];
	$dop=$_POST['dop'];
	$rop=$_POST['rop'];
	$dep=$_POST['dep'];
	$nos=$_POST['nos'];
	$pin=$_POST['pin'];
	
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
	

	$query="SELECT `description` FROM `campus_maintenance_inventory_inventory` WHERE `code`='".$_SESSION['CODE']."'";

	if($query_run=mysql_query($query))
	{
		$description=mysql_result($query_run,0,'description');
	}

	$qry="INSERT INTO `campus_maintenance_inventory_in_si_to_aee` VALUES('".$_SESSION['CODE']."','".$description."','".$quantity."','".$dop."','".$rop."','".$dep."','".$nos."','".$pin."')";
	if($qry_run=mysql_query($qry))
	{
		header('Location: insert_success.php');
	}
	else
	{
		header('Location: insert_fail.php');
	}
		
	}
	else
	{
		echo 'ENTER ALL FIELDS';
	}

}


require_once('../Includes/FeedbackLayout.php');

	drawHeader("Store Incharge");


?>



    <div class="divContent" id="divExis">
        <h2>INVENTORY MATERIALS</h2>
<hr />

<?php
if(isset($_POST['quantity'])&&isset($_POST['dop'])&&isset($_POST['rop'])&&isset($_POST['dep'])&&isset($_POST['nos'])&&isset($_POST['pin']))
{
	if(!empty($_POST['quantity'])&&!empty($_POST['dop'])&&!empty($_POST['rop'])&&!empty($_POST['dep'])&&!empty($_POST['nos'])&&!empty($_POST['pin']))
	{
	
	}
	else
	{
		echo '<strong>ENTER ALL THE FIELDS</strong>';
	}
}
?>


<form action="insert_already_select.php" method="POST">
<table class="divTable" id="exisBranch" width="50%" >
<tr><th><h2>FIELDS</h2></th><th><h2>Data</h2></th></tr>
<tr><th>Code</th><td><?php echo $_SESSION['CODE']; ?></td></tr> 	
<tr><th>Quantity</th><td><input type="text" name="quantity" ></td></tr>
<tr><th>Date of Purchase</th><td><input type="date" name="dop"></td></tr>
<tr><th>Rate of Purchase</th><td><input type="text" name="rop"></td></tr>
<tr><th>Department</th><td><select name="dep"><option>Electrical</option><option>Civil</option></select></td></tr>
<tr><th>Name of Supplier</th><td><input type="text" name="nos"></td></tr>
<tr><th>Purchase Indent No.</th><td><input type="text" name="pin"></td></tr>
</table>

<input type="submit" value="SUBMIT">
</form>
</div>