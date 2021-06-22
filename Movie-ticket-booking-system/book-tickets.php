<?php require 'dbh.php'; require 'header.php'; 

    if(isset($_GET['id'])){
        $movieId = $_GET['id'];
        $sql = "SELECT * FROM movies WHERE id = '$movieId'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $theater = $row['theater'];
        $seatsTaken = $row['seats_taken'];
        $price = $row['price'];
        $seats = $row['seats'];

        $sql = "SELECT * FROM theaters WHERE name = '$theater'";
        $result = mysqli_query($conn, $sql);
        $theaterRow = mysqli_fetch_assoc($result);
        $seatsOfThisTheater = $theaterRow['seats'];


    }
    else{
        header('location: dashboard.php');
    }

?>

<script>
    window.seatsTaken = [<?php echo $seatsTaken; ?>];
    window.seats = [<?php echo $seats; ?>];
    window.price = [<?php echo $price; ?>];
    window.seatsOfThisTheater = [<?php echo $seatsOfThisTheater; ?>];
</script>

<div class="container">

    <div class="information my-3">
    <?php

        echo  '<div class="align-items-center movie bg-light p-3 mb-3 border">
                    
        <div class="d-flex">
            <h5>'. $row['name'] .'</h5>
            <b class="ml-3"><h5 class="text-danger mb-1">Display Date: '. $row['date'] .'</h5></b>
        </div>

        <div class="d-flex">
            <div class="col-3 p-0">
                <img src="uploads/'. $row['image'] .'" width="100%" alt="Movie Image">
                <b><p class="">Theater: '. $row['theater'] .'</p></b>
            </div>

            <div class="col-9 d-grid">
                <p class="my-2">'. $row['description'] .'</p>
                <b><p class="text-success mb-1">Seats Available: '. $row['seats'] .'</p></b>
                <b><p class="text-success mb-1">Price Per Seat: $'. $row['price'] .'</p></b>

            </div>
        </div>

        </div>';

    ?>
    </div>


    <div class="select-options bg-light p-3 mb-3 border w-50 mx-auto">
        
        <div class="d-flex">
            <label for="">Number of seats Needed:</label>
            <select id="seats" class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
            </select>
        </div>

        
    </div>

    <div class="container bg-secondary p-3 mb-3 border mx-auto">

        <div class="mt-3 mb-5 bg-primary p-5 text-center">
            <h2 class="text-white">Screen Here</h2>
        </div>

        
        <div class="container w-75" style="overflow: scroll-x">
            <div class=" seats " >
                <!-- elements here are added with javscript file -->
            </div>
        </div>

    </div>


    <div class="container bg-light p-3 mb-3 border w-50 mx-auto d-flex">
        <div class="col">
            <span>Total Price: </span><span class="total-price text-success"></span><br>
            <span>Seats chosen: </span><span class="seats-chosen text-primary"></span>
            <p class="">Theater:  <?php echo $row['theater']; ?> </p>
        </div>
        <form action="book-tickets.backend.php" method="POST">
            
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>" >
            <input type="hidden" name="movie_id" value="<?php echo $movieId ?>" >
            <input type="hidden" name="seats">
            <input type="hidden" name="price">
            <input type="hidden" name="just_taken">
            <button class="col btn btn-primary" name="submit">Confirm And Book</button> 
        
        </form>
    </div>


</div>

<!-- js file to generate seats and manage its functionalities -->
<script src="book-tickets.js"></script>