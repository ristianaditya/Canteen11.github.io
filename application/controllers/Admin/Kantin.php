<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kantin extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		 if($this->session->userdata('status') != "login")
        {
           redirect(base_url("index.php/Login/login"));
        }
		$this->load->model('admin_model');
	}
		
	public function data_kantin()
	{
		$this->load->library('pagination');
		//config
		$config['base_url'] = 'http://localhost/Kantin.Ol/index.php/Admin/Kantin/data_kantin/';
		$config['total_rows'] = $this->admin_model->get_total("data_kantin");
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
		$data['data']= $this->admin_model->semua_kantin($config['per_page'], $data['start']-0); 
		$data['konten'] = "Admin/data_kantin";
		$this->load->view('Admin/utama' , $data);
	}
	public function tambah(){
		$data['sekolah'] = $this->admin_model->sekolah();
		$data['data'] = $this->admin_model->semua_penjual();
		$data['konten'] = "Admin/tambah_kantin";
		$this->load->view('Admin/utama' , $data);
	}
	public function tambah_aksi(){
		$this->form_validation->set_rules('pemilik', 'Nama Penjual', 'required|is_unique[data_kantin.id_penjual]|min_length[4]|max_length[24]');
		$this->form_validation->set_rules('nama_kantin', 'Nama Kantin', 'required|min_length[4]|max_length[24]');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|min_length[8]|max_length[126]');
		
		if($this->form_validation->run() != FALSE){
			$id = $this->admin_model->get_last_id('id_kantin' , 'data_kantin');
			$id_kantin = ltrim($id->id_kantin , "K");
			$id_kantin = sprintf('%04d' , $id_kantin + 1);
			$id_kantin = "K".$id_kantin;
			
			$penjual = $this->input->post('pemilik');
			$kantin = $this->input->post('nama_kantin');
			$deskripsi = $this->input->post('deskripsi');
			$foto=$_FILES['foto'];
			if($foto=''){}else{
				$config['upload_path']	= './upload/kantin/';
				$config['allowed_types']	= 'gif|jpg|png|jpeg';

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')) {
					$data = array('error' => $this->upload->display_errors());
					$data['sekolah'] = $this->admin_model->sekolah();
					$data['data'] = $this->admin_model->semua_penjual();
					$data['konten'] = "Admin/tambah_kantin";
					$this->load->view('Admin/utama' , $data);
				}else{
					$foto=$this->upload->data('file_name');
					$query = array(
					'id_kantin' => $id_kantin,
					'id_penjual' => $penjual,
					'id_sekolah' => $this->input->post('sekolah'),
					'nama_kantin' => $kantin,
					'foto_kantin' => '/upload/kantin/'.$foto,
					'deskripsi' => $deskripsi
					);
					$this->admin_model->input_data($query , 'data_kantin');
					$this->session->set_flashdata('data','1');
					redirect(base_url('index.php/Admin/Kantin/data_kantin'));
				}
			}
		}
		else{
				$foto=$_FILES['foto'];
				if($foto=''){}else{
				$config['upload_path']	= './upload/kantin/';
				$config['allowed_types']	= 'gif|jpg|png|jpeg';

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')) {
					$data = array('error' => $this->upload->display_errors());
					$data['sekolah'] = $this->admin_model->sekolah();
					$data['data'] = $this->admin_model->semua_penjual();
					$data['konten'] = "Admin/tambah_kantin";
					$this->load->view('Admin/utama' , $data);
				}else{
					$data['data'] = $this->admin_model->semua_penjual();
					$data['konten'] = "Admin/tambah_kantin";
					$this->load->view('Admin/utama' , $data);
				}
			}
		}
	}
	public function search(){
			$a = $this->input->post('search');
			$data['data'] = $this->admin_model->search_kantin($a);
			$data['konten'] = "Admin/search_data_kantin";
			$this->load->view('Admin/utama' , $data);
	}
	public function delete_kantin()
	{
		$where = $this->uri->segment('4');
		$data = $this->admin_model->jml_produk($where);
		if($data >= 1){ 
			$this->session->set_flashdata('data','4'); 
			redirect(base_url('index.php/Admin/Kantin/data_kantin'));
		}
		else
		{
			$this->db->where('id_kantin',$where);
			$query = $this->db->get('data_kantin');
			$row = $query->row();
			unlink(".$row->foto_kantin");
			$this->db->delete('data_kantin', array('id_kantin' => $where));
			$this->admin_model->single_delete('id_kantin' , $where , 'data_kantin');
			$this->session->set_flashdata('data','3'); 
			redirect(base_url('index.php/Admin/Kantin/data_kantin'));
		}
	}
	public function aksi_edit_kantin(){
		$this->form_validation->set_rules('nama_kantin', 'Nama Kantin', 'required|min_length[4]|max_length[24]');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|min_length[8]|max_length[126]');
		
		if($this->form_validation->run() != FALSE){
			
		$data_edit = array(
            'nama_kantin' => $this->input->post('nama_kantin'),
            'deskripsi' => $this->input->post('deskripsi')
        );
        
        $where = $this->uri->segment(4);
        
        $this->admin_model->update_data($where , $data_edit , 'id_kantin' , 'data_kantin');
		$this->session->set_flashdata('data','5'); 
		redirect(base_url('index.php/Admin/Kantin/data_kantin'));
	}
		else{
			$data['data'] = $this->admin_model->satu_penjual($this->uri->segment(4));
			$data['konten'] = "Admin/edit_kantin";
			$this->load->view('Admin/utama' , $data);
		}
	}
	public function edit_kantin(){
		$data['data'] = $this->admin_model->satu_penjual($this->uri->segment(4));
		$data['konten'] = "Admin/edit_kantin";
		$this->load->view('Admin/utama' , $data);
	}
	public function update_foto()
	{
		$where = $this->uri->segment('4');
		$this->db->where('id_kantin',$where);
		$query = $this->db->get('data_kantin');
		$row = $query->row();
		unlink(".$row->foto_kantin");
		
		$foto=$_FILES['foto'];
		if($foto=''){}else{
			$config['upload_path']	= './upload/kantin/';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')) {
				$this->session->set_flashdata('data','2');
				redirect(base_url('index.php/Admin/Kantin/edit_kantin/'.$where));
			}else{
				$foto=$this->upload->data('file_name');
			}
		}
		
		$data_edit = array(
			'foto_kantin' => '/upload/kantin/'.$foto
			);
		$this->admin_model->update_data($where , $data_edit , 'id_kantin' , 'data_kantin');
		$this->session->set_flashdata('data','1'); 
		redirect(base_url('index.php/Admin/Kantin/edit_kantin/'.$where));
	}
}
?>