<?php
@session_start();
require_once('../Includes/SessionAuth.php');



		require_once('../Includes/FeedbackLayout.php');

	drawHeader("Store Incharge");

?>
<?php


echo "<h1>CATEGORIES</h1>";
echo "<hr>";

		require_once('../Includes/ConfigSQL.php');
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	
	$qry="SELECT  * FROM `campus_maintenance_inventory_category_elec`   ORDER BY `category_code` ";
	


if($query_run=mysql_query($qry))
	
	     {
		if(mysql_num_rows($query_run)>=1)
		{
                echo "<table class=\"divTable\" id=\"exisBranch\" width=\"100%\">";
                echo " <tr><th >CODE</th>
					<th >CATEGORY</th> 
					<th>STATUS</th>
                    <th>SELECT</th>
					<th>COST</th>
                </tr>";
				$overall=0;
		while($query_row=mysql_fetch_array($query_run))
		{
			
			echo "<tr>";
			echo "<td>".$query_row['category_code']."</td>";
			echo "<td>".$query_row['category_name']."</td>";
			echo "<td>".$query_row['status']."</td>";
			if($query_row['status']=='authorized')
			{
			$query="SELECT sum(rate_of_purchase * quantity) as total FROM campus_maintenance_inventory_inventory where category='".$query_row['category_name']."'";
			$qry_run=mysql_query($query);
			echo "<td><a href=\"view_item.php?q=".$query_row['category_name']."\" >SELECT</a></td>";
			$total= mysql_result($qry_run,0,'total');
			if(!empty($total))
			{
			$overall+=$total;
			echo "<td>".$total."</td>";
			}
			else
			echo "<td>0</td>";
			}
			else
			{
			echo "<td>Can Not Select</td>";
			echo "<td>Not Applicable</td>";
			}
			echo "</tr>";
		}
		//echo "<tr></tr><tr></tr>";
        echo "<tr><td colspan='4'>OVERALL COST</td><td>".$overall."</td></tr>";
             echo "</table>";

 	      }
		else
			{
			echo '<h1><strong>'.'STORE IS EMPTY'.'</strong></h1>';
			}
	  }else
		{
			echo 'Not possible';
		}
		
		echo "<br/></br><div align=\"center\"><a href='view_inventory.php'> <input type='submit' value='BACK'> </a></div>";
		
?>


