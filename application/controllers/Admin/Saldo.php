<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saldo extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		 if($this->session->userdata('status') != "login")
        {
           redirect(base_url("index.php/Login/login"));
        }
		$this->load->model('admin_model');
	}
	
	public function data_saldo()
	{
		$this->load->library('pagination');
		//config
		$config['base_url'] = 'http://localhost/Kantin.Ol/index.php/Admin/Saldo/data_saldo/';
		$config['total_rows'] = $this->admin_model->get_total("pengajuan_saldo");
		$config['per_page'] = 5;
		
		//styling
		$config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination mb-0">';
		$config['full_tag_close'] = '</ul></nav>';
		
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item active">';
		$config['next_tag_close'] = '</li>';
		
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item active">';
		$config['prev_tag_close'] = '</li>';
		
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['attributes'] = array('class' => 'page-link');
		
		//initialize
		$this->pagination->initialize($config);
		
		$data['start'] = $this->uri->segment(4);
		$data['data']= $this->admin_model->semua_saldo($config['per_page'], $data['start']-0); 
		$data['konten'] = "Admin/data_saldo";
		$this->load->view('Admin/utama' , $data);
	}
	public function isi_saldo(){
		$saldo = $this->admin_model->user_saldo($this->uri->segment(4));
		$data_edit = array(
            'saldo' => $this->input->post('nominal') + $saldo->saldo
        );
        
        $where = $this->uri->segment(4);
        
        $this->admin_model->update_data($where , $data_edit , 'id_user' , 'saldo');
		
		$query = $this->db->get('pengajuan_saldo');
		$row = $query->row();
		unlink(".$row->bukti");
		$this->db->delete('pengajuan_saldo', array('id_user' => $where));
		$this->admin_model->single_delete('id_user' , $where , 'pengajuan_saldo');		
		$this->session->set_flashdata('data','1'); 
		redirect(base_url('index.php/Admin/Saldo/data_saldo'));
	}
}
	?>
	
	