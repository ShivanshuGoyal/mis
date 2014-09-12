<?php
@session_start();
 $code=trim($_SESSION['CT']);

require_once('../Includes/ConfigSQL.php');
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	
	if(substr($code,1,1)=='0' && substr($code,2,1)=='0' && substr($code,3,1)=='0' )
	{
	  $code1=substr($code,4,1);
	}
	else if(substr($code,1,1)=='0'  && substr($code,2,1)=='0')
	{
	$code1=substr($code,3,2);
	}
	else if(substr($code,1,1)=='0')
	{
	$code1=substr($code,2,3);
	}
	else $code1=substr($code,1,4);

	
	$qry="SELECT * FROM `campus_maintenance_inventory_code_count` WHERE `count_ct_e`='".$code1."'";

	if($query_run=mysql_query($qry))
	{
		
		if(mysql_num_rows($query_run)>=1)
		{
			$code2=mysql_result($query_run,0,'count_e');
		}
	}
	
	if(strlen($code2)==1)
	$code=$code."0000".$code2;
	if(strlen($code2)==2)
	$code=$code."000".$code2;
	if(strlen($code2)==3)
	$code=$code."00".$code2;
	if(strlen($code2)==4)
	$code=$code."0".$code2;
	if(strlen($code2)==5)
	$code=$code.$code2;
	
	
	
	
?>

<?php


if(isset($_POST['des'])&& isset($_POST['quantity'])&&isset($_POST['dop']) && isset($_POST['rop'])&&isset($_POST['nos'])&&isset($_POST['pin']))
{

	if(!empty($_POST['des']) && !empty($_POST['quantity'])&&!empty($_POST['dop'])&&!empty($_POST['rop'])&&!empty($_POST['nos'])&&!empty($_POST['pin']))
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
	
	
	$date = date('Y-m-d H:i:s');
	$qry="INSERT INTO `campus_maintenance_inventory_inventory` VALUES('".$code."','".$_POST['des']."','".$quantity."','".$dop."','".$rop."','".$_SESSION['DEP']."','".$nos."','".$pin."','".$_SESSION['CTNAME']."','".$date."','','pending','')";
	if($qry_run=mysql_query($qry))
	{
	$code2 = $code2 + 1;
	echo $code2;
		$query="UPDATE `campus_maintenance_inventory_code_count` SET `count_e`='".$code2."' WHERE `count_ct_e`='".$code1."'";
		if($query_run=mysql_query($query))
		header('Location: insert_success.php');
		else
		{
		
		header('Location: insert_fail.php');
		}
		
		
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
		
	}
	
}

	

require_once('../Includes/FeedbackLayout.php');

	drawHeader("Store Incharge");

	
	 
	
?>



<form action="Item_form_new.php" method="POST">
<table class="divTable" id="exisBranch" width="50%" >
<tr><th><h2>FIELDS</h2></th><th><h2>Data</h2></th></tr>
<tr><th>Code</th><td><?php  echo $code; ?> </td></tr> 	
<tr><th>Category</th><td><?php echo $_SESSION['CTNAME']; ?> </td></tr> 	
<tr><th>Description</th><td><input type="text" name="des"value="<?php if(isset($_POST['des'])) echo $_POST['des']; ?>"> </td></tr> 	
<tr><th>Quantity</th><td><input type="text" name="quantity" value="<?php if(isset($_POST['quantity'])) echo $_POST['quantity'];?>"></td></tr>
<tr><th>Date of Purchase</th><td><input type="date" name="dop" value="<?php if(isset($_POST['dop'])) echo $_POST['dop'];?>"></td></tr>
<tr><th>Rate of Purchase</th><td><input type="text" name="rop" value="<?php if(isset($_POST['rop'])) echo $_POST['rop'];?>"></td></tr>
<tr><th>Department</th><td><?php echo $_SESSION['DEP']; ?></td></tr>
<tr><th>Name of Supplier</th><td><input type="text" name="nos" value="<?php if(isset($_POST['nos'])) echo $_POST['nos'];?>"></td></tr>
<tr><th>Purchase Indent No.</th><td><input type="text" name="pin" value="<?php if(isset($_POST['pin'])) echo $_POST['pin'];?>"></td></tr>
</table>

<input type="submit" value="SUBMIT">
</form>
<?php
if($_SESSION['DEP']=='Electrical')
echo "<a href='check_category_elec.php'><input type='submit' value='BACK'></a> " ;
else
echo "<a href='check_category_civil.php'><input type='submit' value='BACK'></a> " ;
?>

<?php
if(isset($_POST['des']) && isset($_POST['quantity'])&&isset($_POST['dop'])&&isset($_POST['rop'])&&isset($_POST['nos'])&&isset($_POST['pin']))
{
	if(!empty($_POST['des']) && !empty($_POST['quantity'])&&!empty($_POST['dop'])&&!empty($_POST['rop'])&&!empty($_POST['nos'])&&!empty($_POST['pin']))
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
