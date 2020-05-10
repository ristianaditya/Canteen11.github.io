<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		 if($this->session->userdata('status') != "login")
        {
            redirect(base_url("index.php/Login/login"));
        }
		$this->load->model('admin_model');
	}
		
	public function data_produk()
	{
		$this->load->library('pagination');
		//config
		$config['base_url'] = 'http://localhost/Kantin.Ol/index.php/Admin/Produk/data_produk/';
		$config['total_rows'] = $this->admin_model->get_total("daftar_produk");
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
		$nol=0;	
		$data['data'] = $this->admin_model->data_produk($config['per_page'], $data['mulai'] = $this->uri->segment(4)-$nol);
		$data['konten'] = "Admin/data_produk";
		$this->load->view('Admin/utama' , $data);
	}
	public function tambah(){
		$data['data']= $this->admin_model->data_kantin(); 
		$data['kategori']= $this->admin_model->semua_kategori(); 
		$data['konten'] = "Admin/tambah_produk";
		$this->load->view('Admin/utama' , $data);
	}
	public function aksi_tambah_produk(){
		$this->form_validation->set_rules('id_kantin', 'Id Kantin', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');
		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|min_length[3]|max_length[16]');
		$this->form_validation->set_rules('harga', 'Harga', 'required|min_length[3]|max_length[9]');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|min_length[8]|max_length[64]');
		
		if($this->form_validation->run() != FALSE){
			
		$id = $this->admin_model->get_last_id('id_produk' , 'daftar_produk');
        $id_produk = ltrim($id->id_produk , "PR");
        $id_produk = sprintf('%05d' , $id_produk + 1);
        $id_produk = "PR".$id_produk;
		
		$id_kantin = $this->input->post('id_kantin');
		$kategori = $this->input->post('kategori');
		$nama_produk = $this->input->post('nama_produk');
		$harga = $this->input->post('harga');
		$deskripsi = $this->input->post('deskripsi');
			
		$foto=$_FILES['foto'];
		if($foto=''){}else{
			$config['upload_path']	= './upload/produk/';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')) {
				$data = array('error' => $this->upload->display_errors());
				$data['data']= $this->admin_model->data_kantin(); 
				$data['kategori']= $this->admin_model->semua_kategori();
				$data['konten'] = "Admin/tambah_produk";
				$this->load->view('Admin/utama' , $data);
			}else{
				$foto=$this->upload->data('file_name');
				$query = array(
					'id_produk' => $id_produk,
					'id_kantin' => $id_kantin,
					'id_kategori' => $kategori,
					'nama_produk' => $nama_produk,
					'harga' => $harga,
					'deskripsi' => $deskripsi,
					'foto_produk' => '/upload/produk/'.$foto
				);
				$this->admin_model->input_data($query , 'daftar_produk');
				$this->session->set_flashdata('data','1');
				redirect(base_url('index.php/Admin/Produk/data_produk'));
			}
		}
		}
		else{
			$foto=$_FILES['foto'];
			if($foto=''){}else{
			$config['upload_path']	= './upload/produk/';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')) {
				$data = array('error' => $this->upload->display_errors());			
				$data['data']= $this->admin_model->data_kantin(); 
				$data['kategori']= $this->admin_model->semua_kategori(); 
				$data['konten'] = "Admin/tambah_produk";
				$this->load->view('Admin/utama', $data);
			}else{
			$data['data']= $this->admin_model->data_kantin(); 
			$data['kategori']= $this->admin_model->semua_kategori(); 
			$data['konten'] = "Admin/tambah_produk";
			$this->load->view('Admin/utama' , $data);
			}
		}
	}
	}
	public function search_produk(){
		$a = $this->input->post('search');
		$data['data'] = $this->admin_model->search_produk($a);
		$data['konten'] = "Admin/search_data_produk";
		$this->load->view('Admin/utama' , $data);
	}
	public function delete_produk()
	{
		$where = $this->uri->segment('4');
		$cek_pesanan = $this->admin_model->cek_pesanan($where);
		if($cek_pesanan >= 1){
			$this->session->set_flashdata('data','4'); 
			redirect(base_url('index.php/Admin/Produk/data_produk'));
		}else{
			$this->admin_model->delete_semua_produk($where);
			$this->db->where('id_produk',$where);
			$query = $this->db->get('daftar_produk');
			$row = $query->row();
			unlink(".$row->foto_produk");
			$this->db->delete('daftar_produk', array('id_produk' => $where));
			$this->admin_model->single_delete('id_produk' , $where , 'daftar_produk');
			$this->session->set_flashdata('data','3'); 
			redirect(base_url('index.php/Admin/Produk/data_produk'));
		}
	}
	public function aksi_edit_produk(){
		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|min_length[3]|max_length[16]');
		$this->form_validation->set_rules('harga', 'Harga', 'required|min_length[3]|max_length[9]');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|min_length[8]|max_length[64]');
		
		if($this->form_validation->run() != FALSE){
			
		$data_edit = array(
            'nama_produk' => $this->input->post('nama_produk'),
            'harga' => $this->input->post('harga'),
            'deskripsi' => $this->input->post('deskripsi')
        );
        
        $where = $this->uri->segment(4);
        
        $this->admin_model->update_data($where , $data_edit , 'id_produk' , 'daftar_produk');
		$this->session->set_flashdata('data','1'); 
		redirect(base_url('index.php/Admin/Produk/data_produk'));
	}
		else{
			$data['data'] = $this->admin_model->edit_produk($this->uri->segment(4));
			$data['konten'] = "Admin/edit_produk";
			$this->load->view('Admin/utama' , $data);
		}
	}
	public function edit_produk(){
		$data['data']= $this->admin_model->edit_produk($this->uri->segment(4)); 
		$data['konten'] = "Admin/edit_produk";
		$this->load->view('Admin/utama' , $data);
	}
	public function update_foto()
	{
		$where = $this->uri->segment('4');
		$this->db->where('id_produk',$where);
		$query = $this->db->get('daftar_produk');
		$row = $query->row();
		unlink(".$row->foto_produk");
		
		$foto=$_FILES['foto'];
		if($foto=''){}else{
			$config['upload_path']	= './upload/produk/';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')) {
				$this->session->set_flashdata('data','2');
				redirect(base_url('index.php/Admin/Produk/edit_produk/'.$where));
			}else{
				$foto=$this->upload->data('file_name');
			}
		}
		
		$data_edit = array(
			'foto_produk' => '/upload/produk/'.$foto
			);
		$this->admin_model->update_data($where , $data_edit , 'id_produk' , 'daftar_produk');
		$this->session->set_flashdata('data','1'); 
		redirect(base_url('index.php/Admin/Produk/edit_produk/'.$where));
	}
}
?>