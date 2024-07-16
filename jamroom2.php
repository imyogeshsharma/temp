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
        $timeslot = implode(',,', $_POST['timeslot']);
        $address = $_POST['address']??'';
        // $transaction_id = $_POST['utr'];
        $transaction_id = 'JAM'.time(); 
        $count = !empty($_POST['timeslot'])?count($_POST['timeslot']):1;
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
    
    
    
    
    
    
    // echo "</p>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php include('header_file.php'); ?>
   <title>Jam Room Booking</title>
   <link rel="stylesheet" href="assets/css/nice-select.css">
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<style>
.gold-text{
    color: goldenrod;
}
label{
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
@media(max-width:786px){
    .img-form{
        width: 100% !important;
    }
    .lft{
        float:right;
    }
}

.select2-selection{
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
.selection{
    width:100% !important;
}
.select2-selection__choice__display {
    cursor: default;
    padding-left: 10px !important;
    padding-right: 8px !important;
}
.select2-selection__choice{
    background-color: #fff !important;
    padding: 3px 0px 3px 25px !important;
    border: 1px solid #004aad !important;
    color: #000000 !important;
}
.select2-selection__choice__display,.select2-selection__choice__remove span, .select2-results__option--selectable{
    color: #004aad !important;
}
.select2-selection__choice__remove{
    border-right: 1px solid #004aad !important;
    color: #004aad !important;
    padding: 3px 9px !important;
}
.thistype{
     color: #fff !important;
     margin-top:20px;
     font-size:20px;
}
input, .nice-select{
    color: #fff !important;
}
.contact-name{
        width: 100%;
    border: 1px solid var(--border);
    font-size: 11px;
    line-height: 1px;
    padding: 23px 20px;
    background-color: var(--sub-bg);
    border-radius: 10px;
}
</style>

<body>

    <?php include('header.php') ?>

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
                               <input type="number" class="nice-select" id="review"  name="mobile" placeholder="Enter your number" required="">
                           </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label >Email</label>
                                <input type="email" class="nice-select"  name="email" placeholder="Email" required="">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="nice-select" id="date" value="<?=date('Y-m-d')?>"  name="date" placeholder="Date" required="" style="line-height:10px !important; color-scheme:dark;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" style="color:#fff !important;">
                                <label for="timeslot">Time Slot</label>
                                <select class="nice-select" id="timeslot" placeholder="Select time" multiple name="timeslot[]" required=""  style="width:100%; color:#fff !important;">
                                    <p>Select time</p>
                                   <?php
                                    $booked = array();
                                    $get_data_enq = mysqli_query($con,"SELECT * FROM enqiry WHERE status = '1' AND date = '".date('Y-m-d')."'");
                                    while($get_data_enq1 = mysqli_fetch_array($get_data_enq)){
                                        $thisar = explode(',,', $get_data_enq1['time_slot']);
                                        $booked = array_merge($booked, $thisar);
                                        
                                    }
                                    date_default_timezone_set('Asia/Kolkata');
                                    $start = strtotime('11:00');
                                    $end = strtotime('23:00');
                                    for ($i = $start; $i <= $end; $i += 3600) {
                                        $selected = '';
                                        $threeHoursFromNow = strtotime('+3 hours');
                                        if(in_array(date('h:i A', $i) .' - '. date('h:i A', $i + 3600), $booked)){
                                            $selected = 'disabled';
                                        }
                                        echo '<option value="' . date('h:i A', $i) .' - '. date('h:i A', $i + 3600) . '" '.$selected.' >' . date('h:i A', $i) .' - '. date('h:i A', $i + 3600) . '</option>';
                                    }

                                    ?>
                                </select>
                            </div>
                        </div>
                       
                        <div class="col-md-12"  style="display:none;">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="nice-select" id="address" name="address" placeholder="Enter Your Address" ></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <p class="thistype">Rs. 400 for 1 Hour</p>  
                        </div>
                        
                        <div class="col-md-12" style="display:none;">
                            <img src="Qrins.jpg" width="200px"/><br>
                            
                            <br>
                            <label>Pay Online to Process you Booking</label>
                            <br>
                            <label>Admin Will Confirm your Booking</label>
                        </div>
                        <div class="col-md-12" style="display:none;">
                            <div class="form-group">
                                <label >UTR No </label>
                                <input type="text" class="form-control"  name="utr" placeholder="UTR No." style="color: #333 !important;" >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="mt-40 btn-one lft" name="send" type="submit">Book Your Slot</button>
                            
                        </div>
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


    <?php include('footer.php'); ?>

    <?php include('footer_file.php'); ?>
    
    <script>
        $(document).ready(function(){

            //set min date of today
            var today = new Date().toISOString().split('T')[0];
            $('#date').attr('min', today);


            $('#date').change(function(){
                var date = $(this).val();
                $.ajax({
                    url: 'getslot.php',
                    type: 'post',
                    data: {date: date},
                    success: function(response){
                        $('#timeslot').html(response);
                        $('#timeslot').niceSelect('update');
                    }
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#timeslot').select2();
            
            $('div[class="nice-select"]').hide();
            
            $('#timeslot').change(function(){
                var selected = $(this).val();
                console.log(selected.length);
                amount = 400;
                if(selected.length > 0){
                    $('.thistype').html('Rs. '+(amount*selected.length)+' for '+selected.length+' Hours');
                    $('button[name="send"]').attr('disabled', false);
                }else{
                    $('.thistype').html('Rs. '+amount+' for 1 Hour');
                    $('button[name="send"]').attr('disabled', true);
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