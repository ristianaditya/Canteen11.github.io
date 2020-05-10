<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->model("model_login");
		$this->load->model("admin_model");
		$this->load->model("fe_model");
	}
		
	public function index()
	{
		$this->load->view('Frontend/login');
	}
	public function login()
	{
		$this->load->view('Frontend/login');
	}
	public function register_view()
	{
		$this->load->view('Frontend/register');
	}

	public function proseslogin(){
		
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$where = array(
				'email' => $email,
				'password' => md5($password)
				);
		
		$cek = $this->fe_model->login("user",$where)->num_rows();
        
        if($cek > 0)
		{
			$query = "SELECT * FROM user WHERE email = '$email' AND password = '".md5($password)."'";
			$data_akun = $this->fe_model->return_result($query);
	
			foreach($data_akun as $a){
					$email = $a->email;
					$id = $a->id_user;
					$level = $a->level;
				}
			if($level == 1){
				$data_session = array(
					'email' => $email,
					'id_admin' => $id,
					'status' => "login"
				);
				$this->session->set_flashdata('data','9');
				$this->session->set_userdata($data_session);
                redirect(base_url("index.php/Admin/Admin"));
				
			}else if($level == 2){
				
				$querys = "SELECT * FROM akun_pembeli WHERE id_user = '$id'";
				$akun = $this->fe_model->return_result($querys);
				foreach($akun as $a){
					$id_pembeli = $a->id_pembeli;
					$verifikasi = $a->verifikasi;
				}
				if($verifikasi == 2){
					$data_session = array(
						'email' => $email,
						'id_pembeli' => $id_pembeli,
						'id_user' => $id,
						'status_fe' => "login"
					);
					$this->session->set_userdata($data_session);
					redirect(base_url("index.php/Utama"));
				}else if($verifikasi == 1){
					$this->session->set_flashdata('data','5');
					redirect(base_url("index.php/Login"));
				}
			}else if($level == 3){
				$akuns = $this->model_login->akun_penjual($id);
				$data1 = $akuns->verifikasi;
				if($data1 == 2){
				$querys = "SELECT * FROM akun_penjual WHERE id_user = '$id'";
				$akun = $this->fe_model->return_result($querys);
				foreach($akun as $sa){
					$id_penjual = $sa->id_penjual;
					$email = $sa->email;
				}	
				$data_session = array(
					'email_penjual' => $email,
					'id_penjual' => $id_penjual,
					'status_pe' => "login"
				);
				$this->session->set_userdata($data_session);
                redirect(base_url("index.php/Penjual/Utama"));
				}else{
					$this->session->set_flashdata('data','2');
					$this->load->view('Frontend/login');
				}
			}
        }
		else{
			$this->session->set_flashdata('data','1');
			$this->load->view('Frontend/login');
	}
	}
	
	public function prosesregis(){
	$this->form_validation->set_rules('nama', 'Name', 'required|max_length[50]|min_length[5]');
	$this->form_validation->set_rules('email', 'Email', 'is_unique[user.email]|max_length[50]|min_length[5]');
	$this->form_validation->set_rules('no_telepon', 'Phone', 'max_length[50]|min_length[5]');
	$this->form_validation->set_rules('password', 'Password', 'required|max_length[15]|min_length[5]');
	$this->form_validation->set_rules('confirm', 'Password', 'matches[password]|required|max_length[15]|min_length[5]');
	
	if ($this->form_validation->run() != FALSE)
	{
		$id = $this->model_login->get_last_id('id_pembeli' , 'akun_pembeli');
        $id_pembeli = ltrim($id->id_pembeli , "PE");
        $id_pembeli = sprintf('%05d' , $id_pembeli + 1);
        $id_pembeli = "PE".$id_pembeli;
		
		$id = $this->model_login->get_last_id('id_user' , 'user');
        $id_user = ltrim($id->id_user , "US");
        $id_user = sprintf('%05d' , $id_user + 1);
        $id_user = "US".$id_user;
		
		$id = $this->model_login->get_last_id('id_saldo' , 'saldo');
        $id_saldo = ltrim($id->id_saldo , "SA");
        $id_saldo = sprintf('%05d' , $id_saldo + 1);
        $id_saldo = "SA".$id_saldo;
		
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$no_telepon = $this->input->post('no_telepon');
		$password = $this->input->post('password');
		
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
			'no_telepon' => $no_telepon,
			'verifikasi' => 1,
		);
		$query_saldo = array(
			'id_saldo' => $id_saldo,
			'id_user' => $id_user,
			'saldo' => '0',
		);
		$this->admin_model->input_data($querys , 'user');
		$this->admin_model->input_data($query , 'akun_pembeli');
		$this->admin_model->input_data($query_saldo , 'saldo');
		
		// Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'ristianaditya35@gmail.com',  // Email gmail
            'smtp_pass'   => 'Lionelmessi123',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];
		
		$data['nama'] = $this->input->post('nama');
		$data['id_user'] = $id_user;
		
		 // Load library email dan konfigurasinya
        $this->load->library('email', $config);
		
        // Email dan nama pengirim
        $this->email->from('CanteenBandung@canteen11.com', 'CanteenBandung@canteen11.com');

        // Email penerima
        $this->email->to($email); // Ganti dengan email tujuan

		$this->email->set_mailtype("html");
        // Subject email
        $this->email->subject('Email Verification');
		
		$view = $this->load->view('Frontend/email', $data, true);
        // Isi email
        $this->email->message($view);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) 
			{
				$this->session->set_flashdata('data','3');
			}else 
			{
				$this->session->set_flashdata('data','4');
			}
		
		$this->session->set_flashdata('data','3');
        redirect(base_url("index.php/Login"));
	}
		else{
			$this->load->view('Frontend/register');

		}
    }
	public function verifikasi(){
		$id_user = $this->uri->segment(3);		
		$data_user = $this->fe_model->jml_data_user($id_user);
		
		if($data_user == 1){
			
			$data_edit = array(
			'verifikasi' => 2
			);

			$this->admin_model->update_data($id_user , $data_edit , 'id_user' , 'akun_pembeli');
			
			$querys = "SELECT * FROM akun_pembeli WHERE id_user = '$id_user'";
			$akun = $this->fe_model->return_result($querys);
				foreach($akun as $a){
					$email = $a->email;
					$id = $a->id_user;
					$id_pembeli = $a->id_pembeli;
					$level = $a->level;
				}
				
				$data_session = array(
					'email' => $email,
					'id_pembeli' => $id_pembeli,
					'id_user' => $id_user,
					'status_fe' => "login"
				);
				$this->session->set_userdata($data_session);
                redirect(base_url("index.php/Utama"));
		}else{
			redirect(base_url("index.php/Login"));
		}
		
        redirect(base_url("index.php/Utama"));
    }
	public function logout(){
		$this->session->unset_userdata('id_pembeli');
		$this->session->unset_userdata('email');
        $this->session->unset_userdata('status_fe');
        redirect(base_url("index.php/Utama"));
    }
	public function logout_penjual(){
		$this->session->unset_userdata('id_penjual');
		$this->session->unset_userdata('email_penjual');
        $this->session->unset_userdata('status_pe');
        redirect(base_url("index.php/Utama"));
    }
	public function logout_admin(){
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('status');
		$this->session->unset_userdata('id_admin');
        redirect(base_url("index.php/Utama"));
    }
}
