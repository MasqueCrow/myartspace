<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../demo.css" />
    </head>
    <body>

        <?php
        session_start();
        $admininfo = $_SESSION['admininfo'];
        echo "<br/><h2>Welcome back: " . $admininfo['first_name'] . " " . $admininfo['last_name'] . "</h2><br />";
        ?>

        <ul id="navigation">
            <li><a href="registerForm.php">Registration</a></li>
            <li><a href="ViewAdminMemberInfo.php">View Details</a></li>           
            <li><a href="Package/Packageinfo.php">Packages</a></li>
            <li><a href="MemberPayment.php">Members Payment</a></li>
            <li><a href="Package/newPackage.php">New Package</a></li>
             <li><a href="AdminLoginPage.php">Logout</a></li>

        </ul>
    </body>
</html>