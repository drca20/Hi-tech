<?php include('php/header.php')?>
<?php
if(isset($_POST['add']))
{
    $qry2="insert into emergency (Appartment_Id,Profile,Name,mobile) values ('".$_SESSION['a_id']."','".$_POST['person']."','".$_POST['cname']."','".$_POST['mno']."')";
    $con->query($qry2);


}

?>
    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Society Emergency Contact Details</h2>
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
                     <h3 class="widget_title">Contacs</h3>

                                 <hr>

                        <?php
                        $qry="select * from emergency where Appartment_Id = '".$_SESSION['a_id']."'";
                        $result=$con->query($qry);
                        if($result->num_rows >0){
                            while($row = $result->fetch_assoc()){
                        ?>
                     <div class="media post_item">
                        <div class="media-body">
                                <div class="col-lg-12">
                                    <h3><?php echo $row['Profile']?></h3>
                                    <h4><?php echo $row['Name']?></h4>
                                    <p><strong>Contact N0 : </strong><?php echo $row['mobile']?></p>
                                    <?php
$qry1="select * from users where EmailAddress='".$_SESSION['Email']."'";
$result1=$con->query($qry1);
 if($result1->num_rows > 0){
                    $row1 = $result1->fetch_assoc();
if($row1['isSecretary'] == 1){

?>
                                    <div class="col-md-12 form-group">

                            <a  href="apis/emergencyContactDelete.php?id=<?php echo $row['id'] ?> &del=true">  <button class="btn btn-danger" >
                                Delete Contact
                                </button></a>


                        </div>
                                    <?php }}?>
                            </div>
                                <hr>
                        </div>
                    </div>
                            <?php
                            }}
                        ?>
                        <?php
$qry1="select * from users where EmailAddress='".$_SESSION['Email']."'";
$result1=$con->query($qry1);
 if($result1->num_rows > 0){
                    $row1 = $result1->fetch_assoc();
if($row1['isSecretary'] == 1){

?>
                                               <div class="col-md-12 form-group">

                            <button class="btn_3" name="contactadd" data-toggle="modal" data-target="#modal-new-event">
                                Add Contact
                            </button>


                        </div>
                        <?php }}?>
                </div>
                </div>
       </div>


   </section>

<div class="modal fade" id="modal-new-event">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">Leave Entry Register</h4>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group p_star">
                        <span class="input-group-addon">
                            <h3>Profile of Contact </h3>
                        </span>
                        <input type="text" class="form-control" placeholder="ex:Fire safty.." name="person" required>
                    </div><br>
                     <div class="form-group p_star">
                        <span class="input-group-addon">
                            <h3>Name of Contact Person</h3>
                        </span>
                        <input type="text" class="form-control" placeholder="Name" name="cname" required>
                    </div><br>
                     <div class="form-group p_star">
                        <span class="input-group-addon">
                            <h3>Contact Number</h3>
                        </span>
                        <input type="text" class="form-control" placeholder="Mobile Number" name="mno" required>
                    </div><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="add">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
   <!--================Blog Area end =================-->
<?php include('php/footer.php')?>
