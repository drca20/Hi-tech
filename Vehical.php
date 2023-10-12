<!--::header part start::-->
<?php
include 'php/header.php';
?>
<?php
if(isset($_POST['addv'])){

    $qry3="insert into vehicle (VehicleType,VehicleNumber,AppartmentId,BlockNumber) values ('".$_POST['type']."','".$_POST['number']."','".$_SESSION['a_id']."','".$_SESSION['bno']."')";
   if($con->query($qry3)){


   }}
?>
<section class="breadcrumb_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <h2>Society Vehical</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- feature part here -->
<br><br>
<div class="container">


    <div class="col-md-12 form-group">

                            <button type="submit" value="submit" class="btn_3" name="add" data-toggle="modal" data-target="#modal-new-event">
                                Add Vehicle
                            </button>


                        </div>
    <?php
$qryblk   = "SELECT * from block where AppartmentId='" . $_SESSION['a_id'] . "' ORDER BY BlockNumber ASC";
$result12 = $con->query($qryblk);
$block    = array();
$id       = 0;
if ($result12->num_rows > 0) {

    while ($row12 = $result12->fetch_assoc()) {
        $block[$id] = $row12['BlockNumber'];
        $id++;
    }
}
$id   = $id - 1;
$temp = 0;
while ($temp <= $id) {
    $qry = "SELECT * FROM  users where users.AppartmentId='" . $_SESSION['a_id'] . "' and users.BlockNumber=$block[$temp]";

    $result = $con->query($qry);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

?>
    <div class="row">

        <div class="col-sm-3">
            <div class="card card border-secondary">
                <div class="card-body">
                    <h4 class="card-title">Flat No - <?php
        echo $row['BlockNumber'];
?></h4>
                    <strong>
                        <h4><?php
        echo $row['FirstName'];
        echo "  ";
        echo $row['LastName'];
?></h4>
                    </strong>
                    <?php
        $qry123 = "SELECT * FROM vehicle where vehicle.AppartmentId='" . $_SESSION['a_id'] . "' and vehicle.BlockNumber=$block[$temp]";

        $result123 = $con->query($qry123);
        if ($result123->num_rows > 0) {
            while ($row123 = $result123->fetch_assoc()) {

?>
                    <strong>
                        <b><?php
                echo $row123['VehicleType'];
?></b>
                        <p><?php
                echo $row123['VehicleNumber'];
?></p>
                        <?php
                        if($row['BlockNumber']==$_SESSION['bno']){
                        ?>
                         <div class="col-md-12 form-group">

                            <a  href="apis/vehicleDelete.php?vid=<?php echo $row123['VehicleId'] ?> &del=true">  <button class="btn btn-danger" >
                                Delete Vehicle
                                </button></a>


                        </div>
                        <?php
                        }
                        ?>



                    </strong><?php
            }
        }
?><br>


                    <b>Contact Detail: <?php
        echo $row['MobileNumber'];
?></b>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <?php
    }
    $temp++;
}


?>
</div>
<div class="modal fade" id="modal-new-event">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">Add Vehicle</h4>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group p_star">
                        <span class="input-group-addon">
                            <h3>Vehicle Type</h3>
                        </span>
                        <input type="text" class="form-control" placeholder="Bike or Car" name="type" required>
                    </div><br>
                    <div class="form-group p_star">
                        <span class="input-group-addon">
                            <h3>Vehicle Number</h3>
                        </span>
                        <input type="text" class="form-control" placeholder="GJ03DNxxxx" name="number" pattern="^[a-zA-Z]{2}[0-9]{2}[a-zA-Z]{2}[0-9]{4}$"required>
                    </div><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="addv">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- feature part end -->



<?php
include('php/footer.php');
?>
