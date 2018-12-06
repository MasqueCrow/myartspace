<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../../demo.css" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <title></title>
        
         <script>
            $(document).ready(function() {
                $("#memberRecord_id").keyup(getMember);
            });

            function getMember() {

                var inputVal = $("#memberRecord_id").val();
                // get value from the textfield 

                if (inputVal.trim().length != 0) { // if value exist
                    var data = new Object();
                    data.memberid = inputVal;
                    $("#memberDIV").load("selectMember.php", data, infoFadeIn);
                    // fade in content of studentDIV after load method is completed
                } else { // remove content of studentDIV
                    $("#memberDIV").html("");
                    $("#memberDIV").fadeOut();
                }
            }

            function infoFadeIn(responseTxt, statusTxt, xhr) {
                if (statusTxt == "success" && responseTxt.trim().length != 0) {
                    $("#memberDIV").fadeIn();
                } else {
                    $("#memberDIV").fadeOut();
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
                    <h1> Register Package</h1>
<br/>
 <input   id="memberRecord_id"type="text" size="20" /> Member (record_id)

 <br /><br />
 
        <div id="memberDIV" style="padding:5px;width:500px; height:900px; display:none;"></div>
 
 
 
</div>
                <div class="clear"></div>
            </div>

    </body>
</html>