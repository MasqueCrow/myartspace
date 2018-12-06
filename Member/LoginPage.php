
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="../Style.css" type="text/css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    
    </head>
       <body>
           <p id="LoginLogo">
            <img src="../Images2/GreyLogo.png" />
           </p>
             <p id="LoginLogo2">
            <img src="../Images2/WordLogo.png" />
           </p>
        <!--<p id="LoginTitle">Member Administration System</p> -->
           <form  method='post' action='Memberhandlelogin.php'>
        <table id="logintable">
            <tr>
                <td class="LoginText">Username :</td> 
                <td> <input class="LoginField" size="30" type="text" name="adminid" /></td>    
            </tr>
            <tr>
                <td class="LoginText">Password :</td>
                <td> <input class="LoginField" size="30" type="password" name="password" /></td>    
            </tr>
            <tr>
                <td>&nbsp;</td>
       
                <td align="right"><input id="LoginButton" type="submit" name="submit" value="login"/></td>    
             
           
            </tr>
            
        </table>
           </form>
          
        
    </body>
</html>
