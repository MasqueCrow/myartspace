<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <div id="rounded">
            <div id="main" class="container">
                <h1>Admin Account Page</h1>
                <?php
                include './headMenu.php';
                require_once'../../dbfunction.php';
                ?>
                <div class="clear"></div>


                <div id="pageContent">
                    <?php
                    $con = getDbConnect();
                    if (!mysqli_errno($con)) {
                        $package = $_POST['package'];
                        $description = $_POST['description'];
                        $duration_type = $_POST['duration_type'];
                        $duration = $_POST['duration'];
                        $special_price = $_POST['special_price'];
                        $original_price = $_POST['original_price'];
                        $remark = $_POST['remark'];



                       $insertStr = "INSERT INTO artpackage(package_name,package_description,duration_type,
                            duration,list_price,default_offered_price,createdby,remarks,status,date_of_creation) " .
                                "VALUES ('$package' ,'$description','$duration_type',
                                    '$duration','$special_price','$original_price',
                                        '" . $admininfo['record_id'] . "','$remark',0,NOW()) ";
                mysqli_query( $con,$insertStr) or die(mysqli_error($con));
                    
                        if (mysqli_affected_rows($con)) {
                         
                            echo " 1 package updated";
                          echo" <a href='Packageinfo.php'>Back to view Package</a>"  ;
                        } else {
                            echo"No package updated";
                        }
                    } else {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    ?>
                </div>



            </div>
            <div class="clear"></div>
        </div>

    </body>
</html>
