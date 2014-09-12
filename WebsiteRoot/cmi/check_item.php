<?php
@session_start();
require_once('../Includes/SessionAuth.php');

require_once('../Includes/FeedbackLayout.php');

	drawHeader("Store Incharge");
if(isset($_GET['CTCODE']) && isset($_GET['CTNAME']))
{
$_SESSION['CT']=$_GET['CTCODE'];
$_SESSION['CTNAME']=$_GET['CTNAME'];
}
?>

<div>
	

    <div class="divContent" align="center" id="divExis">
        
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
		echo "<h1>".$_SESSION['CTNAME']."</h1>";
		echo "<hr>";
		echo '<h2>SELECT THE ITEM</h2>';
		echo "<br/><br/>";
		
	$qry="SELECT distinct description,code FROM `campus_maintenance_inventory_inventory` WHERE `category`='".$_SESSION['CTNAME']."' AND `status`='authorized'";
	
	if($query_run=mysql_query($qry))
	
	     {
		 echo "<h2>AUTHORIZED</h2>";
		if(mysql_num_rows($query_run)>=1)
		{

		 echo "<table class=\"divTable\" id=\"exisBranch\" width=\"50%\">";
                echo " <tr><th>Code</th>
					<th >Description</th>
					
		    <th >SELECT</th>
                </tr>";
		while($query_row=mysql_fetch_array($query_run))
		{
			
			echo"<tr>";
			echo "<td>".$query_row['code']."</td>";
			echo "<td>".$query_row['description']."</td>";
			
			echo "<td><a href=\"Item_form_1.php?DES=".$query_row['description']." & CODE=".$query_row['code']."\">SELECT</a></td>";
			echo "</tr>";
		}
        
             echo "</table>";

		
		}else
			{
				echo '<h3>NO ITEM PRESENT</h3>';
			}
		}
		
		echo "<br/><br/><br/>";
		
		$qry="SELECT  * FROM `campus_maintenance_inventory_inventory` WHERE `category`='".$_SESSION['CTNAME']."' AND `status`='pending'";
	
	if($query_run=mysql_query($qry))
	
		echo "<h2>PENDING</h2>";
	     {
		if(mysql_num_rows($query_run)>=1)
		{

		 echo "<table class=\"divTable\" id=\"exisBranch\" width=\"50%\">";
                echo " <tr><th>Code</th>
                    <th >Description</th>
                    <th>Quantity</th>
					<th>Date of Purchase</th>
						<th>Rate of Purchase</th>
						<th>Manufacturer</th>
						
                </tr>";
		while($query_row=mysql_fetch_array($query_run))
		{
			
			echo"<tr>";
			echo "<td>".$query_row['code']."</td>";
			echo "<td>".$query_row['description']."</td>";
			echo "<td>".$query_row['quantity']."</td>";
			echo "<td>".$query_row['date_of_purchase']."</td>";
			echo "<td>".$query_row['rate_of_purchase']."</td>";
			echo "<td>".$query_row['name_of_supplier']."</td>";
			echo "</tr>";
		}
        
             echo "</table>";

		
		}else
			{
				echo '<h3>NO ITEM PRESENT</h3>';
			}
		}
		
		echo "<br/><br/><br/>";
		
		
		
		$qry="SELECT  * FROM `campus_maintenance_inventory_inventory` WHERE `category`='".$_SESSION['CTNAME']."' AND `status`='unauthorized'";
	
	if($query_run=mysql_query($qry))
	
	     {
		 echo "<h2>UNAUTHORIZED</h2>";
		if(mysql_num_rows($query_run)>=1)
		{

		 echo "<table class=\"divTable\" id=\"exisBranch\" width=\"50%\">";
                echo " <tr><th>Code</th>
                    <th >Description</th>
                    <th >DELETE</th>
		    <th >UPADTE</th>
                </tr>";
		while($query_row=mysql_fetch_array($query_run))
		{
			
			echo"<tr>";
			echo "<td>".$query_row['code']."</td>";
			echo "<td>".$query_row['description']."</td>";
			echo "<td><a href=\"item_delete.php?CODE=".$query_row['code']." & ROP=".$query_row['rate_of_purchase']." & NOS=".$query_row['name_of_supplier']." & PIN=".$query_row['purchase_indent_no']."\">SELECT</a></td>";
			echo "<td><a href=\"item_update.php?CODE=".$query_row['code']." & ROP=".$query_row['rate_of_purchase']." & NOS=".$query_row['name_of_supplier']." & PIN=".$query_row['purchase_indent_no']."\">SELECT</a></td>";
			echo "</tr>";
		}
        
             echo "</table>";

		
		}else
			{
				echo '<h3>NO ITEM PRESENT</h3>';
			}
		}
		
		
		
		
	echo "<br/><br/><br/><br/><a href=\"Item_form_new.php\"><input type=\"submit\" value=\"ADD NEW ITEM\"></a>";
		if($_SESSION['DEP']=='Electrical')
	echo "<br/><br/><a href=\"check_category_elec.php\"><input type=\"submit\" value=\"BACK\"></a>";
	else
	echo "<br/><br/><a href=\"check_category_civil.php\"><input type=\"submit\" value=\"BACK\"></a>";
	?>

	</div>

	
	</div>
	
	
	
	