<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('fe_model');
		$this->load->library('pagination');
	}
	public function contact()
	{	
		$data['validasi_checkout1'] = $this->fe_model->validasi_checkout_kantin($this->session->userdata('id_pembeli'));
		$data['validasi_checkout'] = $this->fe_model->validasi_checkout_keranjang($this->session->userdata('id_pembeli'));
		$data['profile'] = $this->fe_model->data_user($this->session->userdata('id_pembeli'));
		$data['riwayat'] = $this->fe_model->riwayat_transaksi($this->session->userdata('id_pembeli'));
		$data['jumlah_payment'] = $this->fe_model->jumlah_payment($this->session->userdata('id_pembeli'));
		$data['total'] = $this->fe_model->total_keranjang($this->session->userdata('id_pembeli'));
		$data['keranjang'] = $this->fe_model->data_keranjang($this->session->userdata('id_pembeli'));
		$data['jumlah'] = $this->fe_model->jumlah_keranjang($this->session->userdata('id_pembeli'));
		$data['kantin'] = $this->fe_model->data_kantin();
		$data['konten'] = "Frontend/contact";
		$this->load->view('Frontend/utama2', $data);
	}
	public function message(){
		
			$id = $this->fe_model->get_last_id('id_request' , 'request');
			$id_request = ltrim($id->id_request , "RE");
			$id_request = sprintf('%05d' , $id_request + 1);
			$id_request = "RE".$id_request;
		
		$query = array(
		'id_request' => $id_request,
		'email' => $this->input->post('email'),
		'pesan' => $this->input->post('msg')
		);
		$this->fe_model->input_data($query , 'request');
		$this->session->set_flashdata('data','1');
		redirect(base_url('index.php/Contact/contact'));
	}
	public function delete_pesanan(){
		 if($this->session->userdata('status_fe') != "login")
        {
            redirect(base_url("index.php/Login/login"));
        }
		$cek = $this->fe_model->cek_keranjang($this->session->userdata('id_pembeli'));
		if($cek == 1){
			$where = $this->uri->segment('3');
			$this->fe_model->delete_pesanan_akhir($this->session->userdata('id_pembeli'));
			$this->session->set_flashdata('data','3');
			redirect(base_url('index.php/Contact/contact'));
		}
		$where = $this->uri->segment('3');
		$this->fe_model->single_delete('id_dafpes' , $where , 'daftar_pesanan');
		$this->session->set_flashdata('data','3');
		redirect(base_url('index.php/Contact/contact'));
	}
		public function pengajuan_saldo(){
		
		$validasi_pengajuan = $this->fe_model->validasi_pengajuan($this->session->userdata('id_user'));
		
		if($validasi_pengajuan >= 1){
			$this->session->set_flashdata('data','16');
			redirect(base_url('index.php/Contact/contact'));
		}
		else{
			$foto=$_FILES['foto'];
			if($foto=''){}else{
				$config['upload_path']	= './upload/saldo/';
				$config['allowed_types']	= 'gif|jpg|png|jpeg';

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')) {
					$this->session->set_flashdata('data','18');
					redirect(base_url('index.php/Contact/contact'));
				}else{
					$foto=$this->upload->data('file_name');
				}
			}

				$query = array(
				'id_user' => $this->session->userdata('id_user'),
				'bukti' => '/upload/saldo/'.$foto,
				'nominal' => $this->input->post('nominal')
				);
				$this->fe_model->input_data($query , 'pengajuan_saldo');
				$this->session->set_flashdata('data','17');
				redirect(base_url('index.php/Contact/contact'));
		}
	}
}
?>