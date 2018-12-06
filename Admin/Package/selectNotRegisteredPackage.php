<?php

session_start();
 $memberid=  $_SESSION['member_id'];
if (isset($_SESSION['packageRegList'])) { // packageRegList exist
    $packageRegList = $_SESSION['packageRegList']; // retrieve package list from session
} else {
    $packageRegList = array(); // otherwise create a empty package list
}

require '../../dbfunction.php';

$con = getDbConnect(); // invoke the getDbConnect() function to get a database connection

if (!mysqli_connect_errno()) { // connection to database is successful
    // select all packagess from the artppackage and signuppackage table
    $sqlPackageStr =
            "SELECT ap.package_name,ap.package_description,ap.package_id,sp.member_record_id,sp.status,sp.package_id, " .
            "sp.package_startdate,sp.package_enddate " .
            "FROM artpackage ap,signuppackage sp " .
            "Where (sp.status=1 AND sp.package_id= ap.package_id) AND sp.member_record_id='".$memberid."' " .
            "ORDER BY ap.package_name";


    $result = mysqli_query($con, $sqlPackageStr)or die(mysqli_error($con)); // execute the SQL query

    while ($row = mysqli_fetch_array($result)) {
        if (!array_key_exists($row['package_id'], $packageRegList)) {
            $packageNotRegList[$row['package_id']] = $row;

            $_SESSION['packageNotRegList'] = $row;
        }
    }
    mysqli_close($con);

    if (isset($packageNotRegList)) {
        foreach ($packageNotRegList as $packageid => $record) {
            echo
            "Package Name:" . $record['package_name'] . "<br/>" .
            "Package Description:" . $record['package_description'] . "<br/>" .
            "Package StartDate:" . $record['package_startdate'] . "<br/>" .
            "Package EndDate:" . $record['package_enddate'] . "<br/>" .
            " <input class='registerPackage' type='button' name='$packageid' value='register'/> <br/><br/>";
          
        }
    } else {
        echo "no package.";
    }
} else {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>

<?php

if (isset($packageNotRegList)) {
    ?>
    <script>
        $(document).ready(function() {
            $(".registerPackage").click(registerPackage);
        });

        function registerPackage() {
            var data = new Object();
            data.packageid = this.name;

            $.post("registerPackage.php", data, loadPackage);
        }
    </script>
    <?php

}
?>
