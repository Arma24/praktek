<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function cek_login()
	{
		  $username = $this->input->post('username');
    	$password = md5($this->input->post('password'));
    	$query = $this->db->select('*')->where('username',$username)			  ->where('password',$password)->get('user');
    	if ($query -> num_rows()> 0) {
      	foreach($query->result() as $row){
       	$data = $row;
     	}

      	$data_session = array(
        	'nama' => $username,
        	'logged_in' => TRUE,
        	'jabatan' => $data -> jabatan
      	);

      	$this->session->set_userdata($data_session);

      	return TRUE;
    	}else {
      		return FALSE;
    	}
	}
	

}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */