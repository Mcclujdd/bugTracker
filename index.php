<?php
define('__ROOT__',dirname(__FILE__));

//database access
require_once(__ROOT__.'/scripts/mysqlAccess.php');

//test for POST data
if(isset($_POST['submit'])){
  echo htmlspecialchars('EID: '.$_POST['error']).'</br>';
  echo htmlspecialchars('Description: '.$_POST['description']).'</br>';
}else{
  echo "</br><strong>'Submit' not posted</strong>";
}

//submit form data to database
$error=mysqli_real_escape_string($conn, $_POST['error']);
$description=mysqli_real_escape_string($conn, $_POST['description']);

//query for inserting data
$sqlWrite="INSERT INTO tickets(error,description) VALUES('$error','$description')";

//submit to database and display errors
if (mysqli_query($conn,$sqlWrite)){
  //success
  header();
} else {
  //error
  echo 'query error: ' . mysqli_error($conn);
}
/*##############################################*/

//write query for data from Database
$sqlRead='SELECT * FROM tickets';

//make query and get result
$readResult=mysqli_query($conn, $sqlRead);

//fetch the resulting rows as an array
$tickets=mysqli_fetch_all($readResult, MYSQLI_ASSOC);

//free result from memory
mysqli_free_result($readResult);

//close connection
mysqli_close($conn);

?>


<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="/styles/main.css">
    <title>Bug Tracker</title>
  </head>
    <body>

<!-- jumbotron -->
        <div class="jumbotron jumbotron-fluid" >
          <h1>Dashboard</h1>
        </div>

<!-- navbar -->
<?php require_once(__ROOT__.'/navbar.php'); ?>

<!-- Main Content -->
        <div class="container-fluid " style="background: rgba(60, 136, 63, 0.2)">
          <div class="row">
            <!-- panel for important updates and relevant information that can be dismissed -->
            <div class="panel panel-info"></div>
          </div>
        </div>
<!-- Ticket Information adn manipulation -->
        <div class="container-fluid">
          <table class="table table-fluid table-dark active_tickets" id="ticketTable">
            <h2>Active Tickets</h2>
        </div>

<?php
// require_once(__ROOT__.'/scripts/newTicket.php');
?>

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


<!-- tickets table -->
            <thead>
              <tr>
                <th>ID</th>
                <th>Status</th>
                <th>Description</th>
                <!-- <th>Owner</th> -->
                <th>Error</th>
                <th>Options</th>
              </tr>
            </thead>
              <tbody id="tBody">
              </tbody>

<!-- table contents from database -->
          <?php foreach($tickets as $ticket){ ?>
            <tr>
              <td><a href="details.php?id=<?php echo $ticket['id']?>"><?php echo htmlspecialchars($ticket['id']); ?></a></td>
              <td>(status)</td>
              <td><?php echo htmlspecialchars($ticket['error']); ?></td>
              <!-- <td>(owner)</td> -->
              <td><?php echo htmlspecialchars($ticket['description']); ?></td>
              <td>
                <button class="btn dropdown-toggle" data-toggle="dropdown" data-target="ticketOptions">Options</button>
                <div class="dropdown-menu" id="ticketOptions">
                  <a class="dropdown-item" href="#">Export</a>
                  <a class="dropdown-item" href="#">Squash</a>
                  <a class="dropdown-item" href="#">Edit</a>
                  <a class="dropdown-item" href="#" onclick="deleteTicket(this)">Delete</a>
                </div>
              </td>
            </tr>
          <?php } ?>
        </table>

<!-- scripts -->
  <div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </div>
    <script src="scripts/new_ticket.js"></script>
  </body>
</html>
