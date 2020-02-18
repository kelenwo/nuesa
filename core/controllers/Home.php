<?php
class Home extends CI_Controller {

        public function index()
        {

$this->load->helper('url');
             $data['title'] = "Pay Faculty Dues";
                // $this->load->view('head', $data);
                      $this->load->view('head', $data);
                      $this->load->view('index');
                      $this->load->view('end');
        }
        public function about()
        {
             $data['title'] = "NUESA UNIUYO - ABOUT";
                // $this->load->view('head', $data);
                      $this->load->view('head', $data);
                      $this->load->view('about');
                      $this->load->view('end');
        }
      }
