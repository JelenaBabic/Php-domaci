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
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
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
          <h4>Edit Tournament
            <a href="index.php" class="btn btn-danger float-end">Back</a>
          </h4>
          <div class="card-body">

          <?php
            if(isset($_GET['id'])){
                $tournament_id = mysqli_real_escape_string($con, $_GET['id']);
                $query = "SELECT * FROM tournaments WHERE id='$tournament_id' ";
                $query_run = mysqli_query($con, $query);

                if(mysqli_num_rows($query_run)>0){

                    $tournament = mysqli_fetch_array ($query_run);
                    ?>
                         <form action="code.php" method="POST">

                         <input type="hidden" name="tournament_id" value="<?=$tournament['id']; ?>">

                            <div class="mb-3">
                                <label>Name:</label>
                                <input type="text" name="name" value="<?= $tournament['name'];?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Location:</label>
                                <input type="text" name="location" value="<?= $tournament['location'];?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Type:</label>
                                <input type="text" name="type" value="<?= $tournament['type'];?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update" class="btn btn-primary">Update</button>
                            </div>

                         </form>
                    <?php

                }
                else{
                    echo "<h4>Not found</h4>";
                }
            }
          ?>



           
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