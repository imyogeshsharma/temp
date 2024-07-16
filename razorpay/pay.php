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
 $wllt = $_POST['walletamnt'];
 $orderid= $_POST['orderid'];
    $userid = $_POST['userid'];


error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
require('config.php');
require('razorpay-php/Razorpay.php');


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

$checkout = 'automatic';

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
    "walletamnt"      => $wllt,
    "userid"          => $userid
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
<a href="../sms_link.php?pay=<?php echo $orderid?>" style="color:white;background-color:#FDA400;padding:10px;text-decoration:none">Back</a>
<a href="http://brightnok.com/panel/index.php" style="color:white;background-color:#FDA400;padding:10px;text-decoration:none">Home</a>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
$("#legalcrib_btn").submit();
});
</script>