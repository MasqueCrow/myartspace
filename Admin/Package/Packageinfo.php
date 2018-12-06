<!---Stores the packageinfo from query Package.php inside a html design layout--->

<!--Stuck at passing value from <a>link in queryPackage.php to Ajax -->
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
                ?>
                <div class="clear"></div>

                <div id="pageContent">
                    <h1> Package Information</h1>
                    <?php
                    include 'queryPackage.php';
                    ?>
                    <div > <br/><a href="registerPackageRequest.php">Register</a></div>
                



                </div>
                <div class="clear"></div>
            </div>

    </body>
</html>
