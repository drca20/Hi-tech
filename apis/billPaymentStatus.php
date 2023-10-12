<?php
$qry="";
if(isset($_GET['pid']) && $_GET['pid']!=""){
    if(isset($_GET['del'])  && $_GET['del']==true){
        $t=time();
                                    $timestamp = date("Y-m-d h:i:s",strtotime(date("Y-m-d h:i:s",$t)));
        $qry = "update billpayment set status=0 , time_pay='".$timestamp."' WHERE id=".$_GET['pid'];
    }
}
if($qry!=""){
      require_once("../php/connect_db.php");
    $con->query($qry);
    require_once("../php/close_db.php");
}
  header("Location: ../userBill.php");
?>
