<?php
$m = new MongoClient();
$db = $m->DBTeam;
$collection = $db->UserDetails;

$Rec['Fname']=$_POST["Fname"];
$Rec['lname']=$_POST["Lname"];
$Rec['Mname']=$_POST["Mname"];
$Rec['email']=$_POST["email"];
$Rec['password']=$_POST["password"];
$Rec['Username']=$_POST["username"];

$collection->insert($Rec);
session_start();
	$_SESSION['username'] = $username1;
	$_SESSION['logged_in'] = true;
	echo '<script>window.location = "SignInSucess.php";</script>';
?>
