<?php session_start(); 

if(!$_SESSION['username']){
    header('Location: index.php');
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
    
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><b>Movie Ticket Booking System</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="admin-dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
      </li>  
      <li class="nav-item ">
        <a class="nav-link" href="add-movie.php">Add Movies </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="movies-list.php">Show Movies List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="manage-theaters.php">Manage Theaters</a>
      </li>
    </ul>
    <div class="form-inline my-2 my-lg-0">
      <!-- dont delete this smile thing, everyone likes it 😁 -->
      <p class="mb-0 mr-3">
          Smile <?php echo $_SESSION['username']; ?> 🥰 
      </p>
      <form action="logout.backend.php" method="POST">
        <button class="btn btn-outline-secondary">Log Out</button>
      </form>
    </div>
  </div>
</nav>