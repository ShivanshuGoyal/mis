<?php
require_once('../Includes/SessionAuth.php');

require_once('../Includes/FeedbackLayout.php');

	drawHeader("Validate Category");



?>
<script>
function check1(p)
{
var str='txt';
str=str.concat(p);

document.getElementById(str).value="";
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
        
	<form action="validate_ct2.php" method="POST">
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
	$qry="SELECT * FROM `campus_maintenance_inventory_category_elec` WHERE `status`= \"pending\" ";
	if($query_run=mysql_query($qry))
	
	     {
		if(mysql_num_rows($query_run)>=1)
		{
		$p=0;
		echo '<h1>SELECT THE CATEGORY</h1>';

		echo "<table class=\"divTable\" id=\"exisBranch\" width=\"100%\">";
                echo " <tr><th >Category Code</th>
			
                    <th >Description</th>
			<th>Authorize</th><th>Unauthorize</th><th>Remark(if Unauthorizing)</th></tr>"; 

		while($query_row=mysql_fetch_array($query_run))
		{
			
			echo "<tr>";
			echo "<td>".$query_row['category_code']."</td>";
			echo "<td>".$query_row['category_name']."</td>";
			echo "<td><input type='radio' name='status".$p."' value='allow' onclick='check2($p)'></td>";
			echo "<td><input type='radio' name='status".$p."' value='not_allow' onclick='check1($p)'></td><td><input type='textarea' name='txt".$p."' id='txt".$p."' disabled='true'></td></tr>";
		
			$_SESSION['CT_CODE'.$p]=$query_row['category_code'];
			
			$p=$p+1;
			$_SESSION['$p']=$p;

			
		}

			echo '</table>';
			echo "<tr><th colspan='7' align='center'><input type='submit' name='submit'></input></th></tr>";
		}else
			{
				echo '<h1>NO CATEGORY TO VALIDATE</h1>';
			}
		}

		
	?>
</form>	
	<br/><br/><br/><br/><a href=function.php><input type=submit value=BACK></a>
	</div>
	</div>