<?php
require_once('../Includes/SessionAuth.php');
@session_start();
if(isset($_GET['CTNAME']) && isset($_GET['CTCODE']))
{
$_SESSION['CTNAME']=$_GET['CTNAME'];
$_SESSION['CTCODE']=$_GET['CTCODE'];
}


?>
<?php
if(isset($_POST['txt']) && !empty($_POST['txt']))
{
require_once('../Includes/ConfigSQL.php');
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	$query="UPDATE `campus_maintenance_inventory_category_elec` SET `category_name`='".$_POST['txt']."',`status`='pending', `remark`=''  WHERE `category_code`='".$_SESSION['CTCODE']."'";
	
	if($query_run=mysql_query($query))
	{
			//echo "<script>alert('Successfully Updated.')</script>";
	}
	else
	{
		//echo "<script>alert('Updation Failed.')</script>";
	}
	
	header('Location: check_category_elec.php');
	}

	
	
require_once('../Includes/FeedbackLayout.php');

	drawHeader("Store Incharge");



?>


<div>
<form action="update_ct.php" method="POST">
<table class="divTable" id="exisBranch" width="50%">
<tr>
<th>Category Code</th>
<td><?php echo $_SESSION['CTCODE']; ?> </td>
</tr>
<tr>
<th>Category Name</th>
<td><input type="text" name="txt" value=" <?php echo $_SESSION['CTNAME']; ?> " ></td>
</tr>
</table>
<input type="submit" name="btn">
</form>
<?php 
if(isset($_POST['btn']))
{
if(empty($_POST['txt']))
{
echo "<h2>Enter the description please<h2>";
}
}

?>


<a href="check_category_elec.php"><input type="submit" value="BACK"></a>
</div>