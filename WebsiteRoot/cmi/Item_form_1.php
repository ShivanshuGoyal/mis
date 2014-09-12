<?php
@session_start();
    $_SESSION['DES']=$_GET['DES'];
		$_SESSION['CODE']=$_GET['CODE'];
		header('Location: item_form.php');


?>