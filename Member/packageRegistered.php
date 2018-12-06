<?php
// require the checkLoginStatus.php file
//require 'checkLoginState.php';
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <div id="rounded">
            <div id="main" class="container">
                <h1>Member Account Page</h1>
                <?php
                include './headMenu.php';
                $member_record_id = $basicinfo['record_id']; //retrieve from Memberhandlelogin.php 
                                                      //which the session is store in headMenu.php
                ?>
                <div class="clear"></div>
                <div id="pageContent">
                    <?php
                    require '../dbfunction.php';
                    $con = getDbConnect();
                    if (mysqli_connect_errno($con)) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    } else {
                        $sqlStr = "SELECT  sp.member_record_id as member_record_id,  
                            ap.package_name as package_name, ap.duration_type, ap.duration, sp.package_id as package_id,
                            ap.package_id,sp.status as status  " .
                                "FROM  signuppackage sp,artpackage ap " .
                                "WHERE sp.member_record_id= '$member_record_id' " .
                                " AND sp.package_id=ap.package_id ";
                        $result = mysqli_query($con, $sqlStr) or die(mysqli_error($con));
                        ?>
                        <h3>Registered Package </h3>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <div class="CustomerDetailsBox2">  
                                
                                <?php
                
                                if ( $row['status'] == 0 ) {
                                    echo "<br/>" ." <b>Package Name:</b> ". $row['package_name'] ." <b>(Present)</b>". "<br/>";
                                  //  echo $row['duration_type']. "<br/>";
                                  // echo $row['duration']; 
                                    if ($row['duration_type']==0) {
                                        echo "Duration: ". $row['duration'] . " days<br/><br/>";   
                                    } else {
                                        echo "Duration: ". $row['duration'] . " weeks<br/><br/>";
                                    }
                                } else {
                                    echo "<br/>" ." <b>Package Name:</b> ". $row['package_name'] . " <b>(Past)</b>". "<br/>";
                                    
                                     if ($row['duration_type']==0) {
                                        echo "Duration: ". $row['duration'] . " days<br/><br/>";   
                                    } else {
                                        echo "Duration: ". $row['duration'] . " weeks<br/><br/>";
                                    }
                                }
                                ?>
                            </div>
                            <?php
                        }
                        mysqli_close($con);
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </body>
</html>