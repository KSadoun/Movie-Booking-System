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

<?php

if(isset($_GET['err'])){
        if($_GET['err'] == "success"){
            $err = "Registered Successfully! You can Login now";
            echo "<div class='alert alert-info text-center' role='alert'>"
                    . $err .
                    "</div>";
        
            }    

        elseif($_GET['err'] == "notfound"){
            $err = "Invalid Email Or Password";
            echo "<div class='alert alert-danger text-center' role='alert'>"
                    . $err .
                    "</div>";
        
            }    
}

?>

    <div id="app" class="my-5">

        <h3 class="mx-auto text-center">Movie Ticket Booking System</h3>

        <div class="container m-auto bg-light p-5 d-flex justify-content-around">

            <!-- admin form -->
            <form action="admin-login.backend.php" method="POST" class="bg-white p-4 rounded">
                <h5>Admin Login</h5>
                <input class="form-control" type="text" placeholder="Admin Username" name="username">
                <input class="form-control" type="password" placeholder="Admin Password" name="password">
                <button type="submit" class="btn btn-primary" name="submit">Login</button>
            </form>

            
            <!-- users forms -->
            <div class="user-box bg-white p-4 rounded">

                <h5>User Login</h5>
                
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    
                    <li class="nav-item">
                        <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="false">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="true">Register</a>
                    </li>

                </ul>
                
                <div class="tab-content" id="myTabContent">
                    
                    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                        <!-- User Login -->
                        <form action="user-login.backend.php" method="POST" >
                            <input class="form-control" type="text" placeholder="Email Address" name="email">
                            <input class="form-control" type="password" placeholder="Password" name="password">
                            <button type="submit" class="btn btn-primary" name="submit">Login</button>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                        <!-- User Register -->
                        <form action="user-register.backend.php" method="POST" >
                            <input class="form-control" type="text" placeholder="Username" name="username">
                            <input class="form-control" type="email" placeholder="Email Address" name="email">
                            <input class="form-control" type="password" placeholder="Password" name="password">
                            <button type="submit" class="btn btn-primary" name="submit">Register</button>
                        </form>
                    </div>
                
                </div>
            
            </div>





        </div>


    </div>

</body>
</html>