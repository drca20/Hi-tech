<?php
$qry="";
if(isset($_GET['bid']) && $_GET['bid']!=""){
    if(isset($_GET['del'])  && $_GET['del']==true){
        $qry = "delete from block WHERE BlockNumber=".$_GET['bid'];
        $qry1 = "delete from users WHERE BlockNumber=".$_GET['bid'];
        $qry2 = "delete from vehicle WHERE BlockNumber=".$_GET['bid'];
    }
}
if($qry!=""){
      require_once("../php/connect_db.php");
    $con->query($qry);
        $con->query($qry1);
        $con->query($qry2);
    require_once("../php/close_db.php");
}
  header("Location: ../members.php");
?>
