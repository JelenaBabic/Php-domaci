<?php
session_start();
require 'dbcon.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body> 



<nav class="navbar navbar-expand navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">Tennis Tournaments</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample02">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="navbar-brand" href="players.php">Players <span class="sr-only">(current)</span></a>
          </li>
          
        </ul>
        <form class="form-inline my-2 my-md-0">
          <input class="form-control" type="text" placeholder="Search">
        </form>
      </div>
</nav>
<br>



<div class="container">

<?php include('message.php');?>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Add Player
            <a href="players.php" class="btn btn-danger float-end">Back</a>
          </h4>
          <div class="card-body">

            <form action="code.php" method="POST">
              <div class="mb-3">
                <label>Name:</label>
                <input type="text" name="name" class="form-control">
              </div>
              <div class="mb-3">
                <label>Surname:</label>
                <input type="text" name="surname" class="form-control">
              </div>
              <div class="mb-3">
                <label>Country:</label>
                <input type="text" name="country" class="form-control">
              </div>
              <div class="mb-3">

              <?php
              $mysqli = NEW MySQLi ('localhost', 'root', '', 'tennis');

              $resultSet=$mysqli->query("SELECT * FROM tournaments");
              
              ?>
              <select name="tournament" id="tour">
                <?php
                while($rows = $resultSet->fetch_assoc()){
                  $name=$rows['name'];
                  $id=$rows['id'];
                  echo "<option value='$id'>$name</option>";
                }
                ?>
              </select>
                 
              </div>

              <div class="mb-3">
                <button type="submit" name="save_player" class="btn btn-primary">Save</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>