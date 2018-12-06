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
                    <?php
                    require '../dbfunction.php';

                    $con = getDbConnect();

                    if (mysqli_connect_errno($con)) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    } else {
                        $sqlStr = "SELECT mb.first_name, mb.last_name, mb.email_address_1, mb.record_id , sp.member_record_id, sp.payment_status " .
                                "FROM memeberbasicinfo mb, signuppackage sp " .
                                "WHERE mb.record_id = sp.member_record_id ";

                        $result = mysqli_query($con, $sqlStr) or die(mysqli_error($con));
                        ?>
                        <p id="PersonalTtitle">Member's Payment Status</p>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            ?>


                            <div class="CustomerDetailsBox2">  
                                <?php
                                if ($row['payment_status'] == 0) {
                                    echo "<br/><b>Name:</b> " . $row['first_name'] . " " . $row['last_name'] . "<br />";
                                    echo "<b>Payment Status:</b> " . "Not Paid" . " &nbsp;";
                                    echo "<a href='sendReminder.php'><b>[Send Reminder]</b></a><br/>";
                                } else {
                                    echo "<br/><b>Name:</b> " . $row['first_name'] . " " . $row['last_name'] . "<br />";
                                    echo "<b>Payment Status:</b> " . " Paid" . " &nbsp;";
                                }
                                ?>
                            </div>
                            <?php
                        }
                        mysqli_close($con);
                    }
                    ?>