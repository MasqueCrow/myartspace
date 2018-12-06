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
               
        <?php
        include './headMenu.php';
        ?>
<div class="clear"></div>

                <div id="pageContent">
                    <h1> Change Password:</h1>
        
        <?php
          require '../dbfunction.php';
$record_id=$basicinfo['record_id'];
                    $con = getDbConnect();

                    if (mysqli_connect_errno($con)) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    } else {
                           $password = $_POST['password'];
                           
                           $sqlStr = "UPDATE memeberaccount " .
                                "SET password = AES_ENCRYPT('$password','$SALT'),last_modified=NOW() ".
                                   "WHERE record_id='$record_id' ";
                                
                            mysqli_query($con, $sqlStr)or die(mysqli_error($con));

                        if (mysqli_affected_rows($con) > 0) {
                            echo "record Updated";
                        } else {
                            echo "NO record updated.";
                        }
                        mysqli_close($con);
                           
                    }
        ?>
         <a href="ViewDetails.php">[ Back to View Details ]</a>  
        
     <div class="clear"></div>
            </div>

    </body>
</html>
