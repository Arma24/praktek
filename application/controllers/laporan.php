<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('laporan_model');
    	$this->load->library('form_validation','session');
	}

	public function laporan()
	{
		if($this->session->userdata('logged_in') == TRUE)
    	{
      		$data['jabatan'] = $this->session->userdata('jabatan');
      		$data['main_view'] = 'laporan_view';
      		$data['laporan'] = $this->laporan_model->detail();
      		$this->load->view('template',$data);
    	} else{
      		$this->load->view('login_view');
    	}
	}

  public function details()
  {
    if ($this->session->userdata('logged_in') == TRUE) {
      $kd_transaksi = $this->uri->segment(3);
      $data['laporan'] = $this->laporan_model->detail($kd_transaksi);
      $data['main_view'] = 'laporan_view';
      $this->load->view('template', $data);
    }else if ($this->session->userdata('logged_in') == TRUE) {
      redirect('laporan/laporan');
    }else {
      redirect('laporan/laporan');
    }
  }
}

/* End of file laporan.php */
/* Location: ./application/controllers/laporan.php */