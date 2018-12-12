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
                    <h1> Update Member's payment</h1>



<?php
require_once '../dbfunction.php';
$con=  getDbConnect();
if(!mysqli_errno($con)){
$packageid=$_GET['packageid'];
$memberid=$_GET['memberid'];
    $updatePaymentStr=
            "UPDATE signuppackage ".
            "SET payment_status=0 ".
            "WHERE member_record_id='$memberid' AND package_id='$packageid' ";
   $result= mysqli_query($con,$updatePaymentStr)or die(mysqli_error($con));
  if($result){
      echo"Member's payment status updated";
  }else{
      echo"Member's payment status not updated";
  }
  echo"<a href='package/packageinfo.php'>[Back to Package list]</a>";
}else
{
    echo"unable to connect to my sql".mysqli_connect_error();
    
}



?>
  </div>
                <div class="clear"></div>
            </div>

    </body>
</html>