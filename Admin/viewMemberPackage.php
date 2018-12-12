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
                    <h1> Select Package To Register</h1>
                    <?php
               
require_once'../dbfunction.php';
$connect = getDbConnect();
if (mysqli_connect_errno($connect)) {
    echo"Failed to connect to MYSQL" . mysqli_connect_errno($connect);
} else {
  $memberid=  $_GET['memberid'];

    $imageList = array(1=>"package1", 2=>"package2",3=> "package3",4=> "package4",5=>"package5");
   foreach ($imageList as $k=>$v){
        $sqlAdminQuery =
                "SELECT ap.package_name,ap.package_id,ap.package_description, 
                    ap.duration_type,ap.duration,ap.list_price,
                    ap.default_offered_price,ap.remarks,ap.status as status,sp.package_id " .
                "FROM artpackage ap , signuppackage sp " .
                "WHERE ap.package_id='$k'  AND ap.status=0 "; /*check whether package has been deleted*/
    
       
     
            $result = mysqli_query($connect, $sqlAdminQuery) or die(mysqli_error($connect));
          if($row = mysqli_fetch_array($result)){ 
              $_SESSION['packageinfo']=$row;
                echo"<a href='registerNewMemberPackage.php?package_id=$k&&memberid=$memberid'>";
                echo"<img src='Package/image/" . $imageList[$k] . ".jpg' alt='Cannot be displayed'/>";
                echo"</a>";
                
                
                
                echo "<br/>Package:" . $row['package_name'] . "<br/>";
                echo "Description:" . $row['package_description'] . "<br/>";
                echo "Duration Type:" . $row['duration_type'] . " week" . "<br/>";
                echo "Duration:" . $row['duration'] . "<br/>";
                echo "Price:$" . $row['list_price'] . "<br/>";
                echo "Original Price:$" . $row['default_offered_price'] . "<br/>";
                echo "Remark:" . $row['remarks'] . "<br/>  ";
               
          }
    }
      
    }
?>
                   
                   
                



                </div>
                <div class="clear"></div>
            </div>

    </body>
</html>
