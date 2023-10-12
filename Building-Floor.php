<?php include('php/header.php')?>

<!-- breadcrumb part start-->
<section class="breadcrumb_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <h2>Building Details</h2>
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
                        <h3>Please fille the form<br></h3>
                        <?php
                            if(isset($_POST['Building_Reg']))
                                    {
                                require("php/connect_db.php");
                                $str='';
                    $qry = "INSERT INTO appartment(Appartment_Name,FLOOR,Total_Blocks,City,Address,Secretary_Name) VALUES ('".$_POST['Build_Name']."','".$_POST['Num_floor']."','".$_POST['Total_Block']."','".$_POST['City']."','".$_POST['Address']."','".$_SESSION['name']."')";

                        if($con->query($qry)){
                        $str = '<div class="callout callout-success"><h3>You Successfully Register Building.</h3></div>';
                            header('');

                        }else{
                            $str = '<div class="callout callout-danger"><h3><p>Problem occurred. Please try again.</p></h3></div>';
                                            }
                            include("php/close_db.php");
                            echo $str;
                          }?>


                        <form class="row contact_form" action="" method="post">
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" name="block_num" value="" placeholder="Enter Total Number of Block" required>
                            </div>
                                <button type="submit" value="submit" name="floor_set" class="btn_3" >
                                    Add
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!--================login_part end =================-->
<?php include('php/footer.php')?>
