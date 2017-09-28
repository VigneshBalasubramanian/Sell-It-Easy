<?php
	$servername='ec2-52-39-126-180.us-west-2.compute.amazonaws.com';
	$username='root';
	$password='root';
	mysql_connect($servername, $username, $password);
	mysql_select_db('cs687_teamproject');
	$id = $_GET['id'];
	session_start();
	$Username = $_SESSION['username'];
	mysql_query("DELETE FROM Wishlist WHERE Item_ID = '$id' and User_name= '$Username'") ;
	echo "<script>window.location = 'Wishlist.php?id=$Username';</script>"
?>