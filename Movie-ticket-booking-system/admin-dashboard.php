<?php require 'dbh.php'; require 'admin-header.php';

//get the number of users, tickets and movies

$userSql = "SELECT * FROM users";
$userResult = mysqli_query($conn, $userSql);
$userNo = mysqli_num_rows($userResult);

$movieSql = "SELECT * FROM movies";
$movieResult = mysqli_query($conn, $movieSql);
$movieNo = mysqli_num_rows($movieResult);

$ticketSql = "SELECT * FROM tickets";
$ticketResult = mysqli_query($conn, $ticketSql);
$ticketNo = mysqli_num_rows($ticketResult);





?>

<div class="container my-3">

    <h3 class="text-center">Statistics</h3>

    <div class="row">

        <div class="col bg-light p-3 text-center mx-2 border">
            <i class="fa fa-user fa-5x mb-2"></i>
            <h3><?php echo $userNo ?></h3>
            <b><h5>Users Registered</h5></b>
        </div>

        <div class="col bg-light p-3 text-center mx-2 border">
            <i class="fa fa-ticket fa-5x mb-2"></i>
            <h3><?php echo $ticketNo ?></h3>
            <b><h5>Tickets Bought</h5></b>
        </div>

        <div class="col bg-light p-3 text-center mx-2 border">
            <i class="fa fa-film fa-5x mb-2"></i>
            <h3><?php echo $movieNo ?></h3>
            <b><h5>Total Movies</h5></b>
        </div>

    </div>
</div>