<?php
$qry="";
if(isset($_GET['aid']) && $_GET['aid']!=""){
    if(isset($_GET['add'])  && $_GET['add']==true){
        $qry = "insert into parking (AppartmentId)values('".$_GET['aid']."')";
    }
}
if(isset($_GET['pid']) && $_GET['pid']!=""){
if(isset($_GET['del']) && $_GET['del']==true){
        $qry = "delete from parking WHERE ParkingId='".$_GET['pid']."'";
    }
}

if($qry!=""){
    require_once("../php/connect_db.php");
    $con->query($qry);
    require_once("../php/close_db.php");
}
header("Location: ../parkingreserve.php");
?>
