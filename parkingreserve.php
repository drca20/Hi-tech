<?php include('php/header.php')?>

    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Parking Reservation</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- feature part here -->
<div class="container">
     <br><br>
    <div class="row">

  <div class="col-lg-6">
   <div class="card bg-success text-white">
    <div class="card-body">Reserved </div>
  </div>
      <br><br>
    </div>
      <div class="col-lg-6">

  <div class="card bg-danger text-white ">
    <div class="card-body">Not Reserved</div>
  </div>
            <br><br>
    </div>
</div>
</div>
<div class="container">
<div class="row">
<?php
$qry="select * from parking where AppartmentId='".$_SESSION['a_id']."'";
$result=$con->query($qry);
 if($result->num_rows > 0){ $counter=1;
                    while($row = $result->fetch_assoc()){

?>

  <div class="col-sm-3"><br>
    <div class="card card border-secondary">
      <div class="card-body">
        <h5 class="card-title">Slot <?php echo $counter; $counter++; ?></h5>
          <?php
          if($row['Status'] == 1)
          {
              echo '<a  href="apis/parkingstatus.php?pid='.$row['ParkingId'].'&unreserve=true"><button class="btn btn-primary bg-success">Click to UnReserved.</button></a>';
          }
            else
            {
                 echo '<a  href="apis/parkingstatus.php?pid='.$row['ParkingId'].'&reserve=true"><button class="btn btn-primary btn-danger">Click to Reservation</button></a>';

            }
          ?>

      </div>
    </div>
  </div>

    <?php
          $last_parking_id=$row['ParkingId'];

        }}
    ?>
</div><br>
    </div><br>
<?php
$qry1="select * from users where EmailAddress='".$_SESSION['Email']."'";
$result1=$con->query($qry1);
 if($result1->num_rows > 0){
                    $row1 = $result1->fetch_assoc();
if($row1['isSecretary'] == 1){

?>
<div class="container">
<div class="row">
      <div class="col-lg-6 col-md-6">

                               <a  href="apis/parkingslot.php?aid=<?php echo $row1['AppartmentId'] ?> &add=true"> <button value="submit" class="btn_3">
                                    Add Parking Slot
                                   </button></a>
     </div></div></div><br><br>
    <div class="container">
    <div class="row">
     <div class="col-lg-6 col-md-6">
 <a  href="apis/parkingslot.php?pid=<?php echo $last_parking_id?>&del=true"> <button value="submit" class="btn_3">
                                   Delete Parking Slot
     </button></a>

     </div></div></div>
<?php
 }}
?>
<br><br>

    <!-- feature part end -->


<?php include('php/footer.php')?>
