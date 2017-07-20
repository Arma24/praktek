<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_model');
    	$this->load->library('form_validation','session');
	}

	public function transaksi()
	{
		if($this->session->userdata('logged_in') == TRUE)
    	{
      		$data['jabatan'] = $this->session->userdata('jabatan');
      		$data['main_view'] = 'transaksi_view';
      		$data['transaksi'] = $this->transaksi_model->get_data_transaksi();
      		$this->load->view('template',$data);
    	} else{
      		$this->load->view('login_view');
    	}
	}

	public function simpan()
	{
		      $this->form_validation->set_rules('kd_maskapai','Kode Maskapai', 'trim|required');
      		$this->form_validation->set_rules('seat','Seat', 'trim|required');
      		$this->form_validation->set_rules('kota_asal','Kota Asal', 'trim|required');
          $this->form_validation->set_rules('kota_tujuan','Kota Tujuan', 'trim|required');
          $this->form_validation->set_rules('tgl_berangkat','Tgl Berangkat', 'trim|required');
          $this->form_validation->set_rules('harga','Harga', 'trim|required');

      		if($this->form_validation->run() == TRUE)
      		{
        		if($this->transaksi_model->insert() == TRUE)
        		{
          	  $data['notif'] = 'Transaksi berhasil ';
              $data['main_view'] = 'transaksi_view';
              $data['transaksi'] = $this->transaksi_model->get_data_transaksi();
              $this->load->view('template',$data);
        		} else{
          	  $data['notif'] = 'Transaksi gagal';
              $data['main_view'] = 'transaksi_view';
              $data['transaksi'] = $this->transaksi_model->get_data_transaksi();
              $this->load->view('template',$data);
        		}
      		} else{
        	  $data['notif'] = validation_errors();
              $data['main_view'] = 'transaksi_view';
              $data['transaksi'] = $this->transaksi_model->get_data_transaksi();
              $this->load->view('template',$data);
      		}
	}

}

/* End of file transaksi.php */
/* Location: ./application/controllers/transaksi.php */