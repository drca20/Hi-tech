<?php
$qry="";
if(isset($_GET['eid']) && $_GET['eid']!=""){
    if(isset($_GET['del'])  && $_GET['del']==true){
        $qry = "UPDATE maintenance SET status = 0 WHERE id=".$_GET['eid'];
    }
}
if($qry!=""){
      require_once("../php/connect_db.php");
    $con->query($qry);
    require_once("../php/close_db.php");
}
  header("Location: ../buildingMaintenance.php");
?>
