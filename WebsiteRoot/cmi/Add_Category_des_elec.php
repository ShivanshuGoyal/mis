<?php

@session_start();
if(isset($_POST['txt']))
{

	if(!empty($_POST['txt']))
	{
		$_SESSION['TXT']=$_POST['txt'];
		header("Location: Add_Category.php");
	}
}


require_once('../Includes/SessionAuth.php');

require_once('../Includes/FeedbackLayout.php');

	drawHeader("Store Incharge");




//echo $_SESSION['DEP'];


require_once('../Includes/ConfigSQL.php');
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	
	$flag=true;
	
	if($_SESSION['DEP']=='Electrical')
	{
		$code='E';
		$query="Select * FROM campus_maintenance_inventory_code_count";
		
		if($query_run=mysql_query($query))
		{
			if(mysql_num_rows($query_run)>=1)
			{
				$cnt=mysql_result($query_run,mysql_num_rows($query_run)-1,'count_ct_e');
				$cnt+=1;
				
				$len= strlen($cnt);
				if($len==1)
				$code=$code.'000'.$cnt;
				else if($len==2)
				$code=$code.'00'.$cnt;
				else if($len==3)
				$code=$code.'0'.$cnt;
				else if($len==4)
				$code=$code.$cnt;
				
				if($len>4)
				{
				$flag=false;
				echo "<script>alert('NO more categories Can be added!!')</script>";
				header('Loaction: check_category_elec.php');
				}
				
			}
			else
			{
			$code.='0001';
			$cnt=1;
			}
			$_SESSION['CT_COUNT']=$cnt;
		}


	}
	

/*	if($_SESSION['DEP']=='Civil')
	{
		$code='C';
		
		if($query_run=mysql_query($query))
		{
			if(mysql_num_rows($query_run)>=1)
			{
				$cnt=mysql_result($query_run,0,'count_elec_ct');
				$len= strlen($cnt);
				if($len==1)
				$code=$code.'00'.$cnt;
				else if($len==2)
				$code=$code.'0'.$cnt;
				else if($len==3)
				$code=$code.$cnt;
				if($len>3)
				{
				echo '<h1>NO more categories Can be added!!</h1>';
				}	
			}
		}

	}
*/

		
$_SESSION['CT_CODE']=$code;

require_once('../Includes/FeedbackLayout.php');

	drawHeader("Store Incharge");
	
?>
<br/><br/><br/><br/><br/><br/><br/><br/>
<div>
	

    <div class="divContent" align="center" id="divExis">
	<?php
	if(isset($_POST['btn']))
	{
		if(empty($_POST['txt']))
		echo "<script>alert('Please Enter the category name')</script>";
	}
	?>
	<form action="Add_Category_des_elec.php" method="POST">
	<table class="divTable" id="exisBranch" width="50%">
	<tr><th>Category Code</th><td><?php echo $code; ?></td></tr>
	<tr><th>Add Category Name</th><td><input type="text" name="txt"></td></tr>
	
	</table>
	
	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" value="SUBMIT" name="btn">
</form>



	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<br/><br/><br/><br/>
	<a href="check_category_elec.php" ><input type="submit" value="BACK" name="btn2"></a>
   
</div>
</div>