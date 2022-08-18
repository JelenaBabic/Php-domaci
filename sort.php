<?php
include("dbcon.php");

$output = '';  
$order = $_POST["order"];  
if($order == 'desc')  
{  
     $order = 'asc';  
}  
else  
{  
     $order = 'desc';  
}  

$query="SELECT * FROM tournaments ORDER BY name ".$_POST["order"]."";

$query_run = mysqli_query($con, $query);
$output .='<table class="table table-bordered table-striped">
            <thead>
            <tr>
                    <th>ID</th>
                    <th><a  class="column_sort" id="name" data-order="'.$order.'" href="#"></a>Tournament name</th>
                    <th>Location</th>
                    <th>Type of tournament</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
            </tr>
            </thead>';
echo $output;

if(mysqli_num_rows($query_run)>0){
    while($tournament = mysqli_fetch_array($query_run)){
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
</table>
<?php

?>