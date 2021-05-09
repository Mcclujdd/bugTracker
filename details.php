<?php
define('__ROOT__',dirname(__FILE__));
include('scripts/mysqlAccess.php');

if(isset($_GET['id'])){
  $id = mysqli_real_escape_string($conn, $_GET['id']);

  $sql = "SELECT * FROM tickets WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  $ticket = mysqli_fetch_assoc($result);

  mysqli_free_result($result);
  mysqli_close($conn);

}


 ?>


<html lang="en" dir="ltr">

<?php include('templates/_header.php'); ?>

<h2>Details page</h2>
<p></p>

<?php include(__ROOT__.'/templates/_footer.php'); ?>
</html>
