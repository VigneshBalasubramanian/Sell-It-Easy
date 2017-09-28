<?php
$username1 = $_POST["name"];
$password1 = $_POST["password"];

$m = new MongoClient();
$db = $m->DBTeam;
$collection = $db->UserDetails;

$qry = array("UserName" => $username1,"password" =>$password1);
$row = $collection->findOne($qry);
if ($row){
	session_start();
	$_SESSION['username'] = $username1;
	$_SESSION['logged_in'] = true;
	echo '<script>window.location = "SignInSucess.php";</script>';
}
else{
	echo "<br><br><br><br><center><b>Invalid Username/Password!! Please try again.</b></center>";
	echo '<script>setTimeout(function () {window.location = "SignIn.php";}, 2000)</script>';
}


?>
