<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function get_data_jadwal()
	{
		return $this->db->order_by('kd_jadwal','ASC')
						->get('jadwal')
						->result();
	}

	public function insert()
	{
		$data = array(
				'nama_maskapai'	=> $this->input->post('nama_maskapai'),
				'kota_asal'		=> $this->input->post('kota_asal'),
				'kota_tujuan'	=> $this->input->post('kota_tujuan'),
				'tgl_berangkat'	=> $this->input->post('tgl_berangkat')
				);
		$this->db->insert('jadwal', $data);

		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function delete($kd_jadwal)
	{
		$this->db->where('kd_jadwal',$kd_jadwal)->delete('jadwal');
    	if($this->db->affected_rows()>0){
      		return TRUE;
    	}
    	else {
      		return FALSE;
    	}
	}

	public function get_data_jadwal_byid($kd_jadwal)
	{
		return $this->db->where('kd_jadwal',$kd_jadwal)
						->get('jadwal')
						->row();
	}

	public function update_jadwal($kd_jadwal)
	{
		$data = array(
				'nama_maskapai'		=> $this->input->post('nama_maskapai'),
				'kota_asal'			=> $this->input->post('kota_asal'),
				'kota_tujuan'		=> $this->input->post('kota_tujuan'),
				'tgl_berangkat'		=> $this->input->post('tgl_berangkat')
				);
		$this->db->where('kd_jadwal', $kd_jadwal)
			     ->update('jadwal', $data);

		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		} else {
			return FALSE;
		}
	}

	}

/* End of file jadwal_model.php */
/* Location: ./application/models/jadwal_model.php */