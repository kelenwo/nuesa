<?php
    Class Post_model Extends CI_model {
        public function title_check() {
    //Checks if email address already exists in database
            $this->db->select('title');
            $this->db->where('title', $this->input->post('title'));
            $query = $this->db->get('posts');
            if($query->num_rows() >=1 ) {
                return TRUE;
                //returns true if exists
            } else {
                return FALSE;
                //returns false if it doesnt exist
            }
        }

    public function new_post() {
        $this->db->select('posts');
        $this->db->from('admin');
        $this->db->where('name', $this->session->user_name);
        $get = $this->db->get();
        $res = $get->row();
        $posts = $res->posts + 1;
		$data = array(
			'title' =>  $this->input->post('title'),
			'category' =>  $this->input->post('category'),
			'content' =>  $this->input->post('content'),
			'author' =>  $this->session->user_name,
			'date' =>  date("d/m/Y"),
			'time' =>  date("h:m A"),

			);
		$query = $this->db->insert('posts', $data);
	if($query) {
        $data = array(
            'posts' =>  $posts,
        );
        $this->db->where('name', $this->session->user_name);
        $update = $this->db->update('admin', $data);
        if($update) {
		return TRUE;
	} else {
		return FALSE;
	}
}
    }
    public function req_post() {
        //$this->db->select('*');
        //$this->db->from('posts');
        $query = $this->db->get('posts');
        return $query->result_array();
    }
}
