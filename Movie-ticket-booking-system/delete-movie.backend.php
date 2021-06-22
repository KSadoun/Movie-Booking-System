<?php
require 'dbh.php';

if(isset($_GET['id'])){
    $movieId = $_GET['id'];

    //delete all tickets related to the movie and the movie itself
    $sql = "DELETE FROM tickets WHERE movie_id = '$movieId'";
    $a = mysqli_query($conn, $sql);

    $sql = "DELETE FROM movies WHERE id = '$movieId'";
    $b = mysqli_query($conn, $sql);

    if($a && $b){
        header('location: movies-list.php');
        exit();
    }
    else{
        die('MYSQL ERROR');
    }

}
else{
    header('location: movies-list.php');
}