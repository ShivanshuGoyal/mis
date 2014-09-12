<?php
require_once('../Includes/SessionAuth.php');
@session_start();

if(isset($_GET['CODE']) && isset($_GET['ROP']) && isset($_GET['NOS']) && isset($_GET['PIN']))
{
	$_SESSION['CODE']=$_GET['CODE'];
	$_SESSION['ROP']=$_GET['ROP'];
	$_SESSION['NOS']=$_GET['NOS'];
	$_SESSION['PIN']=$_GET['PIN'];
}


	
	
?>
<?php

if(isset($_POST['quantity']) &&isset($_POST['des']) &&isset($_POST['dop'])&&isset($_POST['rop'])&&isset($_POST['nos'])&&isset($_POST['pin']))
{

	if(!empty($_POST['quantity']) &&!empty($_POST['des']) &&!empty($_POST['dop'])&&!empty($_POST['rop'])&&!empty($_POST['nos'])&&!empty($_POST['pin']))
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
	$des=$_POST['des'];
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
	
	$date = date('Y-m-d H:i:s');
	$qry="UPDATE `campus_maintenance_inventory_inventory` SET  `description`='".$des."', `quantity`='".$quantity."',`date_of_purchase`='".$dop."',`rate_of_purchase`='".$rop."',`department`='".$_SESSION['DEP']."',`name_of_supplier`='".$nos."',`purchase_indent_no`='".$pin."',`category`='".$_SESSION['CTNAME']."',`inserted_on`='".$date."',`remark`='',`status`='pending',`checked_on`='' WHERE  `code`='".$_SESSION['CODE']."' AND `rate_of_purchase`='".$_SESSION['ROP']."' AND `name_of_supplier`='".$_SESSION['NOS']."' AND `purchase_indent_no`='".$_SESSION['PIN']."' ";
	if($qry_run=mysql_query($qry))
	{
		//echo "<script>alert('abc')</script>";
		header('Location: check_item.php');
	}
	else
	{
		//echo "<script>alert('xyz')</script>";
		header('Location: insert_fail.php');
	}
	}	
	}
	}
	
	
}





	require_once('../Includes/FeedbackLayout.php');

	drawHeader("Store Incharge");



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
	
	$query="SELECT * FROM `campus_maintenance_inventory_inventory` WHERE code='".$_SESSION['CODE']."' AND name_of_supplier='".$_SESSION['NOS']."' AND rate_of_purchase='".$_SESSION['ROP']."' AND purchase_indent_no='".$_SESSION['PIN']."' ";

	if($query_run=mysql_query($query))
	{
	
	$desc=mysql_result($query_run,0,'description');
	$qnty=mysql_result($query_run,0,'quantity');
	$dtop=mysql_result($query_run,0,'date_of_purchase');
	


}
?>



<div class="divContent" id="divExis">
        <h2>INVENTORY MATERIALS</h2>
<hr />




<form action="item_update.php" method="POST">
<table class="divTable" id="exisBranch" width="50%" >
<tr><th><h2>FIELDS</h2></th><th><h2>Data</h2></th></tr>
<tr><th>Code</th><td><?php echo $_SESSION['CODE']; ?> </td></tr> 	
<tr><th>Category</th><td><?php echo $_SESSION['CTNAME']; ?> </td></tr> 	
<tr><th>Description</th><td><input type="text" name="des" value= "<?php if(isset($_POST['DES']))echo $_POST['DES'];  else echo $desc ; ?>" > </td></tr> 	
<tr><th>Quantity</th><td><input type="text" name="quantity" value="<?php if(isset($_POST['quantity'])) echo $_POST['quantity'];  else echo $qnty; ?>"></td></tr>
<tr><th>Date of Purchase</th><td><input type="date" name="dop" value="<?php if(isset($_POST['dop'])) echo $_POST['dop']; else echo $dtop; ?>"></td></tr>
<tr><th>Rate of Purchase</th><td><input type="text" name="rop" value="<?php if(isset($_POST['rop'])) echo $_POST['rop']; else echo $_SESSION['ROP']; ?>"></td></tr>
<tr><th>Department</th><td><?php echo $_SESSION['DEP']; ?></td></tr>
<tr><th>Name of Supplier</th><td><input type="text" name="nos" value="<?php if(isset($_POST['nos'])) echo $_POST['nos']; else echo $_SESSION['NOS']; ?>"></td></tr>
<tr><th>Purchase Indent No.</th><td><input type="text" name="pin" value="<?php if(isset($_POST['pin'])) echo $_POST['pin']; else echo $_SESSION['PIN']; ?>"></td></tr>
</table>

<input type="submit" value="SUBMIT">
</form>
<a href="check_category_elec.php" > <input type="submit" value="BACK" /> </a>
</div>



<?php
if(isset($_POST['quantity'])&& isset($_POST['des']) && isset($_POST['dop'])&&isset($_POST['rop'])&&isset($_POST['nos'])&&isset($_POST['pin']))
{
	if(!empty($_POST['quantity']) &&!empty($_POST['des']) &&!empty($_POST['dop'])&&!empty($_POST['rop'])&&!empty($_POST['nos'])&&!empty($_POST['pin']))
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

