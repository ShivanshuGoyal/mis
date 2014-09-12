<?php

session_start();
require_once('../Includes/SessionAuth.php');
	


	if(isset($_POST['code'])&&isset($_POST['date']))
	{
		if(!empty($_POST['code']) && !empty($_POST['date']))
		{
		 $_SESSION['CODE']=$_POST['code'];
		 $_SESSION['DATE']=$_POST['date'];
		 header('Location: insert.php');	
		}
	}


	require_once('../Includes/FeedbackLayout.php');

	drawHeader("AEE");

	

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
	$qry="SELECT * FROM `campus_maintenance_inventory_in_si_to_aee` ";
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
                echo " <tr><th >Code</th>
                    <th >Description</th>
                    <th >Quantity</th>
                    <th >DOP</th>
                    <th >RATE_OF_PURCHASE</th>
		    <th >DEPARTMENT</th>
		    <th >NAME_OF_SUPPLIER</th>
		    <th >PURCHASE_INDENT_NO</th>
                </tr>";

			 	 while($query_row=mysql_fetch_array($qry_run))
				  {

					echo"<tr>";
			echo "<td>".$query_row['code']."</td>";
			echo "<td>".$query_row['description']."</td>";
			echo "<td>".$query_row['quantity']."</td>";
			echo "<td>".$query_row['date_of_purchase']."</td>";
			echo "<td>".$query_row['rate_of_purchase']."</td>";
			echo "<td>".$query_row['department']."</td>";
			echo "<td>".$query_row['name_of_supplier']."</td>";
			echo "<td>".$query_row['purchase_indent_no']."</td>";
			echo "</tr>";
					
					

	
				  }
				echo "</table>";

				echo "<form action=\"insert_to_inventory.php\" method=\"POST\">ENTER THE CODE : <input type=\"text\"  name=\"code\"><br/>ENTER THE Date : <input type=\"date\"  name=\"date\"><br/><input type=\"submit\" name=\"submit2\" value=\"SUBMIT\"></form>";
			

				

				
	if(isset($_POST['submit2']))
	{
		if(empty($_POST['code']) || empty($_POST['date']))
		{
		 echo '<strong>'.'Enter All Fields'.'</strong>';	
		}
	}

		echo "<br/><br/><br/><br/><form action=\"function.php\" method=\"POST\"><input type=\"submit\" name=\"submit3\" value=\"BACK\"></form>";
				
			}else
			{
					echo '<h2><strong>'.'NO SUCH ELEMENT FOUND'.'</strong></h2>';
			}
		
		}else{
			echo mysql_error();
			}

?>