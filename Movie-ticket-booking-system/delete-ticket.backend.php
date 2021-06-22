<?php
require 'dbh.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM tickets WHERE id = '$id'";
    if($result = mysqli_query($conn, $sql)){
        $row = mysqli_fetch_assoc($result);
        $ticketTakenSeats = explode(",", $row['seats']);

        $movieId = $row['movie_id'];
        $fetchMovieName = "SELECT * FROM movies WHERE id = '$movieId'";
        $result = mysqli_query($conn, $fetchMovieName);
        $row = mysqli_fetch_assoc($result);
        $movieTakenSeats = explode(",", $row['seats_taken']);
        $movieTotalSeats = $row['seats'];

        $movieNewTotalSeats = $movieTotalSeats + count($ticketTakenSeats);

        //remove the taken seats in movies table
        for($i = 0; $i < count($movieTakenSeats); $i++){
            for($j = 0; $j < count($ticketTakenSeats); $j++){
                //if found
                if($movieTakenSeats[$i] == $ticketTakenSeats[$j]){
                    array_splice($movieTakenSeats, $i, 1);
                } 
            }
        }

        $movieTakenSeats = implode(',', $movieTakenSeats);

        //sql to update both seats taken and total seats remaining in movie and delete the ticket finally
        $sql = "UPDATE movies 
                SET seats = '$movieNewTotalSeats', seats_taken = '$movieTakenSeats'
                WHERE id = '$movieId';";
        

        if(mysqli_query($conn, $sql)){
            $sql = "DELETE FROM tickets WHERE id = '$id';";
            if(mysqli_query($conn, $sql)){
                header("location: user-tickets.php?success");   
                exit();
            }
            
        }
    }
    else{
        die("mysql error");
    }
    
}
else{
    header("location: user-tickets.php?err");
}

