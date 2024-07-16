<?php
    echo '<p style="display:none;">';
    error_reporting(E_ALL ^ E_DEPRECATED);
    use Razorpay\Api\Api;
    include('init.php');
    include('master.php');
    error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
    require('razorpay/config.php');
    require('razorpay/razorpay-php/Razorpay.php');
    //include('master.php');
    
   
    
    $gotopay = false;
    if(isset($_POST['send'])){
        
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $date = $_POST['date'];
        $timeslot = $_POST['fromtime'].',,'. $_POST['totime'];
        $address = $_POST['address']??'';
        // $transaction_id = $_POST['utr'];
        $transaction_id = 'JAM'.time(); 
        $count = !empty($_POST['no_of_hours'])?$_POST['no_of_hours']:1;
        $amount = 400*$count;
        
        $query = "INSERT INTO `enqiry`(`name`, `mobile`, `email`, `date`, `time_slot`, `address`, `status`,`transaction_id`) VALUES ('$name','$mobile','$email','$date','$timeslot','$address','0','$transaction_id')";
        if(mysqli_query($con, $query)){
            
            
            $orderData = [
                'receipt'         => $transaction_id,
                'amount'          => $amount * 100, 
                'currency'        => 'INR',
                'payment_capture' => 1 // auto capture
            ];
            $api = new Api($keyId, $keySecret);
            $razorpayOrder = $api->order->create($orderData);

            $razorpayOrderId = $razorpayOrder['id'];

            // update order id
            $update_values = "`razorpay_order_id` = '".$razorpayOrderId."'";
            $where = "`transaction_id` = '".$transaction_id."'";
            $table = "enqiry";
            //updatedata($con, $update_values, $where, $table);
            mysqli_query($con,"Update enqiry set `razorpay_order_id` = '".$razorpayOrderId."' where `transaction_id` = '".$transaction_id."'");
            $data = [
                "key"               => $keyId,
                "amount"            => $amount*100,
                "name"              => "Jam Form",
                "description"       => 'Jam Room Booking',
                "image"             => 'Metronome_Logo.webp',
                "prefill"           => [
                    "name"              => $name,
                    "email"             => $email,
                    "contact"           => $mobile,
                    "order_id"          => $transaction_id,
                ],
                "notes"             => [
                "address"           => $address,
                // "merchant_order_id" => $razorpayOrderId
                ],
                "theme"             => [
                    "color"             => "#1dc8cd"
                ],
                "order_id"          => $razorpayOrderId,
            ];

            $gotopay= true;
            
            /*session_start();
            
            $_SESSION['order_id']  = $transaction_id;
            
            $last_id = mysqli_insert_id($con);
            
            $merchantid  = MERCHANTIDLIVE;
            $saltkey = SALTKEYLIVE;
            $saltindex = SALTINDEX;
            $payLoad = array(
                'merchantId' => $merchantid,
                'merchantTransactionId' => $transaction_id, // test transactionID
                "merchantUserId" => "M-" . $last_id,
                'amount' => $amount * 100, // phone pe works on paise
                'redirectUrl' => REDIRECTURL,
                'redirectMode' => "POST",
                'callbackUrl' => REDIRECTURL,
                "mobileNumber" => $mobile,
                "email" => $email,
                "param1"=> $email,
                "paymentInstrument" => array(
                    "type" => "PAY_PAGE",
                )
            );
            
            
        
            $jsonencode = json_encode($payLoad);
        
            $payloadbase64 = base64_encode($jsonencode);
        
            $payloaddata = $payloadbase64 . "/pg/v1/pay" . $saltkey;
        
        
            $sha256 = hash("sha256", $payloaddata);
        
            $checksum = $sha256 . '###' . $saltindex;
        
           // echo $checksum;
        
        
            $request = json_encode(array('request' => $payloadbase64));
        
            $url = '';
            if (API_STATUS == "LIVE") {
                $url = LIVEURLPAY;
            } else {
                $url = UATURLPAY;
            }
            
            
            $curl = curl_init(); // This extention should be installed

            curl_setopt_array($curl, [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $request,
                CURLOPT_HTTPHEADER => [
                    "Content-Type: application/json",
                    "X-VERIFY: " . $checksum,
                    "accept: application/json"
                ],
            ]);
        
            $response = curl_exec($curl);
        
            $err = curl_error($curl);
            curl_close($curl);
        
            if ($err) {
              //echo "cURL Error #:" . $err;
              echo '<script>alert("Unable to Load Payment Gateway Please try again.")</script>';
            } else {
              $res = json_decode($response);
        
            //   echo "<br/>response===";
            //   print_r($res);
            //   exit;
        
              if (isset($res->success) && $res->success == '1') {
                // $paymentCode=$res->code;
                // $paymentMsg=$res->message;
                $payUrl = $res->data->instrumentResponse->redirectInfo->url;
                header('Location:' . $payUrl);
                echo '<script>window.location.href = "'.$payUrl.'";</script>';
              }
        
            }
            
            */
            /*
            
            $subject = "Order Place Waiting for Confirmation";
            $message = '<html>
            <head>
            <title>Order Confirmation</title>
            </head>
            <body>
            <p>Dear '.$name.',</p>
            <p>Your booking has been placed waiting for approval.</p>
            <p>Date: '.$_POST['date'].'</p>
            <p>Time Slot: '.implode(',', $_POST['timeslot']).'</p>
            <p>Thank you for choosing us.</p>
            </body>
            </html>';
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: <test123@midbrains.in>'. $web_add . "\r\n";
            mail($email,$subject,$message,$headers);
            
            $idthis = mysqli_insert_id($con);
            $message_admin = '<html>
            <head>
            <title>Order Confirmation</title>
            </head>
            <body>
            <p>Dear '.$name.',</p>
            <p>Your booking has been placed waiting for approval.</p>
            <p>Date: '.$_POST['date'].'</p>
            <p>Time Slot: '.implode(',', $_POST['timeslot']).'</p>
            <p>Thank you for choosing us.</p>
            <p><br><br><br></p>
            
            <p><a href="https://www.themetronome.store/approveme.php?ids='.$idthis.'" target="_blank">Approve Booking</a>
            </body>
            </html>';
            
            mail("jam.metronome@gmail.com","New Booking for Jam Room by $name",$message_admin,$headers);
            mail("eng.yogesh.it@gmail.com","New Booking for Jam Room by $name",$message_admin,$headers);
            
            
             echo '<script>alert("Order Successfull Waiting for Approval");window.location.href = "index.php";</script>';
             
             */
        }else{
            echo "<script>alert('Contact to Support Team')</script>";
        }
    }
    
    
    
    
    
    
     echo "</p>";
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Favicon img -->
        <link rel="shortcut icon" href="https://smarttutorials.co.in/metrenome/assets/images/logo/Metronome_Logo.webp">
        <!-- Bootstarp min css -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- All min css -->
        <link rel="stylesheet" href="assets/css/all.min.css">
        <!-- Swiper bundle min css -->
        <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
        <!-- Magnigic popup css -->
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <!-- Animate css -->
        <link rel="stylesheet" href="assets/css/animate.css">
        <!-- Nice select css -->
        <link rel="stylesheet" href="assets/css/nice-select.css">
        <!-- Style css -->
        <link rel="stylesheet" href="assets/css/style.css">
        <title>Jam Room Booking</title>
        <link rel="stylesheet" href="assets/css/nice-select.css">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    </head>
    <style>
        .gold-text {
            color: goldenrod;
        }

        label {
            color: gold;
        }

        .text1 {
            color: white;
            font-size: 20px;
            font-weight: 700;
            letter-spacing: 2px;
            margin-bottom: 20px;
            background: black;
            position: relative;
            /*   shorthand animation property: name | duration | iteration count */
            /*   animation: text 4s 1; */
            animation-name: text;
            animation-duration: 4s;
            animation-iteration-count: infinite;
        }

        .text2 {
            font-size: 25px;
            color: #FFE997;
        }

        @keyframes text {
            0% {
                color: white;
                /*margin-bottom: -4px;*/
            }

            30% {
                letter-spacing: 2px;
                /*margin-bottom: -5px;*/
            }

            65% {
                letter-spacing: 1px;
                /*margin-bottom: -5px;*/
            }

            100% {
                /*margin-bottom: 4px;*/
            }
        }

        .gallery-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            /*background-color: #fff;*/
            box-shadow: 0 0 3px 0 rgba(0, 0, 0, 0.3);
            width: 80%;
            margin: 0 auto;
            padding: 10px;
        }

        .gallery-item {
            flex-basis: 32.7%;
            margin-bottom: 6px;
            opacity: .85;
            cursor: pointer;
        }

        .gallery-item:hover {
            opacity: 1;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .gallery-content {
            font-size: .8em;
        }

        .lightbox {
            position: fixed;
            display: none;
            background-color: rgba(0, 0, 0, 0.8);
            width: 100%;
            height: 100%;
            overflow: auto;
            top: 0;
            left: 0;
        }

        .lightbox-content {
            position: relative;
            width: 70%;
            height: 70%;
            margin: 5% auto;
        }

        .lightbox-content img {
            border-radius: 7px;
            box-shadow: 0 0 3px 0 rgba(225, 225, 225, .25);
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .lightbox-prev,
        .lightbox-next {
            position: absolute;
            background-color: rgba(0, 0, 0, 0.8);
            color: #fff;
            padding: 7px;
            top: 45%;
            cursor: pointer;
        }

        .lightbox-prev {
            left: 0;
        }

        .lightbox-next {
            right: 0;
        }

        .lightbox-prev:hover,
        .lightbox-next:hover {
            opacity: .8;
        }

        @media (max-width: 767px) {
            .gallery-container {
                width: 100%;
            }

            .gallery-item {
                flex-basis: 49.80%;
                margin-bottom: 3px;
            }

            .lightbox-content {
                width: 80%;
                height: 60%;
                margin: 15% auto;
            }
        }

        @media (max-width: 480px) {
            .gallery-item {
                flex-basis: 100%;
                margin-bottom: 1px;
            }

            .lightbox-content {
                width: 90%;
                margin: 20% auto;
            }
        }

        @media(max-width:786px) {
            .img-form {
                width: 100% !important;
            }

            .lft {
                float: right;
            }
        }

        .select2-selection {
            display: block;
            width: 100%;
            padding: 0.975rem 0.95rem !important;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: normal;
            color: #969ba0;
            background-color: #191919 !important;
            background-clip: padding-box;
            border: 1px solid #e6e6e6 !important;
            appearance: none;
            border-radius: 0.75rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            background: #fff;
            border: 0.0625rem solid #e6e6e6 !important;
            padding: 0.3125rem 1.25rem;
            color: #6e6e6e;
            height: auto !important;
            min-height: 3.5rem !important;
            border-radius: 1rem !important;
        }

        .selection {
            width: 100% !important;
        }

        .select2-selection__choice__display {
            cursor: default;
            padding-left: 10px !important;
            padding-right: 8px !important;
        }

        .select2-selection__choice {
            background-color: #fff !important;
            padding: 3px 0px 3px 25px !important;
            border: 1px solid #004aad !important;
            color: #000000 !important;
        }

        .select2-selection__choice__display,
        .select2-selection__choice__remove span,
        .select2-results__option--selectable {
            color: #004aad !important;
        }

        .select2-selection__choice__remove {
            border-right: 1px solid #004aad !important;
            color: #004aad !important;
            padding: 3px 9px !important;
        }

        .thistype {
            color: #fff !important;
            margin-top: 20px;
            font-size: 20px;
        }

        input,
        .nice-select {
            color: #fff !important;
        }

        .contact-name {
            width: 100%;
            border: 1px solid var(--border);
            font-size: 11px;
            line-height: 1px;
            padding: 23px 20px;
            background-color: var(--sub-bg);
            border-radius: 10px;
        }

        .option {
            font-size: 16px;
        }
    </style>

    <body>

       
        <style>
            @media(min-width:1200px) and (max-width:1399px) {
                .header-wrapper .main-menu li a {
                    font-size: 12px;
                }
            }
        </style>

        <header class="header-section">
            <div class="container">
                <div class="header-wrapper pl-65">
                    <div class="header-bar d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <ul class="main-menu">
                       

                        <li>
                            <a href="jamroom.php" style="color:goldenrod">Jam Room</a>
                        </li>
                        


                        <li>
                            <a href="contact.php">Contact Us</a>
                        </li>

                    </ul>
                    <div class="shipping__item d-none d-sm-flex align-items-center">

                        <div class="menu__right d-flex align-items-center">

                            <div class="content">
                                <a href="index.php" class="main__logo">
                                    <img src="assets/images/jam-room-logo.png" alt="logo__image">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header area end here -->



        <!-- Sidebar area start here -->
        <div id="targetElement" class="side_bar slideInRight side_bar_hidden">
            <div class="side_bar_overlay"></div>
            <div class="logo mb-30">
                <img src="assets/images/logo/logo.svg" alt="logo">
            </div>
            <p class="text-justify">The foundation of any road is the subgrade, which provides a stable base for the road
                layers above. Proper compaction of
                the subgrade is crucial to prevent settling and ensure long-term road stability.</p>
            <ul class="info py-4 mt-65 bor-top bor-bottom">
                <li><i class="fa-solid primary-color fa-location-dot"></i> <a href="#0">example@example.com</a>
                </li>
                <li class="py-4"><i class="fa-solid primary-color fa-phone-volume"></i> <a href="tel:+912659302003">+91 2659
                        302 003</a>
                </li>
                <li><i class="fa-solid primary-color fa-paper-plane"></i> <a href="#0">info.company@gmail.com</a></li>
            </ul>
            <div class="social-icon mt-65">
                <a href="#0"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#0"><i class="fa-brands fa-twitter"></i></a>
                <a href="#0"><i class="fa-brands fa-linkedin-in"></i></a>
                <a href="#0"><i class="fa-brands fa-instagram"></i></a>
            </div>
            <button id="closeButton" class="text-white"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <!-- Sidebar area end here -->

        <!-- Preloader area start -->
        <div class="loading">
            <span class="text-capitalize">L</span>
            <span>o</span>
            <span>a</span>
            <span>d</span>
            <span>i</span>
            <span>n</span>
            <span>g</span>
        </div>

        <div id="preloader">
        </div>
        <!-- Preloader area end -->

        <!-- Mouse cursor area start here -->
        <!--<div class="mouse-cursor cursor-outer"></div>-->
        <!--<div class="mouse-cursor cursor-inner"></div>-->
        <!-- Mouse cursor area end here -->
        <main>

            <!-- Contact form area start here -->
            <section class="contact pt-130 pb-130">
                <div class="container-fluid">
                    <div class="row g-4" style="justify-content:center;">
                        <div class="col-lg-6 img-form" >
                            <div class="section-header wow fadeInUp d-flex align-items-center" style="padding-bottom: 25px;" data-wow-delay=".1s">
                                <!--<span class="title-icon mr-10"></span>-->
                                <!--<h3 class="fw-400">Have a look at our prices</h3>-->
                            </div>
                            <img src="assets/images/metronome-ratecard.jpg" style="width:80%; display:block; margin-left:auto; margin-right:auto;">
                        </div>
                        <div class="col-lg-6" style="padding-top:40px;">
                            <h3 class="text-center mb-3 text1" style="padding-top:30px;">Get Booking Of Jam Room</h3>
                            <form class="theme-form" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="contact-name" id="name" name="name" placeholder="Enter Your name" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="review">Phone number</label>
                                            <input type="number" class="nice-select" id="review" name="mobile" placeholder="Enter your number" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="nice-select" name="email" placeholder="Email" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date">Date</label>
                                            <input type="date" class="nice-select" id="date" value="2024-06-22" name="date" placeholder="Date" required="" style="line-height:10px !important; color-scheme:dark;">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group" style="color:#fff !important;">
                                            <label for="timeslot">From</label>
                                            <select class="nice-select-3" id="fromtime" name="fromtime" required="" style="width:100%; color:#fff !important;">
                                                <option data-index="0" value=""  >Select</option>
                                                <option data-index="1" value="11:00 AM"  >11:00 AM</option>
                                                <option data-index="2" value="12:00 PM"  >12:00 PM</option>
                                                <option data-index="3" value="01:00 PM"  >01:00 PM</option>
                                                <option data-index="4" value="02:00 PM"  >02:00 PM</option>
                                                <option data-index="5" value="03:00 PM"  >03:00 PM</option>
                                                <option data-index="6" value="04:00 PM"  >04:00 PM</option>
                                                <option data-index="7" value="05:00 PM"  >05:00 PM</option>
                                                <option data-index="8" value="06:00 PM"  >06:00 PM</option>
                                                <option data-index="9" value="07:00 PM"  >07:00 PM</option>
                                                <option data-index="10" value="08:00 PM"  >08:00 PM</option>
                                                <option data-index="11" value="09:00 PM"  >09:00 PM</option>
                                                <option data-index="12" value="10:00 PM"  >10:00 PM</option> 
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group" style="color:#fff !important;">
                                            <label for="timeslot2">To</label>
                                            <select class="nice-select-2" id="totime" placeholder="Select time" name="totime" required="" style="width:100%; color:#fff !important;">
                                                <option data-index="0" value=""  >Select</option>
                                                <option data-index="1" value="12:00 PM"  >12:00 PM</option>
                                                <option data-index="2" value="01:00 PM"  >01:00 PM</option>
                                                <option data-index="3" value="02:00 PM"  >02:00 PM</option>
                                                <option data-index="4" value="03:00 PM"  >03:00 PM</option>
                                                <option data-index="5" value="04:00 PM"  >04:00 PM</option>
                                                <option data-index="6" value="05:00 PM"  >05:00 PM</option>
                                                <option data-index="7" value="06:00 PM"  >06:00 PM</option>
                                                <option data-index="8" value="07:00 PM"  >07:00 PM</option>
                                                <option data-index="9" value="08:00 PM"  >08:00 PM</option>
                                                <option data-index="10" value="09:00 PM"  >09:00 PM</option>
                                                <option data-index="11" value="10:00 PM"  >10:00 PM</option>
                                                <option data-index="12" value="11:00 PM"  >11:00 PM</option> 
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12" style="display:none;">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea class="nice-select" id="address" name="address" placeholder="Enter Your Address"></textarea>
                                    </div>
                                </div>
                                <br>
                                <!--<div class="col-md-12">-->
                                <!--    <p class="thistype">Rs. 400 for 1 Hour</p>-->
                                <!--</div>-->
                                
                                <div class="col-md-12">
                                    <p class="thistype" style="width: 100%;float:left;">Rs. <span id="totalPrice">400</span> for <span id="durationHours">1</span> Hour</p>
                                </div>
                                <style>
                                    th,td{
                                        color: #fff;
                                        padding: 3px 0px 2px 2px;
                                        font-family: sans-serif;
                                    }
                                </style>
                                <div class="col-md-12" id="slots-div" style="display: none;">
                                    
                                        
                                    
                                </div>

                                <div class="col-md-12" style="display:none;">
                                    <img src="Qrins.jpg" width="200px" /><br>

                                    <br>
                                    <label>Pay Online to Process you Booking</label>
                                    <br>
                                    <label>Admin Will Confirm your Booking</label>
                                </div>
                                <div class="col-md-12" style="display:none;">
                                    <div class="form-group">
                                        <label>UTR No </label>
                                        <input type="text" class="form-control" name="utr" placeholder="UTR No." style="color: #333 !important;">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="mt-40 btn-one lft" name="send" type="submit">Book Your Slot</button>

                                </div>
                                <input type="hidden" name="no_of_hours" id="no_of_hours" value="1">
                        </div>
                        </form>
                    </div>
                </div>
                </div>
            </section>
            <section>
                <div class="gallery-container">
                    <div class="gallery-item" data-index="1">
                        <img src="assets/images/jam2.jpeg">
                    </div>
                    <div class="gallery-item" data-index="2">
                        <img src="assets/images/jam4.jpeg">
                    </div>
                    <div class="gallery-item" data-index="3">
                        <img src="assets/images/jam3.jpeg">
                    </div>
                    <div class="gallery-item" data-index="4">
                        <img src="assets/images/jam5.jpeg">
                    </div>
                    <div class="gallery-item" data-index="5">
                        <img src="assets/images/jam6.jpeg">
                    </div>
                    <div class="gallery-item" data-index="6">
                        <img src="assets/images/jam1.jpeg">
                    </div>

                </div>
            </section>
        </main>


        <!-- Footer area start here -->

        <footer class="footer-area bg-image" data-background="assets/images/footer/footer-bg.jpg">
            <div class="container">
                <div class="footer__wrp pt-65 pb-65 bor-top bor-bottom">
                    <div class="row g-4">
                        
                        <div class="footer__item newsletter">
                            <h4 class="footer-title">get newsletter</h4>
                            <div class="subscribe">
                                <input type="email" placeholder="Your Email">
                                <button><i class="fa-solid fa-paper-plane"></i></button>
                            </div>
                            <div class="social-icon mt-40">
                                <a href="https://www.facebook.com/metronome.wakad"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="https://www.instagram.com/metronome.wakad"><i class="fa-brands fa-instagram"></i></a>
                                <a href="https://www.linkedin.com/company/metronomepune/?viewAsMember=true"><i class="fa-brands fa-linkedin-in"></i></a>
                                <a href="#0"><i class="fa-brands fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__copy-text pt-50 pb-50">
                <a href="index.php" class="logo d-block">
                    <img src="assets/images/jam-room-logo.png" alt="logo">
                </a>
                <p style="color:white !important;">&copy; Copyright 2024 <a href="#0" class="primary-hover">Metronome</a> All Rights Reserved</p>
                <p style="color:white !important;">Designed & Developed by <a href="midbrains.in" target="_blank" class="primary-hover">Midbrains Technologies</a> </p>

            </div>
            </div>

        </footer>
        <!-- Footer area end here -->

        <style>
            .whatsApp {
                position: fixed;
                left: 20px;
                bottom: 40px;
                z-index: 1000;
                width: 75px;
                height: 75px
            }

            .whatsApp_img {
                position: relative;
                z-index: 2;
                max-width: 65%
            }

            .whatsApp .circleIconPanel {
                margin: -3px -12px;
                width: 136px;
                height: 43px;
                border-radius: 25px;
                z-index: 1;
                position: absolute;
                left: 30px;
                bottom: 32px;
                opacity: 0;
                text-align: start;
                padding: 13px 14px 7px 36px;
                font: 600 20px/17px Poppins;
                letter-spacing: 0;
                color: #fff;
                background: #2db642 0 0 no-repeat padding-box;
                background-repeat: no-repeat;
                background-position: 50%;
                background-size: contain
            }

            .whatsApp .circleIconPanel.showMessage {
                opacity: 1;
                font-size: 13px;
                animation: showMessage 1s linear
            }

            .whatsApp .circleIconPanel.hideMessage {
                opacity: 0;
                animation: hideMessage 1s linear;
                width: 0
            }

            @keyframes showMessage {

                0%,
                25% {
                    opacity: 0;
                    width: 0
                }

                to {
                    opacity: 1;
                    width: 265px
                }
            }

            @keyframes hideMessage {
                0% {
                    opacity: 1;
                    width: 265px
                }

                80%,
                to {
                    opacity: 0;
                    width: 0
                }
            }
        </style>
        <div class="whole">
            <div class="whatsApp">
                <a href="https://api.whatsapp.com/send?phone=9175921299&text=Hi,%20I%20would%20like%20to%20know%20more%20about..." target="_blank">
                    <img src="assets/images/whatsapp_icon.png" alt="WhatsappIcon" class="whatsApp_img">
                    <div class="circleIconPanel showMessage">Get in touch</div>
                </a>
            </div>
        </div>
        <!-- Back to top area start here -->
        <div class="scroll-up">
            <svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
        <!-- Back to top area end here -->
        <!-- Jquery 3. 7. 1 Min Js -->
        <script src="assets/js/jquery-3.7.1.min.js"></script>
        <!-- Bootstrap min Js -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- Swiper bundle min Js -->
        <script src="assets/js/swiper-bundle.min.js"></script>
        <!-- Counterup min Js -->
        <script src="assets/js/jquery.counterup.min.js"></script>
        <!-- Wow min Js -->
        <script src="assets/js/wow.min.js"></script>
        <!-- Magnific popup min Js -->
        <script src="assets/js/magnific-popup.min.js"></script>
        <!-- Nice select min Js -->
        <script src="assets/js/nice-select.min.js"></script>
        <!-- Pace min Js -->
        <script src="assets/js/pace.min.js"></script>
        <!-- Isotope pkgd min Js -->
        <script src="assets/js/isotope.pkgd.min.js"></script>
        <!-- Waypoints Js -->
        <script src="assets/js/jquery.waypoints.js"></script>
        <!-- Script Js -->
        <script src="assets/js/script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
        let from = [];
        let to = [];
        $(document).ready(function(){

            
            

            //set min date of today
            var today = new Date().toISOString().split('T')[0];
            $('#date').val(today);
            $('#date').attr('min', today);

            //disable to time slot if from time is selected
            $('#fromtime').change(function(){
                $('#totime').val('');
                $('.thistype').html('Select Time Slot');
                var fromtime = $(this).find(':selected').attr('data-index');
                fromtime = parseInt(fromtime);
                console.log(fromtime);
                $('#totime option').each(function(){
                    // console.log($(this).attr('data-index'));
                    var totime = $(this).attr('data-index');
                    totime = parseInt(totime);
                    if(totime < fromtime){
                        //console.log(totime+"-"+fromtime+" is beforetime");
                        $(this).attr('disabled', "disabled");
                    }else{
                        //console.log(totime+"-"+fromtime+" is disabled");
                        //check value in to array
                        if(jQuery.inArray(totime, to) != -1) {
                            $(this).attr('disabled', "disabled");
                        }else{
                            $(this).removeAttr('disabled');
                        }
                        //$(this).removeAttr('disabled');
                    }
                });
                $('#totime').niceSelect('update');
            });


            $('#date').change(function(){
                //empty from and to array
                from = [];
                to = [];
                var date = $(this).val();
                $.ajax({
                    url: 'getslots.php',
                    // url: 'https://www.themetronome.store/getslot.php',
                    type: 'post',
                    data: {date: date},
                    success: function(response){
                        var data = JSON.parse(response);
                        $('#slots-div').show();
                        $('#slots-div').html(data.html);
                        // console.log(data.from);
                        arrayfrom = data.from;
                        $.each(data.from, function(key, value){
                            from.push(value);
                            
                        });
                        
                        $('#fromtime option').each(function(){
                            var fromtime = $(this).attr('data-index');
                            fromtime = parseInt(fromtime);
                            if(jQuery.inArray(fromtime, from) != -1) {
                                $(this).attr('disabled', "disabled");
                            }else{
                                $(this).removeAttr('disabled');
                            }
                            $('#fromtime').niceSelect('update');
                        });
                        
                        $.each(data.to, function(key, value){
                            to.push(value);
                        });
                    }
                });
            });
            
            $('#totime').on('change', function() {
                var fromtime = $('#fromtime').find(':selected').attr('data-index');
                var totime = $(this).find(':selected').attr('data-index');
                var duration = totime - fromtime;

            
                // var selected = $(this).val();
                // console.log(selected.length);
                amount = 400;
                if(duration > 0){
                    $('.thistype').html('Rs. '+(amount*(duration+1))+' for '+(duration+1)+' Hours');
                    $('button[name="send"]').attr('disabled', false);
                    $('#no_of_hours').val(duration+1);
                }else{
                    $('.thistype').html('Rs. '+amount+' for 1 Hour');
                    $('button[name="send"]').attr('disabled', false);
                    $('#no_of_hours').val(1);
                }

            });
        });
    </script>
    <script>
        
        $(document).ready(function() {

                var today = new Date().toISOString().split('T')[0];
                $.ajax({
                    url: 'getslots.php',
                    type: 'post',
                    data: {date: today},
                    success: function(response){
                        var data = JSON.parse(response);
                        $('#slots-div').show();
                        $('#slots-div').html(data.html);
                        // console.log(data.from);
                        arrayfrom = data.from;
                        $.each(data.from, function(key, value){
                            from.push(value);
                            
                        });
                        
                        $('#fromtime option').each(function(){
                            var fromtime = $(this).attr('data-index');
                            fromtime = parseInt(fromtime);
                            if(jQuery.inArray(fromtime, from) != -1) {
                                $(this).attr('disabled', "disabled");
                            }
                            $('#fromtime').niceSelect('update');
                        });
                        
                        $.each(data.to, function(key, value){
                            to.push(value);
                        });
                    }
                });
            
           
        }); 
    </script>
    
     <?php if($gotopay){ ?>
<button style="display: none;" id="makepay">Pay</button>
<form id="rzpform" action="verify.php" method="post">
    <input type="hidden" value="<?= $data['prefill']['order_id'] ?>" name="transaction_id">
    <input type="hidden" value="<?=$data['order_id']?>" name="razorpay_order_id">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature" id="razorpay_signature">
</form>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    var options = {
        "key": '<?=$data['key']?>',
        "amount": '<?=$data['amount']?>',
        "currency": 'INR',
        "name": '<?=$data['name']?>',
        "description": '<?=$data['description']?>',
        "image": '<?=$data['image']?>',
        "order_id": '<?=$data['order_id']?>',
        "prefill": {
            "name": '<?=$data['prefill']['name']?>',
            "email": '<?=$data['prefill']['email']?>',
            "contact": '<?=$data['prefill']['contact']?>',

        },
        "theme": {
            "color": "#3399cc"
        }
    };
    options.handler = function(response) {
        console.log("res", response);
        document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
        document.getElementById('razorpay_signature').value = response.razorpay_signature;
        document.getElementById('rzpform').submit();
    }
    var rzp1 = new Razorpay(options);
    document.getElementById('makepay').onclick = function(e) {
        rzp1.open();
        e.preventDefault();
    }

    $(document).ready(function() {
        $('#makepay').click();
    });

</script>
    <?php } ?>
    </body>

    </html>