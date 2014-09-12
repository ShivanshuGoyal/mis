<?php
require_once('../Includes/SessionAuth.php');

require_once('../Includes/FeedbackLayout.php');

	drawHeader("Validate Item");



?>
<script>
function check1(p)
{
var str='txt';

str=str.concat(p);

document.getElementById(str).disabled = false;

}

function check2(p)
{
var str='txt';
str=str.concat(p);

document.getElementById(str).disabled = true;

}


</script>
<div>
	

    <div class="divContent" align="center" id="divExis">
        
	<form action="validate_item2.php" method="POST">
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
	$qry="SELECT * FROM `campus_maintenance_inventory_inventory` WHERE `status`= \"pending\" AND `department`=\"Electrical\" ";
	if($query_run=mysql_query($qry))
	
	     {
		if(mysql_num_rows($query_run)>=1)
		{
		$p=0;
		echo '<h1>SELECT THE ITEM</h1>';

		echo "<table class=\"divTable\" id=\"exisBranch\" width=\"100%\">";
                echo " <tr><th >Item Code</th>
			
                    <th >Description</th>
					<th >Quantity</th>
					<th >Date of purchase</th>
					<th >Rate of purchase</th>
					<th >Name of supplier</th>
					<th >Purchase Order No.</th>
					<th >Category</th>
			<th>Authorize</th><th>Unauthorize</th><th>Remark(if Unauthorizing)</th></tr>"; 

		while($query_row=mysql_fetch_array($query_run))
		{
			
			echo "<tr>";
			echo "<td>".$query_row['code']."</td>";
			echo "<td>".$query_row['description']."</td>";
			echo "<td>".$query_row['quantity']."</td>";
			echo "<td>".$query_row['date_of_purchase']."</td>";
			echo "<td>".$query_row['rate_of_purchase']."</td>";
			echo "<td>".$query_row['name_of_supplier']."</td>";
			echo "<td>".$query_row['purchase_indent_no']."</td>";
			echo "<td>".$query_row['category']."</td>";
			echo "<td><input type='radio' name='status".$p."' value='allow' onclick='check2($p)'></td>";
			echo "<td><input type='radio' name='status".$p."' value='not_allow' onclick='check1($p)'></td><td><input type='textarea' name='txt".$p."' id='txt".$p."' disabled='true'></td></tr>";
		
			$_SESSION['ITEM_CODE'.$p]=$query_row['code'];
			$_SESSION['ROP'.$p]=trim($query_row['rate_of_purchase']);
			$_SESSION['NOS'.$p]=$query_row['name_of_supplier'];
			$_SESSION['PIN'.$p]=$query_row['purchase_indent_no'];
			$p=$p+1;
			$_SESSION['$p']=$p;

			
		}

			echo '</table>';
			echo "<tr><th colspan='7' align='center'><input type='submit' name='submit'></input></th></tr>";
		}else
			{
				echo '<h1>NO ITEM TO VALIDATE</h1>';
			}
		}

		
	?>
</form>	
	<br/><br/><br/><br/><a href=function.php><input type=submit value=BACK></a>
	</div>
	</div>
	
	