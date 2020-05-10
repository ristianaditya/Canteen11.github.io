<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		 if($this->session->userdata('status') != "login")
        {
            redirect(base_url("index.php/Login/login"));
        }
		$this->load->model('model_login');
		$this->load->model('admin_model');
	}
	public function data_sekolah()
	{
		$this->load->library('pagination');
		//config
		$config['base_url'] = 'http://localhost/Kantin.Ol/index.php/Admin/Sekolah/data_sekolah/';
		$config['total_rows'] = $this->admin_model->get_total("data_sekolah");
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
		$data['data']= $this->admin_model->data_sekolah($config['per_page'], $data['start']); 
		$data['konten'] = "Admin/data_sekolah";
		$this->load->view('Admin/utama' , $data);
	}
	public function tambah_sekolah(){
		$data['konten'] = "Admin/tambah_sekolah";
		$this->load->view('Admin/utama' , $data);
	}
	
	public function aksi_tambah(){
		$this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'required|min_length[4]|max_length[36]');
		$this->form_validation->set_rules('website', 'Website Sekolah', 'min_length[4]|max_length[126]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[8]|max_length[126]');
		
		if($this->form_validation->run() != FALSE){
			$id = $this->admin_model->get_last_id('id_sekolah' , 'data_sekolah');
			$id_sekolah = ltrim($id->id_sekolah , "SE");
			$id_sekolah = sprintf('%05d' , $id_sekolah + 1);
			$id_sekolah = "SE".$id_sekolah;
			
			$sekolah = $this->input->post('nama_sekolah');
			$alamat = $this->input->post('alamat');
			$website = $this->input->post('website');

			$query = array(
			'id_sekolah' => $id_sekolah,
			'nama_sekolah' => $sekolah,
			'alamat_sekolah' => $alamat,
			'website' => $website
			);
			$this->admin_model->input_data($query , 'data_sekolah');
			$this->session->set_flashdata('data','1');
			redirect(base_url('index.php/Admin/Sekolah/data_sekolah'));
		}
		else{
			$data['konten'] = "Admin/tambah_sekolah";
			$this->load->view('Admin/utama' , $data);
		}
	}
	public function delete_sekolah()
	{
		$where = $this->uri->segment('4');
		$data = $this->admin_model->jml_kantin($where);
		if($data >= 1){ 
			$this->session->set_flashdata('data','4'); 
			redirect(base_url('index.php/Admin/Sekolah/data_sekolah'));
		}
		else
		{
			$this->admin_model->single_delete('id_sekolah' , $where , 'data_sekolah');
			$this->session->set_flashdata('data','3'); 
			redirect(base_url('index.php/Admin/Sekolah/data_sekolah'));
		}
	}
	public function search_sekolah(){
			$a = $this->input->post('search');
			$data['data'] = $this->admin_model->search_sekolah($a);
			$data['konten'] = "Admin/search_data_sekolah";
			$this->load->view('Admin/utama' , $data);
	}
	public function aksi_edit_sekolah(){
		$this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'required|min_length[4]|max_length[36]');
		$this->form_validation->set_rules('website', 'Website Sekolah', 'min_length[4]|max_length[126]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[8]|max_length[126]');
		
		if($this->form_validation->run() != FALSE){
		
		$sekolah = $this->input->post('nama_sekolah');
		$alamat = $this->input->post('alamat');
		$website = $this->input->post('website');
		
		$data_edit = array(
			'nama_sekolah' => $sekolah,
			'alamat_sekolah' => $alamat,
			'website' => $website
			);
        
        $where = $this->uri->segment(4);
        
        $this->admin_model->update_data($where , $data_edit , 'id_sekolah' , 'data_sekolah');
		$this->session->set_flashdata('data','5'); 
		redirect(base_url('index.php/Admin/Sekolah/data_sekolah'));
	}
		else{
			$data['data'] = $this->admin_model->detail_sekolah($this->uri->segment(4));
			$data['konten'] = "Admin/edit_sekolah";
			$this->load->view('Admin/utama' , $data);
		}
	}
	public function edit_sekolah(){
		$data['data'] = $this->admin_model->detail_sekolah($this->uri->segment(4));
		$data['konten'] = "Admin/edit_sekolah";
		$this->load->view('Admin/utama' , $data);
	}
}
?>