<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <link href="css/default.css" rel="stylesheet" type="text/css" />
      
</head>

<?php
include "StoreVadJs.html";
?>

<body>

<div id="rounded">
<div id="main" class="container">
    <h1>Admin Account Page</h1>
  <?php
    include './headMenu.php';
    ?>
    
    <div class="clear"></div>
    
    <div id="pageContent">
    <div class="CustomerDetailsBox2">
                        <form id="form" class="blocks" action="" method="post" >
                        <h2 style='margin-left:4%;margin-bottom:2%;'>Admin Account</h2>
                            <p>
                                <label>Username :</label>
                                <input  class="text" name="admin_loginid" />
                                <span id="result"></span>
                            </p>

                            <p>
                                <label>Password:</label>
                                <input  id="password" type="password" class="text" name="password" />
                                <span id="result"></span>
                            </p>
                            
                            <h2 style='margin-left:4%;margin-bottom:2%;margin-top:4%;'>Admin Detail</h2>
                            
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
                                <input type="radio" class='genderBtn' checked="checked"name="gender" value="M">Male
                                 <input type="radio" class='genderBtn' name="gender" value="F">Female
                             
                            </p>

                            <p>
                                <label>Nationality:</label>
                                <input type="text" class="text" name="nationality" />
                            </p>
                            
                            <p>
                                <label>Personal Email:</label>
                                <input type="text" class="text" name="personal_email_address" />
                            </p>

                            <p>
                                <label style='font-size:12.7px;'>Company Email:</label>
                                <input type="text" class="text" name="company_email_address" />
                            </p>

                            <p>
                                <label>Street Name:</label>
                                <input type="text" class="text" name="address_line1" />
                            </p>
                            <p>
                                <label>Block No:</label>
                                <input type="text" class="text" name="address_line2" />
                            </p>
                            <p>
                                <label>Postal Code:</label>
                                <input type="text" class="text" name="address_line3" />
                            </p>

                            <p>
                                <label >Contact No 1:</label>
                                <input type="text" class="text" name="contact_no1" />
                            </p>

                            <p>
                                <label>Contact No 2:</label>
                                <input type="text" class="text" placeholder='optional' name="contact_no2" />
                            <p>

                            <p>
                                <label>Contact No 3:</label>
                                <input type="text" class="text" placeholder='optional' name="contact_no3" />
                            <p>

                            <p class="area">
                                <label>Date of Birth:</label>
                                <input type="date"  class="text" name="date_of_birth" />    
                            </p>

                            <p>
                                <label>Remarks</label>
                                <textarea cols='50' rows='9' placeholder='optional' name='remarks'></textarea>
                            </p>
                                <label>&nbsp;</label>
                                <input type="submit" class="btn" value="Submit" />
                            </p>
                        </form>
                    </div>
     </div>
    
    </div>
    <div class="clear"></div>
</div>



</body>
</html>

