<?php include('php/header.php');
if($_SESSION['status']==1)
{
     header('Location: login.php');
     session_destroy();
}?>

    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>You Have Sucessfully Join Your Building After Approve By Secretary</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->
><br><br><br>
    <!--================login_part Area =================-->
    <section class="login_part section_padding ">
        <div class="container">
            <div class="row">



                <div class="col-lg-12  justify-content-center">
<!--                        <div class="login_part_form_iner">-->
                            <h3>Once Your Secretary Approve you we inform you by mail.</h3>
<!--                                </div>-->
                    <br>

                    </div>
                </div>

            </div>

    </section>
    <!--================login_part end =================-->
<br><br><br><br><br><br><br><br><br><br>

    <?php include('php/footer.php')?>
