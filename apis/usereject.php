<?php
$qry="";
if(isset($_GET['id']) && $_GET['id']!=""){
    if(isset($_GET['del'])  && $_GET['del']==true){
        $qry = "update users set isConfirm=2 WHERE UserId=".$_GET['id'];
            require_once("../php/connect_db.php");
            $result=$con->query($qry);
            $qry1="select * from users where UserId=".$_GET['id'];
            $result1=$con->query($qry1);
        $row1=$result1->fetch_assoc();
         $to       = $row1['EmailAddress'];
                                    $subject  = 'Application Rejected';
                                    $message  = "Your Application for joining your building is reject by secretary. for further please contact secretary.";

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
                                        "authorization: YOUR_KEY",
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

    }
}
if($qry!=""){
      require_once("../php/connect_db.php");
    $con->query($qry);
    require_once("../php/close_db.php");
}
  header("Location: ../approveProfile.php");
?>
