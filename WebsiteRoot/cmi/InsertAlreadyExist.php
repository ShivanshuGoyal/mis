<?php
@session_start();
	require_once('../Includes/SessionAuth.php');
	if(isset($_POST['submit2']))
	{
		if(!empty($_POST['CODE']))
		{	
		
			$_SESSION['CODE']=$_POST['CODE'];
			//$_SESSION['DESCRIPTION']=$_POST['description'];
			echo 'ERRR: '.$_SESSION['CODE'].'<br/>';
			header('Location: insert_already_select.php');	
		}
	}

	require_once('../Includes/FeedbackLayout.php');

	drawHeader("Store Incharge");
	
	
?>

<div>
  <div class="divContent" id="divAdd">

<h1>Insert Into Inventory</h1>
	<hr/>
<br/><br/>
<?php

if(isset($_POST['txt1']) && !empty($_POST['txt1']))
	{
		$txt1=$_POST['txt1'];
	}
	

?>
<h2>Write the description:-</h2>
<form action="InsertAlreadyExist.php" method="POST">
<input type="text" name="txt1" value="<?php if(isset($txt1)) {echo $txt1;} ?>">
<input type="submit" name='submit' value="submit"/>
</form>
<?php

if(isset($_POST['submit']))
{
	if( !empty($_POST['txt1']))
	{
	$txt2=$_POST['txt1'];
	require_once('../Includes/ConfigSQL.php');

	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	$qry="SELECT * FROM `campus_maintenance_inventory_inventory` WHERE `description` LIKE '%".mysql_real_escape_string($txt1)."%' ";
	if($qry_run = mysql_query($qry))
		{
			if(mysql_num_rows($qry_run)>=1)
			{
				echo '<script type="text/javascript" src="JS/AddBranchJS.js"></script>
                                <div>
  					<div class="divContent" id="divExis">
       						 <h2>INVENTORY MATERIALS</h2>
							<hr />';
					echo "<table class=\"divTable\" id=\"exisBranch\" width=\"100%\">";
					echo "<tr><th>CODE</th><th>DESCRIPTION</th></tr>";

			 	 while($query_row=mysql_fetch_array($qry_run))
				  {

					
						echo "<tr><td>".$query_row['code']."</td>";
					echo "<td>".$query_row['description']."</td>";
					
					
					

	
				  }

				echo "<form action=\"InsertAlreadyExist.php\" method=\"POST\">ENTER THE CODE : <input type=\"text\"  name=\"CODE\"><input type=\"submit\" name=\"submit2\" value=\"SUBMIT\"></form>";
			}else
			{
					echo '<h2><strong>'.'NO SUCH ELEMENT FOUND'.'</strong></h2>';
			}
		
		}else{
			echo mysql_error();
			}
		
	}else

	echo '<strong>'.'ENTER THE DESCRIPTION'.'</strong>';
	echo '<a href="insert1.php"><input type="submit" value="BACK"></a>' ;
}	
?>

</div>

</div>