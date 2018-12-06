
<?php
//session_start();
//require'../dbfunction.php';
 
function getMemberinfo($connect1) {
  $record_id=$_GET['rid']; //recordid retrieved from editMemberInfo.php url to get
                            //recordid of member in the database to pass to editMemberInfo.php
 
   $Memberarray = array();
    if (!mysqli_connect_errno($connect1)) {
        $sqlQueryStr =
                "SELECT * " .
                "FROM  memeberbasicinfo mb ".
                "WHERE record_id ='$record_id'";





        $result = mysqli_query($connect1, $sqlQueryStr) or die(mysql_error($connect1, $sqlQueryStr)); // execute the SQL query        

        if ($row = mysqli_fetch_array($result)) { // fetch the record
 //echo $row['record_id'];          
$r = new Member($row); // sent to Admininfo.php
            $Memberarray[$r->recordid] = $r;
        } else {
            
        }
    } else {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    return $Memberarray; //sent to editMemberInfo.php
}


?>
