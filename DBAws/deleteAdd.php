<?php
	//include("config.php");
	$servername='ec2-52-39-126-180.us-west-2.compute.amazonaws.com';
	$username='root';
	$password='root';

	mysql_connect($servername, $username, $password);
	mysql_select_db('cs687_teamproject');
	$id = $_GET['id'];
	mysql_query("DELETE FROM Wishlist WHERE Item_ID = $id ") or die("Delete  1 Error " . mysql_errno().":" .mysql_error());
	mysql_query("DELETE FROM Category WHERE Item_ID = $id ") or die("Delete  2 Error " . mysql_errno().":" .mysql_error());
	mysql_query("DELETE FROM Item_Details WHERE Item_ID = $id ") or die("Delete Error " . mysql_errno().":" .mysql_error());
	echo '<script>window.location = "SignInSucess.php";</script>';
?>