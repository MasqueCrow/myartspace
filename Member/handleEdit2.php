<?php
// require the checkLoginStatus.php file
//require 'checkLoginState.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <div id="rounded">
            <div id="main" class="container">
                <?php
                include './headMenu.php';
                ?>
                <div class="clear"></div>

                <div id="pageContent">

                    <h1>Member Account Page</h1>
                    <h3>Personal Details:</h3>
                    <?php
                    require '../dbfunction.php';

                    $con = getDbConnect();

                    if (mysqli_connect_errno($con)) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    } else {
                        $username = $_POST['login_id'];
                        $password = $_POST['password'];
                        $first_name = $_POST['first_name'];
                        $last_name = $_POST['last_name'];
                        $gender = $_POST['gender'];
                        $nationality = $_POST['nationality'];
                        $occupation = $_POST['occupation'];
                        $address1 = $_POST['address_line1'];
                        $address2 = $_POST['address_line2'];
                        $address3 = $_POST['address_line3'];
                        $emailaddress1 = $_POST['email_address_1'];
                        $emailaddress2 = $_POST['email_address_2'];
                        $contact1 = $_POST['contact_no1'];
                        $contact2 = $_POST['contact_no2'];
                        $DOB = $_POST['date_of_birth']." 00:00:00";
                        $record_id = $basicinfo['record_id'];
                        
                        
                        
                        $sqlStr = "UPDATE memberbasicinfo " .
                                "SET first_name ='$first_name', " .
                                "last_name='$last_name', " .
                                "gender='$gender', " .
                                "nationality='$nationality', " .
                                "occupation='$occupation', " .
                                "address_line1='$address1', " .
                                "address_line2='$address2', " .
                                "address_line3='$address3', " .
                                "email_address_1='$emailaddress1', " .
                                "email_address_2='$emailaddress2', " .
                                "contact_no1= '$contact1', " .
                                "contact_no2='$contact2',  " .
                                "date_of_birth='$DOB' " .
                                "WHERE record_id='$record_id'";
                        
                                $sqlStr1 = "UPDATE memberaccount " .
                                "SET login_id='$username', password= aes_encrypt('$password','$SALT') " .
                                "WHERE record_id='$record_id'";
                                
                                $result1 = mysqli_query($con, $sqlStr) or die(mysqli_error($con));
                                $result2 = mysqli_query($con, $sqlStr1) or die(mysqli_error($con));
                       
                        
                        
                    if ($result1 || $result2) {
                        #Retrieve updated member's record
                        $sqlQueryStr =
                        "SELECT *  " .
                        "FROM memberaccount ma, memberbasicinfo mb ".
                        "WHERE ma.record_id =mb.record_id AND ma.record_id= $record_id";
                        
                        $result = mysqli_query($con, $sqlQueryStr) or die(mysql_error($con, $sqlQueryStr)); // execute the SQL query        

                        if ($row = mysqli_fetch_array($result)) { // fetch the record
                            $_SESSION['basicinfo'] = $row; // Re-update session with latested edited record
                            
                        }

                        echo "Record updated";
                           
                        } else {
                            echo "No record updated.";
                        }
                        mysqli_close($con);
                    }
                    ?>
                    <a href="ViewDetails.php">[ Back to view details ]</a>  
                </div>

            </div>
            <div class="clear"></div>
        </div>
    </body>
</html>