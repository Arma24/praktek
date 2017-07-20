<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('jadwal_model');
		$this->load->library('form_validation','session');
	}

	public function jadwal()
	{
		if($this->session->userdata('logged_in') == TRUE)
    	{
      		$data['jabatan'] = $this->session->userdata('jabatan');
      		$data['main_view'] = 'jadwal_view';
      		$data['jadwal'] = $this->jadwal_model->get_data_jadwal();
      		$this->load->view('template',$data);
    		} else{
      			$this->load->view('login_view');
    		}
	}

	public function simpan()
	{
		if($this->input->post('submit'))
    	{
    		$this->form_validation->set_rules('nama_maskapai','Nama Maskapai', 'trim|required');
      		$this->form_validation->set_rules('kota_asal','Kota Asal', 'trim|required');
      		$this->form_validation->set_rules('kota_tujuan','Kota Tujuan', 'trim|required');
      		$this->form_validation->set_rules('tgl_berangkat','Tgl Berangkat', 'trim|required');

      		if($this->form_validation->run() == TRUE)
      		{
        		if($this->jadwal_model->insert() == TRUE)
        		{
          			$data['notif'] = 'Jadwal Penerbangan berhasil ditambahkan';
          			$data['main_view'] = 'jadwal_view';
          			$data['jadwal'] = $this->jadwal_model->get_data_jadwal();
          			$this->load->view('template',$data);

        		} else{
          			$data['notif'] = 'Jawal Penerbangan gagal ditambahkan';
          			$data['main_view'] = 'jadwal_view';
          			$data['jadwal'] = $this->jadwal_model->get_data_jadwal();
          			$this->load->view('template',$data);
        		}
      		} else{
        		$data['notif'] = validation_errors();
        		$data['main_view'] = 'jadwal_view';
        		$data['jadwal'] = $this->jadwal_model->get_data_jadwal();
        		$this->load->view('template',$data);
      		}

    	}
	}

	public function hapus_jadwal()
	{
	  if ($this->session->userdata('logged_in')== TRUE) {
      $kd_jadwal = $this->uri->segment(3);

      if ($this->jadwal_model->delete($kd_jadwal)==TRUE) {
        $data['notif'] = 'Jadwal Penerbangan berhasil dihapus';
        $data['main_view'] = 'jadwal_view';
        $data['jadwal'] = $this->jadwal_model->get_data_jadwal();
        $this->load->view('template',$data);
      }
      else {
        $data['notif'] = 'Jadwal Penerbangan gagal dihapus';
        $data['main_view'] = 'jadwal_view';
        $data['jadwal'] = $this->jadwal_model->get_data_jadwal();
        $this->load->view('template',$data);
      }
    } else {
        $data['main_view'] = 'jadwal_view';
        $data['jadwal'] = $this->jadwal_model->get_data_jadwal();
        $this->load->view('template',$data);
    }
	}

	public function detil_jadwal()
	{
	  if($this->session->userdata('logged_in')==TRUE){
      $data['main_view'] = "detil_jadwal_view";
      $kd_jadwal=$this->uri->segment(3);

      $data['detil'] = $this->jadwal_model->get_data_jadwal_byid($kd_jadwal);

      $this->load->view('template', $data);   
    }
    else{
      redirect('jadwal/jadwal');
   	}
  	}

  	public function edit_jadwal()
  	{
  		if($this->session->userdata('logged_in')==TRUE){
      	$data['main_view'] = "edit_jadwal_view";
      	$kd_jadwal=$this->uri->segment(3);

      	$data['detil'] = $this->jadwal_model->get_data_jadwal_byid($kd_jadwal);

      	$this->load->view('template', $data);   
    	}
    	else{
      		redirect('admin');
    	}
  	}

  	public function update()
  	{
  	  if($this->session->userdata('logged_in') == TRUE){
      $kd_jadwal = $this->uri->segment(3);

      if($this->input->post('submit')){
      	$this->form_validation->set_rules('nama_maskapai','Nama Maskapai', 'trim|required');
        $this->form_validation->set_rules('kota_asal','Kota Asal', 'trim|required');
        $this->form_validation->set_rules('kota_tujuan','Kota Tujuan', 'trim|required');
        $this->form_validation->set_rules('tgl_berangkat','Tgl Berangkat', 'trim|required');

        if($this->form_validation->run() == TRUE) {
             
          if($this->jadwal_model->update_jadwal($this->uri->segment(3)) == TRUE){
            $data['notif'] = 'Edit berhasil';
            $data['detil'] = $this->jadwal_model->get_data_jadwal_byid($this->uri->segment(3));
            $data['main_view'] = 'detil_jadwal_view';
            $this->load->view('template', $data);
          } else {
            $data['notif'] = 'Edit gagal';
            $data['detil'] = $this->jadwal_model->get_data_jadwal_byid($this->uri->segment(3));
            $data['main_view'] = 'detil_jadwal_view';
            $this->load->view('template', $data);
          }
          
        } else {
          $data['notif'] = validation_errors();
          $data['detil'] = $this->jadwal_model->get_data_jadwal_byid($this->uri->segment(3));
          $data['main_view'] = 'detil_jadwal_view';
          $this->load->view('template',$data);
        }
      }
   		}else{
      		redirect('admin');
    	}
  	}

	}


/* End of file jadwal.php */
/* Location: ./application/controllers/jadwal.php */