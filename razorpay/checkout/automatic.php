<!--  The entire list of Checkout fields is available at
 https://docs.razorpay.com/docs/checkout-form#checkout-fields -->

<form action="verify.php" method="POST" id="legalcrib_btn" name="legalcrib_btn">
  <script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $data['key']?>"
    data-amount="<?php echo $data['amount']?>"
    data-currency="INR"
    data-buttontext="Pay With Razorpay"
    data-name="<?php echo $data['name']?>"
    data-image="<?php echo $data['image']?>"
    data-description="<?php echo $data['description']?>"
    data-prefill.name="<?php echo $data['prefill']['name']?>"
    data-prefill.orderid="<?php echo $data['prefill']['orderid']?>"
    data-prefill.email="<?php echo $data['prefill']['email']?>"
    data-prefill.contact="<?php echo $data['prefill']['contact']?>"
    data-notes.shopping_order_id="<?php echo $data['prefill']['order_id']?>"
        data-notes.walletamnt="<?php echo $data['prefill']['walletamnt']?>"
         data-notes.userid="<?php echo $data['prefill']['userid']?>"
    data-order_id="<?php echo $data['order_id']?>"
    <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount']?>" <?php } ?>
    <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency']?>" <?php } ?>
  >
  </script>
  
  <?php //echo $data['prefill']['name']?>
  <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
  <input type="hidden" name="reportorderid" value="<?php echo $data['prefill']['orderid']?>">
  <input type="hidden" name="shopping_order_id" value="<?php echo $data['prefill']['order_id']?>">
  <input type="hidden" name="username" value="<?php echo $data['prefill']['name']?>">
  <input type="hidden" name="userid" value="<?php echo $data['prefill']['userid']?>">
  <input type="hidden" name="contact" value="<?php echo $data['prefill']['contact']?>">
  <input type="hidden" name="walletamnt" value="<?php echo $data['prefill']['walletamnt']?>">
  <input type="hidden" name="amount" value="<?php echo $data['amount']/100?>">
  
</form>
