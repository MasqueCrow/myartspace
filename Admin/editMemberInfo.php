<?php
require'Admininfo.php';
 require '../dbfunction.php';
require'dbMember.php';
$connect1 = getDbConnect();
getMemberinfo($connect1); //dbMember.php
$MemberList=getMemberinfo($connect1);
//$rid=$_GET['rid'];
//echo $MemberList;
foreach($MemberList as $k){
   
//if($rid==$k->recordid){
?>
    <!DOCTYPE html>
<html>
    <head>
         <?php
       include "StoreVadJs.html";
       ?>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
              <link href="css/default.css" rel="stylesheet" type="text/css" /> 
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

                    <h3>Member Details:</h3>

                    <?php
                    
                    
        
                   $k->editMemberDetails(); //From Admininfo.php
                 
                    
             
                    ?>



                </div>
                <div class="clear"></div>
            </div>

        </div>
    </body>
</html>
<?php
//}    else{
    
//}
}

?>




