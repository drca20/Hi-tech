<?php
$qry="";
if(isset($_GET['pid']) && $_GET['pid']!=""){
    if(isset($_GET['reserve'])  && $_GET['reserve']==true){
        $qry = "UPDATE parking SET Status = 1 WHERE ParkingId='".$_GET['pid']."'";
    }
else if(isset($_GET['unreserve']) && $_GET['unreserve']==true){
        $qry = "UPDATE parking SET Status = 0 WHERE ParkingId='".$_GET['pid']."'";
    }
}

if($qry!=""){
    require_once("../php/connect_db.php");
    $con->query($qry);
    require_once("../php/close_db.php");
}
header("Location: ../parkingreserve.php");
?>
