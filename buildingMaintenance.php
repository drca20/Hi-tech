<?php include('php/header.php')?>
<?php
if(isset($_POST['addex']))
{
    $qry="insert into maintenance (AppartmentId,expense_amount,expense_desc,expense_payer) values ('".$_SESSION['a_id']."',
    '".$_POST['ex_amt']."','".$_POST['ex_reason']."','".$_POST['ex_name']."')";
    $con->query($qry);
}

?>
    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Our Society Maintenance</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- breadcrumb part end-->

  <!-- ================ contact section start ================= -->
  <section class="contact-section section_padding">

    <div class="container">

 <div class="col-md-12 form-group">

                               	<button class="btn_3" data-toggle="modal" data-target="#modal-new-event">
                                    Add New Expense
     </button>


                            </div><br>

      <div class="row">
          <?php
  $qry="select * from maintenance where AppartmentId='".$_SESSION['a_id']."' and status =1";

                                $result = $con->query($qry);
$result = $con->query($qry);
if($result->num_rows >0){
          while($row = $result->fetch_assoc()){

          ?>

        <div class="col-lg-12">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-money"></i></span>
            <div class="media-body">
              <h3><?php echo $row['expense_desc']?></h3>
              <p><b>Amount : </b>₹ <?php echo $row['expense_amount'] ?></p>
                <p><b>Paid By : </b><?php echo $row['expense_payer'] ?></p>
                <p><b>Date : </b><?php echo $row['time'] ?></p>
                 <div class="box-tools"><br>
                     <?php
$qry1="select * from users where EmailAddress='".$_SESSION['Email']."'";
$result1=$con->query($qry1);
 if($result1->num_rows > 0){
                    $row1 = $result1->fetch_assoc();
if($row1['isSecretary'] == 1){ ?>
                     <a  href="apis/expenseDelete.php?eid=<?php echo $row['id'] ?> &del=true"> <button class="btn btn-danger" data-toggle="modal" data-target="#modal-new-eventdel">Delete Expense</button></a>
<?php }}?>
		</div>

            </div>
          </div>


            </div>
                                  <hr>

            <hr>
            <?php
          }}
            ?>


      </div>
    </div>
  </section>

<div class="modal fade" id="modal-new-event">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">Add Expense</h4>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group p_star">
                        <span class="input-group-addon">
                            <h3> Expense Heading</h3>
                        </span>
                        <input type="text" class="form-control" placeholder="Reason of expense.." name="ex_reason" required>
                    </div><br>
                     <div class="form-group p_star">
                        <span class="input-group-addon">
                            <h3> Expense Amount</h3>
                        </span>
                        <input type="text" class="form-control" placeholder="Amount" name="ex_amt" required>
                    </div><br>
                     <div class="form-group p_star">
                        <span class="input-group-addon">
                            <h3> Expense Payer Name </h3>
                        </span>
                        <input type="text" class="form-control" placeholder="Name" name="ex_name" required>
                    </div><br>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="addex">Done</button>
                </div>
            </form>
        </div>
    </div>
</div>
  <!-- ================ contact section end ================= -->

 <?php include('php/footer.php')?>
