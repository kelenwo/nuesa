

          <div class="col-xs-12 col-sm-9 content">
            <div class="panel panel-default" id="rem">
              <div class="panel-heading">
                <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> Panel Title</h3>
              </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                      <form name="form" id="form">
                                          <div class="col-md-8 col-xs-8">
                                      <div class="form-group">
                                        <label for="name">Add Session</label>
                                        <div class="input-group" title="Session Name">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <input required type="text" name="session_name" class="form-control" placeholder="Session">
                                      </div></div></div>
                                <div class="col-md-4 col-xs-4">
                                <div class="form-group">
                        <br/>
                                <button style="margin-top:7px;" class="btn btn-primary" type="button" id="edit">Save Session
                                  <i class="fa fa-gear fa-spin" id="loading"></i>
                                </button> <span class="btn" id="preturn"></span>
                              </div>
                            </div>
                                 </form>
                                 <div id="freturn"></div>
                                 <div id="return"></div>
                                      </div>
                                </div>

                <div class="col-md-12">
                  <div class="panel" id="panel">
<div id="div1">
                    <table class="table table-hover">
                      <thead>
                        <tr class="active">
                          <th>#</th>
                          <th>Session</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                        <?php
$i = 0;
                        foreach ($session as $res): $i++;?>
                      <tbody>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $res['session_name']; ?></td>

                          <td></td>
                          <td></td>
                        </tr>
<?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              </div><!-- panel body -->
            </div>
        </div><!-- content -->
      </div>
    </div>
    <!--footer-->

  </body>
</html>
<script>

$(document).ready(function(){

  $('#loading').hide();
  $('#edit').trigger('click');
  $("#edit").click(function() {
  $('#loading').show();
  $.ajax({
  url: "<?php echo base_url()."admin/save_session";?>",
  type: "POST",
  data: $('#form').serialize(),
  success:function(data){
  $('#loading').hide();
  $("#return").html(data);
  var url = '<?php echo base_url()."admin/add_session";?>';
$('#panel').load(url + ' #div1');
  }
  });

  });
});
</script>
