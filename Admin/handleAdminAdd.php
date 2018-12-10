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
                        $admin_id = $_POST['admin_loginid'];
                        $password = $_POST['password'];
                        $first_name = $_POST['first_name'];
                        
                        $last_name = $_POST['last_name'];
                        $gender = $_POST['gender'];
                        $nationality = $_POST['nationality'];

                        $address1 = $_POST['address_line1'];
                        $address2 = $_POST['address_line2'];
                        $address3 = $_POST['address_line3'];
                        
                        $personal_email = $_POST['personal_email_address'];
                        $company_email = $_POST['company_email_address'];
                        
                        $contact1 = $_POST['contact_no1'];
                        $contact2 = $_POST['contact_no2'];
                        $contact3 = $_POST['contact_no3'];
                        
                        $DOB = $_POST['date_of_birth'];

                        $remarks = $_POST['remarks'];

                        $sqlStr ="INSERT INTO adminaccount ".
                        "(admin_loginid,password,first_name,
                        last_name,gender,nationality,
                        address_line1, address_line2, address_line3,
                        company_email_address,personal_email_address, contact_no1,
                        contact_no2,contact_no3,remarks,date_of_birth,date_of_creation,status,last_modified) ".
                        "VALUES(
                        '$admin_id',AES_ENCRYPT('$password','$SALT'),'$first_name',
                        '$last_name','$gender','$nationality',
                        '$address1','$address2','$address3',
                        '$company_email','$personal_email','$contact1',
                        '$contact2','$contact3','$remarks',
                        '$DOB',NOW(),'0',
                        NOW())";

                        mysqli_query($con, $sqlStr) or die(mysqli_error($con));
                        
                        if (mysqli_affected_rows($con) > 0) {
                            echo "Admin Successfully Created";
                        } else {
                            echo "Unsuccessful!  .";
                        }

                        mysqli_close($con);
                    }
                    ?>
                    <a href="registerNewAdmin.php">[ Back to form ]</a>       
                </div>

            </div>

        </div>
        <div class="clear"></div>
    </body>
</html>