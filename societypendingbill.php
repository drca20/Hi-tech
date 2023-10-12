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


<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <br>



                <h3 class="widget_title">List of Pending Payment </h3>
                <hr>
                <?php
                $qry="select * from billpayment where AppartmentId='".$_SESSION['a_id']."' and status=1";
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
                                 <h3><label>Block NO: <?php echo $row['BlockNumber']?></label>
                               <br></h3>
                                <label>Payment Creation Date : <?php echo $timestamp?></label>
                               <br>


                                <b><label>Payment Due Date : <?php echo $timestamp1;?></label><br></b>
                                     <input type="text" placeholder="100" required name="amount" disabled value="<?php echo $row['Amount'];?>">
                                <br><label>Payment Description :</label><br>
                                 <textarea class="form-control foo"  id="comment" disabled ><?php echo $row['description'];?></textarea>
                            </div>


                            <?php


                            ?>

                     <a href="apis/paymentremind.php?aid=<?php echo $row['AppartmentId']?>&bno=<?php echo $row['BlockNumber']?>&amt=<?php echo $row['Amount']?> &del=true"> <button type="sybmit" value="submit" class="btn btn-danger ">
                         Remind With Mail</button></a>
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




<!--================Blog Area end =================-->

<!--::footer_part start::-->
<?php include('php/footer.php')?>
