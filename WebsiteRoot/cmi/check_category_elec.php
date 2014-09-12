<?php

require_once('../Includes/SessionAuth.php');

require_once('../Includes/FeedbackLayout.php');

	drawHeader("Store Incharge");



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
	
	echo '<h1>SELECT THE CATEGORY</h1>';
	echo '<hr>';
	echo '<br/><br/><br/>';
	
	echo "<h2>AUTHORIZED<h2>";
	
	$qry="SELECT * FROM `campus_maintenance_inventory_category_elec` WHERE `status`='authorized' ORDER BY `category_code` ";
	if($query_run=mysql_query($qry))
	
	     {
		if(mysql_num_rows($query_run)>=1)
		{
		

		echo "<table class=\"divTable\" id=\"exisBranch\" width=\"50%\">";
                echo " <tr><th >Category Code</th>
			
                    <th >Description</th>
			<th>Select</th></tr>"; 

		while($query_row=mysql_fetch_array($query_run))
		{
			
			echo "<tr>";
			echo "<td>".$query_row['category_code']."</td>";
			echo "<td>".$query_row['category_name']."</td>";
			//echo "<td><input type=\"submit\" value=\"SELECT\" onclick=\"javascript: form.action='check_item.php?CTCODE=".$query_row['category_code']." & CTNAME=".$query_row['category_name'].";' \" > </td></tr>";
			
			echo "<td><a href=\"check_item.php?CTCODE=".$query_row['category_code']." & CTNAME=".$query_row['category_name']."\">SELECT</a></td>";
			
			
		}

		echo "</table>";
		
		}else
			{
				echo '<h3>NO CATEGORY PRESENT</h3>';
			}
		}
		
		echo '<br/><br/><br/>';
		
	
	echo "<h2>PENDING</h2>";
		
		$qry="SELECT * FROM `campus_maintenance_inventory_category_elec` WHERE `status`='pending'  ORDER BY `category_code` ";
	if($query_run=mysql_query($qry))
	
	     {
		if(mysql_num_rows($query_run)>=1)
		{

		echo "<table class=\"divTable\" id=\"exisBranch\" width=\"50%\">";
                echo " <tr><th >Category Code</th>
			
                    <th >Description</th>
					</tr>"; 

		while($query_row=mysql_fetch_array($query_run))
		{
			
			echo "<tr>";
			echo "<td>".$query_row['category_code']."</td>";
			echo "<td>".$query_row['category_name']."</td>";
			//echo "<td><input type=\"submit\" value=\"SELECT\" onclick=\"javascript: form.action='check_item.php?CTCODE=".$query_row['category_code']." & CTNAME=".$query_row['category_name'].";' \" > </td></tr>";
			
			//echo "<td><a href=\"check_item.php?CTCODE=".$query_row['category_code']." & CTNAME=".$query_row['category_name']."\">SELECT</a></td>";
			
			echo "</tr>";
		}

		echo "</table>";
		
		}else
			{
				echo '<h3>NO CATEGORY PRESENT</h3>';
			}
		}
		
	echo '<br/><br/><br/><br/>';
		echo '<h2>UNAUTHORIZED<h2>';
		$qry="SELECT * FROM `campus_maintenance_inventory_category_elec` WHERE `status`='unauthorized'  ORDER BY `category_code`";
	if($query_run=mysql_query($qry))
	
	     {
		if(mysql_num_rows($query_run)>=1)
		{

		echo "<table class=\"divTable\" id=\"exisBranch\" width=\"50%\">";
                echo " <tr><th >Category Code</th>
			
                    <th >Description</th><th>Remark</th>
			<th>Delete</th><th>Update</th></tr>"; 

		while($query_row=mysql_fetch_array($query_run))
		{
			
			echo "<tr>";
			echo "<td>".$query_row['category_code']."</td>";
			echo "<td>".$query_row['category_name']."</td>";
			//echo "<td><input type=\"submit\" value=\"SELECT\" onclick=\"javascript: form.action='check_item.php?CTCODE=".$query_row['category_code']." & CTNAME=".$query_row['category_name'].";' \" > </td></tr>";
			
			echo "<td>".$query_row['remark']."</td>";
			echo "<td><a href=\"delete_ct.php?CTCODE=".$query_row['category_code']." & CTNAME=".$query_row['category_name']."\">Delete</a></td>";
			echo "<td><a href=\"update_ct.php?CTCODE=".$query_row['category_code']." & CTNAME=".$query_row['category_name']."\">Update</a></td>";
			//echo "<td><a href=\"resend_ct.php?CTCODE=".$query_row['category_code']." & CTNAME=".$query_row['category_name']."\">Resend</a></td></tr>";
			
		}

		echo "</table>";
		
		}else
			{
				echo '<h3>NO CATEGORY PRESENT</h3>';
			}
		}
		
		
		
		
		
	echo "<br/><br/><br/><br/><a href=\"Add_Category_des_elec.php\"><input type=\"submit\" value=\"ADD NEW CATEGORY\"></a>";	
	echo "<br/><br/><a href=\"Select_Dep.php\"><input type=\"submit\" value=\"BACK\"></a>";
	?>

	</div>

	
	</div>