<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		 if($this->session->userdata('status') != "login")
        {
            redirect(base_url("index.php/Login/login"));
        }
		$this->load->model('admin_model');
	}
	
	public function data_pembeli()
	{
		$this->load->library('pagination');
		//config
		$config['base_url'] = 'http://localhost/Kantin.Ol/index.php/Admin/Akun/data_pembeli/';
		$config['total_rows'] = $this->admin_model->get_total("akun_pembeli");
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
		$data['data'] = $this->admin_model->data_akun($config['per_page'], $data['start']);
		$data['konten'] = "Admin/data_pembeli";
		$this->load->view('Admin/utama' , $data);
	}
	
	public function delete_pembeli()
	{
		$where = $this->uri->segment('4');
		$this->db->where('id_pembeli',$where);
		$query = $this->db->get('akun_pembeli');
		$row = $query->row();
		unlink(".$row->foto");
		$this->admin_model->single_delete('id_pembeli' , $where , 'akun_pembeli');
		$this->session->set_flashdata('data','3');
		redirect(base_url('index.php/Admin/Akun/data_pembeli'));
	}
	
	public function tambah_pembeli()
	{
		$data['konten'] = "Admin/tambah_pembeli";
		$this->load->view('Admin/utama' , $data);
	}
	
	public function data_penjual()
	{
		$this->load->library('pagination');
		//config
		$config['base_url'] = 'http://localhost/Kantin.Ol/index.php/Admin/Akun/data_penjual/';
		$config['total_rows'] = $this->admin_model->get_total("akun_penjual");
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
		$data['data'] = $this->admin_model->data_penjual($config['per_page'], $data['start']-0);
		$data['konten'] = "Admin/data_penjual";
		$this->load->view('Admin/utama' , $data);
	}
	
	public function verifikasi()
	{
		$this->admin_model->verifikasi($this->uri->segment('4'));
		$this->load->library('pagination');
		//config
		$config['base_url'] = 'http://localhost/Kantin.Ol/index.php/Admin/Akun/data_penjual/';
		$config['total_rows'] = $this->admin_model->get_total("akun_penjual");
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
		
		$data['start'] = $this->uri->segment(5);
		$data['data'] = $this->admin_model->data_penjual($config['per_page'], $data['start']-0);
		$data['konten'] = "Admin/data_penjual";
		$this->load->view('Admin/utama' , $data);
	}
	
	public function banned()
	{
		$this->admin_model->banned($this->uri->segment('4'));
		$this->load->library('pagination');
		//config
		$config['base_url'] = 'http://localhost/Kantin.Ol/index.php/Admin/Akun/data_penjual/';
		$config['total_rows'] = $this->admin_model->get_total("akun_penjual");
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
		
		$data['start'] = $this->uri->segment(5);
		$data['data'] = $this->admin_model->data_penjual($config['per_page'], $data['start']-0);
		$data['konten'] = "Admin/data_penjual";
		$this->load->view('Admin/utama' , $data);
	}
	
	public function aksi_tambah_pembeli()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|min_length[4]|max_length[24]');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('no_telepon', 'Nomer Telephone', 'required|min_length[12]|max_length[13]');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]|min_length[12]|max_length[32]');
		$this->form_validation->set_rules('password1', 'Konfirmasi Password', 'required|min_length[8]|max_length[12]|matches[password]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[12]');
		
		if($this->form_validation->run() != FALSE)
		{		
			$id = $this->admin_model->get_last_id('id_pembeli' , 'akun_pembeli');
			$id_pembeli = ltrim($id->id_pembeli , "PE");
			$id_pembeli = sprintf('%05d' , $id_pembeli + 1);
			$id_pembeli = "PE".$id_pembeli;

			$id = $this->admin_model->get_last_id('id_user' , 'user');
			$id_user = ltrim($id->id_user , "US");
			$id_user = sprintf('%05d' , $id_user + 1);
			$id_user = "US".$id_user;

			$id = $this->admin_model->get_last_id('id_saldo' , 'saldo');
			$id_saldo = ltrim($id->id_saldo , "SA");
			$id_saldo = sprintf('%05d' , $id_saldo + 1);
			$id_saldo = "SA".$id_saldo;

			$nama = $this->input->post('nama');
			$jenis = $this->input->post('jenis_kelamin');
			$email = $this->input->post('email');
			$no_telepon = $this->input->post('no_telepon');
			$password = $this->input->post('password');
			$foto=$_FILES['foto'];
			if($foto=''){}else{
				$config['upload_path']	= './upload/pembeli/';
				$config['allowed_types']	= 'gif|jpg|png|jpeg';

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')) 
				{
					$data = array('error' => $this->upload->display_errors());
					$data['konten'] = "Admin/tambah_pembeli";
					$this->load->view('Admin/utama' , $data);
				}
				else
				{
					$foto=$this->upload->data('file_name');
					$querys = array(
						'id_user' => $id_user,
						'email' => $email,
						'password' => md5($password),
						'level' => '2',
					);
					$query = array(
						'id_pembeli' => $id_pembeli,
						'id_user' => $id_user,
						'nama' => $nama,
						'email' => $email,
						'jenis_kelamin' => $jenis,
						'no_telepon' => $no_telepon,
						'foto' => '/upload/pembeli/'.$foto,
					);
					$query_saldo = array(
						'id_saldo' => $id_saldo,
						'id_user' => $id_user,
						'saldo' => '0',
					);
					$this->admin_model->input_data($querys , 'user');
					$this->admin_model->input_data($query , 'akun_pembeli');
					$this->admin_model->input_data($query_saldo , 'saldo');
					$this->session->set_flashdata('data','1');
					redirect(base_url('index.php/Admin/Akun/data_pembeli'));
				}
			}
		}
		else
		{	
			if($foto=''){}else{
				$config['upload_path']	= './upload/pembeli/';
				$config['allowed_types']	= 'gif|jpg|png|jpeg';

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')) 
				{
					$data = array('error' => $this->upload->display_errors());
					$data['konten'] = "Admin/tambah_pembeli";
					$this->load->view('Admin/utama' , $data);
				}
				else
				{
					$data['konten'] = "Admin/tambah_pembeli";
					$this->load->view('Admin/utama' , $data);
				}
			}
		}
	}
	public function edit_pembeli()
	{
		$data['data'] = $this->admin_model->edit_pembeli($this->uri->segment(4));
		$data['konten'] = "Admin/edit_pembeli";
		$this->load->view('Admin/utama' , $data);
	}
	public function search_pembeli()
	{
			$a = $this->input->post('search');
			$data['data'] = $this->admin_model->search_pembeli($a);
			$data['konten'] = "Admin/search_data_pembeli";
			$this->load->view('Admin/utama' , $data);
	}
	
	public function tambah_penjual()
	{
		$data['konten'] = "Admin/tambah_penjual";
		$this->load->view('Admin/utama' , $data);
	}
	
	public function aksi_tambah_penjual()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|min_length[4]|max_length[24]');
		$this->form_validation->set_rules('no_telepon', 'Nomer Telephone', 'required|min_length[12]|max_length[13]');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]|min_length[12]|max_length[32]');
		$this->form_validation->set_rules('date', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('no_ktp', 'Nomer KTP', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('password1', 'Konfirmasi Password', 'required|min_length[8]|max_length[12]|matches[password]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[12]');
		
		if($this->form_validation->run() != FALSE)
		{

			$id = $this->admin_model->get_last_id('id_penjual' , 'akun_penjual');
			$id_penjual = ltrim($id->id_penjual , "PEN");
			$id_penjual = sprintf('%05d' , $id_penjual + 1);
			$id_penjual = "PEN".$id_penjual;

			$ids = $this->admin_model->get_last_id('id_user' , 'user');
			$id_user = ltrim($ids->id_user , "US");
			$id_user = sprintf('%05d' , $id_user + 1);
			$id_user = "US".$id_user;

			$id = $this->admin_model->get_last_id('id_saldo' , 'saldo');
			$id_saldo = ltrim($id->id_saldo , "SA");
			$id_saldo = sprintf('%05d' , $id_saldo + 1);
			$id_saldo = "SA".$id_saldo;

			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$verifikasi = 1;
			$no_telepon = $this->input->post('no_telepon');
			$password = $this->input->post('password');
			$foto=$_FILES['foto'];
				if($foto=''){}else{
				$config['upload_path']	= './upload/penjual/';
				$config['allowed_types']	= 'gif|jpg|png|jpeg';

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')) {
					$data = array('error' => $this->upload->display_errors());
					$data['konten'] = "Admin/tambah_penjual";
					$this->load->view('Admin/utama' , $data);
				}else
					{
						$foto=$this->upload->data('file_name');
						$query_user = array(
							'id_user' => $id_user,
							'email' => $email,
							'password' => md5($password),
							'level' => '3'

						);
						$query_saldo = array(
							'id_saldo' => $id_saldo,
							'id_user' => $id_user,
							'saldo' => '0',
						);
						$query = array(
							'id_penjual' => $id_penjual,
							'id_user' => $id_user,
							'nama' => $nama,
							'no_telepon' => $no_telepon,
							'no_ktp' => $this->input->post('no_ktp'),
							'tgl_lahir' => $this->input->post('date'),
							'alamat' => $this->input->post('alamat'),
							'verifikasi' => $verifikasi,
							'foto' => '/upload/penjual/'.$foto
						);
						$this->admin_model->input_data($query_user , 'user');
						$this->admin_model->input_data($query_saldo , 'saldo');
						$this->admin_model->input_data($query , 'akun_penjual');
						$this->session->set_flashdata('data','1');
						redirect(base_url('index.php/Admin/Akun/data_penjual'));
					}
				} 
			}
		else{
			$foto=$_FILES['foto'];
			if($foto=''){}else{
				$config['upload_path']	= './upload/penjual/';
				$config['allowed_types']	= 'gif|jpg|png|jpeg';

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')) {
					$data = array('error' => $this->upload->display_errors());
					$data['konten'] = "Admin/tambah_penjual";
					$this->load->view('Admin/utama' , $data);
				}else{
					$data['konten'] = "Admin/tambah_penjual";
					$this->load->view('Admin/utama' , $data);
				}
			}
		}
	}
	
	public function delete_penjual()
	{
		$where = $this->uri->segment('4');
		$data = $this->admin_model->jml_kantin($where);
		if($data >= 1){ 
			$this->session->set_flashdata('data','4'); 
			redirect(base_url('index.php/Admin/Akun/data_penjual'));
		}
		else
		{
			$where = $this->uri->segment('4');
			$this->admin_model->delete_semua_penjual($where);
			$this->db->where('id_penjual',$where);
			$query = $this->db->get('akun_penjual');
			$row = $query->row();
			unlink(".$row->foto");
			$this->db->delete('akun_penjual', array('id_penjual' => $where));
			$this->admin_model->single_delete('id_penjual' , $where , 'akun_penjual');
			$this->admin_model->single_delete('id_user' , $row->id_user , 'saldo');
			$this->admin_model->single_delete('id_user' , $row->id_user , 'user');
			$this->session->set_flashdata('data','3');
			redirect(base_url('index.php/Admin/Akun/data_penjual'));
		}
	}
	
	public function edit_penjual()
	{
		$data['data'] = $this->admin_model->edit_penjual($this->uri->segment(4));
		$data['konten'] = "Admin/edit_penjual";
		$this->load->view('Admin/utama' , $data);
	}
	
	public function aksi_edit_pembeli()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|min_length[4]|max_length[24]');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('no_telepon', 'Nomer Telephone', 'required|min_length[12]|max_length[13]');
		$this->form_validation->set_rules('email', 'Email', 'required|min_length[8]|max_length[32]');

		if($this->form_validation->run() != FALSE){	

		$data_edit = array(
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'email' => $this->input->post('email'),
            'no_telepon' => $this->input->post('no_telepon')
        );
			
		$data_edit_user = array(
            'email' => $this->input->post('email'), 
        );
        
        $where = $this->uri->segment(4);
        $id_user = $this->uri->segment(5);
        
        $this->admin_model->update_data($where , $data_edit , 'id_pembeli' , 'akun_pembeli');
        $this->admin_model->update_data($id_user , $data_edit_user , 'id_user' , 'user');
		$this->session->set_flashdata('data','5'); 
		redirect(base_url('index.php/Admin/Akun/data_pembeli'));
	}
		else{
			$data['data'] = $this->admin_model->edit_pembeli($this->uri->segment(4));
			$data['konten'] = "Admin/edit_pembeli";
			$this->load->view('Admin/utama' , $data);
		}
	}
	public function aksi_edit_penjual()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|min_length[4]|max_length[24]');
		$this->form_validation->set_rules('no_telepon', 'Nomer Telephone', 'required|min_length[12]|max_length[13]');
		$this->form_validation->set_rules('email', 'Email', 'required|min_length[8]|max_length[32]');
		$this->form_validation->set_rules('date', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('no_ktp', 'Nomer KTP', 'required');
		$this->form_validation->set_rules('alamat', 'Nomer KTP', 'required');
		
		if($this->form_validation->run() != FALSE){
		$data_edit = array(
            'nama' => $this->input->post('nama'),
            'no_telepon' => $this->input->post('no_telepon'),
			'no_ktp' => $this->input->post('no_ktp'),
			'tgl_lahir' => $this->input->post('date'),
			'alamat' => $this->input->post('alamat'),
        );
		$query_user = array(
			'email' => $this->input->post('email'),
			
		);
        
        $where = $this->uri->segment(4);
        
        $this->admin_model->update_data($where , $data_edit , 'id_penjual' , 'akun_penjual');
        $this->admin_model->update_data($this->uri->segment(5) , $query_user , 'id_user' , 'user');
		$this->session->set_flashdata('data','1'); 
		redirect(base_url('index.php/Admin/Akun/edit_penjual/'.$this->uri->segment(4)));
	}
		else{
			$data['data'] = $this->admin_model->edit_penjual($this->uri->segment(4));
			$data['konten'] = "Admin/edit_penjual";
			$this->load->view('Admin/utama' , $data);
		}
	}
	
	public function report_akun_pembeli()
	{
			$data = array(
				'title' => 'Daftar Akun Customer',
				'data' => $this->admin_model->data_akun()
		);
		$this->load->view('Admin/laporan_akun_pembeli',$data);
	}
	
	public function search_penjual()
	{
			$a = $this->input->post('search');
			$data['data'] = $this->admin_model->search_penjual($a);
			$data['konten'] = "Admin/search_data_penjual";
			$this->load->view('Admin/utama' , $data);
	}

	public function ganti_password_pembeli()
	{
		$this->form_validation->set_rules('new_password', 'Password', 'required|min_length[8]|max_length[16]');

		if($this->form_validation->run() != FALSE){
		$data_edit_user = array(
            'password' => md5($this->input->post('new_password')) 
        );
        $id_user = $this->uri->segment(4);
        
        $this->admin_model->update_data($id_user , $data_edit_user , 'id_user' , 'user');
		$this->session->set_flashdata('data','5');
		redirect(base_url('index.php/Admin/Akun/edit_pembeli/'.$this->uri->segment('5')));
			}
		else {
			$this->session->set_flashdata('data','2');
			redirect(base_url('index.php/Admin/Akun/edit_pembeli/'.$this->uri->segment('5')));
		}
	
	}
	
	public function ganti_password_penjual()
	{	
		$this->form_validation->set_rules('new_password', 'Password', 'required|min_length[8]|max_length[16]');

		if($this->form_validation->run() != FALSE){
		$data_edit_user = array(
            'password' => md5($this->input->post('new_password')) 
        );
        $id_user = $this->uri->segment(4);
        
        $this->admin_model->update_data($id_user , $data_edit_user , 'id_user' , 'user');
		$this->session->set_flashdata('data','5');
		redirect(base_url('index.php/Admin/Akun/edit_penjual/'.$this->uri->segment('5')));
			}
		else {
			$this->session->set_flashdata('data','2');
			redirect(base_url('index.php/Admin/Akun/edit_penjual/'.$this->uri->segment('5')));
		}
	
	}
	
	public function update_foto()
	{
		$where = $this->uri->segment('4');
		$this->db->where('id_pembeli',$where);
		$query = $this->db->get('akun_pembeli');
		$row = $query->row();
		unlink(".$row->foto");
		
		$foto=$_FILES['foto'];
		if($foto=''){}else{
			$config['upload_path']	= './upload/pembeli/';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')) {
				$this->session->set_flashdata('data','2');
				redirect(base_url('index.php/Admin/Akun/edit_pembeli/'.$where));
			}else{
				$foto=$this->upload->data('file_name');
			}
		}
		
		$data_edit = array(
			'foto' => '/upload/pembeli/'.$foto
			);
		$this->admin_model->update_data($where , $data_edit , 'id_pembeli' , 'akun_pembeli');
		$this->session->set_flashdata('data','1'); 
		redirect(base_url('index.php/Admin/Akun/edit_pembeli/'.$where));
	}
	
	public function update_foto_penjual()
	{
		$where = $this->uri->segment('4');
		$this->db->where('id_penjual',$where);
		$query = $this->db->get('akun_penjual');
		$row = $query->row();
		unlink(".$row->foto");
		
		$foto=$_FILES['foto'];
		if($foto=''){}else{
			$config['upload_path']	= './upload/penjual/';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')) {
				$this->session->set_flashdata('data','2');
				redirect(base_url('index.php/Admin/Akun/edit_penjual/'.$where));
			}else{
				$foto=$this->upload->data('file_name');
			}
		}
		
		$data_edit = array(
			'foto' => '/upload/penjual/'.$foto
			);
		$this->admin_model->update_data($where , $data_edit , 'id_penjual' , 'akun_penjual');
		$this->session->set_flashdata('data','1'); 
		redirect(base_url('index.php/Admin/Akun/edit_penjual/'.$where));
	}
}
?>