<?php
session_start(); 
require 'dbh.php';

if(isset($_POST['submit'])){

    $userId = $_POST['user_id'];
    $movieId = $_POST['movie_id'];
    $seats = $_POST['seats'];
    $price = $_POST['price'];
    $seatsJustRemoved = $_POST['just_taken'];
}    





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Movie Booking System</title>
</head>
<body>


    <div class="container-fluid w-100 bg-primary p-5">

    </div>

    <div class="container w-50 shadow p-3 mt-n5 bg-light rounded">
        <h4 class="text-center">Payment Details</h4>
        <hr>

<form method="POST">

        <!-- hidden inputs -->
        <input type="hidden" name="user_id" value="<?php echo $userId ?>">
        <input type="hidden" name="movie_id" value="<?php echo $movieId ?>">
        <input type="hidden" name="seats" value="<?php echo $seats ?>">
        <input type="hidden" name="price" value="<?php echo $price ?>">
        <input type="hidden" name="just_taken" value="<?php echo $seatsJustRemoved ?>">

        <div class="form-group ">
            <label>Cardholder Name: </label>
            <input type="text" class="form-control" name='name' required>
        </div>

        <div class="form-group  align-items-center">
            <label>Card Number: </label>
            <input class="form-control" type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx" required>
        </div>

        
        <div class="form-group  align-items-center">
            <label>Expiry Date: </label>
            <input type="month" class="form-control" name='month' required>
        </div>

        <div class="form-group  align-items-center">
            <label>CVV: </label>
            <input class="form-control" type="tel" inputmode="numeric" pattern="[0-9\s]{1,3}" autocomplete="cc-number" maxlength="3" placeholder="xxx" required>
        </div>

        <div class="d-flex justify-content-between">
            <h3>Total Price: $<?php echo $_POST['price'] ?></h3>
            <button class="btn btn-primary" name='submit2'>Confirm Payment</button>
        </div>

</form>


    </div>




<?php
    
    if(isset($_POST['submit2'])){
        header('location: index.php');
        echo $_POST;
        $userId = $_POST['user_id'];
        $movieId = $_POST['movie_id'];
        $seats = $_POST['seats'];
        $price = $_POST['price'];
        $seatsJustRemoved = $_POST['just_taken'];
        


        $sql = "INSERT INTO tickets(user_id, movie_id, seats, price) VALUES ('$userId', '$movieId', '$seats', '$price')";
        if($result = mysqli_query($conn, $sql)){

            //get the current seats taken in database and add them to the current ones and then update all the seats taken

            $sql = "SELECT * FROM movies WHERE id = '$movieId'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $subtractSeats = $row['seats'] - $seatsJustRemoved;

            $seatsAlreadyTaken = $row['seats_taken'];
            $newSeats =  $seatsAlreadyTaken .','. $seats;
            print_r($newSeats);
            
            
            
            $sql = "UPDATE movies
                    SET seats_taken = '$newSeats', seats = '$subtractSeats'
                    WHERE id = '$movieId'";

            mysqli_query($conn, $sql);
            header('location: user-tickets.php?err=success');

        }
        else{
            header('location: index.php');
        }

    }
?>


</body>
</html>