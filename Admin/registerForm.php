<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <link href="css/default.css" rel="stylesheet" type="text/css" />
    </head>

     <?php
       include "StoreVadJs.html";
       ?>

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
                    ?>
                   
                    <div class="CustomerDetailsBox2">
                        <form id="form" class="blocks" action="handleAdd.php" method="post" >

                          
                            <p>
                                <label>Password:</label>
                                <input  id="password" type="password" class="text" name="password" />
                                <span id="result"></span>
                            </p>
                            <p>
                                <label>First Name:</label>
                                <input type="text" class="text" name="first_name" />
                            </p>
                            <p>
                                <label> Last Name:</label>
                                <input type="text" class="text" name="last_name" />
                            </p>
                            <p>
                                <label>Gender:</label>
                                <input class='genderBtn'  type="radio"checked="checked" name="gender" value="M">Male
                                 <input class='genderBtn' type="radio" name="gender" value="F">Female
                             
                            </p>
                            <p>
                                <label>Nationality:</label>
                                <input type="text" class="text" name="nationality" />
                            </p>
                            <p>
                                <label>Occupation:</label>
                                <input type="text" class="text" name="occupation" />
                            </p>
                            <p>
                                <label>Address 1:</label>
                                <input type="text" class="text" name="address_line1" />
                            </p>
                            <p>
                                <label>Address 2:</label>
                                <input type="text" class="text" name="address_line2" />
                            </p>
                            <p>
                                <label>Address 3:</label>
                                <input type="text" class="text" name="address_line3" />
                            </p>
                            <p>
                                <label>Email 1:</label>
                                <input type="text" class="text" name="email_address_1" />
                            </p>
                            <p>
                                <label>Email 2:</label>
                                <input type="text" class="text" name="email_address_2" />
                            </p>
                            <p>
                                <label>Contact No 1:</label>
                                <input type="text" class="text" name="contact_no1" />
                            </p>
                            <p>
                                <label>Contact No 2:</label>
                                <input type="text" class="text" name="contact_no2" />
                            </p>
                            <p class="area">
                                <label>Date of Birth:</label>
                              
                                <input type="date"  class="text" name="date_of_birth" />
                                
                            </p>
                            <p>
                                <label>&nbsp;</label>
                                <input type="submit" class="btn" value="Submit" />
                            </p>
                        </form>
                    </div>
    <?php
    mysqli_close($con);
}
?>

            </div>

        </div>

    </div>
    <div class="clear"></div>


</body>
</html>