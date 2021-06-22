<?php 
require 'dbh.php';
require 'admin-header.php';
?>


<div class="container my-3">

    <table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Movie Name</th>
            <th scope="col">Available seats</th>
            <th scope="col">Price</th>
            <th scope="col">theater</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>

        <?php

            $sql = "SELECT * FROM movies ORDER BY id DESC";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {

                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {

                    echo '
                    <tr>
                        <td>'. $row["name"] .'</td>
                        <td>'. $row["seats"] .'</td>
                        <td>'. $row["price"] .'</td>
                        <td>'. $row["theater"] .'</td>
                        <td>
                            <a href="delete-movie.backend.php?id='.$row['id'].'" class="text-danger">delete</a>
                        </td>
                    </tr>
                    ';

                }
            }
            
        
        ?>
        
    </tbody>
    </table>

</div>