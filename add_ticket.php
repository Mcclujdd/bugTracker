<?php
define('__ROOT__',dirname(__FILE__));

//database access
include(__ROOT__.'/scripts/mysqlAccess.php');

$error = $description = '';
$errors = array('error' => '', 'description' => '');

if(isset($_POST['submit'])){

  if(array_filter($errors)){
    //echo 'errors in the form;'
  } else {

    $error=mysqli_real_escape_string($conn, $_POST['error']);
    $description=mysqli_real_escape_string($conn, $_POST['description']);

    //query for inserting data
    $sqlWrite="INSERT INTO tickets(error,description) VALUES('$error','$description')";

    //submit to database and display errors
    if (mysqli_query($conn,$sqlWrite)){
      //success
      header("Location: index.php");
    } else {
      //error
      echo 'query error: ' . mysqli_error($conn);
    }
  }
}

// test for POST data
if(isset($_POST['submit'])){
  echo htmlspecialchars('EID: '.$_POST['error']).'</br>';
  echo htmlspecialchars('Description: '.$_POST['description']).'</br>';
}else{
  echo "</br><strong>'Submit' not posted</strong>";
}
?>


<html lang="en" dir="ltr">
<?php include(__ROOT__.'/templates/_header.php'); ?>

<section class="container grey-text">

  <form action="add_ticket.php" method="POST">
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
