<?php include('php/header.php');

    require_once("php/connect_db.php");

?>

<!-- breadcrumb part start-->
<section class="breadcrumb_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <h2>Payment Page</h2>
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
                        <h3>You Need To Pay  ₹1000 For<br> One Year Membership<br></h3>
                       


                        <form class="row contact_form" action="Paytm/pgRedirect.php" method="post">
                            <div class="col-md-12 form-group p_star">
                                <input type="hidden" id="ORDER_ID" 
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "ORDS" . rand(10000,99999999)?>">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                    <input  type="hidden" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001">
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
                            </div>
                            <div class="col-md-12 form-group p_star">
                               <input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="hidden" title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="1"  class="form-control" >
                                 <input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="1000"  class="form-control" disabled>
                                
                                
                            </div>
                            
                            <div class="col-md-12 form-group">
                                    
                                <button type="submit" value="submit" class="btn_3">
                                    Pay
                                </button>
                                <?php
                                if($_SESSION['paymentDone']==1)
                                {
                                    echo "<h3>Your Payment Is Done Succesfully.<br>Please Login Again</h3>";
                                    $qry="update users set isPayment=1 where UserId='".$_SESSION['sid']."'";
                                    $result=$con->query($qry);
                                    sleep(5);
                                    session_destroy();
                                
                                }
                                         if($_SESSION['paymentDone']==2)
                                {
                                    echo "<h3>Your Payment Is Not Succesfully.Please Try Again..</h3>";
                            
    
                                
                                }
                                ?>    
                                <br><br>
                               
                                   

                            </div>
                        </form> 
                        
                                            
                        
                         <a href="login.php"><button  class="btn_3">
                                    Login
                                </button></a>
                        
                        
                        
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!--================login_part end =================-->
<?php include('php/footer.php')?>
