<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maskapai_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function insert()
	{
		$data = array(
				'nama_maskapai'	=> $this->input->post('nama_maskapai'),
				'jumlah_armada'	=> $this->input->post('jumlah_armada'),
				'slogan'		=> $this->input->post('slogan'),
				'jumlah_seat'	=> $this->input->post('jumlah_seat'),
				'website'		=> $this->input->post('website')
				);
		$this->db->insert('maskapai', $data);

		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get_data_maskapai()
	{
		return $this->db->order_by('kd_maskapai','ASC')
						->get('maskapai')
						->result();
	}

	public function delete($kd_maskapai)
	{
		$this->db->where('kd_maskapai',$kd_maskapai)->delete('maskapai');
    	if($this->db->affected_rows()>0){
      		return TRUE;
    	}
    	else {
      		return FALSE;
    	}
	}

	public function get_data_maskapai_byid($kd_maskapai)
	{
		return $this->db->where('kd_maskapai',$kd_maskapai)
						->get('maskapai')
						->row();
	}

	public function update_maskapai($kd_maskapai)
	{
		$data = array(
				'nama_maskapai'		=> $this->input->post('nama_maskapai'),
				'jumlah_armada'		=> $this->input->post('jumlah_armada'),
				'slogan'			=> $this->input->post('slogan'),
				'jumlah_seat'		=> $this->input->post('jumlah_seat'),
				'website'			=> $this->input->post('website')
				);
		$this->db->where('kd_maskapai', $kd_maskapai)
			     ->update('maskapai', $data);

		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		} else {
			return FALSE;
		}
	}

	/*public function get_data_maskapai_byid($kd_maskapai)
	{
		return $this->db->where('kd_maskapai',$kd_maskapai)
						->get('maskapai')
						->row();
	}*/

	}


/* End of file maskapai_model.php */
/* Location: ./application/models/maskapai_model.php */