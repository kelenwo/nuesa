<?php
include('head.php');
?>

   <!-- FEATURES SECTION END-->
    <div id="faculty-sec" >
    <div class="container set-pad">
             <div class="row text-center">
                 <div class="col-lg-8 col-lg-offset-2 col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                     <h1 data-scroll-reveal="enter from the bottom after 0.1s" class="header-line">FACULTY EXECUTIVES</h1>

                 </div>

             </div>
             <!--/.HEADER LINE END-->

           <div class="row" >

<?php foreach ($exec as $res): ?>
                 <div class="col-lg-4 col-md-4 col-sm-4" data-scroll-reveal="enter from the bottom after 0.2s">
                     <div class="faculty-div">
                     <img src="assets/img/faculty/1.jpg"  class="img-rounded" />
                   <h3 ><?php echo $res['name']; ?> </h3>
                 <hr />
                         <h4><?php echo $res['position']; ?><br /> Department</h4>
                   <p >
                      <?php echo $res['about']; ?>

                   </p>
                </div>
                   </div>
                 <?php endforeach; ?>

               </div>
             </div>

    <!-- FACULTY SECTION END-->
    <!-- FEATURES SECTION END-->
     <div class="container set-pad"><hr/>
              <div class="row text-center">
                  <div class="col-lg-8 col-lg-offset-2 col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                      <h1 data-scroll-reveal="enter from the bottom after 0.1s" class="header-line">ADMINISTRATIVE EXECUTIVES</h1>

                  </div>

              </div>
              <!--/.HEADER LINE END-->

            <div class="row" >


                  <div class="col-lg-4  col-md-4 col-sm-4" data-scroll-reveal="enter from the bottom after 0.2s">
                      <div class="faculty-div">
                      <img src="assets/img/faculty/1.jpg"  class="img-rounded" />
                    <h3 >ROXI CHI LUENA </h3>
                  <hr />
                          <h4>Desigining <br /> Department</h4>
                    <p >
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                         Aenean commodo .

                    </p>
                 </div>
                    </div>
                  <div class="col-lg-4  col-md-4 col-sm-4" data-scroll-reveal="enter from the bottom after 0.2s">
                      <div class="faculty-div">
                      <img src="assets/img/faculty/2.jpg"  class="img-rounded" />
                    <h3 >JANE DEO ALEX</h3>
                  <hr />
                          <h4>Enginering <br /> Department</h4>
                    <p >
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                         Aenean commodo .

                    </p>
                 </div>
                    </div>
                <div class="col-lg-4  col-md-4 col-sm-4" data-scroll-reveal="enter from the bottom after 0.2s">
                      <div class="faculty-div">
                      <img src="assets/img/faculty/3.jpg" class="img-rounded" />
                    <h3 >RUBY DECORSA</h3>
                  <hr />
                          <h4>Management <br /> Department</h4>
                    <p >
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                         Aenean commodo .

                    </p>
                 </div>
                    </div>

                </div>
              </div>
         </div>
     <!-- FACULTY SECTION END-->
