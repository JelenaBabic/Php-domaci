<?php
$con = mysqli_connect("localhost", "root", "", "tennis");
$query = "SELECT * FROM tournaments";
$query_run = mysqli_query($con, $query);
if(mysqli_num_rows($query_run)>0){
    foreach($query_run as $row){

        echo '<td>' .$row['id'] .'</td>';
        echo '<td>' .$row['name'] .'</td>';
        echo '<td>' .$row['location'] .'</td>';
        echo '<td>' .$row['type'] .'</td>';
        echo "<a href='tournament-view.php?id=" .
        $row['id'] .
        "' class='button_up'>
                View
                </a>";
         echo "<a href='tournament-view.php?id=" .
             $row['id'] .
             "' class='button_up'>
                View
                </a>";               
          echo "<a href='tournament-view.php?id=" .
             $row['id'].
             "' class='button_up'>
                View
                 </a></tr>";

        }
    }




?>