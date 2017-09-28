<html>
<head>
	<link rel="stylesheet" type="text/css" href="CSS.css">
</head>
<title>Sell-it-Easy | My Ads</title>
	<body>
	<div id="main">
		<h3>Welcome<?php
		session_start();
		$Person = $_SESSION['username']; 
		echo " " . $Person;
		?></h3>
		<div style="float:left"><a href= SignInSucess.php>Home</a></div>
		<div style="float:right"> <a href= Logout.php>Log Out</a></div>
		<br><br>
	
	<?php
	
		$m = new MongoClient();
		$db = $m->DBTeam;
		$collection = $db->ItemDetails;
		$id = $_GET['id'];
		$qry=array("Username" => $id);
		$cursor = $collection->find($qry);
		
		
	?>
	<div id="viewAds"> 
	My Ads: 
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
	</div>
	</body>
</html>

