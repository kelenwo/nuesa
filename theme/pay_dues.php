
  <div class="clear"></div>
<div class="container set-pad">
    <div id="features-sec" class="container set-pad" >
        <div class="row ">

                  <div class="panel-body">
                      <div class="content-row">
                        <div class="about-div header-line text-center">
                      <h3 >PAY FACULTY DUES</h3>
                          <hr /></div><div class="hr-div">
                          <div class="col-sm-1"> </div>
                          <div class="col-sm-10 form-group">
                          <table class="table table-bordered tbb" align="center" width='100%'>
                            <tr>
                            <td width="30%">Name:</td>
                            <td width="70%"><?php echo $payerFullname; ?> </td>
                          </tr>
                          <tr>
                            <td width="30%"> Registration Number: </td>
                            <td width="70%"><?php echo $payerName; ?> </td>
                          </tr>
                           <tr>
                            <td width="30%">Email Address:</td>
                            <td width="70%"><?php echo $payerEmail; ?> </td>
                          </tr>
                          <tr>
                            <td width="30%"> Mobile Number: </td>
                            <td width="70%"><?php echo $payerPhone; ?> </td>
                          </tr>
                          <tr>
                            <td width="30%">Department:</td>
                            <td width="70%"><?php echo $payerDepartment; ?> </td>
                          </tr>
                          <tr>
                            <td width="30%"> Level: </td>
                            <td width="70%"><?php echo $payerLevel; ?> </td>
                          </tr>
                          <tr>
                          <td width="30%">Amount:</td>
                          <td width="70%"><i class="fa fa-naira"></i><?php echo $amount; ?> </td>
                        </tr>
                        <tr>
                          <td width="30%">Payment For: </td>
                          <td width="70%"><b><?php echo $session; ?></b> Faculty Dues </td>
                        </tr>

                        </table>
                        <form method="post" target="_blank"  action="" name="form" id="form">
                        <input type="hidden" name="payerName" value="<?php echo $payerName; ?>">
                        <input type="hidden" name="payerEmail" value="<?php echo $payerEmail; ?>">
                        <input type="hidden" name="payerPhone" value="<?php echo $payerPhone; ?>">
                        <input type="hidden" name="payerFullname" value="<?php echo $payerFullname; ?>">
                        <input type="hidden" name="payerLevel" value="<?php echo $payerLevel; ?>">
                        <input type="hidden" name="payerDepartment" value="<?php echo $payerDepartment; ?>">
                        <input type="hidden" name="amount" value="<?php echo $amount; ?>">
                        <input type="hidden" name="session" value="<?php echo $session; ?>">
                        <input type="hidden" name="transdate" value="<?php echo $transdate; ?>">
                    
                        <input type="hidden" name="reference" value="" id="gen_rrr">
                        </form>
                    <hr />
                      <button type="button" id="paynow" class="btn inline btn-primary">PAY NOW <i id="loading" class="fa fa-gear fa-spin"></i></button></span></div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <h4 id="responserrr" class="inline"></h4>
                  </div></div></div>
<table id="response" class="table table-bordered" width="100%"><tr>
  <td style="padding-left:16%;" width="40%"><br>
<button type="button" id="payonline" class="btn btn-prim">PAY ONLINE</button>
  </td>
<td width="60%"><h3 class="inline"><i> Reference ID: </i></h3> &nbsp;&nbsp;&nbsp; <h3 class="inline" style="color:rgba(23,48,71,1);"><b id="rrrn"></b></h3> &nbsp;&nbsp;
| <h2 class="inline"><a class="inline lin" style="font-size:30px;" id="print_invoice"><i class="fa fa-print"></i></a></h2> </td>
</tr>
</table>
                </div>

                               </div>
                             </div>



<script>

$(document).ready(function (){
$('#response').hide();
$('#loading').hide();
$('#print_invoice').click(function() {
$('#form').attr('action','<?php echo base_url()."faculty/dues/invoice";?>')
$('#form').submit();
});
$('#paynow').click(function(){
$("#paynow").attr('disabled', 'disabled');
$('#loading').show();
//$("#dues").submit();
$.ajax({
url: "<?php echo base_url()."faculty/dues/generate_reference";?>",
data:$('#form').serialize(),
type: "POST",
success:function(data){
$('#paynow').removeAttr('disabled');
$('#loading').hide();
if(data =="fail") {
$('#responserrr').html("Error Generating Reference ID");
}
else if (data!=="fail") {
$('#response').show();
$('#responserrr').hide();
$('#gen_rrr').attr('value',data);
$('#rrrn').html(data);
}
}
});

});
$('#payonline').click(function() {
$('#form').attr('action','<?php echo base_url()."faculty/dues/pay_online";?>')
$('#form').submit();
});
  });
  </script>
