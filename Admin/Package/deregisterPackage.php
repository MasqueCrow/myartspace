
<?php

/* De registering package for members */
session_start();
require '../../dbfunction.php';
$packagedRegistered =$_SESSION['package_id']; //from selectPackage.php
$member_id = $_POST['memberid']; //from selectPackage.php at the bottom of the page
//echo $member_id;
$con = getDbConnect();
if (!mysqli_connect_errno($con)) {
    $deregisterStr = "Update signuppackage " .
            "SET status='1',last_modified=NOW() " .
            "WHERE member_record_id='$member_id' AND package_id='$packagedRegistered' ";


    mysqli_query($con, $deregisterStr) or die(mysqli_error($con));

}else{
    echo"Failed to connect to MYSQL" . mysqli_connect_errno($con);
}
?>
