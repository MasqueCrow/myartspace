</html>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <title></title>
    </head>
    <body>

        <?php
        ini_set('SMTP', 'smtp.sp.edu.sg');
        ini_set('SMTP_PORT', 25);

        $recordid = $_GET['recordid'];
      
        ?>

        <div id="rounded">
            <div id="main" class="container">
                <h1>Admin Account Page</h1>
                <?php
                include './headMenu.php';
                ?>
                <div class="clear"></div>

                <div id="pageContent">
                    <?php
                    require '../dbfunction.php';

                    $con = getDbConnect();

                    if (mysqli_connect_errno($con)) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    } else {
                        $sqlStr = "SELECT first_name, last_name, email_address_1 " .
                                "FROM memeberbasicinfo " .
                                "WHERE record_id='$recordid'";

                        $result = mysqli_query($con, $sqlStr);
                        $row = mysqli_fetch_array($result);
                        ?>
                        <p id="PersonalTtitle">Email Form:</p>
                        <div class="CustomerDetailsBox2">
                            <form method='post' action='#'>
                                Name: <input type="text" size="30" name="name" value="<?= $row['first_name'] . " " . $row['last_name'] ?>" required/><br />    
                                Subject: <input type="text" size="30" name="subject" required/><br />
                                Email:  <input type="text" size="30" name="email" value="<?= $row['email_address_1'] ?>" required/><br />  
                                Message: <br/><textarea name='message' rows='15' cols='40'></textarea>
                                <input type='submit'>
                            </form>
                        </div>
                        <?php
                          if (isset($_REQUEST['email'])) {
//if "email" is filled out, send email
            //send email
            $email = $_REQUEST['email'];
            $subject = $_REQUEST['subject'];
            $message = $_REQUEST['message'];
            mail($email, $subject, $message, "From:" . $email);
            echo "Thank you for using our mail form!";
        }
                        mysqli_close($con);
                    }
                    ?>

                </div>

            </div>

        </div>
        <div class="clear"></div>


    </body>
</html>