<?php
	//include("config.php");
	$servername = "localhost";
	$username = "root";
	$password = "pr@sh@nth1@";

	//mysql_connect($servername, $username, $password);
		require_once("connect.php");
	mysql_select_db('cs687_teamproject');
	$id = $_GET['id'];
	mysql_query("DELETE FROM Wishlist WHERE Item_ID = '$id' ") or die("Delete  1 Error " . mysql_errno().":" .mysql_error());
	mysql_query("DELETE FROM Category WHERE Item_ID = '$id' ") or die("Delete  2 Error " . mysql_errno().":" .mysql_error());
	mysql_query("DELETE FROM Item_Details WHERE Item_ID = '$id' ") or die("Delete Error " . mysql_errno().":" .mysql_error());
	echo '<script>window.location = "SignInSucess.php";</script>';
?>
