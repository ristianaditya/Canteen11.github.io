<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		 if($this->session->userdata('status_fe') != "login")
        {
            redirect(base_url("index.php/Login/login"));
        }
		$this->load->model('fe_model');
		$this->load->library('pagination');
	}
	public function index(){
		$validasi = $this->fe_model->jumlah_payment($this->session->userdata('id_pembeli'));
		 if($validasi == 0)
        {
			 redirect(base_url("index.php/Produk/produk"));
        }
		$data['pesanan'] = $this->fe_model->pesanan($this->session->userdata('id_pembeli'));
		$data['validasi_checkout1'] = $this->fe_model->validasi_checkout_kantin($this->session->userdata('id_pembeli'));
		$data['validasi_checkout'] = $this->fe_model->validasi_checkout_keranjang($this->session->userdata('id_pembeli'));
		$data['profile'] = $this->fe_model->data_user($this->session->userdata('id_pembeli'));
		$data['riwayat'] = $this->fe_model->riwayat_transaksi($this->session->userdata('id_pembeli'));
		$data['jumlah_payment'] = $this->fe_model->jumlah_payment($this->session->userdata('id_pembeli'));
		$data['total'] = $this->fe_model->total_keranjang($this->session->userdata('id_pembeli'));
		$data['payment'] = $this->fe_model->total_payment($this->session->userdata('id_pembeli'));
		$data['keranjang'] = $this->fe_model->data_keranjang($this->session->userdata('id_pembeli'));
		$data['jumlah'] = $this->fe_model->jumlah_keranjang($this->session->userdata('id_pembeli'));
		$data['kantin'] = $this->fe_model->data_kantin();
		$data['data_payment']= $this->fe_model->payment($this->session->userdata('id_pembeli'));
		$data['konten'] = "Frontend/payment";
		$this->load->view('Frontend/utama2', $data);
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
			redirect(base_url('index.php/Payment'));
		}
		$where = $this->uri->segment('3');
		$this->fe_model->single_delete('id_dafpes' , $where , 'daftar_pesanan');
		$this->session->set_flashdata('data','3');
		redirect(base_url('index.php/Payment'));
	}
	public function cancel(){   
        $pembeli = $this->session->userdata('id_pembeli');
        
        $this->fe_model->cancel_pesanan($this->uri->segment(3)); 
		$this->session->set_flashdata('data','8');
		redirect(base_url('index.php/Produk/produk'));
	}
	public function konfirm(){   
        $pembeli = $this->session->userdata('id_pembeli');
        
		$id = $this->fe_model->get_last_id('id_transaksi' , 'transaksi');
		$id_transaksi = ltrim($id->id_transaksi , "TR");
		$id_transaksi = sprintf('%05d' , $id_transaksi + 1);
		$id_transaksi = "TR".$id_transaksi;
		
		$pesanan = $this->fe_model->pesanan($this->session->userdata('id_pembeli'));
		$pesanan_pembeli = $this->fe_model->pesanan_pembeli($this->session->userdata('id_user'));
		
		if($pesanan->method == 1){
		$saldo_kantin = $this->fe_model->data_kantin_saldo($this->uri->segment(3));
		$data_edit = array(
			'saldo' => $this->uri->segment(4) + $pesanan->saldo,
		);  
		$data_edit_pembeli = array(
			'saldo' => $pesanan_pembeli->saldo - $this->uri->segment(4),
		);  
			$this->fe_model->update_data($pesanan->id_saldo, $data_edit , 'id_saldo' , 'saldo');
			$this->fe_model->update_data($pesanan_pembeli->id_saldo, $data_edit_pembeli , 'id_saldo' , 'saldo');
			$query = array(
			'id_transaksi' => $id_transaksi,
			'id_kantin' => $this->uri->segment(3),
			'id_pembeli' => $pembeli,
			'tanggal' => date('Y-m-d'),
			'total_harga' => $this->uri->segment(4)
			);
			$this->fe_model->input_data($query , 'transaksi');
			$this->fe_model->konfirm_pesanan($this->session->userdata('id_pembeli'), $id_transaksi);
			$this->session->set_flashdata('data','12');
			redirect(base_url('index.php/Produk/produk'));
		}
		$query = array(
		'id_transaksi' => $id_transaksi,
		'id_kantin' => $this->uri->segment(3),
		'id_pembeli' => $pembeli,
		'tanggal' => date('Y-m-d'),
		'total_harga' => $this->uri->segment(4)
		);
		$this->fe_model->input_data($query , 'transaksi');
        $this->fe_model->konfirm_pesanan($this->session->userdata('id_pembeli'), $id_transaksi);
		$this->session->set_flashdata('data','12');
		$this->session->set_flashdata('kantin', $this->uri->segment(3));
		redirect(base_url('index.php/Produk/produk'));
	}
	public function riwayat_pdf(){
		$this->load->library('pdf');
		$data['data'] = $this->fe_model->riwayat_pdf($this->session->userdata('id_pembeli'));;
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "Riwayat Transaksi.pdf";
		$this->pdf->load_view('riwayat_pdf', $data);
	}
		public function laporan_pdf(){
		$this->load->library('pdf');
		$data['profile'] = $this->fe_model->data_user($this->session->userdata('id_pembeli'));
		$data['jumlah_payment'] = $this->fe_model->jumlah_payment($this->session->userdata('id_pembeli'));
		$data['total'] = $this->fe_model->total_keranjang($this->session->userdata('id_pembeli'));
		$data['payment'] = $this->fe_model->total_payment($this->session->userdata('id_pembeli'));
		$data['jumlah'] = $this->fe_model->jumlah_keranjang($this->session->userdata('id_pembeli'));
		$data['kantin'] = $this->fe_model->data_kantin();
		$data['data_payment']= $this->fe_model->payment($this->session->userdata('id_pembeli'));
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "Invoice.pdf";
		$this->pdf->load_view('laporan_pdf', $data);
	}
	
		public function pengajuan_saldo(){
		
		$validasi_pengajuan = $this->fe_model->validasi_pengajuan($this->session->userdata('id_user'));
		
		if($validasi_pengajuan >= 1){
			$this->session->set_flashdata('data','16');
			rredirect(base_url('index.php/Payment'));
		}
		else{
			$foto=$_FILES['foto'];
			if($foto=''){}else{
				$config['upload_path']	= './upload/saldo/';
				$config['allowed_types']	= 'gif|jpg|png|jpeg';

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')) {
					$this->session->set_flashdata('data','18');
					redirect(base_url('index.php/Payment'));
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
				redirect(base_url('index.php/Payment'));
		}
	}
}
?>