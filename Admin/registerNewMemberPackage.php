<!--
Creating new type of package
-->
<!DOCTYPE html>
<html>
    <head>
       
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      
        <link href="css/default.css" rel="stylesheet" type="text/css" /> 
            <?php
       include "./StoreVadJs.html";
       ?>
        <title></title>
    </head>
    <body>
        <div id="rounded">
            <div id="main" class="container">
                <h1>Admin Account Page</h1>
                <?php
                include './headMenu.php';
                require_once '../dbfunction.php';  
             $packageid=   $_GET['package_id'];//Retrieved from viewMemberPackage.php
                $memberid=$_GET['memberid'];
                $connect=  getDbConnect();
              if(!mysqli_errno($connect)){
                  $selectPackageStr=
                          "SELECT * ".
                          "FROM artpackage ".
                          " WHERE package_id='$packageid'";
                  $result=mysqli_query($connect, $selectPackageStr);
                  while($row=  mysqli_fetch_array($result)){
                      $Packageinfo=$row;
                  }
              }else{
                  echo"Failed to connect to mySQL Error:".mysqli_connect_error();
              }
                ?>
                <div class="clear"></div>

                  
                <div id="pageContent">
           
                    <h1> Register Package For Member </h1>
                    <form id="form" class="blocks" method="post" action="handleMemberRegisterPackage.php">
                        <input type='hidden' name='package_id' value='<?= $packageid ?>'/><br/><!-- Sent hidden  package id and member id for sql query-->
                         <input  type='hidden' name='member_id' value='<?=$memberid ?>'/><br/>
                        <p>
                        <label>Package: </label>
                        <input type="text" class="text" name="package" disabled value="<?=$Packageinfo['package_name'] ?>">
                        </p> 
                        
                        <p>
                            <label>Description: </label>
                        <input type="textfield" class="text" name="description" disabled value="<?=$Packageinfo['package_description'] ?>"> 
                        
                        </p>  
                        
                        <p>
                            <label>Duration Type: </label>
                        <input type="textfield" class="text" max="1" name="duration_type" disabled value="<?=$Packageinfo['duration_type'] ?>">
                        </p>   
                        
                        <p>
                            <label>Duration: </label>
                        <input type="textfield" class="text"  max="365" name="duration" disabled value="<?=$Packageinfo['duration'] ?>"> 
                        </p>  
                        
                         <p>
                            <label>Purchase Price: </label>
                        <input type="textfield" class="text"  max="9999" name="purchase_price" > 
                        </p>  
                        <p>
                        <label>PaymentStatus: </label>
                        <input type="radio"class='radiobtn' checked name="paymentstatus" Value='0'>Paid
                        <input type='radio' class='radiobtn' name='paymentstatus'value='1'>Not Paid
                        </p><br/>
                      <p>
                          <label>Startdate: </label>
                        <input type="date" class="text"  name="package_startdate">
                      </p>  
    
                       <p>
                          <label>Payment Remark: </label>
                          <textarea name="payment_remark" rows='25' cols='40'></textarea>
                       </p>
                       <p>
                          <label>Additional Remark: </label>
                          <textarea name="remark" rows='25' cols='40'></textarea>
                       </p>
                      
                      
                       
                       <p> <input type="submit" class="btn" name="submit" ></p>
                    </form>
                   

                </div>



            </div>
            <div class="clear"></div>
        </div>

    </body>
</html>
