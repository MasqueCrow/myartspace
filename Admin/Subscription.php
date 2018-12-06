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
                    <?php
                    require '../dbfunction.php';

                    $con = getDbConnect();

                    if (mysqli_connect_errno($con)) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    } else {
                        /*$sqlStr = "SELECT mb.record_id, mb.first_name as name, mb.last_name, sp.member_record_id, sp.package_id, ap.package_id, ap.status as status, ap.package_name as packagename " .
                                  "FROM memeberbasicinfo mb, signuppackage sp, artpackage ap " ;
                                  "WHERE mb.record_id=sp.member_record_id " . 
                                  "AND sp.package_id=ap.package_id ";*/
                        
                        $sqlStr = "SELECT ap.package_name, ap.status as status, ap.package_id as package_id " .
                                  "FROM artpackage ap " .
                                "ORDER BY  ap.status DESC";
                                  

                        $result = mysqli_query($con, $sqlStr) or die(mysqli_error($con));
                        ?>
                        <p id="PersonalTtitle">Past/Present Subscription Packages</p>
                        <?php
                       
                        while ($row = mysqli_fetch_array($result)) {
                            $packageArray=array();
                            $packageArray[$row['package_id']]=$row;
                            foreach( $packageArray as $key=>$value){
                            ?>


                            <div class="CustomerDetailsBox2">  
                                
                              <?php
                              if($row['status']==0){
                                  echo "1 <br/> ";
                                 echo "Package Name:".$value['package_name']."<br/>";
                                  
                              }else{
                                    echo "0 <br/>";
                                  echo "Package Name:".$value['package_name']."<br/>";
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