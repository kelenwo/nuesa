<div class="col-xs-12 col-sm-9 content">
  <div id='pan' class="panel panel-default">
<div class="panel-heading">
  <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>Slide Panel</h3>
</div>
   <div class="panel-body">
<div class="content-row">
   <div class="col-md-12 panel">
<div class="panel-heading">
<div class="panel-title"><b></b>
</div>

<div class="panel-options">
<a class="bg" data-target="#sample-modal-dialog-1" data-toggle="modal" href="#sample-modal"><i class="entypo-cog"></i></a>
<a data-rel="collapse" href="#"><i class="entypo-down-open"></i></a>
<a data-rel="close" href="#!/tasks" ui-sref="Tasks"><i class="entypo-cancel"></i></a>
</div>
</div>

<div class="">
  <div id="append" class="">
 <div class="tab-contents">
  <ul id="myTab1" class="nav nav-tabs nav-justified">
 <li class="active"><a class="" href="#tab1" data-toggle="tab">Print Payment Records</a></li>
  </ul>
  <div id="myTabContent" class="tab-content">
 <div class="tab-pane fade  active in" id="tab1">
<form id="sub">
  <div class="container-fluid">
      <div class="col-md-6 col-xs-6"> <div class="form-group">
   <label for="faculty_name">Level</label>
   <div class="input-group">
     <span class="input-group-addon">
     <i class="fa fa-user"></i>
     </span>
     <select name="level"  class="form-control input-sm" id="level">
         <option >- Level -</option>
         <option value="100">100</option>
         <option value="200">200</option>
         <option value="300">300</option>
         <option value="400">400</option>
         <option value="500">500</option>
     </select> </div></div></div>
  <div class="col-md-6 col-xs-6">
   <div class="form-group">
   <label for="faculty_name">Department</label>
   <div class="input-group">
     <span class="input-group-addon">
     <i class="fa fa-user"></i>
     </span>
     <select name="payerDepartment"  class="form-control input-sm">
         <option >- Department -</option>
         <option value="Agric Engineering">Agric Engineering</option>
         <option value="Chemical Engineering">Chemical Engineering</option>
         <option value="Civil Engineering">Civil Engineering</option>
         <option value="Computer Engineering">Computer Engineering</option>
         <option value="Elect/Elect Engineering">Elect/Elect Engineering</option>
         <option value="Food Engineering">Food Engineering</option>
         <option value="Mechanical Engineering">Mechanical Engineering</option>
         <option value="Petroleum Engineering">Petroleum Engineering</option>
     </select>
   </div></div></div>
     <div class="col-md-6 col-xs-6">
   <div class="form-group">
   <label for="faculty_name">Session</label>
   <div class="input-group">
     <span class="input-group-addon">
     <i class="fa fa-user"></i>
     </span>
     <select class="form-control" name="position">
       <?php foreach ($session_name as $sess ) {
      ?> <option value="<?php echo $sess['session_name'];?>"><?php echo $sess['session_name'];?></option>
    <?php }?>
            </select>
   </div></div></div>

   <div class="col-md-12 col-xs-12">
 <div class="form-group">
   <button class="btn btn-primary" name="save_personal" type="submit" id="submit">Submit
     <i class="fa fa-gear fa-spin" id="loading"></i>
   </button>
 </div></div>
     <div style="color:red;" class="form-group" id="msg"></div>
   </div>
   </div>

</form>
  </div>
  </div>
  </div><!-- panel body -->
 <!-- Student fees end -->
  </div>
</div>
 </div>
</div>

 </div>
 <div class="form-group" id="msg2"></div>
 </div>




<!-- Add Deparment -->

<!-- Add Deparment end -->


<script type="text/javascript">
    $(document).ready(function(){
$('#loading').hide();
$('#submit').click(function() {
  $('#loading').show();
});
        $('#sub').submit(function(e){
$('#loading').show();
            e.preventDefault();
                 $.ajax({
                     url:'<?php echo base_url();?>admin/save_executive',
                     type:"post",
                     data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                      success: function(data){
$('#loading').hide();
    $('#msg').html(data);
    $('#msg2').html(data);

    }
                 });
            });
         
 
    });
     
</script>
