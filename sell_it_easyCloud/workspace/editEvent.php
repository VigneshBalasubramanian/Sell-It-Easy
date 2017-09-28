<?php
$servername = "localhost";
$username = "root";
$password = "pr@sh@nth1@";
//mysql_connect($servername, $username, $password);
	require_once("connect.php");
mysql_select_db('cs687_teamproject');

if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $name=$_POST['name'];
    $Description=$_POST['Description'];
    $Addr=$_POST['Address'];    
	$Date = date("Y-m-d",strtotime($_POST['Event_date']));
           
    mysql_query("UPDATE Event_Details SET Event_name='$name', Event_Description='$Description', Place='$Addr',Event_date='$Date' WHERE Event_ID= $id") or die("Error!!");
        
    echo '<script>window.location = "SignInSucess.php";</script>';
}
?>
<?php

$id = $_GET['id'];

$result = mysql_query("SELECT * FROM Event_Details WHERE Event_ID= '$id'");
 
while($res = mysql_fetch_array($result))
{
    $name = $res["Event_name"];
	$Description = $res["Event_Description"];
	$Date = date("Y-m-d",strtotime($res["Event_date"]));
	$Addr = $res["Place"];
}
?>
<html>
<head>    
    <title>Edit Event</title>
	<link rel="stylesheet" type="text/css" href="Css.css">
</head>
 
<body>
    <a href="SignInSucess.php" style="float:left">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="editEvent.php">
        <table border="0">
            <tr> 
                <td><h1 class="editAddH1">Name</h1></td>
                <td><input type="text" name="name" value="<?php echo $name;?>" required></td>
            </tr>
			<tr> 
                <td><h1 class="editAddH1">Description</h1></td>
                <td><input type="text" name="Description" value="<?php echo $Description;?>" required></td>
            </tr>
			<tr>
				<td><h1 class="editAddH1">Event Date:</h1></td>
				<td><input type="date" name="Event_date" value="<?php echo $Date?>" required/>
				</td>
			</tr>
			<tr> 
                <td><h1 class="editAddH1">Address</h1></td>
                <td><input type="text" name="Address" value="<?php echo $Addr;?>"/></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>