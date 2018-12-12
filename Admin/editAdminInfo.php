
<!DOCTYPE html>
<html>
    <head>
         <?php
       include "StoreVadJs.html";
       ?>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
           <link href="css/default.css" rel="stylesheet" type="text/css" />  
  
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

                    <h3>Personal Details:</h3>

                    <?php
                    require '../dbfunction.php';
                    require_once 'dbAdmin.php';
                    require_once 'Admininfo.php';
                    
                    
                    $connect = getDbConnect();
                    $admininfoList = getExistingAdmininfo($connect); //from dbAdmin

                    foreach ($admininfoList as $adminid => $adminforinfo) {
                        echo $adminforinfo->printEditDetails(); //printEditDetails in Admininfo.php
                    }
                    ?>



                </div>
                <div class="clear"></div>
            </div>

        </div>
    </body>
</html>
