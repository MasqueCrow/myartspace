<?php
/*session_start('')*/
 session_start(); 
require'../dbfunction.php';
$connect= getDbConnect();
$admin=$_POST['adminid'];
$adminpassword=$_POST['password'];

if(mysqli_connect_errno($connect)){
echo"Failed to connect to MYSQL".mysqli_connect_errno($connect);    
}else{
    $sqlAdminQuery=
            "SELECT * ".
        "FROM adminaccount ".
        "WHERE admin_loginid='$admin' AND ".
        "password=AES_ENCRYPT('$adminpassword','$SALT')  ";
    
    $result=mysqli_query($connect,$sqlAdminQuery)or die(mysqli_error($connect)) ;
    if($row=mysqli_fetch_array($result)){
        $_SESSION['admininfo'] = $row;
       header('Location:AdminHomepage.php'); // redirect to the homepage.
    }else{
    echo"Failed to connect to MYSQL".mysqli_connect_error($connect);  
    # header('Location: AdminLoginPage.php');
    }
      mysqli_close($connect); 
}
?>
