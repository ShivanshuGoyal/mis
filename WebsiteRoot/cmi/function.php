<?php
	
	require_once("../Includes/Auth.php");
	require_once("../Includes/ConfigSQL.php");
	require_once("../Includes/Layout.php");	


	drawHeader("bmbm");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Please login to continue</title>
</head>

<link rel="stylesheet" type="text/css" href="../css/mis-layout.css" />
<link rel="stylesheet" type="text/css" href="../css/login.css" />
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/mis-layout.js"></script>

<h1 class="page-head">Store Incharge</h1>
		
<div>
  <div class="divContent" id="divAdd">
      <h2>View Inventory</h2>
	<form action="view_check_dep.php" method="POST">
	<input type="submit"  value="VIEW" name="submit"/>
       </form>

	<h2>Insert Into Inventory</h2>
	<form action="Select_Dep.php" method="POST">
	<input type="submit"  value="INSERT" name="submit"/>
       </form>

	

    
  </div>

	
    
    
        
</div>


<?php drawFooter() ?><?php
?>