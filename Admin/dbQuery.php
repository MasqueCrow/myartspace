
<!--Update successful but values does not change at all!!!!!-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <div id="rounded">
            <div id="main" class="container">
                <h1>Admin Account Page</h1>
                <?php
                include './headMenu.php';
                ?>

                <div class="clear"></div>

                <div id="pageContent">

                    <h3>Personal Details:</h3>

                    <?php
                    require '../dbfunction.php';
                    $connect = getDbConnect();
                    $admininfo = $_SESSION['admininfo'];
                    if (isset($admininfo)) {
                        if (mysqli_connect_errno($connect)) { //check whether connection exist
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        } else {


                            $recordid = $admininfo['record_id'];
                            $first_name = $_POST['first_name'] ;
                            $last_name = $_POST['last_name'];
                            $gender = $_POST['gender'];
                            $nationality = $_POST['nationality'];
                            //  $occupation = $_POST['occupation'];
                            //$address1 = $_POST['address_line1'];

                            $sqlStr = "UPDATE adminaccount " .
                                    "SET first_name ='$first_name',last_name='$last_name', gender='$gender',nationality='$nationality' " .
                                    /*  "occupation='$occupation', " .
                                      "address_line1='$address1', " .
                                      "address_line2='$address2', " .
                                      "address_line3='$address3', " .
                                      "email_address_1='$emailaddress1', " .
                                      "email_address_2='$emailaddress2', " .
                                      "contact_no1= '$contact1', " .
                                      "contact_no2='$contact2',  " .
                                      "date_of_birth='$DOB' " ; */
                                    "WHERE record_id='$recordid' ";
                           
                          
                            mysqli_query($connect, $sqlStr) or die(mysqli_error($connect));

                          

                            if (mysqli_affected_rows($connect) > 0) {
                                echo "record Updated";
                            } else {
                                echo "NO record updated.";
                            }
                        }
                        mysqli_close($connect);
                    }
                    echo"<a href='ViewAdminMemberInfo.php'>[ Back to view details ]</a>  ";
                    ?>

                </div>

            </div>
            <div class="clear"></div>
        </div>






    </body>
</html>
