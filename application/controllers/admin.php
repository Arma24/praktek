<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');

    $this->load->library(array('form_validation','session'));
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')== TRUE) {
      redirect(base_url('index.php/admin/dashboard'));
    }
    else{
      $this->load->view('login_view');
    }
	}

	
	public function do_login()
	{
		if ($this->input->post('submit')) {
          #_______________  ________  _____  _____   ______________
          # $this->form_validation->set_rules('nama','Nama','trim|required');
      $this->form_validation->set_rules('username','Username','trim|required');
      $this->form_validation->set_rules('password','Password','trim|required');

      if ($this->form_validation->run() == TRUE) {

        if ($this->admin_model->cek_login() == TRUE) {
          redirect(base_url('index.php/admin/index'));
        }
        else {
          $data['notif'] = 'Username atau password salah';
          $this->load->view('login_view',$data);
        }
      }
      else {
        $data['notif'] = validation_errors();
        $this->load->view('login_view',$data);
      }

    }
	}

  public function dashboard()
  {
    if ($this->session->userdata('logged_in')== TRUE) {
    $data ['jabatan'] = $this->session->userdata('jabatan');
    $data['main_view'] = 'transaksi_view';
    $this->load->view('template',$data);
    } else {
    $this->load->view('login_view');
    }
  }

  public function logout()
  {
    $data_session = array (
    'username' => '',
    'jabatan' => '',
    'status' => FALSE
    );
    $this->session->sess_destroy();
    redirect(base_url('index.php/admin'));
  }

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */