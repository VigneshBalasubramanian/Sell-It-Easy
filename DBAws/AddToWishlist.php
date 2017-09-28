<?php
$servername='ec2-52-39-126-180.us-west-2.compute.amazonaws.com';
$username='root';
$password='root';

	mysql_connect($servername, $username, $password);
	mysql_select_db('cs687_teamproject');
	$id = $_GET['id'];
	session_start();
	$Username = $_SESSION['username'];
	mysql_query("INSERT INTO Wishlist (User_name,Item_ID) VALUES ('$Username','$id')") ;
	echo "<script>window.location = 'SignInSucess.php?';</script>";
?>