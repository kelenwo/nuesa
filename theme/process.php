<html>
<head>
<title>Payment processing ...</title>
</head>


<body>
<p>You will be redirected to Remita in few seconds.......</p>

<form action="<?php echo $gatewayurl;?>" id="remita_form" name="remita_form" method="POST">

<input id="merchantId" name="merchantId" value="<?php echo $merchantId; ?>" type="hidden" />
<input id="serviceTypeId" name="serviceTypeId" value="<?php echo $serviceTypeId; ?>" type="hidden" />
<input id="responseurl" name="responseurl" value="<?php echo $responseurl; ?>" type="hidden" />
<input id="orderId" name="orderId" value="<?php echo $orderID; ?>"  />
<input id="hash" name="hash" value="<?php echo $hash; ?>"  />

<input id="amt" name="amt" value="<?php echo $amt; ?>" type="hidden" type="hidden"/>
<input id="payerName" name="payerName" value="<?php echo $payerName; ?>" type="hidden" />
<input id="paymenttype" name="paymenttype" value="<?php echo $paymenttype; ?>" type="hidden" />
<input id="payerEmail" name="payerEmail" value="<?php echo $payerEmail; ?>" type="hidden" />
<input id="payerPhone" name="payerPhone" value="<?php echo $payerPhone; ?>" type="hidden" />
</form>
<script type="text/javascript">document.getElementById("remita_form").submit();</script>
</body>
</html>
