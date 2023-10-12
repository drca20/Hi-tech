<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Hi-Tech</title>
    <link rel="icon" href="img/1.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

</script>

</head>
<?php
  if(isset($_POST['otheruser'])){
    setcookie("username", "", time()-3600);
    setcookie("useremail", "", time()-3600);
    header("Location: login.php");
  }


?>
<!-- breadcrumb part start-->
<section class="breadcrumb_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <h2>login</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<!--================login_part Area =================-->
<section class="login_part section_padding ">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                    <!-- breadcrumb part end-->

                    <div class="login_part_form_iner">
                        <?php
  if(isset($_COOKIE['username'])){
    echo '<h3>Welcome Back ! <br>
                            '.$_COOKIE['username'].'</h3>';
  }else{
    echo '<h3>Welcome Back ! <br>
                            Please Sign in now</h3>';
  }
?>

  <?php
          if(isset($_POST['uname']) && $_POST['uname']!=""){
          $uname=$_POST['uname'];
          $upass=$_POST['upass'];
          require("php/connect_db.php");
          $qry = "SELECT * FROM users WHERE EmailAddress='".$uname."' ";
          $result = $con->query($qry);
          require("php/close_db.php");
          if($result->num_rows > 0){
              $row = $result->fetch_assoc();
              if($row['password']==$upass){
                  session_start();

                  $_SESSION['sid']=$row['UserId'];
                  $_SESSION['a_id']=$row['AppartmentId'];
                  $_SESSION['name']=$row['FirstName'];
                  $_SESSION['Email']=$row['EmailAddress'];
                  $_SESSION['status']=$row['status'];
                  $_SESSION['bno']=$row['BlockNumber'];
                $_SESSION['recnf']=$row['isConfirm'];
                  $_SESSION['paymentDone']=3;
                

                  setcookie("username", $_SESSION['name'], time()+60*60*24);
                  setcookie("useremail", $_SESSION['Email'], time()+60*60*24);


                  if($row['status']==0 && $row['isConfirm']==2){
                       header("Location: Registration-choise.php");
                  }
                  if($row['status']==0 && $row['isConfirm']==0){
                       header("Location: ConfrimReservetion.php");
                  }
                if($row['status']==1 && $row['isPayment']==0 && $row['isSecretary']==1){
                      $_SESSION['paymentDone']=0;
                       header("Location:Payment.php");
                  }
               if($row['status']==1 && $row['isPayment']==1 && $row['isSecretary']==1){
                       header("Location: index.php");
                  }
                if($row['status']==1 && $row['isPayment']==0 && $row['isSecretary']==0 && $row['isConfirm']==1){
                       header("Location:index.php");
                  }
              }else{
                  echo '<div><h3 color="red">Username or password is incorrect.</h3>';

          }
          }else{
              echo "<p>EmailAddress is incorrect.</p>";
          }

      }

?>
                        <form class="row contact_form" action="" method="post">
                            <div class="col-md-12 form-group p_star">
                            <?php
                                if(isset($_COOKIE['useremail'])){
                                echo '<input name="uname" type="hidden" value="'.$_COOKIE['useremail'].'">
                                <p class="form-control" disabled>'.$_COOKIE['useremail'].'</p>';
                                }else{
                                echo '<input name="uname" type="text" class="form-control" placeholder="Email" required>';
                                }
                            ?>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" id="password" name="upass" value="" placeholder="Password" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account d-flex align-items-center">
                                    <input type="checkbox" id="f-option" name="selector">
                                    <label for="f-option">Remember me</label>
                                </div>
                                <button type="submit" value="submit" class="btn_3">
                                    log in
                                </button>


                                <a class="lost_pass" href="forgotPwd.php">forget password?</a>

                            </div>
                        </form>
                        <form method="post" action="">
                                <button type="submit" value="submit" name="otheruser"class="btn_3">
                                    other user
                                </button>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <br> <h3>
                    New User ? Sign Up now.</h3><br>
                <form action="Registration.php" method="post" novalidate="novalidate">
                    <button type="submit" value="submit" class="btn_3">
                        Sign Up </button>
                </form>
            </div>
        </div>
    </div>
</section>
<!--================login_part end =================-->

<!--::footer_part start::-->
<footer class="footer_part">


    <div class="copyright_part">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="copyright_text">
                        <P>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                          <!--  Copyright &copy;<script>
                                document.write(new Date().getFullYear());

                            </script> All rights reserved
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </P>

                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

</script>