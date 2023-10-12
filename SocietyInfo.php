<?php include('php/header.php')?>

    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Our Society Address</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

  <!-- ================ contact section start ================= -->
  <section class="contact-section section_padding">
    <div class="container">


      <div class="row">
          <?php
  $qry="select * from appartment where AppartmentId='".$_SESSION['a_id']."'";
 $qry1="select * from secretary where AppartmentId='".$_SESSION['a_id']."'";
                                $result = $con->query($qry);
$result1 = $con->query($qry1);
          $row = $result->fetch_assoc();
$row1 = $result1->fetch_assoc();
          ?>

        <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>Society Address</h3>
              <p><?php echo $row['Address'] ?></p>
            </div>
          </div>
            <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-user"></i></span>
            <div class="media-body">
              <h3>Socity Secretary Name</h3>
              <p><?php echo $row1['Secretary_Name'] ?></p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
              <h3>Socity Secretary Number</h3>
              <p><?php echo $row1['Phone'] ?></p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3>Secretary Email</h3>
              <p><?php echo $row['Secretary_Email']?></p>
            </div>
          </div>
              <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>Appartment Code</h3>
              <p><?php echo $row['AppartmentId']?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->

 <?php include('php/footer.php')?>
