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
                    <h1> Delete Package</h1>


                    <?php
                    /* Delete package by setting the status to 1 and hide the info for the packages */
                    require_once '../../dbfunction.php';

                    $con = getDbConnect();
                    if (mysqli_connect_errno($con)) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    } else {

                        $package_delete = $_GET['package_id']; //retrieve status from deletePackage.php 
                        $status = $_GET['status']; //and where status==1,set status to 0
                        $SqlDelete =
                                "Update  artpackage  " .
                                "SET status='1' " .
                                "WHERE package_id='$package_delete' AND status='$status'";

                        $successResult1 = mysqli_query($con, $SqlDelete) or die(mysqli_error($con));
                        if ($successResult1) {
                            echo" Package deleted";
                            echo"<br/><br/><a href='Packageinfo.php'> Back to view package</a>";
                        } else {
                            echo"No package deleted";
                            echo "<br/>";
                        }
                    }
                    ?>

                </div>
                <div class="clear"></div>
            </div>

    </body>
</html>
