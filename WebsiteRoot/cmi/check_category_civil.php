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
	$qry="SELECT * FROM `campus_maintenance_inventory_category_civil`";
	if($query_run=mysql_query($qry))
	
	     {
		if(mysql_num_rows($query_run)>=1)
		{
		echo '<h1>SELECT THE CATEGORY</h1>';

		echo "<table class=\"divTable\" id=\"exisBranch\" width=\"50%\">";
                echo " <tr><th >Category Code</th>
			
                    <th >Description</th>
			<th>Select</th><th>Status</th><th>Remark</th></tr>"; 

		while($query_row=mysql_fetch_array($query_run))
		{
			
			echo "<tr>";
			echo "<td>".$query_row['category_code']."</td>";
			echo "<td>".$query_row['category_name']."</td>";
			//echo "<td><input type=\"submit\" value=\"SELECT\" onclick=\"javascript: form.action='check_item.php?CTCODE=".$query_row['category_code'].";CTNAME=".$query_row['category_name'].";' \" > </td></tr>";
			
			
			

			if($query_row['status']=="authorized"){
			echo "<td><a href=\"check_item.php?CTCODE=".$query_row['category_code']."\">SELECT</a></td>";
			}
			else
			{
				echo "<td> </td>";
			}
			echo "<td>".$query_row['status']."</td>";
			echo "<td>".$query_row['remark']."</td> </tr>";
		}

			echo '</table>';
		
		}else
			{
				echo '<h1>NO CATEGORY PRESENT</h1>';
			}
		}

		echo "<br/><br/><br/><br/><a href=\"Add_Category_des_civil.php\"><input type=\"submit\" value=\"ADD NEW CATEGORY\"></a>";	
		echo "<br/><br/><br/><br/><a href=\"Select_Dep.php\"><input type=\"submit\" value=\"BACK\"></a>";
	?>
	
	</div>
	</div>