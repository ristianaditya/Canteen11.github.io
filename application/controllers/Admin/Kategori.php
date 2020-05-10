<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		 if($this->session->userdata('status') != "login")
        {
            redirect(base_url("index.php/Login/login"));
        }
		$this->load->model('admin_model');
	}
		
	public function data_kategori()
	{
		$this->load->library('pagination');
		//config
		$config['base_url'] = 'http://localhost/Kantin.Ol/index.php/Admin/Kategori/data_kategori/';
		$config['total_rows'] = $this->admin_model->get_total("kategori_produk");
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
		$data['data'] = $this->admin_model->data_kategori($config['per_page'], $data['start']); 
		$data['konten'] = "Admin/data_kategori";
		$this->load->view('Admin/utama' , $data);
	}
	public function delete()
	{
		$where = $this->uri->segment('4');
		$data = $this->admin_model->jml_kategori($where);
		if($data >= 1){ 
			$this->session->set_flashdata('data','4'); 
			redirect(base_url('index.php/Admin/Kategori/data_kategori'));
		}
		else
		{
			$this->admin_model->single_delete('id_kategori' , $where , 'kategori_produk');
			$this->session->set_flashdata('data','3');
			redirect(base_url('index.php/Admin/Kategori/data_kategori'));
		}
	}
	public function tambah(){
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|min_length[4]|max_length[24]');
		
		if($this->form_validation->run() != FALSE){
			$id = $this->admin_model->get_last_id('id_kategori' , 'kategori_produk');
			$id_kategori = ltrim($id->id_kategori , "ID");
			$id_kategori = sprintf('%05d' , $id_kategori + 1);
			$id_kategori = "ID".$id_kategori;
			
			$kategori = $this->input->post('nama_kategori');
			
			$query = array(
			'id_kategori' => $id_kategori,
			'nama_kategori' => $kategori
			);
			$this->admin_model->input_data($query , 'kategori_produk');
			$this->session->set_flashdata('data','1');
			redirect(base_url('index.php/Admin/Kategori/data_kategori'));
		}
		else{
			$this->session->set_flashdata('data','2');
			redirect(base_url('index.php/Admin/Kategori/data_kategori'));
		}
	}
	public function edit(){
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|min_length[4]|max_length[24]');
		
		if($this->form_validation->run() != FALSE){
		$data_edit = array(
            'nama_kategori' => $this->input->post('nama_kategori')
        );
        
        $where = $this->uri->segment(4);
        
        $this->admin_model->update_data($where , $data_edit , 'id_kategori' , 'kategori_produk');
		$this->session->set_flashdata('data','5');
		redirect(base_url('index.php/Admin/Kategori/data_kategori'));
	}
		else{
			$this->session->set_flashdata('data','2');
			redirect(base_url('index.php/Admin/Kategori/data_kategori'));
		}
	}
	public function search(){
			$a = $this->input->post('search');
			$data['data'] = $this->admin_model->search_kategori($a);
			$data['konten'] = "Admin/search_data_kategori";
			$this->load->view('Admin/utama' , $data);
	}
}
?>