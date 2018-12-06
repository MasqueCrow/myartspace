
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();

        require '../dbfunction.php';

        $username = $_POST['adminid'];
        $password = $_POST['password'];

        $con = getDbConnect();

        if (!mysqli_connect_errno($con)) {
            $sqlQueryStr =
                    "SELECT *  " .
                    "FROM memeberaccount ma, memeberbasicinfo mb " .
                    "WHERE ma.login_id= '$username' AND ma.password = AES_ENCRYPT('$password','$SALT') AND  ma.record_id =mb.record_id";

            $result = mysqli_query($con, $sqlQueryStr) or die(mysql_error($con, $sqlQueryStr)); // execute the SQL query        

            if ($row = mysqli_fetch_array($result)) { // fetch the record
                $_SESSION['basicinfo'] = $row; // put the record into the session
               
                header('Location: ViewDetails.php'); // redirect to the homepage.
            } else {

                header('Location: LoginPage.php');
                
            }
        } else {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        ?>
    </body>
</html>
