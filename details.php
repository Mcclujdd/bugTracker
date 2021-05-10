<?php
define('__ROOT__',dirname(__FILE__));

//database access
include(__ROOT__.'/scripts/mysqlAccess.php');


if(isset($_POST['delete'])){
  $id_to_delete = mysqli_real_escape_string($conn, $_POST['id-to-delete']);

   $sql = "DELETE FROM tickets WHERE id = $id_to_delete";

  if(mysqli_query($conn, $sql)){
    header('Location: index.php');
  } else {
    echo 'query error: ' . mysqli_error($conn);
  }
}


if(isset($_GET['id'])){
  $id = mysqli_real_escape_string($conn, $_GET['id']);

  $sql = "SELECT * FROM tickets WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  $ticket = mysqli_fetch_assoc($result);

  mysqli_free_result($result);
  mysqli_close($conn);

}


 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php include('templates/_header.php'); ?>

<h2>Details page</h2>
<div class="conatiner card col-md-6">
  <?php if($ticket): ?>
    <h4><?php echo htmlspecialchars($ticket['error']); ?></h4>
    <h1><?php echo htmlspecialchars($ticket['description']); ?></h1>

    <!-- delete -->
    <form action="details.php" method="POST">
      <input type="hidden" name="id-to-delete" value="<?php echo $ticket['id']; ?>">
      <input type="submit" name="delete" value="Delete" class='btn'>
    </form>
  <?php else: ?>
    <h1>No Ticket reference available.</h1>
  <?php endif; ?>
</div>
<?php include('templates/_footer.php'); ?>
</html>
