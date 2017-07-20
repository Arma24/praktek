<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maskapai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('maskapai_model');
    $this->load->library('form_validation','session');
	}

	public function simpan()
	{
		if($this->input->post('submit'))
    	{
      		$this->form_validation->set_rules('nama_maskapai','Nama Maskapai', 'trim|required');
      		$this->form_validation->set_rules('jumlah_armada','Jumlah Armada', 'trim|required');
      		$this->form_validation->set_rules('slogan','Slogan', 'trim|required');
          $this->form_validation->set_rules('jumlah_seat','Jumlah Seat', 'trim|required');
          $this->form_validation->set_rules('website','Website', 'trim|required');

      		if($this->form_validation->run() == TRUE)
      		{
        		if($this->maskapai_model->insert() == TRUE)
        		{
          		$data['notif'] = 'Maskapai berhasil ditambahkan';
              $data['main_view'] = 'maskapai_view';
              $data['maskapai'] = $this->maskapai_model->get_data_maskapai();
              $this->load->view('template',$data);
        		} else{
          		$data['notif'] = 'Maskapai gagal ditambahkan';
              $data['main_view'] = 'maskapai_view';
              $data['maskapai'] = $this->maskapai_model->get_data_maskapai();
              $this->load->view('template',$data);
        		}
      		} else{
        		  $data['notif'] = validation_errors();
              $data['main_view'] = 'maskapai_view';
              $data['maskapai'] = $this->maskapai_model->get_data_maskapai();
              $this->load->view('template',$data);
      		}		

    	}
	}

  public function hapus_maskapai()
  {
    if ($this->session->userdata('logged_in')== TRUE) {
      $kd_maskapai = $this->uri->segment(3);

      if ($this->maskapai_model->delete($kd_maskapai)==TRUE) {
        $data['notif'] = 'Maskapai berhasil dihapus';
        $data['main_view'] = 'maskapai_view';
        $data['maskapai'] = $this->maskapai_model->get_data_maskapai();
        $this->load->view('template',$data);
      }
      else {
        $data['notif'] = 'Maskapai gagal dihapus';
        $data['main_view'] = 'maskapai_view';
        $data['maskapai'] = $this->maskapai_model->get_data_maskapai();
        $this->load->view('template',$data);
      }
    } else {
        $data['main_view'] = 'maskapai_view';
        $data['maskapai'] = $this->maskapai_model->get_data_maskapai();
        $this->load->view('template',$data);
    }
  }

  public function maskapai()
  {
    if($this->session->userdata('logged_in') == TRUE)
    {
      $data['jabatan'] = $this->session->userdata('jabatan');
      $data['main_view'] = 'maskapai_view';
      $data['maskapai'] = $this->maskapai_model->get_data_maskapai();
      $this->load->view('template',$data);
    } else{
      $this->load->view('login_view');
    }
  }

  public function detil_maskapai()
  {
    if($this->session->userdata('logged_in')==TRUE){
      $data['main_view'] = "detil_maskapai_view";
      $kd_maskapai=$this->uri->segment(3);

      $data['detil'] = $this->maskapai_model->get_data_maskapai_byid($kd_maskapai);

      $this->load->view('template', $data);   
    }
    else{
      redirect('maskapai/maskapai');
    }
  }

  public function edit_maskapai()
  {
    if($this->session->userdata('logged_in')==TRUE){
      $data['main_view'] = "edit_maskapai_view";
      $kd_maskapai=$this->uri->segment(3);

      $data['detil'] = $this->maskapai_model->get_data_maskapai_byid($kd_maskapai);

      $this->load->view('template', $data);   
    }
    else{
      redirect('admin');
    }
  }

  public function update()
  {
      if($this->session->userdata('logged_in') == TRUE){
      $kd_maskapai = $this->uri->segment(3);

      if($this->input->post('submit')){
        $this->form_validation->set_rules('nama_maskapai','Nama Maskapai', 'trim|required');
        $this->form_validation->set_rules('jumlah_armada','Jumlah Armada', 'trim|required');
        $this->form_validation->set_rules('slogan','Slogan', 'trim|required');
        $this->form_validation->set_rules('jumlah_seat','Jumlah Seat', 'trim|required');
        $this->form_validation->set_rules('website','Website', 'trim|required');

        if($this->form_validation->run() == TRUE) {
             
          if($this->maskapai_model->update_maskapai($this->uri->segment(3)) == TRUE){
            $data['notif'] = 'Edit berhasil';
            $data['detil'] = $this->maskapai_model->get_data_maskapai_byid($this->uri->segment(3));
            $data['main_view'] = 'detil_maskapai_view';
            $this->load->view('template', $data);
          } else {
            $data['notif'] = 'Edit gagal';
            $data['detil'] = $this->maskapai_model->get_data_maskapai_byid($this->uri->segment(3));
            $data['main_view'] = 'detil_maskapai_view';
            $this->load->view('template', $data);
          }
          
        } else {
          $data['notif'] = validation_errors();
          $data['detil'] = $this->maskapai_model->get_data_maskapai_byid($this->uri->segment(3));
          $data['main_view'] = 'detil_maskapai_view';
          $this->load->view('template',$data);
        }
      }
    }else{
      redirect('admin');
    }
  }

}

/* End of file maskapai.php */
/* Location: ./application/controllers/maskapai.php */