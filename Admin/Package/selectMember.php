<!--Select the members base on the input keyup by the users -->

<?php
session_start();
require_once '../../dbfunction.php';
$member_id=$_POST['memberid']; //retrieving post from registerPackagerequest.php

$con = getDbConnect(); 
if (!mysqli_connect_errno($con)) { 
$SqlMemberQuery="SELECT  record_id,first_name,last_name,status ".
        "FROM memberbasicinfo " .
        "WHERE record_id LIKE '$member_id%' AND status='0' " .
         "ORDER BY record_id";
$sql_result=mysqli_query($con,$SqlMemberQuery);



while($row=  mysqli_fetch_array($sql_result)){
    $_SESSION['member_id']=$row['record_id'];
    $memberRecord[$row['record_id']]=$row;
  echo $row['first_name']." ".$row['last_name'];
}



if (isset($memberRecord)) { // studentList exist,dropdown list
    
       echo "<select id='memberSel' >";
        foreach ($memberRecord as $recordid => $record) {
          
            echo "<option value='$recordid'>". $record['record_id'] . "   " . 
                 $record['first_name'] ." ".$record['last_name'] . "</option>"; 
        }
         echo "</select><br /><br/ >";


    }
   
    else {
        echo "no record.";
    }
   // mysqli_close($con);

}
?>
<?php
if (isset($memberRecord)){ //if record exist in $memberRecord

?>

<script>
    $(document).ready(function(){
         
      loadPackage();
        $("#memberSel").change(loadPackage);
    });
            
    function loadPackage(){
        var inputVal =  $("#memberSel").val(); // get value from dropdown list
        $("#addPackageDIV").html("");

        var data = new Object();
        data.recordid = inputVal;
        $("#packageDIV").load("selectPackage.php", data, addPackage);
}

function addPackage() {
        $("#addpackageDIV").load("selectNotRegisteredPackage.php");
    }
</script>




<div id="packageDIV" style="padding:5px;width:490px;background-color:lightskyblue;"></div>
<br />
<br />
Package Not Registered:<br /><br />
<div id="addpackageDIV" style="padding:5px;width:490px; background-color:lightcoral"></div>




<?php } ?>
