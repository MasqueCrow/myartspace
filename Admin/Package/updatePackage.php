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
                require_once '../../dbfunction.php';
                ?>
                <div class="clear"></div>

                <div id="pageContent">
                    <h1> Edit Package Result </h1>

                    <?php
                     
                    $con = getDbConnect();
                    if (mysqli_connect_errno($con)) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    } else {
                        $package_id=$_POST['hiddenfield']; //unable to retrieve the value from hiddenfield in 
                                                            //updatePackageForm.php
                        echo $package_id;
                        
                        $package = $_POST['package'];
                        $description = $_POST['description'];
                        $duration_type = $_POST['description_type'];
                        $duration = $_POST['duration'];
                        $price = $_POST['price'];
                        $original_price = $_POST['original_price'];
                        $remark = $_POST['remark'];
                        
                        $packageStr=
                                "UPDATE artpackage ".
                                "SET package_name='$package',package_description='$description',duration_type='$duration_type',
                                 duration='$duration',list_price='$price',default_offered_price='$original_price',remarks='$remark' ".
                            "WHERE package_id='$package_id'";
                    mysqli_query($con, $packageStr);
                    if (mysqli_affected_rows($con) > 0) {
                            echo "record Updated";
                        } else {
                            echo "NO record updated.";
                        }
                         mysqli_close($con);           
                    }
                    ?>
                </div>



            </div>
            <div class="clear"></div>
        </div>
<a href="Packageinfo.php">[ Back to view package ]</a>  
    </body>
</html>
