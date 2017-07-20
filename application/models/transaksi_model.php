<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function get_data_transaksi()
	{
		return $this->db->order_by('kd_transaksi','ASC')
						->get('transaksi')
						->result();
	}

	public function insert()
	{
		$data = array(
				'kd_maskapai'	=> $this->input->post('kd_maskapai'),
				'seat'			=> $this->input->post('seat'),
				'kota_asal'		=> $this->input->post('kota_asal'),
				'kota_tujuan'	=> $this->input->post('kota_tujuan'),
				'tgl_berangkat'	=> $this->input->post('tgl_berangkat'),
				'harga'		=> $this->input->post('harga'),
				);
		$this->db->insert('transaksi', $data);

		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		} else {
			return FALSE;
		}
	}
}

/* End of file transaksi_model.php */
/* Location: ./application/models/transaksi_model.php */