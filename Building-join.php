<?php include('php/header.php')?>
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
    <!-- icon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- magnific popup CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">

<!-- breadcrumb part start-->
<section class="breadcrumb_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <h2>Join Building</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb part end-->
<?php
                                        if(isset($_POST['join']))
                                    {

                                          require("php/connect_db.php");
                                            $qry = "SELECT * FROM users WHERE EmailAddress='".$_SESSION['Email']."'";
                                                    $result = $con->query($qry);
                                               $row = $result->fetch_assoc();
                                            $qry2="SELECT * FROM appartment WHERE AppartmentId='".$_POST["name"]."'";
                                            $result1 = $con->query($qry2);
                                               $row1 = $result1->fetch_assoc();

                                            if($result1->num_rows > 0)
                                            {

                                                $qry3 = "SELECT * FROM block WHERE AppartmentId='".$row1['AppartmentId']."'";
                                                    $result3 = $con->query($qry3);
                                               $row3 = $result3->fetch_assoc();
                                                if($result3->num_rows>0)
                                                {

               $qrycheckblock="select * from block where AppartmentId='".$_POST["name"]."'";
    $checkresult=$con->query($qrycheckblock);
    $flag=0;
    if($checkresult->num_rows >0){
    while($rowresult=$checkresult->fetch_assoc())
    {
     if($rowresult['BlockNumber'] == $_POST['block_num'])
     {
         $flag=1;
     }
    }
    }
    if($flag==0){
    $qryblockadd="insert into block (BlockNumber,AppartmentID) values ('".$_POST['block_num']."','".$_POST["name"]."')";
    $con->query($qryblockadd);}


      $qry1 = "UPDATE users set isConfirm=0,AppartmentId='".$row1['AppartmentId']."',BlockNumber='".$_POST['block_num']."',Secretary_Name='".$row1['Secretary_Name']."' where EmailAddress='".$_SESSION['Email']."'";

                                        if($con->query($qry1)){echo "hiiiii";}





                                                         header("Location: confrimReservetion.php");

                                                }

                                               }
                                        else{
                                           echo '<h3>Appartment Code is Wrong please check again</h3>';
                                       }
                                                require("php/close_db.php");

                                        }

?>
<!--================login_part Area =================-->
<section class="login_part section_padding ">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        <h3>Enter Your Building Code<br></h3>
                        <form class="row contact_form" action="" method="post">
                            <div class="col-md-12 form-group p_star">

                             <div class="shipping_box">



                                <select name="name" class="shipping_select section_bg">

                                <?php


                                $qry11="select * from appartment order by Appartment_Name";
                                $result11 = $con->query($qry11);

                                while($row11=$result11->fetch_assoc())
                                {
                                   ?>

                                  <option value="<?php echo $row11['AppartmentId']?>"><?php echo $row11['Appartment_Name']?></option>


                                <?php
                                }

                                ?>


                                </select>

                                </div>




                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" name="block_num" value="" placeholder="Block Number" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" name="join" class="btn_3">
                                    Join Your Building
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

<!--::footer_part start::-->
<footer class="footer_part">


    <div class="copyright_part">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="copyright_text">
                        <P>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                           <!-- Copyright &copy;<script>
                                document.write(new Date().getFullYear());

                            </script> All rights reserved
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </P>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('php/footer.php')?>
