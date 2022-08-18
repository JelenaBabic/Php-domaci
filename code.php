<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete'])){

    $tournament_id =  mysqli_real_escape_string($con, $_POST['delete']);

    $query = "DELETE FROM tournaments WHERE id='$tournament_id' ";

    $query_run = mysqli_query($con, $query);

    if($query_run){

        $_SESSION['message'] = "Tournament deleted successfully";
        header("Location: index.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "Tournament not deleted";
        header("Location: index.php");
         exit(0);
    
    }

}


if(isset($_POST['update'])){

    $tournament_id =  mysqli_real_escape_string($con, $_POST['tournament_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $type = mysqli_real_escape_string($con, $_POST['type']);

    $query = "UPDATE tournaments SET name='$name', location='$location', type='$type' WHERE id='$tournament_id' ";

    $query_run = mysqli_query($con, $query);

    if($query_run){

        $_SESSION['message'] = "Tournament updated successfully";
        header("Location: index.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "Tournament not updated";
        header("Location: index.php");
         exit(0);
    
    }

}

if(isset($_POST['save'])){

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $type = mysqli_real_escape_string($con, $_POST['type']);

    $query ="INSERT INTO tournaments (name, location, type) VALUES ('$name', '$location', '$type') ";

    $query_run = mysqli_query($con, $query);


    if($query_run){

        $_SESSION['message'] = "Tournament created successfully";
        header("Location: tournament-create.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "Tournament not created";
        header("Location: tournament-create.php");
         exit(0);
    
    }

}



if(isset($_POST['delete_player'])){

    $player_id =  mysqli_real_escape_string($con, $_POST['delete_player']);

    $query = "DELETE FROM players WHERE id='$player_id' ";

    $query_run = mysqli_query($con, $query);

    if($query_run){

        $_SESSION['message'] = "Player deleted successfully";
        header("Location: players.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "Player not deleted";
        header("Location: player.php");
         exit(0);
    
    }

}


if(isset($_POST['update_player'])){

    $player_id =  mysqli_real_escape_string($con, $_POST['player_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $surname = mysqli_real_escape_string($con, $_POST['surname']);
    $country = mysqli_real_escape_string($con, $_POST['country']);
    $tournament = mysqli_real_escape_string($con, $_POST['tournament']);

    $query = "UPDATE players SET name='$name', surname='$surname', country='$country', tournament_id='$tournament' WHERE id='$player_id' ";

    $query_run = mysqli_query($con, $query);

    if($query_run){

        $_SESSION['message'] = "Player updated successfully";
        header("Location: players.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "Player not updated";
        header("Location: players.php");
         exit(0);
    
    }

}


if(isset($_POST['save_player'])){

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $surname = mysqli_real_escape_string($con, $_POST['surname']);
    $country = mysqli_real_escape_string($con, $_POST['country']);
    $tournament = mysqli_real_escape_string($con, $_POST['tournament']);

    $query ="INSERT INTO players (name, surname, country, tournament_id) VALUES ('$name', '$surname', '$country', '$tournament') ";

    $query_run = mysqli_query($con, $query);


    if($query_run){

        $_SESSION['message'] = "Player created successfully";
        header("Location: player-create.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "Player not created";
        header("Location: player-create.php");
         exit(0);
    
    }

}

?>