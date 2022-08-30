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
          <input class="form-control" id="search" type="text" placeholder="Search">
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
          <h4>Players
            <a href="player-create.php" class="btn btn-primary float-end">Add new</a>
          </h4>
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Player's name</th>
                  <th>Player's surname</th>
                  <th>Player's country</th>
                  <th>View</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody id="pp">
                <?php
                  $query = "SELECT * FROM players";
                  $query_run = mysqli_query($con, $query);

                  if(mysqli_num_rows($query_run)>0){
                    foreach($query_run as $player){
                      // echo $tournament['name'];
                      ?>
                        <tr>
                           <td><?= $player['id'];?></td>
                           <td><?= $player['name'];?></td>
                           <td><?= $player['surname'];?></td>
                           <td><?= $player['country'];?></td>
                           
                           <td><a href="player-view.php?id=<?=$player['id'];?>" class="btn btn-info btn-sm">View</a></td>
                           <td><a href="player-edit.php?id=<?=$player['id'];?>"class="btn btn-success btn-sm">Edit</a></td>
                           
                           <form action="code.php" method="POST">
                              <td><button type="submit" name="delete_player" value="<?= $player['id'];?>"class="btn btn-danger btn-sm">Delete</button></td>
                           </form>
                        </tr>
                        <?php

                    }
                  }
                  else{
                    echo"<h5>No players found</h5>";
                  }

                ?>
              </tbody>
            </table>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script> 


<script type="text/javascript">

$(document).ready(function(){

  $("#search").keyup(function(){
    var txt = $(this).val();
    if(txt != ""){
      $.ajax({
        url:"search.php",
        method:"POST",
        data : {
          name:$(this).val(),
      },

        success:function(data){
          $("#pp").html(data);
        }
      });
    }
  })
});
</script>


</body>
</html>