<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chats";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$msg = $_POST["message"];
$name = $_POST["name"];

 
        
        // Prepare an insert statement
        $sql = "INSERT INTO message(username, message) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_chats);
            
            // Set parameters
            $param_username = $name;
            $param_chats = $msg; // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
               echo "added";
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    
    
    // Close connection
    mysqli_close($conn);


?>
