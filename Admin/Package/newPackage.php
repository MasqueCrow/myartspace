<!--
Creating new type of package
-->
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
                ?>
                <div class="clear"></div>

                  
                <div id="pageContent">
           
                    <h1> Insert New Package </h1>
                    <form id="form" class="blocks" method="post" action="handleNewPackage.php">
                       
                        <p>
                        <label>Package: </label>
                        <input type="text" class="text" name="package">
                        </p> 
                        
                        <p>
                            <label>Description: </label>
                        <input type="textfield" class="text" name="description"> 
                        
                        </p>  
                        
                        <p>
                            <label>Duration Type: </label>
                        <input type="textfield" class="text" max="1" name="duration_type">
                        </p>   
                        
                        <p><label>Duration: </label>
                        <input type="textfield" class="text"  max="99999" name="duration"> </p>  
                             <p> <label>Original Price: </label>
                        <input type="textfield" class="text" name="original_price"></p>
                        <p><label>Special Price: </label>
                        <input type="textfield" class="text" name="special_price">  </p> 
   
                        <p><label>Remark: </label>
                        <input type="textfield" class="text" name="remark"></p> 
                      
                      
                       
                       <p> <input type="submit" class="btn" name="submit" ></p>
                    </form>
                   

                </div>



            </div>
            <div class="clear"></div>
        </div>

    </body>
</html>
