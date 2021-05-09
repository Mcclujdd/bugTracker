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
<div class="conatiner card col-md-6">
  <?php if($ticket): ?>
    <h4><?php echo htmlspecialchars($ticket['error']); ?></h4>
    <h1><?php echo htmlspecialchars($ticket['description']); ?></h1>
  <?php else: ?>
    <h1>No Ticket reference available.</h1>
  <?php endif; ?>
</div>
<?php include(__ROOT__.'/templates/_footer.php'); ?>
</html>
