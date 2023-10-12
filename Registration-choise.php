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
                        <h2>Select Option</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!--================login_part Area =================-->
    <section class="login_part section_padding ">
        <div class="container">
            <div class="row">



                <div class="col-lg-2  justify-content-center">
<!--                        <div class="login_part_form_iner">-->
                              <form  action="Building-join.php" method="post" novalidate="novalidate">
                                    <button type="submit" value="submit" class="btn_3">
                                        Join Your Building
                                    </button>
                    </form>

<!--                                </div>-->
                    <br><br><br><br> <div class="col-lg-6"><h3>OR</h3></div> <br><br>
                          <form  action="Building-Regi.php" method="post" novalidate="novalidate">
                                    <button type="submit" value="submit" class="btn_3">
                                        Create your Building
                                    </button>
                    </form>
                    </div>
                </div>

            </div>

    </section>
    <!--================login_part end =================-->

<?php include('php/footer.php')?>
