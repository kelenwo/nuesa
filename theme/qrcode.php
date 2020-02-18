
    <script src="<?php echo base_url(); ?>theme/assets/js/jquery-1.10.2.js"></script>
    <!--  Core Bootstrap Script -->
    <script src="<?php echo base_url(); ?>theme/assets/js/bootstrap.js"></script>
    <!--  Flexslider Scripts -->
         <script src="<?php echo base_url(); ?>theme/assets/js/qrcode.min.js"></script>

        <div class="icon-bx-wraper bx-style-1 p-tb15 p-lr10 center">
            <div class="m-b5" style="margin-left:10px;" id="qrcode">
          </div>


<script>


$(document).ready(function (){
  new QRCode(document.getElementById("qrcode"), "<?php echo $reference;?>");
  new QRCode(document.getElementById("qrcode"), {
    text: "hellooo",
    width: 150,
    height: 130,
    colorDark : "#000000",
    colorLight : "#ffffff",
    correctLevel : QRCode.CorrectLevel.H
});
});
  </script>
