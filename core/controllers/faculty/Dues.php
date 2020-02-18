<?php
    class Dues Extends CI_Controller {
      public function index() {
        $req = $this->user_model->get_session();
        $res['session'] = $req;
        $data['title'] = "NUESA - Faculty Dues";
        $this->load->view('head', $data);
        $this->load->view('dues',$res);
        $this->load->view('end');

      }


      public function invoice() {
require "vendor/autoload.php";
        $data['title'] = "NUESA - Faculty Reciept";
        $data = array(
        'title' => 'NUESA - Faculty Dues Reciept',
        'payerName' =>  $this->input->post('payerName'),
        'payerDepartment' =>  $this->input->post('payerDepartment'),
        'payerFullname' =>  $this->input->post('payerFullname'),
        'payerEmail' =>  $this->input->post('payerEmail'),
        'payerPhone' =>   $this->input->post('payerPhone'),
        'payerLevel' =>   $this->input->post('payerLevel'),
        'amount' =>  $this->input->post('amount'),
        'reference' =>   $this->input->post('reference'),
        'session' =>   $this->input->post('session'),
        'paymentstatus' =>   $this->input->post('paymentstatus'),
        'transdate' => $this->input->post('transdate'),

        );
        $params['data'] = $this->input->post('reference').'-'.$this->input->post('paymentstatus');
$params['level'] = 'H';
$params['size'] = 3;
$params['savename'] = FCPATH.$data['reference'].'.jpg';
$this->ciqrcode->generate($params);
$data['qr'] = '<img src="'.$data['reference'].'.jpg" width="170" height="170"/>';
$mpdf = new \Mpdf\Mpdf();
//$mpdf->SetDefaultFont('montserrat');
    $html = $this->load->view('form',$data,true);
        $mpdf->shrink_tables_to_fit = 0;
        $mpdf->SetWatermarkText(mb_strtoupper($data['paymentstatus']));
        $mpdf->showWatermarkText = true;
        $mpdf->watermarkTextAlpha = 0.1;
          //$this->load->library('m_pdf');
          $mpdf->WriteHTML($html);
          $mpdf->Output(mb_strtoupper($data['payerName']).'.pdf','D');
             unlink($params['savename']);
      }
public function img() {
  header("Content-Type: image/png");
  $im = @imagecreate(110, 20)
      or die("Cannot Initialize new GD image stream");
  $background_color = imagecolorallocate($im, 0, 0, 0);
  $text_color = imagecolorallocate($im, 233, 14, 91);
  imagestring($im, 1, 5, 5,  "A Simple Text String", $text_color);
  echo imagepng($im);
  //imagedestroy($im);
}

      public function payment_check() {
      $res = $this->faculty_model->payment_check();
    if($res !== FALSE) {
    if($res->paymentstatus == "unpaid") {
      echo "success";
    } else {
      echo "fail";
  }
} else {
  echo "success";
}
    }
      public function pay_faculty_dues() {
        $res = $this->faculty_model->payment_check();
        if($res == FALSE) {
          $data = array(
            'payerName' => $this->input->post('payerName'),
            'payerEmail' => $this->input->post('payerEmail'),
            'payerPhone' => $this->input->post('payerPhone'),
            'payerFullname' => $this->input->post('payerFullname'),
            'payerDepartment' => $this->input->post('payerDepartment'),
            'payerLevel' => $this->input->post('payerLevel'),
            'session' => $this->input->post('session'),
            'amount' => $this->input->post('amount'),
            'transdate' => $this->input->post('transdate'),
          );
        } else {
        if($res->paymentstatus == "unpaid") {
          $data = array(
            'payerName' => $res->payerName,
            'payerEmail' => $this->input->post('payerEmail'),
            'payerPhone' => $this->input->post('payerPhone'),
            'payerFullname' => $this->input->post('payerFullname'),
            'payerDepartment' => $this->input->post('payerDepartment'),
            'paymentstatus' =>   $res->paymentstatus,
            'payerLevel' => $res->payerLevel,
            'session' => $res->session,
            'amount' => $res->amount,
            'reference' => $res->reference,
            'transdate' => $res->transdate,
          );
        }
      }
      $data['title'] = "Pay Faculty Dues";
      $this->load->view('head',$data);
      $this->load->view('pay_dues',$data);
      $this->load->view('end');
      }
      public function reprint_invoice() {
        $reference = $this->input->post('reference');
  $req = $this->faculty_model->reprint_reference();
  echo "<script>
  $('#msg').show();
  $('#err').hide();
    </script>";
  if($req == FALSE) {
    echo "reference does not exist!!!";
  } else{
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
      "accept: application/json",
      "authorization: Bearer sk_live_25ecd0a781474a5a9661f9fa6933cc286ec6a0af",
      "cache-control: no-cache"
    ],
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    if($err){
      // there was an error contacting the Paystack API
    die('Curl returned error: ' . $err);
    }

    $tranx = json_decode($response);

    if(!$tranx->status){
    // there was an error from the API
    die('API returned error: ' . $tranx->message);
    }

    if('success' == $tranx->data->status){
    $data = array(
      'paymentstatus' => 'paid',
    );
    $get = $this->faculty_model->update_payment($data,$reference);
$res = $this->faculty_model->reprint_reference();
echo '<table id="response" class="table table-bordered table-sm" width="50%"><tr>
<td width="50%"><h5 class="inline"><i>reference: </i></h5> &nbsp;&nbsp;&nbsp; <h3 class="inline" style="color:rgba(23,48,71,1);">
<b id="referencen">'.$res->reference.'</b></h3> &nbsp;&nbsp;
| <h2 class="inline"><a class="inline lin" style="font-size:30px;" id="print-reference"><i class="fa fa-print"></i></a></h2> </td>
</tr>
</table>';
echo '<form id="form" target="_blank" action="'.base_url().'faculty/dues/invoice" method="POST">
<input name="payerFullname" value="'.$res->payerFullname.'" type="hidden"/>
<input name="reference" value="'.$res->reference.'" type="hidden"/>
<input name="payerName" value="'.$res->payerName.'" type="hidden"/>
<input name="payerEmail" value="'.$res->payerEmail.'" type="hidden"/>
<input name="payerPhone" value="'.$res->payerPhone.'" type="hidden"/>
<input name="payerDepartment" value="'.$res->payerDepartment.'" type="hidden"/>
<input name="amount" value="'.$res->amount.'" type="hidden"/>
<input name="payerLevel" value="'.$res->payerLevel.'" type="hidden"/>
<input name="paymentstatus" value="'.$res->paymentstatus.'" type="hidden"/>
<input name="session" value="'.$res->session.'" type="hidden"/>
<input name="transdate" value="'.$res->transdate.'" type="hidden"/>
</form>';
}
        }
    }
    public function retrieve_reference() {
$req = $this->faculty_model->retrieve_reference();
echo "<script>
$('#msg2').show();
$('#err2').hide();
  </script>";
if($req == FALSE) {
  echo "No Invoice/Payment record exist for this registration number";
} else {
$ii = 1;
echo '<div class="col-sm-10 col-lg-10 col-md-10">
       <table width="50%" class="table table-sm table-bordered">
<thead class="thead-light">
<tr>
<th width="5%" scope="col">#</th>
<th width="20%" scope="col">Reference ID</th>
<th width="10%" scope="col">AMOUNT</th>
<th width="10%" scope="col">Trans. Date</th>
<th width="10%" scope="col">Payment Status</th>
<th width="5%" scope="col"><i class="fa fa-print"></i></th>
</tr>
</thead>
<tbody>';
foreach($req as $res) {
$i = $ii++;
  echo '
<tr>
<th scope="row">'.$i.'</th>
<td><form id="invoice" target="_blank" action="'.base_url().'faculty/dues/invoice" method="POST">
<input name="payerFullname" value="'.$res['payerFullname'].'" type="hidden"/>
<input name="reference" value="'.$res['reference'].'" type="hidden"/>
<input name="payerName" value="'.$res['payerName'].'" type="hidden"/>
<input name="payerEmail" value="'.$res['payerEmail'].'" type="hidden"/>
<input name="payerPhone" value="'.$res['payerPhone'].'" type="hidden"/>
<input name="payerDepartment" value="'.$res['payerDepartment'].'" type="hidden"/>
<input name="amount" value="'.$res['amount'].'" type="hidden"/>
<input name="paymentstatus" value="'.$res['paymentstatus'].'" type="hidden"/>
<input name="session" value="'.$res['session'].'" type="hidden"/>
<input name="transdate" value="'.$res['transdate'].'" type="hidden"/>
<input name="payerLevel" value="'.$res['payerLevel'].'" type="hidden"/>
</form>'.$res['reference'].'</td>
<td>&#8358;'.$res['amount'].'</td>
<td>'.$res['transdate'].'</td>
<td>'.$res['paymentstatus'].'</td>
<td><a id="reprint-reference" style="cursor:pointer;"><i class="fa fa-print"></i>&nbsp;Print</a></td>
</tr>';
}
echo '</tbody>
</table>
     </div>
  <script>
  $(document).on("click","#reprint-reference",function(){
  $("#invoice").submit();
  });
  </script>';

                      }
                    }

      public function generate_reference() {

        $res = $this->faculty_model->payment_check();
        if($res !== FALSE) {
$reference = $res->reference;
echo $reference;
      }
        else {
$letters = array_merge(range('A','Z'),range('A','Z'));

$r1 = mt_rand(10000,50000);
$r2 = mt_rand(10000,50000);
$reference = $letters[rand(0,51)].'-'.$r1.$r2;
$date = date("d-M-Y");
echo $reference;
$this->faculty_model->reg_payment($reference,$date);
  }
}
  public function pay_online() {
    $payerFullname = $this->input->post('payerFullname');
    $amount = $this->input->post('amount');
    $payerName = $this->input->post('payerName');
    $payerEmail = $this->input->post('payerEmail');
    $payerLevel = $this->input->post('payerLevel');
    $payerDepartment = $this->input->post('payerDepartment');
    $payerPhone = $this->input->post('payerPhone');
    $reference = $this->input->post('reference');
    $curl = curl_init();
    //the amount in kobo. This value is actually NGN 300

    // url to go to after payment
    $callback_url = 'nuesauniuyo.com/faculty/dues/verify';

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode([
        'amount'=>$amount,
        'email'=>$payerEmail,
        'reference' => $reference,
        'callback_url' => $callback_url
      ]),
      CURLOPT_HTTPHEADER => [
        "authorization: Bearer sk_live_25ecd0a781474a5a9661f9fa6933cc286ec6a0af", //replace this with your own test key
        "content-type: application/json",
        "cache-control: no-cache"
      ],
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    if($err){
      // there was an error contacting the Paystack API
      die('Curl returned error: ' . $err);
    }
    $tranx = json_decode($response, true);

    if(!$tranx->status){
      // there was an error from the API
      print_r('API returned error: ' . $tranx['message']);
    }
    // comment out this line if you want to redirect the user to the payment page
    print_r($tranx);
    // redirect to page so User can pay
    // uncomment this line to allow the user redirect to the payment page
    header('Location: ' . $tranx['data']['authorization_url']);
      }

      public function verify() {
        $curl = curl_init();
      $reference = isset($_GET['reference']) ? $_GET['reference'] : '';
      if(!$reference){
        die('No reference supplied');
      }

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
          "accept: application/json",
          "authorization: Bearer sk_live_25ecd0a781474a5a9661f9fa6933cc286ec6a0af",
          "cache-control: no-cache"
        ],
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      if($err){
          // there was an error contacting the Paystack API
        die('Curl returned error: ' . $err);
      }

      $tranx = json_decode($response);

      if(!$tranx->status){
        // there was an error from the API
        die('API returned error: ' . $tranx->message);
      }

      if('success' == $tranx->data->status){
        // transaction was successful...
        // please check other things like whether you already gave value for this ref
        // if the email matches the customer who owns the product etc
        // Give value
        $data = array(
          'paymentstatus' => 'paid',
          'transdate' => date('d-M-Y'),
        );
        $get = $this->faculty_model->update_payment($data,$reference);
        $this->faculty_model->reg_payment($reference,$date);
        $res = $this->faculty_model->payment_check();
        $params['data'] = $this->input->post('reference').'-'.$this->input->post('paymentstatus');
$params['level'] = 'H';
$params['size'] = 10;
$params['savename'] = FCPATH.$data['reference'].'.png';
$this->ciqrcode->generate($params);
$data['qr'] = '<img src="'.$data['reference'].'.png" width="170" height="170"/>';
  $html = $this->load->view('form',$data,true);
      require "vendor/autoload.php";
        //use Dompdf\Dompdf;
        $dompdf = new Dompdf\Dompdf();
              $dompdf->loadHtml($html);
              $dompdf->setPaper('A4', 'portrait');
               $dompdf->render();
              //$dompdf->output();
             $dompdf->stream();
             unlink($params['savename']);
      }
    }
  }
