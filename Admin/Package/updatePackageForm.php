<!DOCTYPE html>
<html>
    <head>
       
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      
        <link href="../css/default.css" rel="stylesheet" type="text/css" /> 
            <?php
       include "../StoreVadJs.html";
       ?>
        <title></title>
    </head>
    <body>
        <div id="rounded">
            <div id="main" class="container">
                <h1>Admin Account Page</h1>
                <?php
                include './headMenu.php';
                
                require_once '../../dbfunction.php';
                $connect=  getDbConnect();
               $pac_id= $_GET['edit'];
                if(!mysqli_connect_errno()){
                   $sqlStr="Select ap.package_id,ap.package_name,ap.package_description,
                       ap.duration_type,ap.duration,ap.list_price,ap.default_offered_price,ap.remarks
                       from artpackage ap,signuppackage sp Where ap.package_id='$pac_id'";
                $result=   mysqli_query($connect, $sqlStr)or die(mysqli_error($connect));
                while($row=  mysqli_fetch_array($result)){
                    $package_info=$row;
                }
                }
                      
                
              // $packageinformation= $_SESSION['packageinformation'];
                ?>
                <div class="clear"></div>

                  
                <div id="pageContent">
           
                    <h1> Edit Package </h1>
                    <form id="form" class="blocks" method="post" action="updatePackage.php">
                        <p>
                        <label>Package: </label>
                        <input type="text" class="text" name="package" value='<?=$package_info['package_name'] ?>'>
                        </p> 
                        
                        <p>
                            <label>Description: </label>
                        <input type="textfield" class="text" name="description"  value='<?=$package_info['package_description'] ?>'> 
                        
                        </p>  
                        
                        <p>
                            <label>Duration Type: </label>
                        <input type="textfield" class="text" max="9" name="duration_type" value='<?=$package_info['duration_type'] ?>'>
                        </p>   
                        
                        <p><label>Duration: </label>
                        <input type="textfield" class="text"  max="365" name="duration" value='<?=$package_info['duration'] ?>'> </p>  
                        <p><label>Price: </label>
                        <input type="textfield" class="text" name="price"  value='<?=$package_info['list_price'] ?>'>  </p> 
                        <p> <label>Original Price: </label>
                        <input type="textfield" class="text" name="original_price"   value='<?=$package_info['default_offered_price'] ?>'></p>   
                        <p><label>Remark: </label>
                        <input type="textfield" class="text" name="remark" value='<?=$package_info['remarks'] ?>'></p> 
                      
                        <input type="hidden" name="hiddenfield" value="<?= $pac_id ?>">
                       
                       <p> <input type="submit" class="btn" name="submit" ></p>
                    </form>
                   

                </div>



            </div>
            <div class="clear"></div>
        </div>

    </body>
</html>
