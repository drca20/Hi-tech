<?php include('php/header.php')?>
<?php
if(isset($_POST['updateuser'])){

    $qry3="update users set  FirstName='".$_POST['fname']."' ,LastName='".$_POST['lname']."' ,MobileNumber='".$_POST['mno']."',EmailAddress='".$_POST['email']."' where EmailAddress='".$_SESSION['Email']."'";
   if($con->query($qry3)){
       $_SESSION['Email']=$_POST['email'];

   }}
?>
<!-- breadcrumb part start-->
 <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>User Profile</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- breadcrumb part end-->

<!--================Single Product Area =================-->

    <div class="container">
        <div class="row justify-content-center">
           <?php
                $qry = "SELECT * FROM users where EmailAddress='".$_SESSION['Email']."'";
                $qry1 = "SELECT * FROM  appartment where AppartmentId='".$_SESSION['a_id']."'";
                   $result1=$con->query($qry1);
                    $row1 = $result1->fetch_assoc();
                $result = $con->query($qry);
                if($result->num_rows > 0){
                    $row = $result->fetch_assoc();
                }


            ?>
            <div class="col-lg-8">
                <div class="single_product_text text-center">
                   <br><br>


                  <div class="card card border-secondary">


                <div class="card-body">

                    <h5 class="card-title">Flat No - <?php echo $row['BlockNumber'] ?></h5>
                    <strong>
                        <p><?php echo $row['FirstName'];echo "  ";echo $row['LastName']  ?></p>
                    </strong>
                    <strong>
                        <p>Appartment Name : <?php echo $row1['Appartment_Name']?></p>
                    </strong>
                    <strong>
                        <p>Secretary Name : <?php echo $row1['Secretary_Name']?></p>
                    </strong>
                    <strong>
                        <p>Email Address  : <?php echo $row['EmailAddress']?></p>
                    </strong>

 <strong>
                        <p>
                            <b>Contact Detail: <?php echo $row['MobileNumber'] ?></b></p></strong>
                      <div class="box-tools"><br>
			<button class="btn_3" data-toggle="modal" data-target="#modal-new-event">Edit</button>

		</div>

                </div>
            </div>
<br><br>



                </div>
            </div>

        </div>
    </div>
<div class="modal fade" id="modal-new-event">
  <div class="modal-dialog">
	<div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">Update User Detail</h4>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group p_star">
                        <span class="input-group-addon">
                            <h4>First Name </h4>
                        </span>
                        <input type="text" class="form-control"  name="fname" value="<?php echo $row['FirstName']?>" required>
                    </div><br>
                    <div class="form-group p_star">
                        <span class="input-group-addon">
                            <h4>Last Name </h4>
                        </span>
                        <input type="text" class="form-control" name="lname" value="<?php echo $row['LastName'] ?>" required>
                    </div><br>
                    <div class="form-group p_star">
                        <span class="input-group-addon">
                            <h4>Mobile Number</h4>
                        </span>
                        <input type="text" class="form-control"  name="mno" pattern="[0-9]{10}" value="<?php echo $row['MobileNumber'] ?>" required>
                    </div><br>
                    <div class="form-group p_star">
                        <span class="input-group-addon">
                            <h4>Email Address</h4>
                        </span>
                        <input type="email" class="form-control"  name="email" value="<?php echo $row['EmailAddress'] ?>" required>
                    </div><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="updateuser">Update</button>
                </div>
            </form>
        </div>
  </div>
</div>



<!--================End Single Product Area =================-->
<!-- subscribe part here -->

<!-- subscribe part end -->
<?php include('php/footer.php')?>
