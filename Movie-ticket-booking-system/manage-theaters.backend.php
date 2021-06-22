<?php
require 'dbh.php';

$name = $_POST['name'];
$seats = $_POST['seats'];
$price = $_POST['price'];


$sql = "INSERT INTO theaters(name, seats, price) VALUES ('$name', '$seats', '$price')";
if(mysqli_query($conn, $sql)){
    header("location: manage-theaters.php?success");
}
else{
    die("mysql error");
}

