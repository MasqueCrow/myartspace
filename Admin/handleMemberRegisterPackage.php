<!--



-->
<!DOCTYPE html>
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
                require_once '../dbfunction.php';
                include './headMenu.php';
                ?>
                <div class="clear"></div>

                  
                <div id="pageContent">
           
                    <h1> Sign  New Package for member </h1>
        <?php
        $connect=  getDbConnect();
        if(!mysqli_connect_errno($connect)){
      $package_id=$_POST['package_id'];
      $member_id=$_POST['member_id'];
      $package_startdate=$_POST['package_startdate'];
     // $package_enddate=$_POST['package_enddate'];
      $purchase_price=$_POST['purchase_price'];
      $payment_remark=$_POST['payment_remark'];
      $paymentstatus=$_POST['paymentstatus'];
      $remark=$_POST['remark'];
  
    $adminid= $admininfo['record_id'];
    
    function retreiveDuration($connect,$package_id){
        $retreivedate="select duration_type,duration,package_id ".
                "From artpackage ".
                "WHERE package_id='$package_id' ";
        $result=mysqli_query($connect, $retreivedate);
        if($row=  mysqli_fetch_array($result)){
            $dateResult=$row;
        }
        $day=0;
        if($dateResult['duration_type']==1){
            $day+=$dateResult['duration']*7;
            return $day;
        }else{
            $day+=$dateResult['duration'];
            return $day;
        }
    }

    $day=  retreiveDuration($connect,$package_id);
  
          $registerMemberPackage=
                  "INSERT INTO signuppackage (member_record_id,package_id,purchase_date,
              package_startdate,package_enddate,purchase_price,payment_status
              ,payment_remark,handledby,status,date_of_creation,remarks) ".
                  "VALUES('$member_id','$package_id',NOW(),'$package_startdate',
                    DATE_ADD('$package_startdate', INTERVAL '$day'  DAY) ,'$purchase_price',
                        '$paymentstatus','$payment_remark','$adminid','0',NOW(),'$remark')";
          mysqli_query($connect, $registerMemberPackage)or die(mysqli_error($connect));
          if(mysqli_affected_rows($connect)){
           echo   "Member register Package successful!";
          }else{
           echo   "Member register Package not successful!";
          }
          
          
          
        }else{
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        ?>
                    
                    
                    
     
                   

                </div>



            </div>
            <div class="clear"></div>
        </div>              
    </body>
</html>
