
<?php
session_start();

if(!isset($_SESSION['verifyemail'])){
    session_destroy();
    header('Location:login.php');
}
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>pillloMart</title>
    <link rel="icon" href="img/favicon.png">
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



</head>

    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Set New Password</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!--================login_part Area =================-->
    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Enter New Password <br></h3>
                            <?php
                            if(isset($_POST['setpwd']))
                            {
                                session_start();
                                  require("php/connect_db.php");

                                 $qry = "SELECT * FROM users WHERE EmailAddress='".$_SESSION['verifyemail']."'";
                                  $result = $con->query($qry);


                                if($result->num_rows == 1)
                                {
                                     $row = $result->fetch_assoc();
                                   $qry1="UPDATE users set password ='".$_POST['pwd']."' where EmailAddress='".$_SESSION['verifyemail']."'";

                                    if( $con->query($qry1))
                                    {
                                        session_destroy();
                                        echo "<h3>You Have Successfully Changed Your Password</h3><br>";
                                        echo "<h5>You Will Autometically Redirected Login Page in Few Second</h5>";
                                        sleep(5);
                                          require("php/close_db.php");
                                         header('Location:login.php');
                                    }
                                }
                                else{
                                    echo "Server Error Please Try Again";
                                      require("php/close_db.php");
                                }
                            }

                            ?>
                            <form class="row contact_form" action="" method="post" >
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="pwd" value=""
                                        placeholder="New Password" required>
                                </div>

                                <div class="col-md-12 form-group">

                                    <button type="submit" value="submit" name="setpwd" class="btn_3" >
                                        Set
                                    </button>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--================login_part end =================-->
<footer class="footer_part">


    <div class="copyright_part">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="copyright_text">
                        <P>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            <!--Copyright &copy;<script>
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
