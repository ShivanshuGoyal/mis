<?php
@session_start();

        require_once('../Includes/SessionAuth.php');
	$code=""	
	
?>

<div>
  

	



<?php

$f=0;
if(isset($_POST['quantity'])&&isset($_POST['dop'])&&isset($_POST['rop'])&&isset($_POST['nos'])&&isset($_POST['pin']))
{

	if(!empty($_POST['quantity'])&&!empty($_POST['dop'])&&!empty($_POST['rop'])&&!empty($_POST['nos'])&&!empty($_POST['pin']))
	{


	$date=date('Y-m-d');
	if($date<$_POST['dop'])
	{
	
	}
	else
	{
	
	if(is_numeric($_POST['quantity']) && is_numeric($_POST['rop']))
	{
	
	
	
	
	

	$quantity=$_POST['quantity'];
	$dop=$_POST['dop'];
	$rop=$_POST['rop'];
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
	else
	{
		
	}
	$date = date('Y-m-d H:i:s');
	$qry="INSERT INTO `campus_maintenance_inventory_inventory` VALUES('".$_SESSION['CODE']."','".$_SESSION['DES']."','".$quantity."','".$dop."','".$rop."','".$_SESSION['DEP']."','".$nos."','".$pin."','".$_SESSION['CTNAME']."','".$date."','','pending','')";
	if($qry_run=mysql_query($qry))
	{
		header('Location: insert_success.php');
	}
	else
	{
		header('Location: insert_fail.php');
	}
	}	
	}
	}
	else
	{
		//echo "<script>alert('ENTER ALL FIELDS')</script>";
		$f=1;
	}
	
	

}


require_once('../Includes/FeedbackLayout.php');

	drawHeader("Store Incharge");

	 
	
?>



    <div class="divContent" id="divExis">
        <h2>INVENTORY MATERIALS</h2>
<hr />




<form action="Item_form.php" method="POST">
<table class="divTable" id="exisBranch" width="50%" >
<tr><th><h2>FIELDS</h2></th><th><h2>Data</h2></th></tr>
<tr><th>Code</th><td><?php echo $_SESSION['CODE']; ?> </td></tr> 	
<tr><th>Category</th><td><?php echo $_SESSION['CTNAME']; ?> </td></tr> 	
<tr><th>Description</th><td><?php echo $_SESSION['DES']; ?> </td></tr> 	
<tr><th>Quantity</th><td><input type="text" name="quantity" value="<?php if(isset($_POST['quantity'])) echo $_POST['quantity'];?>"></td></tr>
<tr><th>Date of Purchase</th><td><input type="date" name="dop" value="<?php if(isset($_POST['dop'])) echo $_POST['dop'];?>"></td></tr>
<tr><th>Rate of Purchase</th><td><input type="text" name="rop" value="<?php if(isset($_POST['rop'])) echo $_POST['rop'];?>"></td></tr>
<tr><th>Department</th><td><?php echo $_SESSION['DEP']; ?></td></tr>
<tr><th>Name of Supplier</th><td><input type="text" name="nos" value="<?php if(isset($_POST['nos'])) echo $_POST['nos'];?>"></td></tr>
<tr><th>Purchase Indent No.</th><td><input type="text" name="pin" value="<?php if(isset($_POST['pin'])) echo $_POST['pin'];?>"></td></tr>
</table>

<input type="submit" value="SUBMIT">
</form>
<a href="check_category_elec.php" > <input type="submit" value="BACK" /> </a>

<?php
if(isset($_POST['quantity'])&&isset($_POST['dop'])&&isset($_POST['rop'])&&isset($_POST['nos'])&&isset($_POST['pin']))
{
	if(!empty($_POST['quantity'])&&!empty($_POST['dop'])&&!empty($_POST['rop'])&&!empty($_POST['nos'])&&!empty($_POST['pin']))
	{
	$date=date('Y-m-d');
	
	if($date<$_POST['dop'])
	{
		echo "<script>alert('Enter a valid date.')</script></br>";
	
	}
	if( !is_numeric($_POST['quantity']) || !is_numeric($_POST['rop']))
	{
		echo "<script>alert('Enter numeric quantities where required')</script></br>";
	}
	}
	else
	{
		echo "<script>alert('ENTER ALL THE FIELDS')</script></br>";
	}
}
?>

</div>