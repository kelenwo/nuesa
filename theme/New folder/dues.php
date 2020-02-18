<?php include('head.php'); ?>

    <div  class="tag-line" >
         <div class="container">
           <div class="row  text-center" >

               <div class="col-lg-12  col-md-12 col-sm-12">

        <h2 data-scroll-reveal="enter from the bottom after 0.0s" ><i class="fa fa-circle-o-notch"></i> WELCOME TO THE EDU-CENTER <i class="fa fa-circle-o-notch"></i> </h2>
                   </div>
               </div>
             </div>

    </div>
    <!--HOME SECTION TAG LINE END-->
         <div id="features-sec" class="container set-pad" >
             <div class="row" >

             <div class="row text-center">




                 <div class="col-lg-12  col-md-12 col-sm-12" data-scroll-reveal="enter from the side after -0.0s">
                     <div class="about-div header-line">
                   <h3 >PAY FACULTY DUES</h3>
                       <hr />

                   <p >
                      FRESHMEN: <span class="red">#1000</span><br>
                      RETURNING STUDENTS: <span class="red">#600</span><br>
                      <div id="append">
                      </div>

                      <button class="btn btn-primary btn-lg btn-success" id="pay">PAY DUES NOW</button>
                  </p>
                </div>
                   </div>
                   <div class="col-lg-12  col-md-12 col-sm-12" data-scroll-reveal="enter from the top after -0.0s">
                     <div class="about-div">

                   <h3 >REPRINT E-RECIEPT/ INVOICE</h3>
                       <hr />
                       <div class="container">

               			<div class="form-group">
               				<form name="add_team" id="add_team">
               					<div class="table-responsive col-lg-12 col-lg-offset-3 ">
               						<table class="table uppercase" id="dynamic_field">
               							<tr>
               								<td>

               									<input type="text" name="rrr" placeholder="Remita Retrieval Reference" class="form-control form-group- name_list" /></td>
               								<td><button type="button" name="submit" class="btn btn-default" id="submit">submit</button></td>
               							</tr>

                                    </table>

               					</div>
               				</form>
               			</div>
               		</div>

                </div>
                   </div>






</div>


               </div>
             </div>

<script>
$(document).ready(function (){

	$('#submit').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td width="10%"><select name="country" class="form-control"></select></td><td width="50%"><select name="home[]" id="home'+i+'" class="form-control"><option value="">HOME TEAM</option></select> <span class="btn btn-danger">VS</span>  <select name="away[]" id="away'+i+'" class="form-control"><option value="">AWAY TEAM</option></select></td><td width="3%"><input type="date" class="form-control"></td> <td width="3%"><input type="time" class="form-control"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	});
});
</script>
     <?php include('end.php'); ?>
