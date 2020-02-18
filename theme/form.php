<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="<?php echo base_url();?>theme/assets/bootstrap.css" rel="stylesheet" />
      <link href="<?php echo base_url();?>theme/assets/css/fonts.css" rel="stylesheet" />

</head>
  <div id="content">
<style>

.bold {
  font-weight: bold;
}

.arial {
  font-weight: 900;
  font-size: 26px;
  font-family: calibri;
}
td {
  padding: 10px;
  font-family: montserrat;
  border: 1px #ddd solid;
}
#content {
    font-family: "montserrat",sans-serif;
}
@font-face {
  font-family: Baloo;
  src: url('../fonts/Baloo-Regular.ttf');
}
.watermark {
    position: fixed;
    z-index: -99;
    min-height: 50%;
    min-width: 50%;
    color: lightgrey;
    font-size: 120px;
    transform: rotate(300deg);
    -webkit-transform: rotate(300deg);
}
</style>

<table class="table table-bordered" width="100%" ><tr><td width="100%" colspan="3">
  <table class="text-center" width="100%" >
      <tr>
          <td width="20%" style="border:0px !important;"><img style="margin-left:20px;" class="img-logo" src="theme/assets/img/nuesa-logo.png"></td>
          <td width="60%" style="border:0px !important; font-size: 15px;">
              <h5 class="h6-ss rgbaa text-center"><b style="font-family: montserrat !important;">NIGERIAN UNIVERSTIES ENGINEERING STUDENTS ASSOCIATION</b>
  </h5>
              <h5 class="h6-ss rgbaa text-center" style=" font-size: 26px;"><span class="rgba">(NUESA UNIUYO)</span></h5></td>
          <td width="20%" style="border:0px !important;"><img style="margin-right:10px;" class="img-logo" src="theme/assets/img/uniuyo-logo.png"></td>
      </tr>

  </table>
</td>
</tr>

                            <tr>
                            <td width="60%">
                              <table class="table table-bordered" width="100%" align="center">
                              <tr>
              <td width="40%" class="bold" style="padding: 10px;"> Name</td>
              <td width="60%"><b style="text-transform:capitalize;"><?php echo $payerFullname; ?></b></td>
            </tr> <tr>
              <td width="40%" class="bold">Reg number </td>
              <td width="60%"><b style="text-transform:uppercase;"><?php echo $payerName; ?> </b></td>
            </tr>
            <tr>
              <td width="40%" class="bold">Department </td>
              <td width="60%"><?php echo $payerDepartment; ?> </td>
            </tr>
            <tr>
              <td width="40%" class="bold">Phone Number </td>
              <td width="60%"><?php echo $payerPhone; ?></td>
            </tr>
            <tr>
              <td width="40%" class="bold">Email Address </td>
              <td width="60%"><?php echo $payerEmail; ?></td>
            </tr>
            <tr>
              <td width="40%" class="bold">LEVEL</td>
              <td width="60%"><b><?php echo $payerLevel; ?> </b></td>
            </tr>
            <tr>
              <td width="40%" class="bold">DATE </td>
              <td width="60%"><?php echo $transdate; ?> </td>
            </tr>
          </table>

        </td><td width="40%">
  <table class="table table-bordered" width="100%" align="center">
    <tr>
      <td width="100%" style="" colspan="2">
        <div class="icon-bx-wraper bx-style-1 p-tb15 p-lr10 center">
            <div class="m-b5" style="margin-left:10px;" id="qrcode">
              <?php echo $qr;?>
            </div>
        </div>
      </td>
    </tr>
                              <tr>
              <td width="40%" class="bold"> Reference</td>
              <td width="60%"> <?php echo $reference; ?></td>
            </tr>
            <tr>
              <td width="40%" class="bold">STATUS </td>
              <td width="60%"><?php echo $paymentstatus; ?> </td>
            </tr>

          </table> </td>
                          </tr>
                        </table>
                        <table class="table table-bordered text-center" width='100%'>
                      <tr class="bold bgr active">
                            <td class="bold active" width="5%"> #</td>
                            <td class="bold active" width="75%">PAYMENT DESCRIPTION</td>
                            <td class="bold active" width="20%">AMOUNT</td>
                       </tr>
                </table>

                        <table class="table table-bordered" width='100%'>

                            <?php if($amount=='1000') {
                                            echo '<tr class="bold"><td width="5%"> 1. </td>
                                            <td width="75%">NUESA FACULTY DUES</td>
                                            <td width="20%" class="text-center">&#8358;1000 </td></tr>'; }
                                            else {
                                              echo '<tr class="bold"><td width="5%"> 1. </td>
                                              <td width="75%">NUESA FACULTY DUES</td>
                                              <td width="20%" class="text-center">&#8358;1000 </td></tr>
                                              <tr class="bold">
                                              <td width="5%"> 2. </td>
                                              <td width="75%">FACULTY REGISTRATIONS</td>
                                              <td width="20%" class="text-center">&#8358;1000 </td></tr>';
                                            }?>

                        </table>


                        <table class="table table-bordered text-center" width='100%'>
                      <tr class="bold text-center">
                            <td width="30%" style="padding-top:15px;"> REFERENCE ID: </td>
                            <td width="50%" class="arial">
                                <?php echo $reference; ?></td>
                            <td width="20%" style="padding-top:15px;" class="uppercase">
                                <?php echo $paymentstatus;?></td>
                       </tr>

                </table>

                        <hr/>
                        <b>Total Amount (NGN):

                          <table class="table table-bordered text-center" width='100%'>
                        <tr>
                          <?php if($amount=='1000') { echo '
                         <td width="60%">One Thousand Naira Only</td>'; }
                         else {
                           echo '<td width="60%">Two Thousand Naira Only</td>';
                         }?>
                              <td width="20%" class="text-center">NGN </td>
                              <td width="20%" class="text-center"><?php echo $amount;?></td>
                         </tr>

                  </table>

                  </b>
                        <hr/>
                        <br/>
                <br>
                        <b style="font-family: dejavusans !important;">Authorized Stamp/Signatory &nbsp;
                                    _____________________<br/>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <i>For NUESA UNIUYO</b>

                    </div>
