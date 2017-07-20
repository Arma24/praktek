<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->library('form_validation','session');
	}

	public function simpan()
	{
		if($this->input->post('submit'))
    {
      $this->form_validation->set_rules('username','Username', 'trim|required');
      $this->form_validation->set_rules('password','Password', 'trim|required');
      $this->form_validation->set_rules('jabatan','Jabatan', 'trim|required');

      if($this->form_validation->run() == TRUE)
      {
        if($this->user_model->insert() == TRUE)
        {
          $data['notif'] = 'User berhasil ditambahkan';
          $data['main_view'] = 'user_view';
          $data['user'] = $this->user_model->get_data_user();
          $this->load->view('template',$data);

        } else{
          $data['notif'] = 'User gagal ditambahkan';
          $data['main_view'] = 'user_view';
          $data['user'] = $this->user_model->get_data_user();
          $this->load->view('template',$data);
        }
      } else{
        $data['notif'] = validation_errors();
        $data['main_view'] = 'user_view';
        $data['user'] = $this->user_model->get_data_user();
        $this->load->view('template',$data);
      }

    }
	}

  public function hapus_user()
  {
    if ($this->session->userdata('logged_in')== TRUE) {
      $id_user = $this->uri->segment(3);

      if ($this->user_model->delete($id_user)==TRUE) {
        $data['notif'] = 'User berhasil dihapus';
        $data['main_view'] = 'user_view';
        $data['user'] = $this->user_model->get_data_user();
        $this->load->view('template',$data);
      }
      else {
        $data['notif'] = 'User gagal dihapus';
        $data['main_view'] = 'user_view';
        $data['user'] = $this->user_model->get_data_user();
        $this->load->view('template',$data);
      }
    } else {
        $data['main_view'] = 'user_view';
        $data['user'] = $this->user_model->get_data_user();
        $this->load->view('template',$data);
    }
  }

  public function user()
  {
    if($this->session->userdata('logged_in') == TRUE)
    {
      $data['jabatan'] = $this->session->userdata('jabatan');
      $data['main_view'] = 'user_view';
      $data['user'] = $this->user_model->get_data_user();
      $this->load->view('template',$data);
    } else{
      $this->load->view('login_view');
    }
  }


  public function detil_user()
  {
      if($this->session->userdata('logged_in')==TRUE){
      $data['main_view'] = "detil_user_view";
      $id_user=$this->uri->segment(3);

      $data['detil'] = $this->user_model->get_data_user_byid($id_user);

      $this->load->view('template', $data);   
    }
    else{
      redirect('user/user');
   }
  }

  public function edit_user()
  {
    if($this->session->userdata('logged_in')==TRUE){
      $data['main_view'] = "edit_user_view";
      $id_user=$this->uri->segment(3);

      $data['detil'] = $this->user_model->get_data_user_byid($id_user);

      $this->load->view('template', $data);   
    }
    else{
      redirect('admin');
    }

  }

  public function update()
  {
      if($this->session->userdata('logged_in') == TRUE){
      $id_user = $this->uri->segment(3);

      if($this->input->post('submit')){
        $this->form_validation->set_rules('username','Username', 'trim|required');
        $this->form_validation->set_rules('password','Password', 'trim|required');
        $this->form_validation->set_rules('jabatan','Jabatan', 'trim|required');

        if($this->form_validation->run() == TRUE) {
             
          if($this->user_model->update_user($this->uri->segment(3)) == TRUE){
            $data['notif'] = 'Edit berhasil';
            $data['detil'] = $this->user_model->get_data_user_byid($this->uri->segment(3));
            $data['main_view'] = 'detil_user_view';
            $this->load->view('template', $data);
          } else {
            $data['notif'] = 'Edit gagal';
            $data['detil'] = $this->user_model->get_data_user_byid($this->uri->segment(3));
            $data['main_view'] = 'detil_user_view';
            $this->load->view('template', $data);
          }
          
        } else {
          $data['notif'] = validation_errors();
          $data['detil'] = $this->user_model->get_data_user_byid($this->uri->segment(3));
          $data['main_view'] = 'detil_user_view';
          $this->load->view('template',$data);
        }
      }
    }else{
      redirect('admin');
    }
  }

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */