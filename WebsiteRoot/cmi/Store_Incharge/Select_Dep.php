<?php
session_start();
if(isset($_POST['btn']))
{
$_SESSION['DEP']=$_POST['dep'];
if($_POST['dep']=='Electrical')
header("Location: check_category_elec.php");
else
{
header("Location: check_category_civil.php");
}
}

require_once('../Includes/SessionAuth.php');



require_once('../Includes/FeedbackLayout.php');

	drawHeader("Store Incharge");

?>


<div align="center">
  <div class="divContent" id="divAdd">
      <h1>Insert Into Inventory</h1>
	<hr/>
<br/><br/>

<h2><strong>Select the department:-</strong></h2>
<form action="Select_Dep.php" method="POST">
<select name="dep"><option>Electrical</option><option>Civil</option></select>
<input type="submit" name="btn" value="SUBMIT">
</form>
<br/><br/><br/><br/><br/><br/><a href="function.php"><input type="submit" name="btn" value="BACK"></a>
</div>
</div>