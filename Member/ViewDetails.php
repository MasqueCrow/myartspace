<?php
// require the checkLoginStatus.php file
/* require 'checkLoginState.php'; */
?>
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
                include 'headMenu.php';
                ?>

                <div class="clear"></div>

                <div id="pageContent">

                    <h3>Personal Details</h3>

                    <?php
                    echo "<b>Record ID:</b> " . $basicinfo['record_id'] . "<br />";
                    echo "<b>Name:</b> " . $basicinfo['first_name'] . " " . $basicinfo['last_name'] . "<br />";
                    echo "<b>Gender:</b> " . $basicinfo['gender'] . "<br />";
                    echo "<b>Nationality:</b> " . $basicinfo['nationality'] . "<br />";
                    echo "<b>Occupation:</b> " . $basicinfo['occupation'] . "<br />";
                    echo "<b>Address 1:</b> " . $basicinfo['address_line1'] . "<br />";
                    echo "<b>Address 2:</b> " . $basicinfo['address_line2'] . "<br />";
                    echo "<b>Address 3:</b> " . $basicinfo['address_line3'] . "<br />";
                    echo "<b>Email 1:</b> " . $basicinfo['email_address_1'] . "<br />";
                    echo "<b>Email 2:</b> " . $basicinfo['email_address_2'] . "<br />";
                    echo "<b>Contact Number 1:</b> " . $basicinfo['contact_no1'] . "<br />";
                    echo "<b>Contact Number 2:</b> " . $basicinfo['contact_no2'] . "<br />";
                    echo "<b>Date Of Birth:</b> " . $basicinfo['date_of_birth'] . "<br />";
                    echo "<b>Last modified:</b>" . $basicinfo['last_modified'] . "<br />";
                    echo "<b>Date of Creation:</b>" . $basicinfo['data_of_creation'] . "<br />";
                    echo "<a href='EditMemberDetails2.php?'><b>[ Edit ]</b></a><br/>";
                    ?>

                </div>

            </div>
            <div class="clear"></div>
        </div>






    </body>
</html>
