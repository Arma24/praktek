<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function get_data_laporan()
	{
		return $this->db->order_by('kd_transaksi','ASC')
						->get('laporan')
						->result();
	}

	public function delete($kd_transaksi)
	{
		$this->db->where('kd_transaksi',$kd_transaksi)->delete('laporan');
    	if($this->db->affected_rows()>0){
      		return TRUE;
    	}
    	else {
      		return FALSE;
    	}
	}

	public function detail()
	{
		$this->db->select('transaksi.kd_transaksi,maskapai.kd_maskapai,maskapai.nama_maskapai,maskapai.jumlah_seat,jadwal.kota_asal,jadwal.kota_tujuan,jadwal.tgl_berangkat,transaksi.seat,transaksi.harga');
		$this->db->from('transaksi');
		$this->db->join('maskapai', 'maskapai.kd_maskapai = transaksi.kd_maskapai');
		$this->db->join('jadwal', 'jadwal.tgl_berangkat = transaksi.tgl_berangkat');/*
		$this->db->where('transaksi.kd_transaksi',$no);*/
          $query = $this->db->get()->result();
          return $query;
	}

}

/* End of file laporan_model.php */
/* Location: ./application/models/laporan_model.php */