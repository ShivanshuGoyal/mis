<?php

        require_once('../Includes/SessionAuth.php');
	
	
	
	require_once('../Includes/FeedbackLayout.php');

	drawHeader("Store Incharge");

	

?>


    <div class="divContent" id="divExis" align="center">
        <h1><?php echo $_GET['q']; ?></h1>
		
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
	
	echo "<h2>AUTHORIZED<h2>";
	$qry="SELECT *,quantity * rate_of_purchase as total_cost FROM `campus_maintenance_inventory_inventory` WHERE `category`='".$_GET['q']."' AND `status`='authorized'";

	
	    if($query_run=mysql_query($qry))
	
	     {
		if(mysql_num_rows($query_run)>=1)
		{
		$overall=0;
                echo "<table class=\"divTable\" id=\"exisBranch\" width=\"80%\" align=\"center\" >";
                echo " <tr><th >CODE</th>
                    <th >DESCRIPTION</th>
                    <th >QUANTITY</th>
                    <th >RATE_OF_PURCHASE</th>
		    <th >NAME_OF_SUPPLIER</th>
			<th >Total Cost</th>
                </tr>";
		while($query_row=mysql_fetch_array($query_run))
		{
			echo"<tr>";
			echo "<td>".$query_row['code']."</td>";
			//echo "<td>".$query_row['category']."</td>";
			echo "<td>".$query_row['description']."</td>";
			echo "<td>".$query_row['quantity']."</td>";
			echo "<td>".$query_row['rate_of_purchase']."</td>";
			echo "<td>".$query_row['name_of_supplier']."</td>";
			echo "<td>".$query_row['total_cost']."</td>";
			$overall+=$query_row['total_cost'];
			echo "</tr>";
		}
        echo "<tr><td colspan='5' >OVERALL COST</td><td>".$overall."</td></tr>";
             echo "</table>";


 	      }
		else
			{
			echo '<h3><strong>'.'NO ITEM AVAILABLE'.'</strong></h3>';
			}
	  }else
		{
			echo 'Not possible';
		}
		
		echo "<br/><br/><br/>";
		
		echo "<h2 >PENDING<h2>";
	$qry="SELECT *, FROM `campus_maintenance_inventory_inventory` WHERE `category`='".$_GET['q']."' AND `status`='pending'";

	
	    if($query_run=mysql_query($qry))
	
	     {
		if(mysql_num_rows($query_run)>=1)
		{
		
                echo "<table class=\"divTable\" id=\"exisBranch\" width=\"80%\" align=\"center\" >";
                echo " <tr><th >CODE</th>
                    <th >DESCRIPTION</th>
                    <th >QUANTITY</th>
                    <th >RATE_OF_PURCHASE</th>
		    <th >Manufacturer</th>
                </tr>";
		while($query_row=mysql_fetch_array($query_run))
		{
			echo"<tr>";
			echo "<td>".$query_row['code']."</td>";
			//echo "<td>".$query_row['category']."</td>";
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
			echo '<h3><strong>'.'NO ITEM AVAILABLE'.'</strong></h3>';
			}
	  }else
		{
			echo 'Not possible';
		}
		
		
		echo "<br/><br/><br/>";
		
		
		echo "<h2 >UNAUTHORIZED<h2>";
	$qry="SELECT *, FROM `campus_maintenance_inventory_inventory` WHERE `category`='".$_GET['q']."' AND `status`='unauthorized'";

	
	    if($query_run=mysql_query($qry))
	
	     {
		if(mysql_num_rows($query_run)>=1)
		{
		
                echo "<table class=\"divTable\" id=\"exisBranch\" width=\"80%\" align=\"center\" >";
                echo " <tr><th >CODE</th>
                    <th >DESCRIPTION</th>
                    <th >QUANTITY</th>
                    <th >RATE_OF_PURCHASE</th>
		    <th >Manufacturer</th>
                </tr>";
		while($query_row=mysql_fetch_array($query_run))
		{
			echo"<tr>";
			echo "<td>".$query_row['code']."</td>";
			//echo "<td>".$query_row['category']."</td>";
			echo "<td>".$query_row['description']."</td>";
			echo "<td>".$query_row['quantity']."</td>";
			echo "<td>".$query_row['rate_of_purchase']."</td>";
			echo "<td>".$query_row['name_of_supplier']."</td>";
			
			echo "</tr>";
		}
        echo "<tr><td colspan='6' >OVERALL COST</td><td>".$overall."</td></tr>";
             echo "</table>";


 	      }
		else
			{
			echo '<h3><strong>'.'NO ITEM AVAILABLE'.'</strong></h3>';
			}
	  }else
		{
			echo 'Not possible';
		}
			
		
		echo "<br/><br/><div align=\"center\"><a href='view_ct.php'> <input type='submit' value='BACK'> </a></div>";
	
	?>
	
    </div>
	
	