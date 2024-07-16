<?php
session_start();
error_reporting(0);
use Razorpay\Api\Api;
?>


<?php
include('../connect.php');
$usermobile = $_POST['usermobile'];
$username = $_POST['username'];
   $total_amount= $_POST['reportorderid'];
 $orderid= $_POST['orderid'];
$userid = $_POST['userid'];
//echo $wllt-$total_amount;

error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
require('config.php');
require('razorpay-php/Razorpay.php');

// if(isset($_POST['payment'])){
     
//      $bal = mysqli_query($con,"select * from tbl_wallet where userid='$userid'");
//      $tot = mysqli_fetch_assoc($bal);
     
//      $money = $tot['amount']+$total_amount;
     
//      $q = "select * from tbl_wallet where userid='$userid'";
//      $res = mysqli_query($con,$q);
//      $num = mysqli_num_rows($res);
     
//      if($num)
//      {
//   mysqli_query($con,"UPDATE `tbl_wallet` SET `amount`='$money',`status`='1' where `userid`='$userid'");
//      }else {
       
//              $upd = mysqli_query($con,"insert into tbl_wallet(`userid`, `amount`,`status`) VALUES('$userid','$total_amount','1') ");
//      }
    
    
// }
$orderData = [
    'receipt'         => '445454',
    'amount'          => $total_amount *100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];


$api = new Api($keyId, $keySecret);
$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];
 $unique_id = time() . mt_rand();
        $orderuserid = substr($unique_id,3,10);

$checkout = 'wallet_pay';

$data = [
    "key"               => $keyId,
    "amount"            => $total_amount*100,
    "name"              => "Brightnok ",
    "description"       => 'Laundry Dry Cleaning',
    "image"             => "https://brightnok.com/image/logowebsite-1.png",
    "prefill"           => [
    "name"              => $username,
    "email"             => '',
    "contact"           => $usermobile,
    "order_id"          => $orderid,
    "orderid"           => $orderid,
    "user_id"           => $userid
    ],
    "notes"             => [
    "address"           => "Online",
    "merchant_order_id" => 'order_CM0tNy3tkQ2aln',
    ],
    "theme"             => [
    "color"             => "#1dc8cd"
    ],
    "order_id"          => $razorpayOrderId,
];


if ($displayCurrency !== 'INR'){
    
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;

}

$json = json_encode($data);

require("checkout/{$checkout}.php");

?>
<a href="../add_walet.php?wallet=<?php echo $userid?>&money=<?php echo $total_amount;?>" style="color:white;background-color:#FDA400;padding:10px;text-decoration:none">Back</a>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
$("#legalcrib_btn").submit();
});
</script>