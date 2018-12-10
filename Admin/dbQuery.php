
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


                            $sqlStr = "UPDATE adminaccount " .
                                    "SET first_name ='$first_name',last_name='$last_name', gender='$gender',nationality='$nationality' " .
                                    "WHERE record_id='$recordid' ";
                           
                          
                            mysqli_query($connect, $sqlStr) or die(mysqli_error($connect));

                          

                            if (mysqli_affected_rows($connect) > 0) {
                                echo "record updated";
                            } else {
                                echo "No record updated.";
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
