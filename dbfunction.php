<?php


$SALT= "mas123";

function getDbConnect() {
    // get a database connect to studentacad database
    $con =  mysqli_connect("localhost:3306", "waduser01", "Password4321", "myartspacedb");
    return $con;
}
  

?>
