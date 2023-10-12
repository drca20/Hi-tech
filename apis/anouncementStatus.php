<?php
$qry="";
if(isset($_GET['anid']) && $_GET['anid']!=""){
    if(isset($_GET['del'])  && $_GET['del']==true){
        $qry = "UPDATE announcement SET status = 0 WHERE id=".$_GET['anid'];
    }
}
if($qry!=""){
      require_once("../php/connect_db.php");
    $con->query($qry);
    require_once("../php/close_db.php");
}
  header("Location: ../Announcement.php");
?>
