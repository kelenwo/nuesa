<?php
class Faculty extends CI_Controller {

        public function about()
        {

$this->load->helper('url');
             $data['title'] = "NUESA - Faculty of Engineering";
                // $this->load->view('head', $data);
   $this->load->view('head', $data);
   $this->load->view('faculty');
   $this->load->view('end');
        }
        public function dues() {
          $data['title'] = "NUESA - Faculty Dues";
          $this->load->view('head', $data);
          $this->load->view('dues');
          $this->load->view('end');
        }
        public function pay_faculty_dues() {
    $data['title'] = "NUESA - Pay Faculty Dues";

             $this->load->view('head', $data);
             $this->load->view('pay_dues');
             $this->load->view('end');
                  }

        public function dues_check() {
$this->form_validation->set_rules('payerName', 'Registration Number', 'callback_payment_check');
//$this->form_validation->set_rules('avatar', 'Avatar', 'callback_avatar_check');
$query = $this->panel_model->payment_check();
if($query == TRUE){
$this->form_validation->set_message('pay_check', 'You have completed Payment for this Level');
return FALSE;
          }
else {
return true;
          }
if ($this->form_validation->run('pay_dues') == FALSE) {
echo '<b style="color:red;">'.validation_errors().'</b>';
echo "<script>
$('#msg2').html(' ');
</script>";
} else {
echo '<span style="font-weight:900; font-size:25px;"> | </span>
<button style="font-weight:400; font-size:17px;" type="button" id="retrieve" class="btn btn-primary"> PRINT <i class="fa fa-print"></i> </button>
';
echo "<script>
$('#err2').html(' ');
</script>";
}
        }
        public function pay_check($str) {
      $query = $this->panel_model->payment_check();
      if($query == TRUE){
      $this->form_validation->set_message('pay_check', 'You have completed Payment for this Level');
      return FALSE;
                }
      else {
      return true;
                }
              }
              public function pay_now() {
   $this->form_validation->set_rules('session', 'Session', 'callback_session_check');
    if ($this->form_validation->run('register') == FALSE) {

    }
 $payerFullname = $this->input->post('payerFullname');
 $payerLevel = $this->input->post('payerLevel');
 $payerDepartment = $this->input->post('payerDepartment');
 $session = $this->input->post('session');
 $amt = 1000;
 $totalAmount = "1000";
 $timesammp=DATE("dmyHis");
 $orderID = $timesammp;
 $payerName = $this->input->post('payerName');
 $payerEmail = $this->input->post('payerEmail');
 $payerPhone = $this->input->post('payerPhone');
 $responseurl = "/sample-receipt-page.php";
 $MERCHANTID = $this->config->item('MerchantID');
 $SERVICETYPEID = $this->config->item('ServiceTypeID');
 $APIKEY = $this->config->item('ApiKey');
 $GATEWAYURL = $this->config->item('GatewayUrl');
 $GATEWAYURLRRR = $this->config->item('GatewayUrlRRR');
 $hash_string = $MERCHANTID . $SERVICETYPEID . $orderID . $totalAmount . $APIKEY;
 $hash = hash('sha512', $hash_string);
 $itemtimestamp = $timesammp;


 $data =  array(
     'payerName'    => $payerName,
     'payerEmail' => $payerEmail,
     'payerPhone'    => $payerPhone,
     'responseurl'    => $responseurl,
     'amt'    => $amt,
     'merchantId'    => $MERCHANTID,
     'serviceTypeId'    => $SERVICETYPEID,
     'orderID'    => $orderID,
     'hash'    => $hash,
     'gatewayurl' => $GATEWAYURL

 );
 $content = '{"serviceTypeId":"'.$SERVICETYPEID.'"'.",".'
   "amount":"'.$amt.'"'.",".'
   "hash":"'.$hash.'"'.",".'
   "orderId":"'.$orderID.'"'.",".'
   "payerName":"'.$payerName.'"'.",".'
   "payerEmail":"'.$payerEmail.'"'.",
   ".'"payerPhone":"'.$payerPhone.'"}';


 $curl = curl_init();


 curl_setopt_array($curl, array(
   CURLOPT_URL => $GATEWAYURL,
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_SSL_VERIFYPEER => false,
   CURLOPT_ENCODING => "",
   CURLOPT_MAXREDIRS => 10,
   CURLOPT_TIMEOUT => 30,
   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
   CURLOPT_CUSTOMREQUEST => "POST",
   CURLOPT_POSTFIELDS => $content,
   CURLOPT_HTTPHEADER => array(
     "Authorization: remitaConsumerKey=2547916,remitaConsumerToken=$hash",
     "Content-Type: application/json",
     "cache-control: no-cache"
   ),
 ));

 $json_response = curl_exec($curl);
 $err = curl_error($curl);
 curl_close($curl);

 echo $json_response;

 $jsonData = substr($json_response, 7, -1);
 $response = json_decode($jsonData, true);
 var_dump($response);
 $statuscode = $response['statuscode'];
 $statusMsg = $response['status'];

 if($statuscode=='025'){
 $rrr = trim($response['RRR']);
 $new_hash_string = $MERCHANTID . $rrr . $APIKEY;
 $new_hash = hash('sha512', $new_hash_string);
 echo '<html>
 <head>
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <link rel="stylesheet" href="css/bootstrap-dark.min.css">
 </head>
 <body>
   <div class="container">
 	<div class="row">
     <div class="col-xs-12 col-md-9 col-lg-7">

 <form action="'.$GATEWAYURLRRR.'" method="POST">
 <input id="merchantId" name="merchantId" value="'.$MERCHANTID.'" type="hidden"/>
 <input id="rrr" name="rrr" value="'.$rrr.'" type="hidden"/>
 <input id="responseurl" name="responseurl" value="'.$responseurl.'" type="hidden"/>
 <input id="hash" name="hash" value="'.$new_hash.'" type="hidden"/>

 </div>
  <div class="form-group">
 	<div class="col-sm-8 col-sm-offset-4">
 		<input type="submit" class="btn btn-sm btn-primary" name="submit" value="Submit" />
 	</div>
 </div>
 	</form>
 </div>
 </div>
 </div>
 </body>
 </html>';
 }
 else{
 echo "Error Generating RRR - " .$statusMsg;

 echo "<script>
 $('#paynow').removeAttr('disabled');
 $('#btnn').html('<button type='button' id='paynow' class='btn btn-primary'>PAY NOW</button>');
 </script>";
 }
 //$this->load->view('process', $data);
}


        public function executives() {
          $data['admin'] = $this->faculty_model->get_exec_admin();
          $data['faculty'] = $this->faculty_model->get_exec_faculty();
          $data['title'] = "NUESA - EXECUTIVES";
          $this->load->view('head', $data);
          $this->load->view('exec');
          $this->load->view('end');
}
        public function payment_check() {
          $query = $this->faculty_model->payment_check();
          if($query == FALSE){
          $this->form_validation->set_message('rrr_check', 'Invalid Remita Retrieval Reference.');
          return FALSE;
                    }
          else {
          return true;
                    }

        }
        public function rrr_check($str) {
      $query = $this->faculty_model->rrr_check();
      if($query == FALSE){
      $this->form_validation->set_message('rrr_check', 'Invalid Remita Retrieval Reference.');
      return FALSE;
                }
      else {
      return true;
                }
              }
      }
      ?>
