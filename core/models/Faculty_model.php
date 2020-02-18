<?php

Class Faculty_model Extends CI_model {
  public function name_check() {
//Checks if email address already exists in database
      $this->db->select('name');
      $this->db->where('name', $this->input->post('name'));
      $query = $this->db->get('executives');
      if($query->num_rows() >=1 ) {
          return TRUE;
          //returns true if exists
      } else {
          return FALSE;
          //returns false if it doesnt exist
      }
  }


  public function get_type() {
    $query = $this->db->get('type');
    return $query->result_array();
  }

  public function get_exec($val) {
    $this->db->where('type',$val);
    $query = $this->db->get('executives');
    return $query->result_array();
  }
  public function retrieve_reference() {
    $this->db->where('payerName',$this->input->post('payerName'));
    $query = $this->db->get('payments');
    if($query->num_rows() >=1 ) {
        return $query->result_array();
        //returns true if exists
    } else {
        return FALSE;
        //returns false if it doesnt exist

  }
}
public function reprint_reference() {
  $this->db->where('reference',$this->input->post('reference'));
  $query = $this->db->get('payments');
  if($query->num_rows() >=1 ) {
      return $query->row();
      //returns true if exists
  } else {
      return FALSE;
      //returns false if it doesnt exist

}
}
public function get_reference($reference) {
  $this->db->where('reference',$reference);
  $query = $this->db->get('payments');
  return $query->row();
}
  public function payment_check() {
    $data = array(
'payerName' =>  $this->input->post('payerName'),
'session' =>  $this->input->post('session'),
);
$this->db->select('*');
$this->db->where($data);
$query = $this->db->get('payments');
if($query->num_rows() >=1 ) {
    return $query->row();
    //returns true if exists
} else {
    return FALSE;
    //returns false if it doesnt exist
}
  }
  public function update_payment($data,$reference) {
  $this->db->set($data);
  $this->db->where('reference',$reference);
  $query = $this->db->update('payments', $data);

    if($query) {
  return TRUE;
  } else {
  return FALSE;
  }
}
  public function reg_payment($reference,$date) {
  $data = array(
  'payerName' =>  $this->input->post('payerName'),
  'payerDepartment' =>  $this->input->post('payerDepartment'),
  'payerFullname' =>  $this->input->post('payerFullname'),
  'payerEmail' =>  $this->input->post('payerEmail'),
  'payerLevel' =>   $this->input->post('payerLevel'),
  'amount' =>  $this->input->post('amount'),
  'reference' =>   $reference,
  'session' => $this->input->post('session'),
  'paymentstatus' =>   'unpaid',
  'transdate' => $date,
  );
  $query = $this->db->insert('payments', $data);

    if($query) {
  return TRUE;
  } else {
  return FALSE;
  }
}
  public function reference_check() {
    $this->db->select('reference');
    $this->db->where('reference', $this->input->post('reference'));
    $query = $this->db->get('payments');
    if($query->num_rows() >=1 ) {
        return TRUE;
        //returns true if exists
    } else {
        return FALSE;
        //returns false if it doesnt exist
    }
  }
}
 ?>
