<?php
define('__ROOT__',dirname(__FILE__));

// database access
require_once(__ROOT__.'/scripts/mysqlAccess.php');

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
  <?php include(__ROOT__.'/templates/_header.php'); ?>
  <!-- jumbotron -->
        <div class="jumbotron jumbotron-fluid" >
          <h1>Dashboard</h1>
        </div>
<?php
// require_once(__ROOT__.'/scripts/newTicket.php');
?>

<button class="btn btn primary info-success" type="button" name="button">
  <a href="add_ticket.php">Add Ticket</a>
</button>

<!-- Ticket Information adn manipulation -->
      <div class="container-fluid">
        <table class="table table-fluid table-dark active_tickets" id="ticketTable">
          <h2>Active Tickets</h2>
      </div>





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
                  <a class="dropdown-item" href="scripts/delete_ticket.php">Delete</a>
                  <!-- <a class="dropdown-item" href="#" onclick="deleteTicket(this)">Delete</a> -->
                </div>
              </td>
            </tr>
          <?php } ?>
        </table>

<!-- scripts -->
  <?php include(__ROOT__.'/templates/_footer.php'); ?>
</html>
