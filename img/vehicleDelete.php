<?php
$qry="";
if(isset($_GET['vid']) && $_GET['vid']!=""){
    if(isset($_GET['del'])  && $_GET['del']==true){
        $qry = "delete from vehicle WHERE VehicleId=".$_GET['vid'];
    }
}
if($qry!=""){
      require_once("../php/connect_db.php");
    $con->query($qry);
    require_once("../php/close_db.php");
}
  header("Location: ../Vehical.php");
?>
