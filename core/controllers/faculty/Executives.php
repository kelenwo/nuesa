<?php
class Executives Extends CI_Controller {
  public function index() {
    $dat['title'] = 'NUESA UNIUYO- EXECUTIVES';
    $this->load->view('head',$dat);
    $this->load->view('executives');
    $this->load->view('end');
  }
  public function display() {
$i = 0;
    $get = $this->faculty_model->get_type();
    foreach ($get as $post) {
      $val = $post['type'];
      $req = $this->faculty_model->get_exec($val);
      if(!empty($req)) {
$i++;
    echo' <div id="course-sec" class="container set-pad">
           <div class="row text-center">
               <div class="col-lg-12 col-lg-offset-2 col-md-12 col-sm-12 col-md-offset-2 col-sm-offset-2">
                   <h1 data-scroll-reveal="enter from the bottom after 0.1s" class="header-line text-center uppercase">'.$post["type"].'</h1>
               </div>
           </div>
         </div>
         <div class="container">
           <div class="row text-center">
           <div class="col-lg-12  col-md-12 col-sm-12">';
        foreach($req as $res) {
          echo'<div class="col-md-4 col-sm-4 m-b15">
            <div class="spot">
              <div class="overlay">
              <img src="'.base_url().'uploads/'.$res["passport"].'.jpg">
              <div class="cap">
                 <h5 class="h6-s">'.$res["name"].'</h5>
                 <h5 class="white">'.$res["position"].'</h5>
               </div>
            </div>
          </div>
          </div>
';}
              echo '</div>
              </div>
          </div>
          </div>';
}
  }
      }
}
  ?>
