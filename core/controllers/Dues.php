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
  public function get_dept() {

    $dat = explode('/',$this->input->post('payerName'));

    if($dat[2] == 'ae') {
      echo 'agric engineering';
    } elseif($dat[2] == 'ce') {
        echo 'chemical engineering';
      }
      elseif($dat[2] == 'co') {
          echo 'computer engineering';
        }
        elseif($dat[2] == 'cv') {
            echo 'civil engineering';
          }
          elseif($dat[2] == 'ee') {
              echo 'elect/elect engineering';
            }
          elseif($dat[2] == 'fe') {
              echo 'food engineering';
            }
            elseif($dat[2] == 'me') {
                echo 'mechanical engineering';
              }
              elseif($dat[2] == 'pe') {
                  echo 'petroleum engineering';
                }
                else {
                  echo '0';
                }
  }
}
 ?>
