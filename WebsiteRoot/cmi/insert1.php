<?php

	require_once('../Includes/SessionAuth.php');
	
	require_once('../Includes/FeedbackLayout.php');

	drawHeader("Store Incharge");

?>

<script type="text/javascript" src="JS/AddBranchJS.js"></script>

<div>
  <div class="divContent" id="divAdd">
      <h1>Insert Into Inventory</h1>
	<hr/>
<br/><br/>

<h2>Whether already exists?</h2>
<form action="InsertAlreadyExist.php" method="post">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="btn1" value="Already Exist"/>

</form>
<form action="check_category.php" method="post">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="btn2" value="New Material"/>

</form>

<br/><br/><br/><br/><br/>
<a href="function.php"><input type="submit" value="BACK"></a>

</div>
</div>