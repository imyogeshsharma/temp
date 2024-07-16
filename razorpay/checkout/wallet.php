<?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
include('../../connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Brightnok Payment Done</title>
</head>
<body>
<!--    <h4>Your Payment Success</h4>-->
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   
    <?php  
   $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);

$usermobile = $uri_segments[5]; // for www.example.com/user/account you will get 'user'
$username = $uri_segments[6]; // for www.example.com/user/account you will get 'user'
$amount = $uri_segments[7]; // for www.example.com/user/account you will get 'user'
$orderid = $uri_segments[8]; // for www.example.com/user/account you will get 'user'
     $unique_id = time() . mt_rand();
 $payment_id = "Your payment was successful and Payment ID:$unique_id ";
      $status = "Success";
     $transation = "TR".$orderid;
         $inserorder = mysqli_query($con,"INSERT INTO `transaction`( `paymentid`, `orderid`, `transactionid`, `username`, `mobile`, `amount`, `status`) 
         VALUES ('$payment_id','$orderid','$transation','$username','$usermobile','$amount','$status')");
    if($inserorder)
    {
        
   $upd = mysqli_query($con,"UPDATE orderdetails set paymenttypeid='2' where orderid='$orderid'");
    ?>
     <center><img src='http://localhost/brightnok.com/panel/razorpay/checkout/paymentlogo.png' style='width:20%'>
   <h2 style='text-align:center;margin-top:-2%'>Your payment was successfully</h2>
   <h4>Transaction id is <?php echo $transation;?></h4>
   <a href='https://brightnok.com/' style="background-color:#0B6BAB;color:white;padding:10px">Go to Website</a>
   </center>
   <?php } ?>
</body>
</html>
