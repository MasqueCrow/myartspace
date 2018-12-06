<?php

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../../demo.css" />
        <title></title>
    </head>
    <body>
        <div id="rounded">
            <div id="main" class="container">
                <h1>Admin Account Page</h1>
<?php
include './headMenu.php';
?>
                <div class="clear"></div>

                <div id="pageContent">
                    <h1> Delete Member</h1>
<?php
/* Delete member account and likewise the member's info */
require '../dbfunction.php';
$con = getDbConnect();
$delete_member_recordid = $_GET['member_recordid'];
if (!mysqli_errno($con)) {
  /*  $deleteSqlstr = " UPDATE memeberaccount " .
            "SET status='1' " .
            "WHERE record_id='$delete_member_recordid' ";*/
    $deleteSqlstr1 = " UPDATE memeberbasicinfo " .
            "SET status='1' " .
            "WHERE record_id='$delete_member_recordid' ";
   // mysqli_query($con, $deleteSqlstr); //memberaccount

 mysqli_query($con, $deleteSqlstr1)or die(mysqli_error($con)); //memberbasicinfo
    if (mysqli_affected_rows($con) > 0) {
                            echo "Member information deleted.";
                      echo"<a href='ViewAdminMemberInfo.php'>[GO back]</a>"  ;    
                        } else {
                            echo "NO member information deleted.";
                        }
  
} else {
    echo"Failed to connect to MYSQL" . mysqli_connect_errno($con);
}
?>

                </div>
                <div class="clear"></div>
            </div>

    </body>
</html>