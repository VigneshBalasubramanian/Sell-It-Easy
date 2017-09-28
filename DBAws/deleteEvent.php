<?php	
	$servername='ec2-52-39-126-180.us-west-2.compute.amazonaws.com';
	$username='root';
	$password='root';

	mysql_connect($servername, $username, $password);
	mysql_select_db('cs687_teamproject');
	$id = $_GET['id'];
	mysql_query("DELETE FROM Event_Details WHERE Event_ID = '$id' ") ;
	echo '<script>window.location = "SignInSucess.php";</script>';
?>	