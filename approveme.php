<?php


include('init.php');
include('master.php');
if(isset($_GET['ids']))
{
    $dt = mysqli_query($con,"select * from enqiry where id = '".$_GET['ids']."'");
    $get_data = mysqli_fetch_array($dt);
    
        $update = "UPDATE `enqiry` SET  `status`='1' WHERE `id` = '".$_GET['ids']."'";
        if(mysqli_query($con,$update))
        {
            
                
                $to = $get_data['email'];
                $subject = "Order Confirmation";
                $message = '<html>
                <head>
                <title>Order Confirmation</title>
                </head>
                <body>
                <p>Dear '.$get_data['name'].',</p>
                <p>Your order has been confirmed.</p>
                <p>Order ID: Booked</p>
                <p>Date: '.$get_data['date'].'</p>
                <p>Time Slot: '.$get_data['time_slot'].'</p>
                <p>Thank you for choosing us.</p>
                </body>
                </html>';
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: <no-reply@mid-demo.co.in>'. $web_add . "\r\n";
                mail($to,$subject,$message,$headers);
                echo '<script>alert("Order Approved Successfull!...");window.location.href = "https://www.themetronome.store/index.php?showmessage=true";</script>';
            
            
        }
        echo '<script>window.location.href = "https://www.themetronome.store/index.php";</script>';
}
echo '<script>window.location.href = "https://www.themetronome.store/index.php";</script>';

?>
                