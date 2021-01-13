<?php
define('__ROOT__',dirname(dirname(__FILE__)));

//database access
include(__ROOT__.'/scripts/mysqlAccess.php');
?>


<html lang="en" dir="ltr">
<?php include(__ROOT__.'/templates/_header.php'); ?>

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
<?php include(__ROOT__.'/templates/_footer.php'); ?>
</html>
