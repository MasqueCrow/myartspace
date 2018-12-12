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
        echo "Name: " . $row['first_name'] . " " . $row['last_name'] . "<br />";
        echo "Gender: " . $row['gender'] . "<br />";
        echo "Nationality: " . $row['nationality'] . "<br />";
        echo "Ocuppation: " . $row['occupation'] . "<br />";
        echo "Address 1: " . $row['address_line1'] . "<br />";
        echo "Address 2: " . $row['address_line2'] . "<br />";
        echo "Address 3: " . $row['address_line3'] . "<br />";
        echo "email address: : " . $row['email_address_1'] . "<br />";
        echo "Contact number: " . $row['contact_no1'] . "<br />";
        echo "date_of_birth: " . $row['date_of_birth'] . "<br />";
        echo"<a href='editMemberInfo.php?rid=$data'>[Edit]</a> ";
        echo "<a href='sendEmail.php?recordid=" . $row['record_id'] . "'>[Send Email]</a> ";
        echo "<a href='deleteMember.php?member_recordid=" . $row['record_id'] . "'>[Delete]</a><br/>";
        echo "<br/>";
    }
} else {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
