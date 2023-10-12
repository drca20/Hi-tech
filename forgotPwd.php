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
                        <h2>Forgot Password</h2>
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
                            <h3>Enter Your Register Email Address<br></h3>
                            <?php
                            if(isset($_POST['verify']))
                            {
                                 require("php/connect_db.php");
                                  $qry = "SELECT * FROM users WHERE EmailAddress='".$_POST['name']."'";
                                  $result = $con->query($qry);
                                if($result->num_rows ==1)
                                {
                                    $var=rand(999,10000);
                                    $t=time();
                                    $timestamp = date("Y-m-d h:i:s",strtotime(date("Y-m-d h:i:s",$t)) +180);
                                     $qry1 = "insert into tempotpverify(EmailAddress,otp,timestamp) values ('".$_POST['name']."','".$var."','".$timestamp."')";
                                    $con->query($qry1);
                                    $to       = $_POST['name'];
                                    $subject  = 'Otp Verify';
                                    $message  = "Hi, Your Otp for reset password is '".$var."' Valid Only for 3 minutes";
                                    $headers  = 'From: [er.darshanghetiya]@gmail.com' . "\r\n" .
                                                'MIME-Version: 1.0' . "\r\n" .
                                                'Content-type: text/html; charset=utf-8';
                                        $curl = curl_init();

                                    curl_setopt_array($curl, array(
                                      CURLOPT_URL => "https://api.sendgrid.com/v3/mail/send",
                                      CURLOPT_RETURNTRANSFER => true,
                                      CURLOPT_ENCODING => "",
                                      CURLOPT_MAXREDIRS => 10,
                                      CURLOPT_TIMEOUT => 30,
                                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                      CURLOPT_CUSTOMREQUEST => "POST",
                                      CURLOPT_POSTFIELDS => "{\r\n  \"personalizations\": [\r\n
                                     {\r\n      \"to\": [\r\n        {\r\n          \"email\": \"$to\"\r\n
                                     }\r\n      ],\r\n      \"subject\": \"Welcome to Hi-tech Society!\"\r\n    }\r\n  ],\r\n
                                    \"from\": {\r\n    \"email\": \"hi-techsociety@hitech.com\"\r\n  },\r\n  \"content\": [\r\n
                                    {\r\n      \"type\": \"text/plain\",\r\n      \"value\": \"$message\"\r\n    }\r\n
                                     ]\r\n}",
                                      CURLOPT_HTTPHEADER => array(
                                        "authorization: {YOUR_KEY}",
                                        "cache-control: no-cache",
                                        "content-type: application/json"
                                      ),
                                    ));

                                    $response = curl_exec($curl);
                                    $err = curl_error($curl);

                                    curl_close($curl);

                                    if ($err) {
                                      echo "cURL Error #:" . $err;
                                    }

                                    if(!$err)
                                    {
                                     session_start();
                                    $_SESSION['verifyemail']=$_POST['name'];
                                    require("php/close_db.php");
                                    header("Location:otpverify.php");

                                    }
                                }
                                else
                                {
                                    echo "<h3>Please enter Register Email Address.</h3>";
                                     require("php/close_db.php");
                                }


                            }

                            ?>
                            <form class="row contact_form" action="" method="post">
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="name" value=""
                                        placeholder="Email Address" required>
                                </div>

                                <div class="col-md-12 form-group">

                                    <button type="submit" value="submit" name="verify"class="btn_3">
                                        Proceed To Verify OTP
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
</footer>

