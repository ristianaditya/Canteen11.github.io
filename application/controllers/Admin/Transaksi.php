<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		 if($this->session->userdata('status') != "login")
        {
            redirect(base_url("index.php/Login/login"));
        }
		$this->load->model('admin_model');
	}
		
	public function transaksi()
	{
		$this->load->library('pagination');
		//config
		$config['base_url'] = 'http://localhost/Kantin.Ol/index.php/Admin/Transaksi/transaksi/';
		$config['total_rows'] = $this->admin_model->get_total("transaksi");
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
		$data['data'] = $this->admin_model->data_transaksi($config['per_page'], $data['start']-0); 
		$data['konten'] = "Admin/transaksi";
		$this->load->view('Admin/utama' , $data);
	}
	
	public function resetlalu()
	{
		$this->admin_model->delete_transaksilalu();
		$this->session->set_flashdata('data','3');
		redirect(base_url('index.php/Admin/Transaksi/transaksi'));

	}
	public function delete()
	{
		$this->admin_model->delete_transaksi($this->uri->segment(4));
		$this->session->set_flashdata('data','3');
		redirect(base_url('index.php/Admin/Transaksi/transaksi'));

	}
	public function search_transaksi(){
			$a = $this->input->post('search');
			$data['data'] = $this->admin_model->search_transaksi($a);
			$data['konten'] = "Admin/search_transaksi";
			$this->load->view('Admin/utama' , $data);
	}
}
?>