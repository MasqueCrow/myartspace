<!--This page is to query memeberbasicinfo from the database for Ajax search -->

<?php
//session_start();
require'../dbfunction.php';
$userinput = $_POST['userinput'];
$connect1 = getDbConnect();


if (!mysqli_connect_errno($connect1)) {
    $sqlQueryStr =
            "SELECT * " .
            "FROM  memberbasicinfo mb " .
            "WHERE mb.first_name like '$userinput%' AND mb.status='0' ";





    $result = mysqli_query($connect1, $sqlQueryStr) or die(mysql_error($connect1, $sqlQueryStr)); // execute the SQL query        
    $num = 0;
    while ($row = mysqli_fetch_array($result)) { // fetch the record
        $data = $row['record_id'];
        $num+=1;
        
        echo "<b>Name:</b> " . $row['first_name'] . " " . $row['last_name'] . "<br /><br />";
        echo "<b>Gender:</b> " . $row['gender'] . "<br /><br />";
        echo "<b>Nationality:</b> " . $row['nationality'] . "<br /><br />";
        echo "<b>Ocuppation:</b> " . $row['occupation'] . "<br /><br />";
        echo "<b>Street Name:</b> " . $row['address_line1'] . "<br /><br />";
        echo "<b>Block No:</b> " . $row['address_line2'] . "<br /><br />";
        echo "<b>Postal Code:</b> " . $row['address_line3'] . "<br/><br />";
        echo "<b>Email address:</b>". $row['email_address_1'] . "<br/><br />";
        echo "<b>Contact number:</b> " . $row['contact_no1'] . "<br /><br />";
        echo "<b>Date of birth:</b> " . substr($row['date_of_birth'],0,10) . "<br /><br />";
        echo"<a href='editMemberInfo.php?rid=$data'>[Edit]</a> ";
        echo "<a href='sendEmail.php?recordid=" . $row['record_id'] . "'>[Send Email]</a> ";
        echo "<a href='deleteMember.php?member_recordid=" . $row['record_id'] . "'>[Delete]</a><br/>";
        echo "<br/>";
    }
} else {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
