<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function insert()
	{
		$data = array(
				'username'	=> $this->input->post('username'),
				'password'	=> md5($this->input->post('password')),
				'jabatan'	=> $this->input->post('jabatan')
				);
		$this->db->insert('user', $data);

		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get_data_user()
	{
		return $this->db->order_by('id_user','ASC')
						->get('user')
						->result();
	}

	public function delete($id_user)
	{
		$this->db->where('id_user',$id_user)->delete('user');
    	if($this->db->affected_rows()>0){
      		return TRUE;
    	}
    	else {
      		return FALSE;
    	}
	}

	public function get_data_user_byid($id_user)
	{
		return $this->db->where('id_user',$id_user)
						->get('user')
						->row();
	}

	public function update_user($id_user)
	{
		$data = array(
				'username'		=> $this->input->post('username'),
				'password'		=> md5($this->input->post('password')),
				'jabatan'		=> $this->input->post('jabatan')
				);
		$this->db->where('id_user', $id_user)
			     ->update('user', $data);

		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		} else {
			return FALSE;
		}
	}

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */