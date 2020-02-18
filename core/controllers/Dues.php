<?php
Class Dues Extends CI_Controller {

  public function index() {
    $this->load->view('head');
    $this->load->view('dues');
    $this->load->view('end');
  }
  public function get_amount() {
    if($this->input->post('payerLevel') == '100') {
      echo '2000';
    } else {
      echo '1000';
    }
  }
    
}
 ?>
