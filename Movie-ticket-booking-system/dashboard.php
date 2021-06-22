<?php require 'dbh.php'; require 'header.php'; ?>

<div class="container bg-light p-5 my-3">

    <!-- search form -->
    <form class="input-group md-form form-sm form-1 pl-0" action="search-movies.php" method="POST">
        <div class="input-group-prepend">
            <span class="input-group-text pink lighten-3" id="basic-text1"><i class="fa fa-search text-white"
                aria-hidden="true"></i></span>
        </div>
        <input class="form-control my-0 py-1" type="text" name="search" placeholder="Search For A Movie..." aria-label="Search">
    </form>

    <h3 class="my-3">All Movies Available:</h3>

    
    <div class="all-movies">    
    
        <?php


        $sql = "SELECT * FROM movies ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {

            echo  '<div class="align-items-center movie bg-white p-3 mb-3 border">
            
                    <div class="d-flex">
                        <h5>'. $row['name'] .'</h5>
                        <b class="ml-3"><h5 class="text-danger mb-1">Display Date: '. $row['date'] .'</h5></b>
                    </div>

                    <div class="d-flex">
                        <div class="col-3 p-0">
                            <img src="uploads/'. $row['image'] .'" height="100%" width="100%" alt="Movie Image">
                        </div>

                        <div class="col-9 d-grid">
                            <p class="my-2">'. $row['description'] .'</p>
                            <b><p class="text-success mb-1">Seats Available: '. $row['seats'] .'</p></b>
                            <b><p class="text-success mb-1">Price Per Seat: $'. $row['price'] .'</p></b>
                            <a href="book-tickets.php?id='. $row["id"] .'"><button class="btn btn-success mb-1">Book Now</button></a>
                        </div>
                    </div>

                </div>';

            }
        }
    


        ?>

    </div>


</div>



