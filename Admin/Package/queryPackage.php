<!-- Displays the info of all available packages  -->
<!-- queryPackage.php is linked to deletePackage.php, if status=0 in artPackage,
package will be deleted(hide)-->
<?php
require_once'../../dbfunction.php';
$connect = getDbConnect();
if (mysqli_connect_errno($connect)) {
    echo"Failed to connect to MYSQL" . mysqli_connect_errno($connect);
} else {

    $imageList = array(1 => "package1", 2 => "package2", 3 => "package3", 4 => "package4", 5 => "package5");
    foreach ($imageList as $k => $v) {

        $sqlAdminQuery =
                "SELECT ap.package_name,ap.package_id,ap.package_description, 
                    ap.duration_type,ap.duration,ap.list_price,
                    ap.default_offered_price,ap.remarks,ap.status as status,sp.package_id " .
                "FROM artpackage ap , signuppackage sp " .
                "WHERE ap.package_id='$k'  AND ap.status=0 "; /* check whether package has been deleted */
        ?>
        <div>
            <?php
            $result = mysqli_query($connect, $sqlAdminQuery) or die(mysqli_error($connect));
            if ($row = mysqli_fetch_array($result)) {
                $_SESSION['packageinformation']=$row; //for use in updatePackageForm.php
                echo"<a href='ListMemberPackage.php?package_id=$k'>";
                echo"<img src='image/" . $imageList[$k] . ".jpg' alt='Cannot be displayed'/>";
                echo"</a>";
                echo "<br/>Package:" . $row['package_name'] . "<br/>";
                echo "Description:" . $row['package_description'] . "<br/>";
                if ($row['duration_type'] == 0) {
                    echo "Duration:" . $row['duration'] . " days" . "<br/>";
                } else {
                    echo "Duration:" . $row['duration'] . " weeks" . "<br/>";
                }

                echo "Price:$" . $row['list_price'] . "<br/>";
                echo "Original Price:$" . $row['default_offered_price'] . "<br/>";
                echo "Remark:" . $row['remarks'] . "<br/>  ";
                echo" <a href='updatePackageForm.php?edit=$k'>[Edit]</a>  ";
                echo" <a href='deletePackage.php?package_id=$k &status=" . $row['status'] . "' >[Delete]</a>";
                echo"<a href='salesPackage.php?package_sales_id=$k'> [Sales]</a>";
            }
        }
    }
    ?>
</div>