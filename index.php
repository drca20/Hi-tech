<?php include('php/header.php');
if($_SESSION['recnf'] == 0){
    header('Location: ConfrimReservetion.php');
}
if($_SESSION['recnf'] == 2){
    header('Location: Registration-choise.php');
}
if($_SESSION['paymentDone']==2)
{
    session_destroy();
     header('Location: login.php');
}
if($_SESSION['paymentDone']==0)
{
    session_destroy();
     header('Location: login.php');
}
?>

    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                $qry = "SELECT * FROM appartment where AppartmentId='".$_SESSION['a_id']."'";

                $result = $con->query($qry);
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){

            ?>
                      <div class="breadcrumb_iner">

                        <h2><?php echo $row['Appartment_Name'] ?></h2>
                    </div>
                    <?php
                    }
                }
                    ?>
                </div>
            </div>
        </div>
    </section>

<script type="text/javascript">
            test();
        </script>
    <!-- feature part here -->
    <section class="feature_part section_padding">
        <div class="container">

            <div class="row justify-content-center">
                 <div class="col-lg-3 col-sm-6">
                      <a href="Announcement.php">
                    <div class="single_feature_part">
                        <img src="img/icon/megaphone.svg" alt="#">
                        <h4>Annoucement</h4>
                          </div></a>
                </div>
                <div class="col-lg-3 col-sm-6">
                      <a href="userBill.php">
                    <div class="single_feature_part">
                        <img src="img/icon/bill.svg" alt="">
                        <h4>My Bills</h4>
                          </div></a>
                </div>
                 <?php
                        $qry1="select * from users where EmailAddress='".$_SESSION['Email']."'";
                        $result1=$con->query($qry1);
                         if($result1->num_rows > 0){
                                            $row1 = $result1->fetch_assoc();
                        if($row1['isSecretary'] == 1){

                ?>
                 <div class="col-lg-3 col-sm-6">
                                          <a href="societypendingbill.php" >
                    <div class="single_feature_part">
                        <img src="img/icon/bill.svg" alt="#">
                        <h4>Society Pending Payment</h4>
                    </div>
                    </a>
                </div>

                <?php }}?>
                <div class="col-lg-3 col-sm-6">
                    <a href="Emerg-ppl.php">

                    <div class="single_feature_part">
                        <img src="img/icon/call.svg" alt="#">
                        <h4>Emergency Directory</h4>
                        </div></a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="buildingMaintenance.php">
                    <div class="single_feature_part">
                        <img src="img/icon/wallet.svg" alt="#">
                        <h4>Society Maintenance</h4>
                        </div></a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="members.php"><div class="single_feature_part">
                        <img src="img/icon/team-building%20(1).svg" alt="#">
                        <h4>Members</h4><br>
                        </div></a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="Gate-Pass.php">
                    <div class="single_feature_part">
                        <img src="img/icon/feature_icon_1.svg" alt="#">
                        <h4>Gate Pass</h4><br>
                        </div></a>
                </div>
                <div class="col-lg-3 col-sm-6">
                   <a href="parkingreserve.php">
                    <div class="single_feature_part">
                        <img src="img/icon/parking.svg" alt="#">
                        <h4>Parking</h4>
                       </div></a>
                </div>
                <div class="col-lg-3 col-sm-6">
                     <a href="complain.php">
                    <div class="single_feature_part">
                        <img src="img/icon/customer.svg" alt="#">
                        <h4>Complains</h4>
                    </div>
                    </a>
                </div>
                 <?php
                        $qry1="select * from users where EmailAddress='".$_SESSION['Email']."'";
                        $result1=$con->query($qry1);
                         if($result1->num_rows > 0){
                                            $row1 = $result1->fetch_assoc();
                        if($row1['isSecretary'] == 1){

                ?>
                 <div class="col-lg-3 col-sm-6">
                                          <a href="approveProfile.php" >
                    <div class="single_feature_part">
                        <img src="img/icon/appartment.svg" alt="#">
                        <h4>Approve Block</h4>
                    </div>
                    </a>
                </div>

                <?php }}?>

                <div class="col-lg-3 col-sm-6">
                      <a href="UserProfile.php">
                    <div class="single_feature_part">
                        <img src="img/icon/team-building.svg" alt="#">
                        <h4>Profile</h4>
                          </div></a>
                </div>

                <div class="col-lg-3 col-sm-6">
                     <a href="Vehical.php">
                    <div class="single_feature_part">
                        <img src="img/icon/car.svg" alt="#">
                        <h4>Vehical Information</h4>
                         </div></a>
                </div>
                <div class="col-lg-3 col-sm-6">
                                          <a href="SocietyInfo.php">
                    <div class="single_feature_part">
                        <img src="img/icon/address.svg" alt="#">
                        <h4>Society Information</h4>
                    </div>
                    </a>
                </div>
            </div>
        </div>

    </section>


    <script type="text/javascript">
     function test()
    {
        alert('In test Function');
    }
    </script>

    <!-- feature part end -->

    <!--::footer_part start::-->
   <?php include('php/footer.php')?>
