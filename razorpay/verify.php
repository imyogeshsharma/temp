<?php

?>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

<?php

require('config.php');



require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

 $transation = "TR".$_POST['shopping_order_id'];

if ($success === true)
{
   echo $html = "
   <center><img src='paymentlogo.png' style='width:20%'>
   <h2 style='text-align:center;margin-top:-2%'>Your payment has been Successfully</h2>
   <h4>Transaction id is $transation</h4>
   </center>
   ";
 
   
    if(isset($_POST['razorpay_signature'])){
    require "../connect.php";
      $razorpay_payment = $_POST['razorpay_payment_id'];
  $payment_id = "$razorpay_payment";
    $signature =  $_POST['razorpay_signature'];
        $razorpayoderid = $_POST['razorpay_order_id'];
    
       $unique_id = time() . mt_rand();
       $reportorderid = $_POST['reportorderid'];
        $username = $_POST['username'];
        $mobile = $_POST['contact'];
        $amount = $_POST['amount'];
       $wltamnt = $_POST['walletamnt'];
        $userid = $_POST['userid'];
        $status = "Success";
        
        $select_order = mysqli_query($con,"select * from orderdetails where orderid='$reportorderid'");
        
        $getorder = mysqli_fetch_assoc($select_order);
        
        $order_id = $getorder['order_id'];
        
        
        if($wltamnt){
        $totalamnt = $amount+$wltamnt;
        } else {
               $totalamnt = $amount;
        }
        $message = "Your payment is done ".$totalamnt;
        $inserorder = mysqli_query($con,"INSERT INTO `transaction`(userid,`paymentid`, `orderid`, `transactionid`, `username`, `mobile`, `amount`, `status`,type,message) VALUES ('$userid', '$payment_id','$reportorderid','$transation','$username','$mobile','$amount','$status','A','$message')");
        
        $upd = mysqli_query($con,"UPDATE orderdetails set paymenttypeid='2' where orderid='$reportorderid'");
        
        $users = mysqli_query($con,"select * from user where id='$userid'");
        
        $user_ref = mysqli_fetch_assoc($users);
   
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.interakt.ai/v1/public/track/events/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "phoneNumber": "'.$mobile.'",
    "countryCode": "+91",
    "event": "payment_delivery_done",
    "traits": {
        "uname": "'.$username.'",
        "orderid": "'.$reportorderid.'",
        "transid": "'.$transation.'",
        "uid": "'.$order_id.'"
    }
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Basic LXQzVm05S3pzM1dNQXdQaGtSbWtRR3V5UkJ4SllDZkZJdklSNGdtWjR6VTo=',
    'Cookie: ApplicationGatewayAffinity=a8f6ae06c0b3046487ae2c0ab287e175; ApplicationGatewayAffinityCORS=a8f6ae06c0b3046487ae2c0ab287e175'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;

        
        $referralcode = $user_ref['referralcode'];
        
        if($referralcode !==""){
        if($wltamnt){
        if($amount > $wltamnt OR $wltamnt =="0") {
            $payment_id = $razorpay_payment;
              $message = "Your Wallet Balance is Used successful ".$wltamnt;
               $findvalue = $amount-$wltamnt;
    $upd = mysqli_query($con,"update tbl_wallet set amount='0' where userid='$userid'");
            $inserwlt = mysqli_query($con,"INSERT INTO `transaction`(userid,`paymentid`, `orderid`, `transactionid`, `username`, `mobile`, `amount`, `status`,type,message) VALUES ('$userid', '$payment_id','$reportorderid','$transation','$username','$mobile','$wltamnt','$status','W','$message')");
            
            $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.interakt.ai/v1/public/track/events/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "phoneNumber": "'.$mobile.'",
    "countryCode": "+91",
    "event": "payment_delivery_done",
    "traits": {
        "uname": "'.$username.'",
        "orderid": "'.$reportorderid.'",
        "transid": "'.$transation.'",
        "uid": "'.$order_id.'"
    }
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Basic LXQzVm05S3pzM1dNQXdQaGtSbWtRR3V5UkJ4SllDZkZJdklSNGdtWjR6VTo=',
    'Cookie: ApplicationGatewayAffinity=a8f6ae06c0b3046487ae2c0ab287e175; ApplicationGatewayAffinityCORS=a8f6ae06c0b3046487ae2c0ab287e175'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
            
        } else {
   
             $payment_id = $razorpay_payment;
             $message = "Your Wallet Balance is Used successful ".$wltamnt;
      $findvalue = $wltamnt-$amount;
    $upd = mysqli_query($con,"update tbl_wallet set amount='$findvalue' where userid='$userid'");
        
         $inserwlt = mysqli_query($con,"INSERT INTO `transaction`(userid,`paymentid`, `orderid`, `transactionid`, `username`, `mobile`, `amount`, `status`,type,message) VALUES ('$userid', '$payment_id','$reportorderid','$transation','$username','$mobile','$findvalue','$status','W','$message')");
 
    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.interakt.ai/v1/public/track/events/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "phoneNumber": "'.$mobile.'",
    "countryCode": "+91",
    "event": "payment_delivery_done",
    "traits": {
        "uname": "'.$username.'",
        "orderid": "'.$reportorderid.'",
        "transid": "'.$transation.'",
        "uid": "'.$order_id.'"
    }
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Basic LXQzVm05S3pzM1dNQXdQaGtSbWtRR3V5UkJ4SllDZkZJdklSNGdtWjR6VTo=',
    'Cookie: ApplicationGatewayAffinity=a8f6ae06c0b3046487ae2c0ab287e175; ApplicationGatewayAffinityCORS=a8f6ae06c0b3046487ae2c0ab287e175'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
}
        } else {
            
        }
        $orderdtl = mysqli_query($con,"select * from user where id='$userid'");
        $orderrefer = mysqli_fetch_assoc($orderdtl);
        $referralcode = $orderrefer['used_referral_code'];
      
      $referprovider = mysqli_query($con,"select * from user where used_referral_code ='$referralcode'");
      $referrow = mysqli_fetch_assoc($referprovider);
      
      $referuserid = $referrow['id'];
      
        if($referralcode){
            $getref = mysqli_query($con,"select * from retention where code='REFERRAL'");
            $refcode = mysqli_fetch_assoc($getref);
            $dicamt = $refcode['discountrate'];
     
            // $userget = mysqli_query($con,"select * from user")

            $wltnum = mysqli_query($con,"select * from tbl_wallet where userid='$referuserid'");
            $num = mysqli_num_rows($wltnum);
            if($num){
                 
              $getwlt = mysqli_query($con,"select * from tbl_wallet where userid='$referuserid'");
            $wltfetch = mysqli_fetch_assoc($getwlt);
            $wlttotlamnt = $wltfetch['amount'];
           
            $addref =  $wlttotlamnt*$dicamt/100;
            
            $message = "Referral amount add in wallet ".$addref;
            $payment_id = $razorpay_payment;
                mysqli_query($con,"UPDATE tbl_wallet set amount='$addref' where userid='$referuserid'");
                
                   $inserwlt = mysqli_query($con,"INSERT INTO `transaction`(userid,`paymentid`, `orderid`, `transactionid`, `username`, `mobile`, `amount`, `status`,type,message) VALUES ('$referuserid', '$payment_id','$reportorderid','$transation','$username','$mobile','$dicamt','$status','R','$message')");
                   $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.interakt.ai/v1/public/track/events/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "phoneNumber": "'.$mobile.'",
    "countryCode": "+91",
    "event": "payment_delivery_done",
    "traits": {
        "uname": "'.$username.'",
        "orderid": "'.$reportorderid.'",
        "transid": "'.$transation.'",
        "uid": "'.$order_id.'"
    }
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Basic LXQzVm05S3pzM1dNQXdQaGtSbWtRR3V5UkJ4SllDZkZJdklSNGdtWjR6VTo=',
    'Cookie: ApplicationGatewayAffinity=a8f6ae06c0b3046487ae2c0ab287e175; ApplicationGatewayAffinityCORS=a8f6ae06c0b3046487ae2c0ab287e175'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
                   
            } else {
                 
              $getwlt = mysqli_query($con,"select * from tbl_wallet where userid='$referuserid'");
            $wltfetch = mysqli_fetch_assoc($getwlt);
            $wlttotlamnt = $wltfetch['amount'];
           
            $addref =  $dicamt+$wlttotlamnt;
               $message = "My refferal code  Refer your friend to brightnok and get 10% discount, when they place order using your code";
            $payment_id = $razorpay_payment;
                mysqli_query($con,"INSERT INTO tbl_wallet (userid,amount,status) values('$referuserid','$addref','1')");
                
                  $inserwlt = mysqli_query($con,"INSERT INTO `transaction`(userid,`paymentid`, `orderid`, `transactionid`, `username`, `mobile`, `amount`, `status`,type,message) VALUES ('$referuserid', '$payment_id','$reportorderid','$transation','$username','$mobile','$dicamt','$status','R','$message')");
                  
                  $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.interakt.ai/v1/public/track/events/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "phoneNumber": "'.$mobile.'",
    "countryCode": "+91",
    "event": "payment_delivery_done",
    "traits": {
        "uname": "'.$username.'",
        "orderid": "'.$reportorderid.'",
        "transid": "'.$transation.'",
        "uid": "'.$order_id.'"
    }
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Basic LXQzVm05S3pzM1dNQXdQaGtSbWtRR3V5UkJ4SllDZkZJdklSNGdtWjR6VTo=',
    'Cookie: ApplicationGatewayAffinity=a8f6ae06c0b3046487ae2c0ab287e175; ApplicationGatewayAffinityCORS=a8f6ae06c0b3046487ae2c0ab287e175'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
            }
        }else {
            
        }
        
        
        } else { 
        
        }
        
        echo "<center><a href='https://brightnok.com' style='background-color:#0B69A7;padding:10px;color:white'>Continue App</a></center><br><br>
        <center><a href='https://brightnok.com/panel/' style='background-color:#0B69A7;padding:10px;color:white'>Continue Portal</a></center>";
//          header("Location: https://brightnok.com/panel/invoice.php?id=$id&od=$orderid");
    }
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
    
     $razorpay_payment = $_POST['razorpay_payment_id'];
  $payment_id = "Your payment was Failed and Payment ID:$razorpay_payment ";
    $signature =  $_POST['razorpay_signature'];
        $razorpayoderid = $_POST['razorpay_order_id'];
      
       $unique_id = time() . mt_rand();
            $reportorderid = $_POST['reportorderid'];
        $username = $_POST['username'];
        $mobile = $_POST['contact'];
        $amount = $_POST['amount'];
        $status = "Failed";
        $inserorder = mysqli_query($con,"INSERT INTO `transaction`( `paymentid`, `orderid`, `transactionid`, `username`, `mobile`, `amount`, `status`) VALUES ('$payment_id','$reportorderid','$transation','$username','$mobile','$amount','$status')");

    }


//echo $html;

?>

<script>
//    setTimeout(CurrentFile,2000); 
//    function CurrentFile(){
//        window.location = 'redirect.php';
//    }
</script>