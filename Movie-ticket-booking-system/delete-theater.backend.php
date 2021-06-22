<?php
require 'dbh.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM theaters WHERE id = '$id'";
    if(mysqli_query($conn, $sql)){
        header("location: manage-theaters.php?success");   
    }
    else{
        die("mysql error");
    }
    
}
else{
    header("location: manage-theaters.php?err");
}

