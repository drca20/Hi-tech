<?php include('php/header.php')?>

<!-- breadcrumb part start-->
<section class="breadcrumb_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <h2>Society Announcement</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb part end-->
<?php
$qry1="select * from users where EmailAddress='".$_SESSION['Email']."'";
$result1=$con->query($qry1);
 if($result1->num_rows > 0){
                    $row1 = $result1->fetch_assoc();
if($row1['isSecretary'] == 1){


    if(isset($_POST['announcement'])){
         $t=time();
                                    $timestamp = date("Y-m-d h:i:s",strtotime(date("Y-m-d h:i:s",$t)));
        $qry5="insert into announcement (Appartment_Id,Description,time) values ('".$_SESSION['a_id']."','".$_POST['textdesc']."','".$timestamp."')";
        $con->query($qry5);
    }

?>
<section>
    <div class="container">
        <div class="row">    
            <div class="col-sm-6">
                <br>
         
                <h3 class="widget_title">Create Announcement</h3>
                <hr>
                <div class="media post_item">
                    <div class="media-body">
                        <div class="col-lg-12">
                            <form method="post">
                            <div class="form-group">
                                <label for="comment">Write Here:</label>
                                <textarea class="form-control" rows="5" id="comment" name="textdesc" required></textarea>
                            </div>
                            <hr>

                            <button type="submit" class="btn btn-success" name="announcement">Create Announcement</button> <br><br>
                            </form>

                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>

</section>
<?php
}}

?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <br>

                <h3 class="widget_title">List of Announcement</h3>
                <hr>
                <?php
                $qry="select * from announcement where Appartment_Id='".$_SESSION['a_id']."' and status=1";
                    $result=$con->query($qry);
                     if($result->num_rows > 0){ $counter=1;
                    while($row = $result->fetch_assoc()){
                         $t=$row['time'];
                                    $timestamp = date("d-m-Y",strtotime($row['time']));


                ?>
                <div class="media post_item">
                    <div class="media-body">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Announcement Date : <?php echo $timestamp;?></label>
                                <textarea class="form-control foo"  id="comment" disabled ><?php echo $row['Description'];?></textarea>
                            </div>
                            <?php
                        if($row1['isSecretary'] == 1){

                            ?>

                     <a  href="apis/anouncementStatus.php?anid=<?php echo $row['id'] ?> &del=true"> <button type="sybmit" value="submit" class="btn btn-danger ">
                         Delete</button></a>
               <?php }
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
