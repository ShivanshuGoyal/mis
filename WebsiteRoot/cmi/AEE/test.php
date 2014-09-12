<?php

 require_once('../Includes/SessionAuth.php');
		require_once('../Includes/FeedbackLayout.php');

	drawHeader("Supervisor Electrical");

	
	
	
	
	
	var_dump($_POST);
?>

<div align="center">

<table class="divTable"  width="50%">

<tr><th>S. No.</th><th>Category</th><th>Description</th><th>Quantity Available</th><th>Quantity Required</th></tr>
<?php
$n=$_POST['no_of_inputs'];
$_SESSION['no_of_inputs']=$_POST['no_of_inputs'];
for($i=1;$i<=$n;$i++)
{
	$_SESSION['categ_order_'.$i]=$_POST['categ_order_'.$i];
	$_SESSION['item_order_'.$i]=$_POST['item_order_'.$i];
	$_SESSION['avail_order_'.$i]=$_POST['avail_order_'.$i];
	$_SESSION['req_order_'.$i]=$_POST['req_order_'.$i];
	echo "<tr><td>".$i."</td><td>".$_POST['categ_order_'.$i]."</td><td>".$_POST['item_order_'.$i]."</td><td>".$_POST['avail_order_'.$i]."</td><td>".$_POST['req_order_'.$i]."</td></tr>";

}
echo "</table>";
echo "<a href='slip1.php'><input type='submit' value='EDIT'/></a>";
echo  "<input type='submit' value='CONFIRM'/>";

?>	





</div>
  

	

    