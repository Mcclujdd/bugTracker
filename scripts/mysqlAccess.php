<?php
$servername = '192.168.1.149';
$username = 'root';
$password = 'turn';
$db = 'bugTracker';
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>
