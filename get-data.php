<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "chats";

   $conn = mysqli_connect($hostname, $username, $password);


if(!$conn) {
die("Connection failed: ");
}
mysqli_select_db( $conn, $dbname);
?>

 <?php 
 

$table = mysqli_query($conn, "select * from message");

while ($row = mysqli_fetch_array($table))
{
?>

 <p>
<?php echo "Name:". $row["username"]; ?></p>
 <p>
<?php echo "Message:".$row["message"]; ?></p>
 <?php

}
?>