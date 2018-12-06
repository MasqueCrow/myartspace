<?php

session_start();

require '../../dbfunction.php';

$packageid = $_POST['packageid']; // get  packageid from $_POST, retrieving from selectNotRegisteredPackage.php
$member_recordid = $_SESSION['member_recordid']; // get recordid from $_SESSION from selectPackage.php
  $admininfo = $_SESSION['admininfo'];
  
$con = getDbConnect(); // invoke the getDbConnect() function to get a database connection

if (!mysqli_connect_errno()) { // connection to database is successful
    
    $deregisterStr = "Update signuppackage " .
            "SET status='0',handledby='".$admininfo['record_id']."',last_modified=NOW() " .
            "WHERE member_record_id='$member_recordid' AND package_id='".$packageid."' ";
    
    
    mysqli_query($con, $deregisterStr)or die(mysqli_error($con));

    mysqli_close($con);
}
?>
