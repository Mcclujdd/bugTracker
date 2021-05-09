<?php
//modify the following data according to specific database information
$servername = 'localhost';
$username = 'phpaccess';
$password = '1234';
$db = 'bugTracker';
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}

?>
