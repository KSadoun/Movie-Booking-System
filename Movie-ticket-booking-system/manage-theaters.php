<?php require 'dbh.php'; require 'admin-header.php'; ?>

<div class="bg-light p-3 my-3 border w-50 mx-auto">
    <form action="manage-theaters.backend.php" method="POST">
        <h3 class="text-center">Add New Theater</h3>
        <div class="">
        
            <label for="">Theater Name: </label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="">
            <label for="">No. of seats: </label>
            <input type="number" name="seats" min="1" class="form-control" required>
        </div>

        <div class="">
            <label for="">Price Per Seat: </label>
            <input type="number" name="price" min="20" class="form-control" required>
        </div>

        <button class="btn btn-primary" name="submit">Add Theater</button>

    </form>

</div>


<div class="container ">

    <table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Theater Name</th>
            <th scope="col">Number of seats</th>
            <th scope="col">Price</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>

        <?php

            $sql = "SELECT * FROM theaters ORDER BY id DESC";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {

                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {

                    echo '
                    <tr>
                        <td>'. $row["name"] .'</td>
                        <td>'. $row["seats"] .'</td>
                        <td>'. $row["price"] .'</td>

                        <td>

                            <a href="delete-theater.backend.php?id='.$row['id'].'" class="text-danger">delete</a>
                        </td>
                    </tr>
                    ';

                }
            }
            
        
        ?>
        
    </tbody>
    </table>

</div>
