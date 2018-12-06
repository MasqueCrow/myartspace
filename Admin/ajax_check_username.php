<?php

require_once'../dbfunction.php';
$con = getDbConnect();
//Include The Database Connection File 
if (!mysqli_connect_errno($con)) {
  if (isset($_POST['username'])) {//If a username has been submitted 
       $username = $_POST['username']; //Some clean up :)

        $check_for_username = mysqli_query($con,"SELECT login_id FROM memeberaccount WHERE login_id='$username'  ")or die(mysqli_error($con));
//Query to check if username is available or not 

        if (mysqli_num_rows($check_for_username)) {
            echo '1'; //If there is a  record match in the Database - Not Available
        } else {
            echo '0'; //No Record Found - Username is available 
        }
  }
}else{
   echo"Failed to connect to MYSQL" . mysqli_connect_errno($con);
    
}
?>