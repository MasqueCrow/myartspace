

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../demo.css" />
        <title></title>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#yourInput").keyup(getTable);
            });

            function getTable() {
                var inputVal = $("#yourInput").val();

                if (inputVal.trim().length != 0) {
                    var data = new Object();
                    data.userinput = inputVal;
                    $("#resultDIV").load("retrievepost.php", data, infoFadeIn); //to retrieve specific member
                } else {
                    $("#resultDIV").html("");
                    $("#resultDIV").fadeOut();
                }
            }

            function infoFadeIn(responseTxt, statusTxt, xhr) {
                if (statusTxt == "success" && responseTxt.trim().length != 0) {
                    $("#resultDIV").fadeIn();
                } else {
                    $("#resultDIV").fadeOut();
                }
            }
        </script>
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

                    <h2 style='color:black;'>Personal Details:</h2>
                    <br/><br/>

                    <?php
                    require '../dbfunction.php';
                    require'dbAdmin.php';
                    require'Admininfo.php';

                    $connect = getDbConnect();
                    $admininfo = getUpdatedAdmininfo($connect); //from dbAdmin
                    #var_dump($admininfo);
                    foreach ($admininfo as $adminid => $adminforinfo) {
                        #echo"<img src='prof_pic/" . $admininfo[0]->image . ".jpg' alt='Cannot be displayed'/><br/>";
                        echo $adminforinfo->printDetails(); //printDetails in Admininfo.php for EDITED details (for Admin)
                        echo "<a href='editAdminInfo.php'>[Edit detail]</a>";
                    }
                    ?>
                    <br/><br/>
                    <h3>Member Details:</h3> <br/><input id="yourInput" type="text" size="20" /><br/><br/>
                    
                    <br><br>

                    <div id="resultDIV"></div>
                   
                </div>

                
               
            </div>
            <div class="clear"></div>
        </div>






    </body>
</html>

