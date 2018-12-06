
<?php

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="demo.css" />
        <title></title>
    </head>
    <body>
<div id="rounded">
            <div id="main" class="container">
                  <h1>Member Account Page</h1>
        <?php
        include './headMenu.php';
        ?>
<div class="clear"></div>

                <div id="pageContent">
                    <h1> Change Password:</h1>

        

        <?php
        require '../dbfunction.php';
          $record_id=$basicinfo['record_id'];//from Memberhandlelogin.php
        
        $con = getDbConnect();
        if (mysqli_connect_errno($con)) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        } else {

            $sqlStr = "SELECT password " .
                    "FROM memeberaccount ".
                    "WHERE record_id='$record_id' "; 

            $result = mysqli_query($con, $sqlStr);
            $row = mysqli_fetch_array($result);
        }
        ?>
       <div >
        <form action="handlePassword.php" method="POST">
            <b>New Password:</b><input class="EditField2" type="password" name="password" value="<?= $row['password'] ?>"/><br/>
            <input type="submit" value="  Change  " name="change"/><br/>
        </form>
            </div>
<?php
            mysqli_close($con);
        
        ?>
      <div class="clear"></div>
            </div>

    </body>
</html>
