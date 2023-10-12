<?php include('php/header.php');

?>

    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Members Details</h2>

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
                        <br><br>
                                 <?php
                           $qry="select * from users where AppartmentId='".$_SESSION['a_id']."' order by BlockNumber";
                                $result = $con->query($qry);
 while($row = $result->fetch_assoc()){
?>
                     <div class="media post_item">

                             <img src="img/product/user.png" alt="post" height="80px" width="80px">
                         <div class="media-body">
                                <div class="col-lg-12">
                                    <h4><?php echo $row['FirstName'];echo"  "; echo $row['LastName'] ?></h4>

                                    <p><strong>Block N0 : </strong><?php echo $row['BlockNumber'] ?></p></div>

                        </div>
                            </div>

                        <br>
                        <?php
$qry1="select * from users where EmailAddress='".$_SESSION['Email']."'";
$result1=$con->query($qry1);
 if($result1->num_rows > 0){
                    $row1 = $result1->fetch_assoc();
if($row1['isSecretary'] == 1){

                        if($row['BlockNumber']!=$_SESSION['bno']){
                        ?>
                        <div class="col-md-12 form-group">

                            <a  href="apis/memberDelete.php?bid=<?php echo $row['BlockNumber'] ?> &del=true">  <button class="btn btn-danger" >
                                Delete member
                                </button></a>


                        </div>


                        <?php
                                     }}}}
                        ?>





                </div>
                </div>
       </div>


   </section>
   <!--================Blog Area end =================-->

   <!--::footer_part start::-->
<?php include('php/footer.php')?>
