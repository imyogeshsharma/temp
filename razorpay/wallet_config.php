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

 $transation = "TR".time() . mt_rand(1,8);;

if ($success === true)
{
   echo $html = "
   <center><img src='paymentlogo.png' style='width:20%'>
   <h2 style='text-align:center;margin-top:-2%'>Your payment has been added in your wallet</h2>

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
       $selecttrns = mysqli_query($con,"select * from transaction where paymentid='$payment_id'");
       $num_query = mysqli_num_rows($selecttrns);
       if($num_query){
       
        $username = $_POST['username'];
        $mobile = $_POST['contact'];
        $amount = $_POST['amount'];
        $status = "Success";
        $userid =  $_POST['userid'];
          $message = "Your wallet is credited with amount".$amount;
        $inserorder = mysqli_query($con,"INSERT INTO `transaction`( `userid`,`paymentid`, `orderid`, `transactionid`, `username`, `mobile`, `amount`, `status`,`type`,`message`) VALUES ('$userid', '$payment_id','$reportorderid','$transation','$username','$mobile','$amount','$status','W','$message')");
        
          $bal = mysqli_query($con,"select * from tbl_wallet where userid='$userid'");
          
     $tot = mysqli_fetch_assoc($bal);
     
     $money = $tot['amount']+$amount;
     
     $q = "select * from tbl_wallet where userid='$userid'";
     $res = mysqli_query($con,$q);
     $num = mysqli_num_rows($res);
     
     if($num)
     {
  mysqli_query($con,"UPDATE `tbl_wallet` SET `amount`='$money',`status`='1' where `userid`='$userid'");
     }else {
       
             $upd = mysqli_query($con,"insert into tbl_wallet(`userid`, `amount`,`status`) VALUES('$userid','$amount','1') ");
     }
    
        
        $upd = mysqli_query($con,"UPDATE orderdetails set paymenttypeid='2' where orderid='$reportorderid'");
        echo "<center><a href='#' style='background-color:#0B69A7;padding:10px;color:white'>Continue App</a></center>";
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
//        $inserorder = mysqli_query($con,"INSERT INTO `transaction`( `paymentid`, `orderid`, `transactionid`, `username`, `mobile`, `amount`, `status`) VALUES ('$payment_id','$reportorderid','$transation','$username','$mobile','$amount','$status')");

       
    }
}else {
    echo "<center><h4>Sorry, Your transaction already exits </h4></center>";
    echo "<center><a href='#' style='background-color:#0B69A7;padding:10px;color:white'>Continue App</a></center>";
}

//echo $html;

?>

<script>
//    setTimeout(CurrentFile,2000); 
//    function CurrentFile(){
//        window.location = 'redirect.php';
//    }
</script>