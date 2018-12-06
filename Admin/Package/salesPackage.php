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

                    <div class="CustomerDetailsBox2">  
                        <h1>Package Sales</h1>
                        <?php
                        require '../../dbfunction.php';

                        $con = getDbConnect();
                        $sale_package_id = $_GET['package_sales_id'];
                        if (mysqli_connect_errno($con)) {
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        } else {
                            $sqlStr = "SELECT  sp.package_id as package_id_1, sp.purchase_price, ap.package_id as package_id, ap.package_name,sp.status,sp.payment_status " .
                                    "FROM signuppackage sp, artpackage ap " .
                                    "WHERE sp.package_id =ap.package_id AND sp.package_id='$sale_package_id' AND sp.status='0' AND sp.payment_status='0' " .                           
                                    "ORDER BY package_id ASC";

                            $calculation = mysqli_query($con, $sqlStr) or die(mysqli_error($con));
                            $totalSales = 0;
                            while ($result = mysqli_fetch_array($calculation)) {
                                if ($result['package_id_1'] == $sale_package_id) {
                                    $totalSales+=$result['purchase_price'];
                                }
                            }
                            echo"Sales:$$totalSales";
                            $result = mysqli_query($con, $sqlStr) or die(mysqli_error($con));
                            ?>


                        </div>
                        <?php
                        mysqli_close($con);
                    }
                    ?>

                </div>

            </div>

        </div>
        <div class="clear"></div>


    </body>
</html>