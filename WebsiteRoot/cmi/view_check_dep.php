<?php
@session_start();
if(isset($_POST['btn']))
{
$_SESSION['DEP']=$_POST['dep'];

//header("Location: check_category_civil.php");

header("Location: view_ct.php");
}

require_once('../Includes/SessionAuth.php');



require_once('../Includes/FeedbackLayout.php');

	drawHeader("Store Incharge");

?>


<div align="center">
  <div class="divContent" id="divAdd">
      <h1>View Inventory</h1>
	<hr/>
<br/><br/>

<h2><strong>Select the department:-</strong></h2>
<form action="view_check_dep.php" method="POST">
<select name="dep"><option>Electrical</option><option>Civil</option></select>
<input type="submit" name="btn" value="SUBMIT">
</form>
<br/><br/><br/><br/><br/><br/><a href="function.php"><input type="submit" name="btn" value="BACK"></a>
</div>
</div>