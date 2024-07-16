<?php
include('init.php');
include('master.php');
// print_r($_POST);
// exit;
//razorpay_payment_id <p>Amount: '.$get_data_user['amount'].'</p>
if(isset($_POST['razorpay_payment_id']) && isset($_POST['transaction_id'])){
    
    $tobeupdated = "razorpay_order_id = '".$_POST['razorpay_order_id']."', razorpay_payment_id = '".$_POST['razorpay_payment_id']."', razorpay_signature = '".$_POST['razorpay_signature']."', status = '1'";
    //updatedata($con, $tobeupdated, "transaction_id = '".$_POST['transaction_id']."'", "enqiry");
    mysqli_query($con,"Update enqiry set razorpay_order_id = '".$_POST['razorpay_order_id']."', razorpay_payment_id = '".$_POST['razorpay_payment_id']."', razorpay_signature = '".$_POST['razorpay_signature']."', status = '1' where transaction_id = '".$_POST['transaction_id']."'");
    //$get_data_enq = getdata($con, "*", "transaction_id = '".$_POST['transaction_id']."'", "enqiry");
    $get_data_enq = mysqli_query($con,"select * from enqiry where transaction_id = '".$_POST['transaction_id']."'");
    $get_data_enq = mysqli_fetch_assoc($get_data_enq);
    $to = $get_data_enq['email'];
    $slt = explode(",,",$get_data_enq['time_slot']);
    $subject = "Order Confirmation";
    $message = '<html>
    <head>
    <title>Order Confirmation</title>
    </head>
    <body>
    <p>Dear '.$get_data_enq['name'].',</p>
    <p>Your order has been confirmed.</p>
    <p>Order ID: '.$get_data_enq['transaction_id'].'</p>
    <p>Date: '.$get_data_enq['date'].'</p>
    <p>Time Slot: '.implode("-",$slt).'</p>
    <p>Thank you for choosing us.</p>
    </body>
    </html>';
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: <test123@midbrains.in>'. $web_add . "\r\n";
    mail($get_data_enq['email'],$subject,$message,$headers);
    
    
    $message_admin = '<html>
            <head>
            <title>Order Confirmation</title>
            </head>
            <body>
            <p>Dear '.$get_data_enq['name'].',</p>
            <p>Order ID: '.$get_data_enq['transaction_id'].'</p>
            <p>Booked Successfully.</p>
            <p>Date: '.$get_data_enq['date'].'</p>
            <p>Time Slot: '.implode("-",$slt).'</p>
            <p>Thank you for choosing us.</p>
            <p><br><br><br></p>
            
            </body>
            </html>';
        $name = $get_data_enq['name'];
        mail("jam.metronome@gmail.com","New Booking for Jam Room by $name",$message_admin,$headers);
        mail("designeryogeshsharma@gmail.com","New Booking for Jam Room by $name",$message_admin,$headers);

    echo '<script>alert("Order Confirmed");window.location.href = "index.php";</script>';
}else{
    echo '<script>alert("Something went wrong");window.location.href = "index.php";</script>';
}
/*
if(isset($_POST['merchantId']) && isset($_POST['transactionId']) && isset($_POST['amount']) ){
    
    $merchantId=$_POST['merchantId'];
    $transactionId=$_POST['transactionId'];
    $amount=$_POST['amount'];
    
    // session_start();
    // $transaction_id = $_SESSION['order_id'];
    
    if (API_STATUS == "LIVE") {
        $url = LIVESTATUSCHECKURL . $merchantId . "/" . $transactionId;
        $saltkey = SALTKEYLIVE;
        $saltindex = SALTINDEX;
    } else {
        $url = STATUSCHECKURL . $merchantId . "/" . $transactionId;
        $saltkey = SALTKEYUAT;
        $saltindex = SALTINDEX;
    }
    
    $st = "/pg/v1/status/" . $merchantId . "/" . $transactionId . $saltkey;

    $dataSha256 = hash("sha256", $st);
    
    $checksum = $dataSha256 . "###" . $saltindex;
    
    
    //GET API CALLING
    $headers = array(
        "Content-Type: application/json",
        "accept: application/json",
        "X-VERIFY: " . $checksum,
        "X-MERCHANT-ID:" . $merchantId
    );
    
    
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, '0');
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, '0');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    
    $resp = curl_exec($curl);
    
    curl_close($curl);
    
    $responsePayment = json_decode($resp, true);
    
    // echo "<pre>";
    // print_r($responsePayment);
    // echo "</pre>";
    // echo $transaction_id;
    
    $transaction_id = $responsePayment['data']['merchantTransactionId'];
    // echo "<br>";
    $tran_id = $responsePayment['data']['transactionId'];
    // echo "<br>";
    $amount = $responsePayment['data']['amount']/100;
    // echo "<br>";
    $utr = $responsePayment['data']['paymentInstrument']['utr'];

    //exit;
    
    if ($responsePayment['success'] && $responsePayment['code'] == "PAYMENT_SUCCESS")
    {
        //$tobeupdated = "razorpay_order_id = '".$_POST['razorpay_order_id']."', razorpay_payment_id = '".$_POST['razorpay_payment_id']."', razorpay_signature = '".$_POST['razorpay_signature']."', status = '1'";
        
        mysqli_query($con,"Update enqiry set razorpay_order_id = '".$utr."', razorpay_payment_id = '".$tran_id."', razorpay_signature = '".$amount."', status = '1' where transaction_id = '".$transaction_id."'");
        
        $get_data_enq = mysqli_query($con,"select * from enqiry where transaction_id = '".$transaction_id."'");
        $get_data_enq = mysqli_fetch_assoc($get_data_enq);
        $to = $get_data_enq['email'];
        $subject = "Order Confirmation";
        
        $slt = explode(",,",$get_data_enq['time_slot']);
        $message = '<html>
        <head>
        <title>Order Confirmation</title>
        </head>
        <body>
        <p>Dear '.$get_data_enq['name'].',</p>
        <p>Your order has been confirmed.</p>
        <p>Order ID: '.$get_data_enq['transaction_id'].'</p>
        <p>Date: '.$get_data_enq['date'].'</p>
        <p>Time Slot: '.implode(",",$slt).'</p>
        <p>Thank you for choosing us.</p>
        </body>
        </html>';
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <test123@midbrains.in>'. $web_add . "\r\n";
        mail($to,$subject,$message,$headers);
        
        
        $message_admin = '<html>
            <head>
            <title>Order Confirmation</title>
            </head>
            <body>
            <p>Dear '.$get_data_enq['name'].',</p>
            <p>Order ID: '.$get_data_enq['transaction_id'].'</p>
            <p>Booked Successfully.</p>
            <p>Date: '.$get_data_enq['date'].'</p>
            <p>Time Slot: '.implode(",",$slt).'</p>
            <p>Thank you for choosing us.</p>
            <p><br><br><br></p>
            
            </body>
            </html>';
        $name = $get_data_enq['name'];
        mail("jam.metronome@gmail.com","New Booking for Jam Room by $name",$message_admin,$headers);
        mail("designeryogeshsharma@gmail.com","New Booking for Jam Room by $name",$message_admin,$headers);
        
        echo '<script>alert("Order Confirmed");window.location.href = "index.php";</script>';
    }else{
        echo '<script>alert("Something went wrong");window.location.href = "index.php";</script>';
    }
}else{
    echo '<script>alert("Something went wrong");window.location.href = "index.php";</script>';
}

*/
    
?>