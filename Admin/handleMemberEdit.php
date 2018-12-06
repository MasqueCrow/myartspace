<!-- Fail to execute sql query but recordid works!-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
         <body>
        <div id="rounded">
            <div id="main" class="container">
                <h1>Admin Account Page</h1>
         <?php
               include './headMenu.php';
                ?>
         <div class="clear"></div>

                <div id="pageContent">

                    <h3>Member Details:</h3>

        <?php
                    require '../dbfunction.php';

                    $con = getDbConnect();

                    if (mysqli_connect_errno($con)) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    } else {
                       
                       $recordid = $_POST['record_id']; //post is from the form under function function editMemberDetails()                                        
                        $first_name = $_POST['first_name'];//at Admininfo.php
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
                        $DOB = $_POST['date_of_birth'];

                        $sqlStr = "UPDATE memeberbasicinfo " .
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
                              "WHERE record_id='$recordid'";

                        mysqli_query($con, $sqlStr) or die(mysqli_error($con));

                        if (mysqli_affected_rows($con) > 0) {
                            echo "record Updated";
                        } else {
                            echo "NO record updated.";
                        }
                        mysqli_close($con);
                    }
                    ?>
        <a href="ViewAdminMemberInfo.php">[ Back to view member details ]</a>  
         </div>

                
               
            </div>
            <div class="clear"></div>
        </div>
    </body>
</html>