<?php
require_once('../Includes/SessionAuth.php');
	
	require_once('../Includes/FeedbackLayout.php');

	drawHeader("AEE");
$_SESSION['DEP']='Electrical';
?>

<h1 class="page-head">AEE</h1>
<div>
<div class="divContent" id="divAdd">
      <h2>View Inventory</h2>
	<form action="view_inventory.php" method="POST">
	<input type="submit"  value="VIEW" name="submit"/>
       </form>

<h2>Validate Item</h2>
	<form action="validate_item.php" method="POST">
	<input type="submit"  value="VALIDATE" name="submit"/>
       </form>


<h2>Validate Category</h2>
	<form action="validate_ct.php" method="POST">
	<input type="submit"  value="VALIDATE" name="submit"/>
       </form>

</div>
</div>