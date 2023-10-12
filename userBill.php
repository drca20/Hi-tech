<?php include('php/header.php')?>

<!-- breadcrumb part start-->
<section class="breadcrumb_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <h2>Society Bill Trasaction</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb part end-->

<?php
if(isset($_POST['AddBill_Block'])){
         $t=time();
    $second=$_POST['days']*86400;
     $timestamp = date("Y-m-d h:i:s",strtotime(date("Y-m-d h:i:s",$t)) +$second);
    $qry3="insert into billpayment (AppartmentId,description,BlockNumber,Amount,time_due) values ('".$_SESSION['a_id']."','".$_POST['textbill']."','".$_POST['block']."','".$_POST['amount']."','".$timestamp."')";
   if($con->query($qry3)){


   }}



if(isset($_POST['AddBill_Apart']))
{
    $qry="select * from block where AppartmentId='".$_SESSION['a_id']."'";
$result=$con->query($qry);
if($result->num_rows >0){
    while($row = $result->fetch_assoc())
    {

        $t=time();
    $second=$_POST['days']*86400;
     $timestamp = date("Y-m-d h:i:s",strtotime(date("Y-m-d h:i:s",$t)) +$second);
    $qry3="insert into billpayment (AppartmentId,description,BlockNumber,Amount,time_due) values ('".$_SESSION['a_id']."','".$_POST['textbill']."','".$row['BlockNumber']."','".$_POST['amount']."','".$timestamp."')";
        $con->query($qry3);
    }

}
}
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <br>
    <div class="col-md-12 form-group">  <?php
$qry1="select * from users where EmailAddress='".$_SESSION['Email']."'";
$result1=$con->query($qry1);
 if($result1->num_rows > 0){
                    $row1 = $result1->fetch_assoc();
if($row1['isSecretary'] == 1){ ?>


                            <button type="submit" value="submit" class="btn_3"  data-toggle="modal" data-target="#modal-new-event">
                                Add Bill To General Appartment
                            </button>



                        </div>
                <div class="col-md-12 form-group">

                            <button type="submit" value="submit" class="btn_3" name="add" data-toggle="modal" data-target="#modal-new-event1">
                                Add Bill To Block wise
                            </button>

<?php }}?>

                        </div>
                <h3 class="widget_title">List of Pending Payment </h3>
                <hr>
                <?php
                $qry="select * from billpayment where AppartmentId='".$_SESSION['a_id']."' and BlockNumber='".$_SESSION['bno']."'  and status=1";
                    $result=$con->query($qry);
                     if($result->num_rows > 0){ $counter=1;
                    while($row = $result->fetch_assoc()){
                         $t=$row['time_create'];
                                    $timestamp = date("d-m-Y",strtotime($t));
                         $t1=$row['time_due'];
                                    $timestamp1 = date("d-m-Y",strtotime($t1));



                ?>
                <div class="media post_item">
                    <div class="media-body">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Payment Creation Date : <?php echo $timestamp?></label>
                               <br>
                                  <b><label>Payment Due Date : <?php echo $timestamp1;?></label><br></b>
                                     <input type="text" placeholder="100" required name="amount" disabled value="<?php echo $row['Amount'];?>">
                                <br><label>Payment Description :</label><br>
                                 <textarea class="form-control foo"  id="comment" disabled ><?php echo $row['description'];?></textarea>
                            </div>


                            <?php


                            ?>

                     <a  href="apis/billPaymentStatus.php?pid=<?php echo $row['id']?> &del=true"> <button type="sybmit" value="submit" class="btn btn-success ">
                         Pay</button></a>
               <?php
                            ?>
                            <hr>
                                </div>

                    </div>
                </div>
                 <?php

                    }}
                ?>
            </div>
        </div>
    </div>

</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <br>

                <h3 class="widget_title">List of Your Payment History </h3>
                <hr>
                <?php
                $qry="select * from billpayment where AppartmentId='".$_SESSION['a_id']."' and BlockNumber='".$_SESSION['bno']."'  and status=0";
                    $result=$con->query($qry);
                     if($result->num_rows > 0){ $counter=1;
                    while($row = $result->fetch_assoc()){
                         $t=$row['time_create'];
                                    $timestamp = date("d-m-Y",strtotime($t));
                         $t1=$row['time_pay'];
                                    $timestamp1 = date("d-m-Y",strtotime($t1));
                         $t2=$row['time_due'];
                                    $timestamp2 = date("d-m-Y",strtotime($t2));



                ?>
                <div class="media post_item">
                    <div class="media-body">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Payment Creation Date : <?php echo $timestamp?></label>
                               <br>
                                 <label>Payment Due Date : <?php echo $timestamp2?></label>
                               <br>
                                  <b><label>Payment Pay Date : <?php echo $timestamp1;?></label><br></b>
                                     <input type="text" placeholder="100" required name="amount" disabled value="<?php echo $row['Amount'];?>">
                                         <br><label>Payment Description :</label><br>
                                 <textarea class="form-control foo"  id="comment" disabled ><?php echo $row['description'];?></textarea>
                            </div>


                            <hr>
                                </div>

                    </div>
                </div>
                 <?php

                    }}
                ?>
            </div>
        </div>
    </div>

</section>
<div class="modal fade" id="modal-new-event">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">Add Bill To General Appartment</h4>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group p_star">
                        <span class="input-group-addon">
                            <h3>Bill Amount</h3>
                        </span>
                        <input type="text" class="form-control" placeholder="Amount" name="amount" required>
                    </div><br>
                    <div class="form-group p_star">
                        <span class="input-group-addon">
                            <h3>Description</h3>
                        </span>
                         <textarea class="form-control foo"  id="comment"  name="textbill"></textarea>
                    </div><br>
                    <div class="form-group p_star">
                        <span class="input-group-addon">
                            <h3>After How Many Days Due</h3>
                        </span>
                       <input type="text" class="form-control" placeholder="1,2,3..." name="days" required>
                    </div><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="AddBill_Apart">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-new-event1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">Add Bill To Block wise </h4>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                 <div class="modal-body">
                    <div class="form-group p_star">
                        <span class="input-group-addon">
                            <h3>Bill Amount</h3>
                        </span>
                        <input type="text" class="form-control" placeholder="Amount" name="amount" required>
                    </div><br>
                      <div class="form-group p_star">
                        <span class="input-group-addon">
                            <h3>Block No</h3>
                        </span>

                                <div class="shipping_box">
                                <select name="block" class="shipping_select section_bg">

                                <?php


                                $qry11="select * from block where AppartmentId='".$_SESSION['a_id']."' order by BlockNumber";
                                $result11 = $con->query($qry11);

                                while($row11=$result11->fetch_assoc())
                                {
                                   ?>

                                   <option value="<?php echo $row11['BlockNumber']?>"><?php echo $row11['BlockNumber']?></option>


                                <?php
                                }

                                ?>


                                </select>

                                </div>






                    </div><br>
                    <div class="form-group p_star">
                        <span class="input-group-addon">
                            <h3>Description</h3>
                        </span>
                         <textarea class="form-control foo"  id="comment"  name="textbill"></textarea>
                    </div><br>
                    <div class="form-group p_star">
                        <span class="input-group-addon">
                            <h3>After How Many Days Due</h3>
                        </span>
                       <input type="text" class="form-control" placeholder="1,2,3..." name="days" required>
                    </div><br>
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="AddBill_Block">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--================Blog Area end =================-->

<!--::footer_part start::-->
<?php include('php/footer.php')?>
