<?php
$qry="";
 require_once("../php/connect_db.php");
if(isset($_GET['aid']) && $_GET['aid']!=""){
    if(isset($_GET['del'])  && $_GET['del']==true){

        $qry = "select * from users WHERE AppartmentId='".$_GET['aid']."' and BlockNumber='".$_GET['bno']."'";
    $result=$con->query($qry);
        $row=$result->fetch_assoc();
         $to       = $row['EmailAddress'];
                                    $subject  = 'Society Pending Maintainace Reminder';
                                    $message  = "Hello, '".$row['FirstName']."'Your Block NO :'".$_GET['bno']."', Penidng Payment Amount : '".$_GET['amt']."' Please Pay As soon As Possible.";

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


    require_once("../php/close_db.php");

  header("Location: ../societypendingbill.php");
?>
