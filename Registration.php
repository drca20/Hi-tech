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
                    <h2>Registration</h2>
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
                            if(isset($_POST['create_user']))
                                    {
                                require("php/connect_db.php");
                                $str='';
                                $qry1="select * from users";
                                $result = $con->query($qry1);

                                $flagmail=0;
                                while($row = $result->fetch_assoc()){
                                     if(strtolower($row['EmailAddress']) ==strtolower($_POST['email'])){$flagmail=1;}
                                }
                                if($flagmail==1)
                                {
                                    echo "<h3><p>EmailAddress is already Registered.</p></h3>";
                                }
                                if($flagmail == 0){
                   $qry = "INSERT INTO users(FirstName,LastName,password,MobileNumber,EmailAddress,BloodGroup) VALUES ('".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['upass']."','".$_POST['mobile']."','".$_POST['email']."','".$_POST['bgroup']."')";

                        if($con->query($qry)){
                        $str = '<div class="callout callout-success"><h3>You Successfully Register.Please Login </h3></div>';

                                    $to       = $_POST['email'];
                                    $subject  = 'Registraion Successful';
                                    $message  = "Welcome to Hi-techSociety.You have Successfull Register with Us with this email : ".$_POST['email']." Now, you can login to create or join your building.";

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
                                     }\r\n      ],\r\n      \"subject\": \"$subject\"\r\n    }\r\n  ],\r\n
                                    \"from\": {\r\n    \"email\": \"hi-techsociety@hitech.com\"\r\n  },\r\n  \"content\": [\r\n
                                    {\r\n      \"type\": \"text/plain\",\r\n      \"value\": \"$message\"\r\n    }\r\n
                                     ]\r\n}",
                                      CURLOPT_HTTPHEADER => array(
                                        "authorization:{YOUR_KEY}",
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

                        }else{
                            $str = '<div class="callout callout-danger"><h3><p>Problem occurred. Please try again.</p></h3></div>';
                                            }}
                            include("php/close_db.php");
                            echo $str;
                          }?>
   <form name= "register" class="row contact_form" action="" method="post" enctype="multipart/form-data" >


                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" name="firstname" placeholder="FirstName" required>
                            </div><br />
                               <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" name="lastname" placeholder="LastName" required>
                            </div><br />
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" name="upass" placeholder="Password" required>
                            </div><br />
                            <div class="col-md-12 form-group p_star">
                                <input type="tel" class="form-control" name="mobile" placeholder="Phone Number" pattern="[0-9]{10}" required>
                            </div><br />
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" name="bgroup" placeholder="Blood Group" required>
                            </div><br />
                            <div class="col-md-12 form-group p_star">
                                <input type="Email" class="form-control" name="email" placeholder="Email Address" required>
                            </div><br />
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" name="create_user" class="btn_3" >
                                   Register
                                </button>
                            </div>
                        </form>
                        <H4>After Registration Please Login</H4>
                        <div class="col-md-12 form-group">
                            <form action="Registration-choise.php">
                                <button type="submit" value="submit" name="create_user" class="btn_3">
                                    Login
                                </button>
                            </form>
                        </div>
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
                            Copyright &copy;<script>
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
