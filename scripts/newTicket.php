<?php
require_once(__ROOT__.'/scripts/mysqlAccess.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

<section class="container grey-text">

  <form action="index.php" action="index.php" method="POST">
    <label>Error Message</label>
    <input type="text" name="error">
    <label>Description of Error</label>
    <textarea type="text" name="description"></textarea>
    <!-- <label>Placeholder</label>
    <input type="text" name="placeholder"> -->
  <div>
    <input type="submit" name="submit" value="Submit New Ticket" class="btn btn-primary bg-success">
  </div>
  </form>

</body>
</html>
