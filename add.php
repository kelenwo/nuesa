<?php include('C:\wamp645\www\admin\head.php');?>

          <div class="col-xs-12 col-sm-9 content">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> Panel Title</h3>
              </div>
                            <div class="panel-body">
                                <div class="content-row">

 <div class="col-md-10 panel">
   <div class="panel-heading">
     <div class="panel-title"><b>Create Form</b>
     </div>

     <div class="panel-options">
       <a class="bg" data-target="#sample-modal-dialog-1" data-toggle="modal" href="#sample-modal"><i class="entypo-cog"></i></a>
       <a data-rel="collapse" href="#"><i class="entypo-down-open"></i></a>
       <a data-rel="close" href="#!/tasks" ui-sref="Tasks"><i class="entypo-cancel"></i></a>
     </div>
   </div>

   <div class="panel-body">
     <form validate="" role="form" id="exec" class="form-horizontal">
       <div class="form-group">
         <label class="col-md-2 control-label">Name</label>
         <div class="col-md-10">
           <input type="text" required="" placeholder="Name" id="name" class="form-control" name="name">
       </div> <label class="col-md-2 control-label">Department</label><div class="col-md-4">
           <select required="" class="form-control input-sm">
               <option value="">Department</option>
           </select>
       </div> <label class="col-md-2 control-label">Position</label><div class="col-md-4">
             <select class="form-control input-sm">
               <option value="">Position</option>
           </select>
         </div>
       </div>
       <div class="form-group">
         <label class="col-md-2 control-label">Avatar</label>
         <div class="col-md-10">
           <input type="file" required="" placeholder="Avatar" id="Avatar" class="form-control" name="image">
         </div>
       </div>
       <div class="form-group">
         <label class="col-md-2 control-label" for="description">Description</label>
         <div class="col-md-10">
           <textarea required="" class="form-control" placeholder="Description" rows="10" cols="30" id="description" name="description"></textarea>
         </div>
       </div>
       <div class="form-group">
         <div class="col-md-offset-2 col-md-10">
           <button class="btn btn-info" id="submit" type="submit">Submit</button>
         </div>
       </div>
     </form>
   </div>
 </div>

                                                </div><!-- panel body -->
            </div>
        </div><!-- content -->
      </div>
    </div>
    <!--footer-->
<script>
$(document).ready(function(){
    $('#submit').click(function(){
        $.ajax({
            url: 'executives.php',
            method: 'POST',
            data:$('#exec'),
            success:function(data){
                alert(data);
            }
        });
    });
});
</script>
  </body>
</html>
<?php include('C:\wamp645\www\admin\end.php');?>
