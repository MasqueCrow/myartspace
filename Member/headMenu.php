
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="demo.css" />


    </head>
    <body>

        <?php
        //commenting out require 'checkLoginState.php'; for ViewDetails.php
          require'checkLoginState.php';
        
        $basicinfo = $_SESSION['basicinfo'];
        #var_dump($basicinfo);
        echo "<h2 id='welcome'>welcome back: " . $basicinfo['first_name'] . " " . $basicinfo['last_name'] . "</h2><br />";
        echo"<img id='welcome1'height='200' src='profilePic/".$basicinfo['image'].".jpg'/>";
        ?>
       
        <ul id="navigation">
           
            <li><a href="ViewDetails.php">View Details</a></li>
            <li><a href="packageRegistered.php">Packages</a></li>
            <li><a href='changePassword.php'>Password</a></li>
            <li><a href="LoginPage.php">Logout</a></li>

        </ul>
    </body>
</html>
