<?php include('php/header.php')?>

<!-- breadcrumb part start-->
 <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Approve User Profile</h2>
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

                $qry1 = "SELECT * FROM  appartment where AppartmentId='".$_SESSION['a_id']."'";
                   $result1=$con->query($qry1);
                    $row1 = $result1->fetch_assoc();
                   $qry = "SELECT * FROM users where isConfirm=0";
                $result = $con->query($qry);
                if($result->num_rows > 0){


                    while($row = $result->fetch_assoc()){



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
                          <a  href="apis/userapprove.php?id=<?php echo $row['UserId'] ?> &email=<?php echo $row['EmailAddress'] ?> &del=true"> 	<button class="btn btn-success">Approve</button></a>
                          <a  href="apis/usereject.php?id=<?php echo $row['UserId'] ?>&email=<?php echo $row['EmailAddress'] ?>  &del=true">   <button class="btn btn-danger" >Reject</button></a>


		</div>

                </div>
            </div>
<br><br>



                </div>
            </div>
            <?php
                    }}?>

        </div>
    </div>




<!--================End Single Product Area =================-->
<!-- subscribe part here -->

<!-- subscribe part end -->
<?php include('php/footer.php')?>
