<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('fe_model');
		$this->load->model('admin_model');
		$this->load->library('pagination');
	}
		
	public function index()
	{
		$this->load->view('Frontend/pengajuan');
	}
	public function pengajuan(){
		$pengajuan = $this->fe_model->validasi_pengajuan($this->session->userdata('id_pembeli'));
		
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
		
		$id = $this->admin_model->get_last_id('id_kantin' , 'data_kantin');
		$id_kantin = ltrim($id->id_kantin , "K");
		$id_kantin = sprintf('%04d' , $id_kantin + 1);
		$id_kantin = "K".$id_kantin;
		
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$nik = $this->input->post('nik');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$alamat = $this->input->post('alamat');
		$id_sekolah = $this->input->post('sekolah');
		$no_telepon = $this->input->post('no_telepon');
		$password = $this->input->post('confirm');
		
		$foto=$_FILES['foto'];
		if($foto=''){}else{
			$config['upload_path']	= './upload/pengajuan/';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')) {
				$this->session->set_flashdata('data','17');
				redirect(base_url('index.php/Utama/'));
			}else{
				$foto=$this->upload->data('file_name');
			}
		}
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
		$query_kantin = array(
			'id_kantin' => $id_kantin,
			'id_penjual' => $id_penjual,
			'id_sekolah' => $id_sekolah,
			'nama_kantin' => $this->input->post('nama_kantin'),
			'status_kantin' => '1',
		);
		$query = array(
			'id_penjual' => $id_penjual,
			'id_user' => $id_user,
			'nama' => $nama,
			'no_ktp' => $nik,
			'tgl_lahir' => $tgl_lahir,
			'alamat' => $alamat,
			'no_telepon' => $no_telepon,
			'surat_pengajuan' => '/upload/pengajuan/'.$foto,
			'verifikasi' => '1'
		);
		$this->admin_model->input_data($query_user , 'user');
		$this->admin_model->input_data($query , 'akun_penjual');
		$this->admin_model->input_data($query_saldo , 'saldo');
		$this->admin_model->input_data($query_kantin , 'data_kantin');
		$this->session->set_flashdata('data','11');
        redirect(base_url('index.php/Utama'));
	}
    }
?> 