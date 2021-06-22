<?php

if(isset($_POST['submit'])){
    
    require 'dbh.php';

    print_r($_POST);

    echo "<br>";

    //get inputs
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = $_POST['description'];
    $theater = mysqli_real_escape_string($conn, $_POST['theater']);
    $date = $_POST['datetime'];

    //get theater price and seats
    $sql = "SELECT * FROM theaters WHERE name = '$theater'";
    if($result = mysqli_query($conn, $sql)){
        $theaterRow = mysqli_fetch_assoc($result);
    }

    $seats = $theaterRow['seats'];
    $price = $theaterRow['price'];

    //uploads connfiguration
    $targetDir = "uploads/"; 
    $allowTypes = array('jpg','png','jpeg','gif'); 
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    $fileName = $_FILES['image']['name']; 
    if(!empty($fileName)){ 
        
        
     
        // File upload path 
        $fileName = basename($_FILES['image']['name']); 
        $targetFilePath = $targetDir . $fileName; 
            
        // Check whether file type is valid 
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 

        if(in_array($fileType, $allowTypes)){ 
            
            // Upload file to server 
            if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){ 
            
            }
            else{ 
                $errorUpload .= $_FILES['image']['name'].' | '; 
            } 

        }else{ 
            $errorUploadType .= $_FILES['image']['name'].' | '; 
        } 
        
    }


    //add to the database
    $sql = "INSERT INTO movies (name, description, seats, price, seats_taken, theater, image, date) 
    VALUES ('$name', '$description', '$seats', '$price', '', '$theater', '$fileName', '$date')";
    if(mysqli_query($conn, $sql)){
        header('location: add-movie.php?msg=success');
    }
    else{
        echo("Error description: " . mysqli_error($conn));
    }

}
else{
    header('location: create.php');
}