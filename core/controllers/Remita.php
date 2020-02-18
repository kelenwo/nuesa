<?php
class Remita extends CI_Controller {

        public function index()
        {

$this->load->helper('url');
             $data['title'] = "Pay Faculty Dues";
                // $this->load->view('head', $data);
                if ($this->form_validation->run('remita') == FALSE)
                    {
                      $this->load->view('head', $data);
                      $this->load->view('remita');
                      $this->load->view('end');
        } else{
          $fullname = $this->input->post('name');
          $level = $this->input->post('level');
          $department = $this->input->post('department');
          $session = $this->input->post('session');
          $amt = 1000;
          $orderID = uniqid();
          $payerName = $this->input->post('payerName');
          $payerEmail = $this->input->post('payerEmail');
          $payerPhone = $this->input->post('payerPhone');
          $responseurl = $this->config->item('URL') . "/sample-receipt-page.php";
          //$contactString = $this->config->item('MerchantID') . $this->config->item('ServiceTypeID');
          $MERCHANTID = $this->config->item('MerchantID');
          $SERVICETYPEID = $this->config->item('ServiceTypeID');
          $GATEWAYURL = $this->config->item('GatewayUrl');
          $contactString = $MERCHANTID . $SERVICETYPEID . $orderID . $amt . $this->config->item('APIKEY');
          $hash = hash('sha512', $contactString);
          $paymenttype = $this->input->post('paymenttype');
          //$content = file_get_contents(dirname(__FILE__). '/template/proccess.html');

          $data =  array(
              'payerName'    => $payerName,
              'payerEmail' => $payerEmail,
              'payerPhone'    => $payerPhone,
              'paymenttype'    => $paymenttype,
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

          <form action="'.$GATEWAYRRRPAYMENTURL.'" method="POST">
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
          }
        //  $this->load->view('process', $data);


        }



}
}
