<?php
	
	header("Location:function.php");
	/*@session_start();
define("SERVER_NAME", "http://localhost/series/project");
	if(!isset($_SESSION['username'])) {
		header("Location: ../login.php");		
		exit;
		}*/
		require_once("../Includes/Auth.php");
	require_once("../Includes/ConfigSQL.php");
	require_once("../Includes/Layout.php");	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Please login to continue</title>
</head>
<link rel="stylesheet" type="text/css" href="../../css/mis-layout.css" />
<link rel="stylesheet" type="text/css" href="../../css/login.css" />
<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/mis-layout.js"></script>

<body>
	<div class="container">
       	<font size="+1"><h1 class="page-head">Campus Maintenance</h1></font>
		<div class="notification success">
        
            You are currently logged in as <strong><?php echo $_SESSION["username"]; ?></strong>.<br />
            If this is not you, <a href="Logout.php">click here</a>.
        </div>
        
        <div class="notification">
        <h2>You will be granted access for the following user:</h2><br />
        <font size="+3">
        <table align="center" cellpadding="10" cellspacing="10" nozebra>
        	<tr>
            	<th>User ID</th>
                <td><?php echo $_SESSION['username']; ?></td>
            </tr>

        	<tr>
            	<th>Auth Type</th>
                <td><?php echo $_SESSION['designation']; ?> </td>
            </tr>
            
        	<tr>
                <td colspan="2" align="center">
                    <button onclick="javascript:window.location='function.php'">Proceed</button>
                    <button onclick="javascript:window.location='Login.php?logout=true'" class="error">cancel</button>
                </td>
            </tr>

        </table>
        </font>
        </font>
    </div>
</body>
</html>