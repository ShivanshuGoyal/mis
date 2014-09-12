<?php
@session_start();
require_once('../Includes/SessionAuth.php');


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
	if($_SESSION['DEP']=='Electrical')
	$qry="SELECT  * FROM `campus_maintenance_inventory_category_elec` where  `status`='authorized' ORDER BY `category_code` ";
	else
	{
		$qry="SELECT  * FROM `campus_maintenance_inventory_category_civil` where `status`='authorized'  ORDER BY `category_code` ";
	}


if($query_run=mysql_query($qry))
	
	     {
		if(mysql_num_rows($query_run)>=1)
		{
                echo "<table class=\"divTable\" id=\"exisBranch\" width=\"100%\">";
                echo " <tr><th >CODE</th>
					<th >CATEGORY</th> 
                    <th>SELECT</th>
                </tr>";
		while($query_row=mysql_fetch_array($query_run))
		{
			
			echo "<tr>";
			echo "<td>".$query_row['category_code']."</td>";
			echo "<td>".$query_row['category_name']."</td>";
			
			echo "<td><a href=\"view_item.php?q=".$query_row['category_name']."\" >SELECT</a></td>";
			
			echo "</tr>";
		}
        
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
		
		echo "<br/></br><div align=\"center\"><a href='view_check_dep.php'> <input type='submit' value='BACK'> </a></div>";
		
?>