<html>
	<head><title>Post-an-Event</title>
		<link rel="stylesheet" type="text/css" href="CSS.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	</head>
	<body id="postAddBody">
	<?php 
		session_start();
      if(!isset($_SESSION['logged_in'])) {
		   header("Location: SignIn.php"); 
	  } ?>	
	<a href="SignInSucess.php" style="float:left">Home</a>
	<a href="Logout.php" style="float:right">Logout</a>
	<center>
		<h2 id="postAddH1"> Post an Event </h2>
		<form method="post" enctype="multipart/form-data">
		<table border="0">
			<tr><td><h2 class="postAddH2">Event Name:</h2></td><td>  <input type="text" name="EventName" required /></td></tr>
			<tr><td><h2 class="postAddH2">Description:</h2></td><td><input type="text" name="Description" required/></td></tr>
			<tr><td><h2 class="postAddH2">Place:</h2></td><td><input type="text" name="Place" required/></td></tr>
			<tr><td><h1>Event Date:</h1></td><td><input type="date" name="EventDate" required/></td></tr>
			<tr><td><h2 class="postAddH2">Image (Max 8Mb): </h2></td> <td> <input type="file" name="image" required/></td></tr>
		</table><br><br>
			<input type="submit" name="sumit" value="Post Event" />
			<input id="submit1" type="reset" value="Clear"/>
		</form>
	</center>
		<?php
			if(isset($_POST['sumit']) && !empty($_POST['sumit'])){
				if(getimagesize($_FILES['image']['tmp_name']) == FALSE){
					echo '<script>alert("Please select an Image.")';
				}
				else {
					
					$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
					
					saveimage($image);
				}
			}
			
			function saveimage($image){
				$Rec['EventName'] = $_POST["EventName"];
				$Rec["Description"] = $_POST["Description"];
				$Rec["EventDate"] = date("Y-m-d",strtotime($_POST["EventDate"]));
				if($Rec["EventDate"] < date('YYYY-mm-dd')){
					$Rec["Flag"] = 0;
				}
				else{
					$Rec["Flag"] = 1;
				}
				$Rec["Address"] = $_POST["Place"];
				$Rec["EventID"] = rand();
				$m = new MongoClient();
				$db = $m->DBTeam;
				$collection = $db->EventDetails;
				$collection->insert($Rec);
					echo '<script>alert("Event posted sucessfully!!");window.location = "SignInSucess.php";</script>';
					
			}
		?>
	</body>
</html>