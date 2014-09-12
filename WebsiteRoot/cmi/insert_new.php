<?php
session_start();


require_once('../Includes/SessionAuth.php');


if(isset($_POST['quantity'])&&isset($_POST['description'])&&isset($_POST['dop'])&&isset($_POST['rop'])&&isset($_POST['nos'])&&isset($_POST['pin']))
{
	if(!empty($_POST['quantity'])&& !empty($_POST['description'])&&!empty($_POST['dop'])&&!empty($_POST['rop'])&&!empty($_POST['nos'])&&!empty($_POST['pin']))
	{



	
	$description=$_POST['description'];
	$quantity=$_POST['quantity'];
	$dop=$_POST['dop'];
	$rop=$_POST['rop'];
	$dep=$_SESSION['DEP'];
	$nos=$_POST['nos'];
	$pin=$_POST['pin'];


	$dep=$_SESSION['DEP'];
 
 	if($dep=='Electrical')
	{
	$code='E';
	}else	
	{
	$code='C';	
	}

	
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
	

	

	$query = "SELECT * from campus_maintenance_inventory_code_count";
	
	if($query_run=mysql_query($query))
	{
		if($code=='E')
		$count=mysql_result($query_run,0,'count_e');
		else
		$count=mysql_result($query_run,0,'count_c');
			
	}
	$code.=$count;
	


	

	$qry="INSERT INTO `campus_maintenance_inventory_in_si_to_aee` VALUES('".$code."','".$description."','".$quantity."','".$dop."','".$rop."','".$dep."','".$nos."','".$pin."')";
	if($qry_run=mysql_query($qry))
	{
		if($_SESSION['DEP']=='Electrical')
		$query = "UPDATE `campus_maintenance_inventory_code_count` SET `count_e`=$count+1 WHERE `count_e`=$count";
		else
		$query = "UPDATE `campus_maintenance_inventory_code_count` SET `count_c`=$count+1 WHERE `count_c`=$count";
		
		if($query_run=mysql_query($query))
		
		header('Location: insert_success.php');
	}
	else
	{
		header('Location: insert_fail.php');
	}
		
	}
	
}


	
	require_once('../Includes/FeedbackLayout.php');

	drawHeader("Store Incharge");

$dep=$_SESSION['DEP'];

if($dep=='Electrical')
{
$code='E';
}else
{
$code='C';
}

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

	$query = "SELECT * campus_maintenance_inventory_from code_count";
	
	if($query_run=mysql_query($query))
	{
		if($code=='E')
		$count=mysql_result($query_run,0,'count_e');
		else
		$count=mysql_result($query_run,0,'count_c');
			
	}
	$code.=$count;
	
	
?>


    <div class="divContent" id="divExis">
        <h2>INVENTORY MATERIALS</h2>
<hr />


<?php
if(isset($_POST['btn']))
{
	if(!empty($_POST['quantity'])&& !empty($_POST['description'])&&!empty($_POST['dop'])&&!empty($_POST['rop'])&&!empty($_POST['nos'])&&!empty($_POST['pin']))
	{
	
	}
	else
	{
		echo '<strong>ENTER ALL THE FIELDS</strong>';
	}
}
?>

<form action="insert_new.php" method="POST">
<table class="divTable" id="exisBranch" width="50%" >
<tr><th><h2>FIELDS</h2></th><th><h2>Data</h2></th></tr>
<tr><th>Code</th><td><?php echo $code; ?></td></tr>
<tr><th>Description</th><td><input type="text" name="description"></td></tr> 	
<tr><th>Quantity</th><td><input type="text" name="quantity" ></td></tr>
<tr><th>Date of Purchase</th><td><input type="date" name="dop"></td></tr>
<tr><th>Rate of Purchase</th><td><input type="text" name="rop"></td></tr>
<tr><th>Department</th><td><?php echo $_SESSION['DEP']; ?></td></tr>
<tr><th>Name of Supplier</th><td><input type="text" name="nos"></td></tr>
<tr><th>Purchase Indent No.</th><td><input type="text" name="pin"></td></tr>
</table>

<input type="submit" name="btn" value="SUBMIT">
</form>
</div>

<?php
$redirect_page=$_SERVER['HTTP_REFERER'];
	echo '<a href="'.$redirect_page.'"><input type="submit" value="BACK"></a>';
?>
