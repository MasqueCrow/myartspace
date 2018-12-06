<?php

function getExistingAdmininfo($connect) {// for editAdminInfo.php

    $admininfo = $_SESSION['admininfo'];
$updatedadmininfo= $_SESSION['updatedAdmin'];
    $Adminarray = array();
    if (mysqli_connect_errno($connect)) {
        echo"Failed to connect to MYSQL" . mysqli_connect_errno($connect);
    } else {
          if ($updatedadmininfo) { //check if there is updated record,if there is, Update it!

        $r = new Admin($updatedadmininfo); //constructor
        $Adminarray[$r->firstname] = $r;

         }else{
             
              $r = new Admin($admininfo); //constructor
        $Adminarray[$r->firstname] = $r;
             
         } 
        mysqli_close($connect);
    }
    return $Adminarray;
}

function getUpdatedAdmininfo($connect) { //for ViewAdminMemberInfo.php

    $admininfo = $_SESSION['admininfo'];
    
    $Adminarray = array();
    if (mysqli_connect_errno($connect)) {
        echo"Failed to connect to MYSQL" . mysqli_connect_errno($connect);
    } else {

        $sqlStr1 = "Select * FROM adminaccount " . "WHERE record_id='".$admininfo['record_id']."' ";
        $Finalresult = mysqli_query($connect, $sqlStr1) or die(mysqli_error($connect));
        while ($retrieveupdate = mysqli_fetch_array($Finalresult)) {
            $r = new Admin($retrieveupdate) or die(mysqli_error($connect)); //constructor
            $Adminarray[$r->firstname] = $r;
             $_SESSION['updatedAdmin']=$retrieveupdate;
        }
    }
    // mysqli_close($connect);

    return $Adminarray;
}

/*
  function EditAdmininfo($connect) {
  $admininfo = $_SESSION['admininfo'];
  if (isset($admininfo)) {
  if (mysqli_connect_errno($connect)) { //check whether connection exist
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  } else {
  $r = new Admin($admininfo);

  //$recordid = $_SESSION['recordid'];
  $first_name = $r->firstname;
  $last_name = $this->lastname;
  $gender = $this->gender;
  $nationality = $this->nationality;
  //  $occupation = $_POST['occupation'];
  //$address1 = $_POST['address_line1'];

  $sqlStr = "UPDATE memeberbasicinfo " .
  "SET first_name ='$first_name', " .
  "last_name='$last_name', " .
  "gender='$gender', " .
  "nationality='$nationality' ";
  /*  "occupation='$occupation', " .
  "address_line1='$address1', " .
  "address_line2='$address2', " .
  "address_line3='$address3', " .
  "email_address_1='$emailaddress1', " .
  "email_address_2='$emailaddress2', " .
  "contact_no1= '$contact1', " .
  "contact_no2='$contact2',  " .
  "date_of_birth='$DOB' " ; */
//  "WHERE recordid=$recordid";

/*    mysqli_query($connect, $sqlStr);

  if (mysqli_affected_rows($connect) > 0) {
  echo "record Updated";

  } else {
  echo "NO record updated.";
  }
  }
  mysqli_close($connect);
  }
  echo"<a href='ViewAdminDetals.php'>[ Back to view details ]</a>  ";
  }

 */
?>
