<?php 
require 'dbh.php';
require 'admin-header.php';


    if(!$_SESSION['username']){
        header('Location: index.php');
    }


    if(isset($_GET['msg'])){
        if($_GET['msg'] == "success"){
            $msg = "Movie Added Successfully";
        }


    echo "<div class='alert alert-info' role='alert'>"
            . $msg .
            "</div>";

    }

    

?>

    <div class="container form bg-light p-3 mt-5">
        <h3>Add New Movie</h3>
        
        <form action="add-movie.backend.php" method="POST" enctype="multipart/form-data">

            <div class="mb-2">
                <label for="">Movie Name:</label>
                <input class="form-control" type="text" name="name"  required />
            </div>

            <div class="mb-2">
                <label for="">Movie Description:</label>
                <div><textarea class="form-control" name="description" rows="5" required></textarea></div>
            </div>

            
            <div class="mb-2">
                <label for="">Choose Theater: </label>
                <select class="form-control" name="theater" required>
                    <option value=""></option>
                <?php
                    $sql = "SELECT * FROM theaters";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo '<option value="'. $row['name'] .'">'. $row['name'] .'</option>';
                        }
                    }
                    ?>
                </select>   
            </div>


            <div class="mb-2">
                <label for="">Movie Image: </label>
                <div><input type="file" name="image" required></div>
            </div>

            <div class="mb-2">
                <label for="">Display Date: </label>
                <div><input type="datetime-local" name="datetime" required></div>
            </div>
            

            <button class="btn btn-primary" name="submit">Add Movie</button>

        </form>
    </div>