

    <div  class="tag-line" >
         <div class="container">
           <div class="row  text-center" >

  <div class="col-lg-12    input-group col-sm-12">

        <h2 data-scroll-reveal="enter from the bottom after 0.0s" ><i class="fa fa-circle-o-notch"></i> WELCOME TO THE EDU-CENTER <i class="fa fa-circle-o-notch"></i> </h2>
 </div>
  </div>
       </div>

    </div>
    <!--HOME SECTION TAG LINE END-->
         <div id="features-sec" class="container set-pad" >
             <div class="row" id="content">

  <div class="row text-center">
    <div class="col-lg-12    input-group col-sm-12" data-scroll-reveal="enter from the side after -0.0s">
   <div class="about-div header-line">
 <h2>PAY FACULTY DUES</h2>
     <hr />

 <p >
    FRESHMEN: <span class="red"> <i class="fa bold fa-naira"></i>2000</span> <br>
    RETURNING STUDENTS: <span class="red"> <i class="fa fa-naira bold"></i>1000</span><br><br>
    <a href="#_" class="btn btn-lg btn-default"
    data-target="#modal_login" data-toggle="modal"
     style="background: #ddd;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <b>PAY DUES NOW &rarr;</b>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </a>
    </p>
   </div>
 </div>

    </div>

 <!-- Bootstrap Modal Login Popup Form // -->
 <div class="col-lg-12    input-group col-sm-12" data-scroll-reveal="enter from the top after -0.0s">
   <div class="about-div">

 <h3 >REPRINT E-RECIEPT/ INVOICE</h3>
     <hr />
     <div class="container">
       <div class="panel">
                               <ul id="myTab1" class="nav nav-tabs nav-justified">
                                 <li class="active"><a class="" href="#reprint_reciept" data-toggle="tab">Re-print Reciept/invoice</a></li>
                                 <li class=""><a href="#retrieve_rrr" data-toggle="tab">Retrieve Reference Id</a></li>
                               </ul>
                               <div id="myTabContent" class="tab-content">
                                 <div class="tab-pane fade active in " id="reprint_reciept">
                          <div class="col-sm-12">
                              <div class="form-group">
                                <form name="reprint_invoice" id="reprint_invoice">
                                 <label for="name"><h4>Reference ID: <?php if(isset($message)) { echo $message;}?></h4></label>
                                <div class="input-group">
                              <span class="input-group-addon">
                                  <i class="fa fa-pencil"></i>
                              </span>
                                <input type="text" name="reference" required="" class="form-control" id="rrr" placeholder="Reference ID">
                            </div>
                            <div id="err"></div>
                            <hr />

  <button type="button" id="reprint" class="btn btn-primary"> SUBMIT <i id="loader" class="fa fa-gear fa-spin">
                            </i></button>

                           <br></div>
                           </div>
                           <div id="msg">
                                </div>
                              </form>
                                </div>
                                 <div class="tab-pane fade" id="retrieve_rrr">
                             				<form name="retrieve_errr" id="retrieve_errr">
                            <div class="col-sm-12">
                            				<div class="form-group">
                                       <label for="name"><h4>Registration Number: <?php if(isset($message)) { echo $message;}?></h4></label>
                                      <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                      <input type="text" name="payerName" required=""   class="form-control" id="reg_no" placeholder="Registration Number">
                                  </div>
                                  <span id="err2"></span>
                                  <hr/>
    <button type="button" id="retrieve" class="btn btn-primary inline" >SUBMIT <i id="load" class="fa fa-gear fa-spin"></i></button>

                                </div>
                                </div>
                                <div id="msg2">
                                </div>

                             				</form>
                             			</div>
                                </div>
                               </div>
                             </div>

  		</div>

   </div>
 </div>
</div>


  </div>
  <div class="modal fade" id="modal_login" tabindex="-1" role="dialog">
 <div class="modal-dialog modal-dialog-centered" role="document">


        <?php if(!empty(validation_errors())) { ?><div class="alert alert-danger alert-dismissable">
     <button type="button" class="close" data-dismiss="alert"
     aria-hidden="true">
     &times;
     </button>
     Error ! <?php echo validation_errors(); ?>
    </div> <?php } ?>
         <div class="modal-content">
             <div class="modal-header">
    <h3 class="modal-title text-center">
     PAY DUES
</h3>
             </div>
             <div class="modal-body">
  <div class="container-fluid">
    <div class="row">
      <form name="dues" method="post" action="<?php echo base_url()."faculty/dues/pay_faculty_dues";?>" id="dues">
     <div class="form-group">
       <label for="name">Full name</label>
       <div class="input-group">
     <span class="input-group-addon">
         <i class="fa fa-user"></i>
     </span>
       <input type="text" name="payerFullname" required=""   class="form-control" id="name" placeholder="Full name">
   </div></div>
   <div class="form-group">
      <label for="name">Registration Number</label>
     <div class="input-group">
   <span class="input-group-addon">
       <i class="fa fa-pencil"></i>
   </span>
     <input type="text" id="payerName" name="payerName" required=""   class="form-control" id="reg" placeholder="Registration Number">
 </div></div>
   <div class="form-group">
       <label for="email">Email address</label>
       <div class="input-group">
     <span class="input-group-addon">
         <i class="fa fa-envelope"></i>
     </span>
       <input name="payerEmail" type="email" required=""   class="form-control" id="email" placeholder="Email Address">
   </div></div>
   <div class="form-group">
     <label for="mobile">Mobile Number</label>
     <div class="input-group">
   <span class="input-group-addon">
       <i class="fa fa-phone"></i>
   </span>
     <input type="text" name="payerPhone" required="" value="<?php echo set_value('mobile'); ?>" class="form-control" id="mobile" placeholder="Mobile Number">
 </div></div>
 <div class="form-group">
   <label class="control-label">Department <i id="loadingdept" class="fa fa-gear fa-spin"></i></label>
   <div class="input-group">
 <span class="input-group-addon">
     <i class="fa fa-th-list"></i>
 </span>
 <input disabled type="text"  required="" class="form-control" id="depts">
 <input type="hidden" name="department" required="" class="form-control" id="dept">
   </div></div>
   <div class="form-group">
     <label class="control-label">Level</label>
     <div class="input-group">
   <span class="input-group-addon">
       <i class="fa fa-signal"></i>
   </span>
         <select name="payerLevel"  class="form-control input-sm" id="level">
             <option >- Level -</option>
             <option value="100">100</option>
             <option value="200">200</option>
             <option value="300">300</option>
             <option value="400">400</option>
             <option value="500">500</option>
         </select>
     </div></div>
     <div class="form-group">
       <label class="control-label">Session</label>
       <div class="input-group">
     <span class="input-group-addon">
         <i class="fa fa-signal"></i>
     </span>
           <select name="session"  class="form-control input-sm" id="level">
               <option >- Session -</option>
              <?php foreach($session as $sess) { echo '<option value="'.$sess["session_name"].'">'.$sess["session_name"].'</option>';}?>
           </select>
       </div></div>
     <div class="form-group">
       <label for="mobile">Amount <i id="loadingamount" class="fa fa-gear fa-spin"></i></label>
       <div class="input-group">
     <span class="input-group-addon">
         <i class="fa fa-naira"></i>
     </span>
       <input disabled type="text"  required="" class="form-control" id="amounts">
       <input type="hidden" name="amount" required="" class="form-control" id="amount">
       <input type="hidden" name="transdate" value="<?php echo date('d-M-Y'); ?>">
       <input type="hidden" name="paymentstatus" value="unpiad">
   </div></div>
     <div class="form-group" id="check"></div>
   </div>
   </div>

             </div>
             <div class="modal-footer">
              <table class="" width="100%"><tr><td width="30%">
              </td><td width="70">
    <button type="button" id="cancel" class="btn btn-secondary" data-dismiss="modal" >CANCEL</button>
    <button type="button" id="paydues" class="btn btn-primary">SUBMIT <i id="loading" class="fa fa-gear fa-spin">
      </i></button>
  </td></tr></table>
             </div>

     </form>
 </div>
  </div>
             </div>

<?php
$link = base_url()."faculty/reprint_invoice";
$retrieval = base_url()."faculty/retrieve_reference";
$img = base_url()."theme/assets/img/loading.gif";
?>
<script>
$(document).ready(function() {
//Hide loading icons
  $('#load').hide();
  $('#loader').hide();
  $('#loading').hide();
  $('#response').hide();
  $('#loadingamount').hide();
    $('#loadingdept').hide();

//lOAD THE AMOUNT BASED ON LEVEL
var level = $('#level').val();
$('#level').on('change',function() {
  $('#loadingamount').show();
  $.ajax({
  url: "<?php echo base_url()."dues/get_amount";?>",
  data:$('#dues').serialize(),
  type: "POST",
  success:function(data){
    $('#loadingamount').hide();
    $("#amounts").attr('value',data);
    $("#amount").attr('value',data);
  }
  });
});

//Load Departments
$('#payerName').on('keyup',function() {
  $('#loadingdept').show();
  $.ajax({
  url: "<?php echo base_url()."dues/get_dept";?>",
  data:$('#dues').serialize(),
  type: "POST",
  success:function(data){
    $('#loadingdept').hide();
    if(data=="0") {
      $("#depts").attr('value','Invalid Department');
      $("#dept").attr('value','Invalid Department');
      $('#paydues').attr('disabled','disabled');
      $("dept").css("background-color", "pink");
    }
    else {
    $("#depts").attr('value',data);
    $("#dept").attr('value',data);
      $("#paydues").removeAttr('disabled');
  }
  }
  });
});
//End Load Departments

//Cancel button
  $('#cancel').click(function() {
  $('#dues')[0].reset();
  });

//Submit form
  $("#paydues").click(function() {
  $("#paydues").attr('disabled', 'disabled');
  $('#loading').show();
  $.ajax({
  url: "<?php echo base_url()."faculty/dues/payment_check";?>",
  data:$('#dues').serialize(),
  type: "POST",
  success:function(data){
    $("#paydues").removeAttr('disabled');
    $('#loading').hide();
    if(data!=="fail") {
    $("#dues").submit();
  }
    else if(data=="fail") {
    $("#check").html('You have Completed Payment for this Registration Number and Level');
  }
}
  });

});

//Reprint tab
$("#reprint").click(function() {
$('#loader').show();
$.ajax({
url: "<?php echo base_url()."faculty/dues/reprint_invoice";?>",
data:$('#reprint_invoice').serialize(),
type: "POST",
success:function(data){
$('#loader').hide();
$("#msg").html(data);
$("#err").html(data);
}
});

//Retrieve reference id tab
});
$("#retrieve").click(function() {
$('#load').show();
$.ajax({
url: "<?php echo base_url()."faculty/dues/retrieve_reference";?>",
data:$('#retrieve_errr').serialize(),
type: "POST",
success:function(data){
  $('#load').hide();
  $("#msg2").html(data);
  $("#err2").html(data);
}
});

//Print reciept button
});
$(document).on("click","#print-rrr",function(){
$("#invoice").submit();
});


});
</script>
