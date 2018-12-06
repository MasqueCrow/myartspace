Current registered package:<br /><br />

<?php
session_start();

require '../../dbfunction.php';

$member_recordid = $_POST['recordid']; // record id of selected member from selectMember.php

$_SESSION['member_recordid'] = $member_recordid;  // store record id of selected member in session, for registerPackage.php 


$con = getDbConnect();

if (!mysqli_connect_errno()) { // connection to database is successful
    // select modules which student is registered in
    $sqlpackageQueryStr =
            "SELECT ap.package_id AS package_id,
             ap.package_name,ap.package_description,
             sp.member_record_id,sp.package_startdate,sp.package_enddate,
             sp.payment_status,sp.status as status,sp.package_id " .
            "FROM artpackage ap, signuppackage sp " .
            "WHERE ap.package_id = sp.package_id AND " .
            " sp.member_record_id = '$member_recordid' AND sp.status='0'  " .
            "ORDER BY ap.package_id";

    $result = mysqli_query($con, $sqlpackageQueryStr) or die(mysqli_error($con)); // execute the SQL query

    while ($row = mysqli_fetch_array($result)) { // fetch the record
        $packageRegList[$row['package_id']] = $row; //multi-dimensional array
         $_SESSION['member_record_id']=$row;
    }
    mysqli_close($con);
// isset ($packageRegList['status']==1)
    if (isset($packageRegList)) {
        $_SESSION['packageRegList'] = $packageRegList;
        // store list of packages members are currently registered in, in the session 
        // display the list of packages members are currently registered in
        foreach ($packageRegList as $record) {
            echo
            "<b>Package:</b> " . $record['package_name'] . "<br/> " .
            "<b>Package Description:</b> " . $record['package_description'] . "<br/>" .
            "<b>Package Startdate:</b> " . $record['package_startdate'] . "<br/>" .
            "<b>Package Enddate:</b> " . $record['package_enddate'] . "<br/>" .
           
            // "< form action='deregisterPackage.php' method='post'>".
            "<input type='button' class='deregisterPackage' name='" . $record['member_record_id'] . "' value='De-register'/> " .
            //  "</form>".   
            //    "<br/>".   $record['member_record_id']. it works!
            "<br/><br/>";
            // $record['member_record_id'] for  deregisterPackage.php

            $_SESSION['package_id'] = $record['package_id']; //this is use for registerPackage.php & deregisterPackage.php
        }
    } else {
        if (isset($_SESSION['packageRegList'])) {
               unset($_SESSION['packageRegList']); // remove packageRegList from session
        }
        echo "no package.";
    }
} else {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>


<?php
if (isset($packageRegList)) {
    ?>
    <script>
        $(document).ready(function() {
            $(".deregisterPackage").click(deregisterPackage);
        });
        
        function deregisterPackage() {
            var data = new Object();
            data.memberid = this.name;
            
            $.post("deregisterPackage.php", data, loadPackage);
        }
    </script>
    <?php
}
?>