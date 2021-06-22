<?php
session_start();

//if the register button was clicked
if (isset($_POST['submit'])) {
  
  //include the database connection file
  require 'dbh.php';

  //get the user inputs
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = $_POST['password'];
  

  //validation for empty fields
  if ( empty($username) || empty($password) ) {
    
    //take the user back to the login page 
    header("Location: index.php?err=empty");
    exit();
  }

  else {
    //CHECK IF THERE IS ANY NAME OR username AS THE GIVEN ONES
    $sql = "SELECT * FROM admins WHERE username = ? AND password = ?";
    
    //prepared statement
    $stmt = mysqli_stmt_init($conn);

    //if failed to create the statement
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      die("MySQL Error");
    }

    else {

        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        echo $row['username'] == null;
    
        if ($row['username'] !== null) {
          
          //user found create the session vars and take the user to the index page
          $_SESSION['username'] = $row['username'];
          
          header("Location: admin-dashboard.php");
          exit();
  
        }
  
        //user not found
        else{
          header("Location: index.php?err=notfound");
        }
    }       
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);  
}  
//if the register button wasnt clicked
else {
  header('Location: index.php?DontUseDirtyTricksHere');

}
