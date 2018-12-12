<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="demo.css" />
        <title></title>
    </head>
    <body>
        <div id="rounded">
            <div id="main" class="container">
                <h1>Member Account Page</h1>
                <?php
                include 'HeadMenu.php';
                ?>
                <div class="clear"></div>

                <div id="pageContent">
                    <?php
                    require '../dbfunction.php';
                    $con = getDbConnect();

                    if (mysqli_connect_errno($con)) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    } else {
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
                        $DOB = $_POST['date_of_birth'];

                        $sqlStr = "INSERT INTO memberbasicinfo " .
                                " (first_name, last_name, gender, nationality, occupation, address_line1, address_line2, address_line3, email_address_1, email_address_2, contact_no1, contact_no2, date_of_birth,createdby,data_of_creation) " .
                                "VALUES ('$first_name', " .
                                "'$last_name', " .
                                "'$gender', " .
                                "'$nationality', " .
                                "'$occupation', " .
                                "'$address1', " .
                                "'$address2', " .
                                "'$address3', " .
                                "'$emailaddress1', " .
                                "'$emailaddress2', " .
                                "'$contact1', " .
                                "'$contact2',  " .
                                "'$DOB',". $admininfo['record_id'].",NOW() ) ";

                        mysqli_query($con, $sqlStr) or die(mysqli_error($con));


                        $Auto_increment = mysqli_insert_id($con);
                        $sqlStr2 = "INSERT INTO memberaccount " .
                                "(login_id, password,record_id,data_of_creation) " .
                                "VALUES (' $emailaddress1', AES_ENCRYPT('$password','$SALT'),'$Auto_increment',NOW()) ";


                       /* $sqlSPpackage = "Insert into signuppackage " .
                                "(member_record_id,status) " .
                                "VALUES('$Auto_increment','1')";

                        mysqli_query($con, $sqlSPpackage) or die(mysqli_error($con));*/
                       mysqli_query($con, $sqlStr2) or die(mysqli_error($con));

                        if (mysqli_affected_rows($con) > 0) {
                            echo "Member Successfully Created";
                        } else {
                            echo "Unsuccessful!  .";
                        }



                        mysqli_close($con);
                    }
                    ?>
                    <a href="registerForm.php">[ Back to form ]</a>       
                </div>

            </div>

        </div>
        <div class="clear"></div>
    </body>
</html>