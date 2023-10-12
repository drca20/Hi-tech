<?php
$qry="";
if(isset($_GET['id']) && $_GET['id']!=""){
    if(isset($_GET['del'])  && $_GET['del']==true){
        $qry = "delete from emergency WHERE id=".$_GET['id'];
    }
}
if($qry!=""){
      require_once("../php/connect_db.php");
    $con->query($qry);
    require_once("../php/close_db.php");
}
  header("Location: ../Emerg-ppl.php");
?>
