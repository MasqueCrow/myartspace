<!-- Displays the info of all available packages  -->
<!-- queryPackage.php is linked to deletePackage.php, if status=0 in artPackage,
package will be deleted(hide)-->
<?php
require_once'../../dbfunction.php';
$connect = getDbConnect();
if (mysqli_connect_errno($connect)) {
    echo"Failed to connect to MYSQL" . mysqli_connect_errno($connect);
} else {
    $imageList = array("package1", "package2", "package3", "package4");
    for ($i = 1; $i <= count($imageList); $i++) {
        $sqlAdminQuery =
                "SELECT ap.package_name,ap.package_id,ap.package_description, 
                    ap.duration_type,ap.duration,ap.list_price,
                    ap.default_offered_price,ap.remarks,ap.status as status,sp.package_id " .
                "FROM artpackage ap , signuppackage sp " .
                "WHERE ap.package_id='$i'  AND ap.status=0 "; /*check whether package has been deleted*/
       
        
        
        
        ?>
        <div>
            <?php
            $result = mysqli_query($connect, $sqlAdminQuery) or die(mysqli_error($connect));
          if($row = mysqli_fetch_array($result)){ 
                echo"<a href='ListMemberPackage.php?package_id=$i'><br/>";
                echo"<img src='image/" . $imageList[$i - 1] . ".jpg' alt='Cannot be displayed'/><br/>";
                echo"</a>";
                echo "<br/>Package:" . $row['package_name'] . "<br/>";
                echo "Description:" . $row['package_description'] . "<br/>";
                echo "Duration Type:" . $row['duration_type'] . " week" . "<br/>";
                echo "Duration:" . $row['duration'] . "<br/>";
                echo "Price:$" . $row['list_price'] . "<br/>";
                echo "Original Price:$" . $row['default_offered_price'] . "<br/>";
                echo "Remark:" . $row['remarks'] . "<br/>  ";
                echo" <a href='updatePackageForm.php?edit=$i'>[Edit]</a>  ";
                echo" <a href='deletePackage.php?package_id=$i &status=" . $row['status'] . "' >[Delete]</a>";
                echo"<a href='salesPackage.php?package_sales_id=$i'> [Sales]</a>";
          }
    }
      
    }
    ?>
</div>