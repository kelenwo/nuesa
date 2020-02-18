<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>
        <?php echo $title;?>
    </title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="theme/assets/bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <!--  Flexslider Scripts -->
</head>

<br/>
<br/>
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

        .watermark {
            position: absolute;
            z-index: -99;
            min-height: 50%;
            min-width: 50%;
            color: lightgrey;
            font-size: 120px;
            transform: rotate(300deg);
            -webkit-transform: rotate(300deg);
        }

        #content {
            font-family: "Montserrat", sans-serif;
        }

    </style>

    <div id="watermark" style="margin-right: 0; width:98%;">

        <div class="row" style="margin-top:-7%;">
<table class="table">
  <tr>
    <td>
                        <table class="table">
                            <tr>
                                <td width="18%"><img style="margin-left:20px;" class="img-logo" src="theme/assets/img/nuesa-logo.png"></td>
                                <td width="60%">
                                    <h5 class="h6-ss rgbaa text-center" style="font-family: Bungee !important; font-size: 19px;"><b>NIGERIAN UNIVERSTIES ENGINEERING STUDENTS ASSOCIATION</b>
</h5>
                                    <h5 class="h6-ss rgbaa text-center" style=" font-size: 16px;"><span class="rgba">(NUESA UNIUYO)</span></h5></td>
                                <td width="18%"><img style="margin-right:10px;" class="img-logo" src="theme/assets/img/uniuyo-logo.png"></td>
                            </tr>

                        </table>
                      </div>
        </div>

                <table class="table table-bordered" width="100%" align="center">
                  <tr>
                        <td width="20%" class="bold"> Name</td>
                        <td width="40%"><b style="text-transform:capitalize;"><?php echo $payerFullname; ?></b></td>
                    </tr>
                    <tr>
                        <td width="5%" class="bold">Reg number </td>
                        <td width="5%"><b style="text-transform:uppercase;"><?php echo $payerName; ?> </b></td>
                    </tr>
                    <tr>
                        <td width="3%" class="bold">Department </td>
                        <td width="5%">
                            <?php echo $payerDepartment; ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="5%" class="bold">Phone Number </td>
                        <td width="5%">
                            <?php echo $payerPhone; ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="5%" class="bold">Email Address </td>
                        <td width="5%">
                            <?php echo $payerEmail; ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="5%" class="bold">LEVEL</td>
                        <td width="5%"><b><?php echo $payerLevel; ?> </b></td>
                    </tr>
                    <tr>
                        <td width="5%" class="bold">TRANS. DATE </td>
                        <td width="5%">
                            <?php echo $transdate; ?>
                        </td>
                    </tr>


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
        <br/>
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
        <b>Authorized Stamp/Signatory &nbsp;
                    _____________________<br/>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <i>For NUESA UNIUYO</b>

    </div>

<script>
    $(document).ready(function() {
        var text = 'Making the Web a Better Place Making the Web';
        var canvas = document.createElement("canvas");
        var fontSize = 24;
        canvas.setAttribute('height', fontSize);
        var context = canvas.getContext('2d');
        context.fillStyle = 'rgba(0,0,0,0.1)';
        context.font = fontSize + 'px sans-serif';
        context.fillText(text, 0, fontSize);

        $('#watermark').css({
            'background-image': "url(" + canvas.toDataURL("image/png") + ")"
        });

        $('#qrcode').qrcode({
            width: 64,
            height: 64,
            text: "size doesn't matter"
        });
    });
</script>
