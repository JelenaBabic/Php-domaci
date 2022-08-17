<?php
// $con = mysqli_connect("localhost", "root", "", "tennis");
include("dbcon.php");
// $_GET = "";
$ime = $_POST['name'];

 $query = "SELECT * FROM tournaments WHERE name LIKE '%{$ime}%'";

$query_run = mysqli_query($con, $query);

if(mysqli_num_rows($query_run)>0){
    while($tournament = mysqli_fetch_assoc($query_run)){
        ?>

    <tr>
        <td><?= $tournament['id'];?></td>
        <td><?= $tournament['name'];?></td>
        <td><?= $tournament['location'];?></td>
        <td><?= $tournament['type'];?></td>
        <td><a href="tournament-view.php?id=<?=$tournament['id'];?>" class="btn btn-info btn-sm">View</a></td>
        <td><a href="tournament-edit.php?id=<?=$tournament['id'];?>"class="btn btn-success btn-sm">Edit</a></td>
                           
        <form action="code.php" method="POST">
             <td><button type="submit" name="delete" value="<?= $tournament['id'];?>"class="btn btn-danger btn-sm">Delete</button></td>
        </form>
    </tr>


<?php
    }
}

?>