<?php
    
    //Connect to the database
    $host = "127.0.0.1";
    $user = "pp0029";                           //Your Cloud 9 username
    $pass = "";                                  //Remember, there is NO password by default!
    $db = "cs687_teamproject";                        //Your database name you want to connect to
    $port = 3306;   
    
    
    $connection = mysql_connect($host, $user, $pass)or die(mysql_error());
    // $db = new mysqli($servername, $username, $password, $database, $dbport);

     
  /*  if ($connection->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 
    echo "Connected successfully (".$db->host_info.")";*/
   
    //And now to perform a simple query to make sure it's working
   /* $query = "SELECT * FROM User_Details";
    $result = mysql_query($connection, $query);
    while ($row = mysqli_fetch_assoc($result)) {
       echo "The ID is: " . $row['F_Name'] . " and the Username is: " . $row['Email_ID'];
    }*/
?>