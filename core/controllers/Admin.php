<?php
class Admin extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
//$this->db->db_select('settings');
  }
        public function index()
        {

$data['title'] = "Admin Panel";
$this->parser->parse('admin/head',$data);
  $this->load->view('admin/index',$data);
        }
//
public function add_executives() {
//select student bio from db based on logged in registration number
//$req = get_object_vars($this->admin_model->get_student_info());
//$data = $req;
//
$get = $this->faculty_model->get_type();
$req = $this->user_model->get_position();
$res['position'] = $req;
$res['get'] = $get;
$data['title'] = "Eportals - Add Executive";
$this->parser->parse('admin/head',$data);
  $this->parser->parse('admin/add_executives',$res);
}

//
public function get_contestant() {
//select student bio from db based on logged in registration number
/*$res = $this->admin_model->get_student_info();
if($res==false) {
  echo 'false';
} else{
$data = get_object_vars($res);
$data['title'] = "Eportals - Update Biodata";
$data['loading'] = '<img heigth="15" width="15" src="'.base_url().'theme/assets/img/loading.gif" />';
*/
  $this->parser->parse('admin/get_biodata');

}
  public function save_executive(){
//upload executives passport

  $id = $this->user_model->get_id();
  $usid = $id + 1;
  if($usid < 10) {
    $uid = '00'.$usid;
  } elseif($usid > 9) {
    $uid = '0'.$usid;
  }
$config['allowed_types']        = 'gif|jpg|png|jpeg';
$config['max_size']             = 1000;
$config['max_width']            = 1024;
$config['max_height']           = 768;
$config['file_name']          =  $uid.'.jpg';
$config['upload_path']          = './uploads/';
$this->upload->initialize($config);
        if($this->upload->do_upload("userfile")){
            $image= $this->upload->data('file_name');
            $data = array(
'name' => $this->input->post('name'),
'position' => $this->input->post('position'),
'type' => $this->input->post('type'),
'passport' => $image,
'id' => $uid,
            );
            $result= $this->user_model->save_executive($data);
      if($result==true) {

echo "<script>
$('#pan').hide();
$('#msg2').show();
  </script>";
  $this->load->view('admin/success',$data);
} else {
  echo "<script>
  $('#msg2').hide();
  $('#msg').html('An error occurred');
    </script>";
}
        } else {
          $msg = $this->upload->display_errors();
          echo "<script>
          $('#msg2').hide();
          $('#msg').html('.$msg.');
            </script>";
		}
  }

public function update_executive() {

    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['max_size']             = 1000;
    $config['max_width']            = 1024;
    $config['max_height']           = 768;
    $config['file_name']          =  $this->input->post('passport');
    $config['upload_path']          = './uploads/';
    $this->upload->initialize($config);
          if($this->upload->do_upload("userfile")){
            $data = array(
'name' => $this->input->post('name'),
'position' => $this->input->post('position'),
'passport' => $this->input->post('passport'),
'type' => $this->input->post('type'),
'id' => $this->input->post('id')
            );
$result= $this->user_model->update_executive($data);
        if($result==true) {

    echo '<script>
    $("#return").html("Executive data successfully updated");
    </script>';
    } else {
  echo 'An error occured';
    }
  } else {
    echo $this->upload->display_errors();
  }
}

  public function edit_executive() {
$data['title'] = "Admin Panel - Settings";
$this->parser->parse('admin/head',$data);
$this->parser->parse('admin/edit_executive',$data);
  }


    public function add_session() {
  $data['session'] = $this->user_model->get_session();
  $data['title'] = "Admin Panel - Settings";
  $this->parser->parse('admin/head',$data);
  $this->parser->parse('admin/session',$data);
    }
  public function add_voters() {
  //  var_dump(base_url().'vendor/php-excel-reader/excel_reader2.php');
$data['title'] = "Admin Panel - Add Voters";
$this->parser->parse('admin/head',$data);
$this->parser->parse('admin/add_voter',$data);
  }

  public function get_biodata() {
//select student bio from db based on logged in registration number
$res = $this->user_model->get_biodata();
if($res==false) {
  echo 'The user id do not exist';
} else{
$data = get_object_vars($res);
  $this->parser->parse('admin/get_biodata',$data);
}
}

      public function settings() {
$data['title'] = "Admin Panel - Settings";
$res = $this->user_model->get_amount();
if($res==false){
  $data['freshers'] = '';
  $data['returning'] = '';
} else{
$data['freshers'] = $res->freshers;
$data['returning'] = $res->returning;
}
$this->parser->parse('admin/head',$data);
$this->parser->parse('admin/settings',$data);
      }


      public function save_session() {
$save = $this->user_model->save_session();
if($save==TRUE) {
  echo "<h4 class='green'>Session saved</h4>";
} else { echo 'failed, please retry';}
      }
      public function save_settings() {
//
$save = $this->user_model->save_settings();
if($save==TRUE) {
      echo '<h4 class="green">saved</h4>';
} else { echo 'failed, please retry';}
      }

public function print_records() {

$req = $this->user_model->get_session();
$res['session_name'] = $req;
$data['title'] = "Eportals - Print Records";
$this->parser->parse('admin/head',$data);
  $this->parser->parse('admin/print_records',$res);
}
}
