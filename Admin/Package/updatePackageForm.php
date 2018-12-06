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
           
                    <h1> Edit Package </h1>
                    <form id="form" class="blocks" method="post" action="updatePackage.php">
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
                        <input type="textfield" class="text" max="9" name="description_type">
                        </p>   
                        
                        <p><label>Duration: </label>
                        <input type="textfield" class="text"  max="9" name="duration"> </p>  
                        <p><label>Price: </label>
                        <input type="textfield" class="text" name="price">  </p> 
                        <p> <label>Original Price: </label>
                        <input type="textfield" class="text" name="original_price"></p>   
                        <p><label>Remark: </label>
                        <input type="textfield" class="text" name="remark"></p> 
                      
                        <input type="hidden" name="hiddenfield" value="<?= $_GET['edit'] ?>">
                       
                       <p> <input type="submit" class="btn" name="submit" ></p>
                    </form>
                   

                </div>



            </div>
            <div class="clear"></div>
        </div>

    </body>
</html>
