
<?php
// require the checkLoginStatus.php file
//require 'checkLoginState.php';
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       
        <link href="../Admin/css/default.css" rel="stylesheet" type="text/css" />
        <?php
        include "../Admin/StoreVadJs.html";
        ?>
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
       
        <?php
                    require '../dbfunction.php';

                    $con = getDbConnect();

                    if (mysqli_connect_errno($con)) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    } else {
                        $recordid= $basicinfo['record_id'];
                        $sqlStr = "SELECT *, aes_decrypt(password,'$SALT') as password " .
                                "FROM memeberbasicinfo mb,memeberaccount " ;
                               "WHERE mb.record_id = '$recordid' ";
                        $result = mysqli_query($con, $sqlStr);
                        $row = mysqli_fetch_array($result);
                        ?>
                     <h3>Personal Details:</h3>
                  <div class="CustomerDetailsBox2">
                    <form id="form" class="blocks" action="handleEdit2.php" method="POST">
                <!--Record ID : <?= $recordid ?><br/> -->
                        <p><label>User Name:</Label><input  id="username"class="text" type="text" name="login_id"value="<?= $row['login_id'] ?>" />
                         <span id="availability_status"></span>
                        </p>
                         
                          <p><label>Password:</Label><input class="text" type="text" name="password" value="<?= $row['password'] ?>" /></p>
                <p><label>First Name:</Label><input class="text" type="text" name="first_name" value="<?= $row['first_name'] ?>"/></p>
                <p><label>Last Name:</Label><input class="text"  type="text" name="last_name" value="<?= $row['last_name'] ?>"/></p>
                <p><label>Gender:</Label><input class="text"  type="text" name="gender" value="<?= $row['gender'] ?>"/></p>
                <p><label>Nationality:</Label><input class="text"  type="text" name="nationality" value="<?= $row['nationality'] ?>"/></p>
                <p><label>Occupation:</Label><input class="text"  type="text" name="occupation" value="<?= $row['occupation'] ?>"/></p>
                <p><label>Address 1:</Label><input class="text"  type="text" name="address_line1" value="<?= $row['address_line1'] ?>"/></p>
                <p><label>Address 2:</Label><input class="text"  type="text" name="address_line2" value="<?= $row['address_line2'] ?>"/></p>
                <p><label>Address 3:</Label><input class="text"  type="text" name="address_line3" value="<?= $row['address_line3'] ?>"/></p>
                <p><label>Email 1:</Label><input class="text"   type="text" name="email_address_1" value="<?= $row['email_address_1'] ?>"/></p>
                <p><label>Email 2:</Label><input class="text"   type="text" name="email_address_2" value="<?= $row['email_address_2'] ?>"/></p>
                <p><label>Contact No 1:</Label><input class="text"  type="text" name="contact_no1" value="<?= $row['contact_no1'] ?>"/></p>
                <p><label>Contact No 2:</Label><input class="text"  type="text" name="contact_no2" value="<?= $row['contact_no2'] ?>"/></p>
                <p><label>Date Of Birth:</Label><input class="text"  type="text" name="date_of_birth" value="<?= $row['date_of_birth'] ?>"/></p>
                <input type="submit" class="btn" value="update record"/><br/>
            </form>
               
                     </div>
    
    </div>
    <div class="clear"></div>
</div>

       
        <?php
            mysqli_close($con);
        }
        ?>
        
    </body>
</html>
