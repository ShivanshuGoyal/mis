<?php

        require_once('../Includes/SessionAuth.php');
	
	
	
	require_once('../Includes/FeedbackLayout.php');

	drawHeader("Store Incharge");

	

?>


    <div class="divContent" id="divExis">
        <h2>INVENTORY MATERIALS</h2>
<hr />
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
	$qry="SELECT * FROM `campus_maintenance_inventory_inventory` WHERE `category`='".$_GET['q']."' AND `status`='authorized'";


	
	
	    if($query_run=mysql_query($qry))
	
	     {
		if(mysql_num_rows($query_run)>=1)
		{
                echo "<table class=\"divTable\" id=\"exisBranch\" width=\"80%\" align=\"center\" >";
                echo " <tr><th >CODE</th>
					<th >CATEGORY</th>
                    <th >DESCRIPTION</th>
                    <th >QUANTITY</th>
                    <th >RATE_OF_PURCHASE</th>
		    <th >NAME_OF_SUPPLIER</th>
			
                </tr>";
		while($query_row=mysql_fetch_array($query_run))
		{
			
			echo"<tr>";
			echo "<td>".$query_row['code']."</td>";
			echo "<td>".$query_row['category']."</td>";
			echo "<td>".$query_row['description']."</td>";
			echo "<td>".$query_row['quantity']."</td>";
			echo "<td>".$query_row['rate_of_purchase']."</td>";
			echo "<td>".$query_row['name_of_supplier']."</td>";
			echo "</tr>";
		}
        
             echo "</table>";


 	      }
		else
			{
			echo '<h2><strong>'.'NO ITEM FOR THIS CATEGORY !'.'</strong></h2>';
			}
	  }else
		{
			echo 'Not possible';
		}
		echo "<br/><br/><div align=\"center\"><a href='view_ct.php'> <input type='submit' value='BACK'> </a></div>";
	?>
    </div>