
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
       <body>
        <?php
 session_start();

        if (isset($_SESSION['basicinfo'])) { // basicinfo exist in session
            $basicinfo = $_SESSION['basicinfo']; // get basicinfo from session
        } else {
            header('Location: LoginPage.html'); // redirect to the login page.
        }
        ?>

    </body>
</html>
