<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<title>Sell-it-Easy | Homepage</title>
	<link rel="stylesheet" type="text/css" href="CSS.css">

<script>
$(document).ready(function (){
	$('button').click(function() {
	var str = "AddToWishlist.php?id=" + $(this).attr('id');
	window.location = str;
});
});

</script>

</head>
	<body id="SigninSuccessBody">
	<div id="main">
	<?php 
	session_start();
      if(!isset($_SESSION['logged_in'])) {
		   header("Location: SignIn.php"); 
	  } 
      
?>
		<h1> &nbsp Welcome<?php
		$Person = $_SESSION['username']; 
		echo " " . $Person;
		?></h1>
		<div style="float:left"><a href = postadd.php>Post an Ad</a> | <a href = postEvent.php>Post an Event</a> | <?php echo "<a href = ViewMyAds.php?id=$Person>My Ads</a>";?> | <?php echo "<a href = ViewMyEvents.php?id=$Person>My Events</a>";?></div>
		<div style="float:right"> <?php echo "<a href = Wishlist.php?id=$Person>Wishlist</a>";?> | <?php echo "<a href= editProfile.php?id=$Person>Edit Profile</a>"?> | <a href= Logout.php>Log Out</a></div>
		<br><br>
	
	<?php
		$m = new MongoClient();
		$db = $m->DBTeam;
		$collection = $db->ItemDetails;
	$cursor = $collection->find();
	?>
	<div id="viewAds"> 
	All Ads: 
	<table border=0>
		<tr bgcolor='#CCCCCC'>
		<td>Name</td>
		<td>Description</td>
		<td>Cost</td>
		<td>Condition</td>
		<td>Phone Number</td>
		<td>Address</td>
		<td>Category</td>
		</tr>
		<?php
		foreach($cursor as $res){
			
			
			echo '<tr>';
            echo '<td>'.$res["ItemName"].'</td>';
            echo '<td>'.$res["Description"].'</td>';
            echo '<td>'.$res["Cost"].'</td>';   
            echo '<td>'.$res["condition"].'</td>';    
            echo '<td>'.$res["Phone"].'</td>';
            echo '<td>'.$res["Address"].'</td>';
            echo '<td>'.$res["Category"].'</td>';
           
		}
		
		?>
	</table>
	</div>
	<br><br>
	<div id="viewEvents">
	Upcoming Events:
		<table border=0>
		<tr bgcolor='#CCCCCC'>
		<td>Name</td>
		<td>Description</td>
		<td>Date</td>
		<td>Place</td>
		<td>Image</td>
		</tr>
		<?php
		$collection2 =$db->EventDetails;
		$qry = array("Flag" => 1);
		$cursor = $collection2->find($qry);
		foreach($cursor as $res){
			echo '<tr>';
            echo '<td>'.$res["EventName"].'</td>';
            echo '<td>'.$res["Description"].'</td>'; 
            echo '<td>'.$res["EventDate"].'</td>';   
            echo '<td>'.$res["Address"].'</td>';
			}
		?>
	</table>
	</div><br>
	<div id="viewExpiredEvents">
	Expired Events:
		<table border=0>
		<tr bgcolor='#CCCCCC'>
		<td>Name</td>
		<td>Description</td>
		<td>Date</td>
		<td>Place</td>
		<td>Image</td>
		</tr>
		<?php
		$collection3 =$db->EventDetails;
		$qry = array("Flag" => 0);
		$cursor = $collection3->find($qry);
			foreach($cursor as $res){
			echo '<tr>';
            echo '<td>'.$res["EventName"].'</td>';
            echo '<td>'.$res["Description"].'</td>'; 
            echo '<td>'.$res["EventDate"].'</td>';   
            echo '<td>'.$res["Address"].'</td>';
			}	
		?>
	</table>
	</div>
	</div>
	</body>
</html>

