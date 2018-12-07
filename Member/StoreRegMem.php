
<?php

require '../dbfunction.php';
//postArray=array($nationality=>"nationality", $occupation=>"occupation", $address1=>"address1"
//  $address2=>"address2", $address3=>"address3",  $email1=>"email1"    )
$nationality = $_POST['nationality'];
$occupation = $_POST['occupation'];
$DOB = $_POST['DOB'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$address3 = $_POST['address3'];
$email1 = $_POST['email1'];
$email2 = $_POST['email2'];
$contact1 = $_POST['contact1'];
$contact2 = $_POST['contact2'];
$username = $_POST['username'];
$userpass = $_POST['userpass'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$sex = $_POST['sex'];
$remark = $_POST['remarks'];

$con = getDbConnect();


if (mysqli_connect_errno($con)) {
    echo"Failed to connect to MYSQL" . mysqli_connect_errno();
} else {
    /* $sqltrial =
      "INSERT INTO memeberbasicinfo " .
      "(first_name,last_name) " .
      "VALUES " .
      "('$firstname','$lastname') ";
      $result = mysqli_query($con, $sqltrial);
      if (!mysqli_query($con, $result)) {
      die('Error: ' . mysqli_error($con));
      } */
    /* MemberBasicinfo update in database */
    $sqlQueryStbasicinfo =
            "INSERT INTO memberbasicinfo " .
            "(first_name,last_name,gender,nationality,occupation,address_line1,address_line2,address_line3,
      email_address_1,email_address_2,contact_no1,contact_no2,date_of_birth,remarks) " .
            "VALUES " .
            "('$firstname','$lastname','$sex','$nationality','$occupation','$address1',
      '$address2','$address3','$email1','$email2','$contact1','$contact2','$DOB','$remark') ";

    $resultbasicinfo = mysqli_query($con, $sqlQueryStbasicinfo);

   /* if (!mysqli_query($con, $resultbasicinfo)) {
        die('Error: ' . mysqli_error($con));
    }*/

    /* Memberaccount update in database */

    $sqlQueryStmemberacc = 
            "INSERT into memeberaccount  " .
            "(login_id,password ) " .
            "VALUES " .
            "('$username',AES_ENCRYPT('$userpass','$SALT') )";


    $resultmemberacc = mysqli_query($con, $sqlQueryStmemberacc);
    
    /*if (!mysqli_query($con, $resultmemberacc)) {
        die('Error: ' . mysqli_error($con));
    }*/
    
    /*Updating date of creation in database*/

     if(isset($_POST['submit1'])){
      $datecreation1='INSERT INTO memeberbasicinfo '.
      "(data_of_creation) ".
      " values(NOW())";
      
      $datecreation2='INSERT INTO memeberaccount '.
      "(data_of_creation) ".
      " values(NOW())";

      $result1= mysqli_query($con, $datecreation1);
/*mysqli_query($con, $datecreation2);
      if (!mysqli_query($con, $result1)) {
      die('Error: ' . mysqli_error($con));
      }*/

      } 
}
//('firstname','lastname','sex','nationality','occupation','address1','address2','address3',
//     'email1','email2','contact1','contact2','DOB');
//('login_id','userpass' )
?>