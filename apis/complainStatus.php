<?php
$qry="";
if(isset($_GET['cid']) && $_GET['cid']!=""){
    if(isset($_GET['del'])  && $_GET['del']==true){
        $qry = "UPDATE complain SET status = 0 WHERE id=".$_GET['cid'];
    }
}
if($qry!=""){
      require_once("../php/connect_db.php");
    $con->query($qry);
    require_once("../php/close_db.php");
}
  header("Location: ../complain.php");
?>
