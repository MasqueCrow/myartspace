<!--
List the members for the specific packages

-->



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
                    <h1> Registered Member Package</h1>

                    <?php
                    require_once'../../dbfunction.php';
                    $package_id = $_GET['package_id']; //package id from the clicked image
                    $con = getDbConnect();
                    if (!mysqli_error($con)) {
                        $memPackQuery =
                                " SELECT s.package_id as package_id,m.first_name,m.last_name,gender,nationality,
                                    m.record_id as record_id ,s.member_record_id,s.status as s_status " .
                                "FROM memeberbasicinfo m,signuppackage s " .
                                "WHERE m.record_id= s.member_record_id AND s.package_id='$package_id' ";
                        //AND s.status='0'
                        $result = mysqli_query($con, $memPackQuery) or die(mysqli_error($con));
                        while ($row = mysqli_fetch_array($result)) {
                           // this is to check for e.g package 2 that has been listed but no package is registered
                               
                                $ListpackageArray = array();
                                $ListpackageArray[$row['package_id']] = $row;
                                foreach ($ListpackageArray as $k => $v) {
                                    if ($v['s_status'] == 0) {
                                        echo "<br/>Name: " . $v['first_name'] . " " . $v['last_name'] . "<br/>";
                                        echo "Gender: " . $v['gender'] . "<br/>";
                                        echo"Nationality: " . $v['nationality'] . "<br/>";
                                        echo"<br/>";
                                    }
                                }//foreach
                            
                           
                        }//while
                    }// connection if  
                    else {
                        "Something is wrong with the connection!";
                    }
                    mysqli_close($con);
                    ?>

                </div>
                <div class="clear"></div>
            </div>

    </body>
</html>
