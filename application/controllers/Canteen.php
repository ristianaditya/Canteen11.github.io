<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Canteen extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('fe_model');
		$this->load->library('pagination');
	}
	public function detail_produk()
	{
		$data['validasi_checkout'] = $this->fe_model->validasi_checkout_keranjang($this->session->userdata('id_pembeli'));
		$data['validasi_checkout1'] = $this->fe_model->validasi_checkout_kantin($this->session->userdata('id_pembeli'));
		$data['profile'] = $this->fe_model->data_user($this->session->userdata('id_pembeli'));
		$data['riwayat'] = $this->fe_model->riwayat_transaksi($this->session->userdata('id_pembeli'));
		$data['jumlah_payment'] = $this->fe_model->jumlah_payment($this->session->userdata('id_pembeli'));
		$data['total'] = $this->fe_model->total_keranjang($this->session->userdata('id_pembeli'));
		$data['keranjang'] = $this->fe_model->data_keranjang($this->session->userdata('id_pembeli'));
		$data['jumlah'] = $this->fe_model->jumlah_keranjang($this->session->userdata('id_pembeli'));
		$data['alldetail'] = $this->fe_model->alldetail_produk($this->uri->segment(3));
		$data['data'] = $this->fe_model->detail_produk($this->uri->segment(3));
		$data['kantin'] = $this->fe_model->data_kantin();
		$data['konten'] = "Frontend/detail_produk";
		$this->load->view('Frontend/utama2', $data);
	}
	public function search_kantin(){
			$a = $this->input->post('search');
			$data['validasi_checkout1'] = $this->fe_model->validasi_checkout_kantin($this->session->userdata('id_pembeli'));
			$data['validasi_checkout'] = $this->fe_model->validasi_checkout_keranjang($this->session->userdata('id_pembeli'));
			$data['profile'] = $this->fe_model->data_user($this->session->userdata('id_pembeli'));
			$data['riwayat'] = $this->fe_model->riwayat_transaksi($this->session->userdata('id_pembeli'));
			$data['jumlah_payment'] = $this->fe_model->jumlah_payment($this->session->userdata('id_pembeli'));
			$data['total'] = $this->fe_model->total_keranjang($this->session->userdata('id_pembeli'));
			$data['keranjang'] = $this->fe_model->data_keranjang($this->session->userdata('id_pembeli'));
			$data['jumlah'] = $this->fe_model->jumlah_keranjang($this->session->userdata('id_pembeli'));
			$data['kantin'] = $this->fe_model->search_kantin($a);
			$data['sekolah'] = $this->fe_model->sekolah();
			$data['konten'] = "Frontend/kantin";
			$this->load->view('Frontend/utama2', $data);
	}
	public function filter_kantin(){
			$kantin = $this->input->post('nama_kantin');
			$sekolah = $this->input->post('sekolah');
			$status = $this->input->post('status');
			if($status == "best"){
				$data['kantin'] = $this->fe_model->filter_kantin($kantin, $sekolah, 4);
			}else{
				$data['kantin'] = $this->fe_model->filter_kantin($kantin, $sekolah, 0);
			}
			$data['validasi_checkout1'] = $this->fe_model->validasi_checkout_kantin($this->session->userdata('id_pembeli'));
			$data['validasi_checkout'] = $this->fe_model->validasi_checkout_keranjang($this->session->userdata('id_pembeli'));
			$data['profile'] = $this->fe_model->data_user($this->session->userdata('id_pembeli'));
			$data['riwayat'] = $this->fe_model->riwayat_transaksi($this->session->userdata('id_pembeli'));
			$data['jumlah_payment'] = $this->fe_model->jumlah_payment($this->session->userdata('id_pembeli'));
			$data['total'] = $this->fe_model->total_keranjang($this->session->userdata('id_pembeli'));
			$data['keranjang'] = $this->fe_model->data_keranjang($this->session->userdata('id_pembeli'));
			$data['jumlah'] = $this->fe_model->jumlah_keranjang($this->session->userdata('id_pembeli'));
			$data['sekolah'] = $this->fe_model->sekolah();
			$data['konten'] = "Frontend/kantin";
			$this->load->view('Frontend/utama2', $data);
	}
	public function kantin()
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
		$data['sekolah'] = $this->fe_model->sekolah();
		$data['konten'] = "Frontend/kantin";
		$this->load->view('Frontend/utama2', $data);
	}
	public function kantinone()
	{	
		$data['validasi_checkout1'] = $this->fe_model->validasi_checkout_kantin($this->session->userdata('id_pembeli'));
		$data['validasi_checkout'] = $this->fe_model->validasi_checkout_keranjang($this->session->userdata('id_pembeli'));
		$data['profile'] = $this->fe_model->data_user($this->session->userdata('id_pembeli'));
		$data['riwayat'] = $this->fe_model->riwayat_transaksi($this->session->userdata('id_pembeli'));
		$data['jumlah_payment'] = $this->fe_model->jumlah_payment($this->session->userdata('id_pembeli'));
		$data['kategori'] = $this->fe_model->data_kategori();
		$data['data'] = $this->fe_model->data_produk();
		$data['total'] = $this->fe_model->total_keranjang($this->session->userdata('id_pembeli'));
		$data['keranjang'] = $this->fe_model->data_keranjang($this->session->userdata('id_pembeli'));
		$data['jumlah'] = $this->fe_model->jumlah_keranjang($this->session->userdata('id_pembeli'));
		$data['produk'] = $this->fe_model->produk_kantin($this->uri->segment(3));
		$data['kantin'] = $this->fe_model->data_kantin();
		$data['detail'] = $this->fe_model->detail_kantin($this->uri->segment(3));
		$data['konten'] = "Frontend/kantinone";
		$this->load->view('Frontend/utama2', $data);
	}
	
	public function masuk_keranjang()
	{		
			 if($this->session->userdata('status_fe') != "login")
				{
					redirect(base_url("index.php/Login/login"));
				}
			
			$validasi = $this->fe_model->validasi_keranjang($this->session->userdata('id_pembeli') , $this->uri->segment(3));
			$cek = $this->fe_model->cek_keranjang($this->session->userdata('id_pembeli'));
			$validasikantin = $this->fe_model->validasi_kantin_keranjang($this->session->userdata('id_pembeli') , $this->input->post('id_kantin'));
			$link = $this->uri->segment(4);
			if($cek == 0){
				
				$id = $this->fe_model->get_last_id('id_dafpes' , 'daftar_pesanan');
				$id_dafpes = ltrim($id->id_dafpes , "DAF");
				$id_dafpes = sprintf('%05d' , $id_dafpes + 1);
				$id_dafpes = "DAF".$id_dafpes;
				
				$id = $this->fe_model->get_last_id('id_pesanan' , 'pesanan');
				$id_pesanan = ltrim($id->id_pesanan , "AN");
				$id_pesanan = sprintf('%05d' , $id_pesanan + 1);
				$id_pesanan = "AN".$id_pesanan;

				$jumlah = $this->input->post('jumlah');
				$pembeli = $this->session->userdata('id_pembeli');
				$harga = $this->input->post('harga');
				$desc = $this->input->post('desc');
				$total = $jumlah*$harga;

				$query_pesanan = array(
				'id_pesanan' => $id_pesanan,
				'id_pembeli' => $pembeli,
				'status' => '1',
				'tanggal' => date('y-m-d'),
				);
				
				$query = array(
				'id_dafpes' => $id_dafpes,
				'id_pesanan' => $id_pesanan,
				'jumlah_pesanan' => $jumlah,
				'id_produk' => $this->uri->segment(3),
				'total_harga' => $total,
				'deskripsi' => $desc,
				);
				$this->fe_model->input_data($query_pesanan , 'pesanan');
				$this->fe_model->input_data($query , 'daftar_pesanan');
				$this->session->set_flashdata('data','2');
				redirect(base_url('index.php/Canteen/kantinone/'.$link.'/1'));
			}
			else if($validasikantin < 1){
				$this->session->set_flashdata('data','6');
				redirect(base_url('index.php/Canteen/kantinone/'.$link.'/1'));
			}
			else if($validasi >= 1)
			{
					$data = $this->fe_model->data_validasi_keranjang($this->session->userdata('id_pembeli') , $this->uri->segment(3));
					$jumlah_masuk = $this->input->post('jumlah');
					$jumlahtetap = $data->jumlah_pesanan;
					$hasil = $jumlah_masuk + $jumlahtetap;
					$harga = $this->input->post('harga');
					$total_jumlah = $hasil * $harga;
					
					$data_edit = array(
						'jumlah_pesanan' => $jumlah_masuk + $jumlahtetap,
						'total_harga' => $total_jumlah
        			);
					$where = $data->id_dafpes;
					$this->fe_model->update_data($where , $data_edit , 'id_dafpes' , 'daftar_pesanan');
					$this->session->set_flashdata('data','2');
					redirect(base_url('index.php/Canteen/kantinone/'.$link.'/1'));
			}else if($cek >= 1){
				
				$id = $this->fe_model->get_last_id('id_dafpes' , 'daftar_pesanan');
				$id_dafpes = ltrim($id->id_dafpes , "DAF");
				$id_dafpes = sprintf('%05d' , $id_dafpes + 1);
				$id_dafpes = "DAF".$id_dafpes;
				
				$id_pesanan = $this->fe_model->id_pesanan($this->session->userdata('id_pembeli'));

				$jumlah = $this->input->post('jumlah');
				$pembeli = $this->session->userdata('id_pembeli');
				$harga = $this->input->post('harga');
				$desc = $this->input->post('desc');
				$total = $jumlah*$harga;
				
				$query = array(
				'id_dafpes' => $id_dafpes,
				'id_pesanan' => $id_pesanan->id_pesanan,
				'jumlah_pesanan' => $jumlah,
				'id_produk' => $this->uri->segment(3),
				'total_harga' => $total,
				'deskripsi' => $desc,
				);
				
				$this->fe_model->input_data($query , 'daftar_pesanan');
				$this->session->set_flashdata('data','2');
				redirect(base_url('index.php/Canteen/kantinone/'.$link.'/1'));
			}
			else
			{
				$id = $this->fe_model->get_last_id('id_dafpes' , 'daftar_pesanan');
				$id_dafpes = ltrim($id->id_dafpes , "DAF");
				$id_dafpes = sprintf('%05d' , $id_dafpes + 1);
				$id_dafpes = "DAF".$id_dafpes;
				
				$id = $this->fe_model->get_last_id('id_pesanan' , 'pesanan');
				$id_pesanan = ltrim($id->id_pesanan , "AN");
				$id_pesanan = sprintf('%05d' , $id_pesanan + 1);
				$id_pesanan = "AN".$id_pesanan;

				$jumlah = $this->input->post('jumlah');
				$pembeli = $this->session->userdata('id_pembeli');
				$harga = $this->input->post('harga');
				$desc = $this->input->post('desc');
				$total = $jumlah*$harga;
				
				$query = array(
				'id_dafpes' => $id_dafpes,
				'id_pesanan' => $id_pesanan,
				'jumlah_pesanan' => $jumlah,
				'id_produk' => $this->uri->segment(3),
				'total_harga' => $total,
				'deskripsi' => $desc,
				);
				$this->fe_model->input_data($query , 'daftar_pesanan');
				$this->session->set_flashdata('data','2');
				redirect(base_url('index.php/Canteen/kantinone/'.$link.'/1'));
			}
			
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
			$detail = $this->uri->segment('4');
			if($this->session->flashdata('kantins') == 'detail_produk'){
				redirect(base_url('index.php/Canteen/kantinone/'.$this->session->flashdata('details')));
			}else if ($this->session->flashdata('detail') == 'kantin'){
				redirect(base_url('index.php/Canteen/kantin/'));
			}else {
				redirect(base_url('index.php/Canteen/kantinone/'.$detail));
			}
		}
		$where = $this->uri->segment('3');
		$this->fe_model->single_delete('id_dafpes' , $where , 'daftar_pesanan');
		$this->session->set_flashdata('data','3');
		$detail = $this->uri->segment('4');
		if($this->session->flashdata('kantins') == 'detail_produk'){
			redirect(base_url('index.php/Canteen/kantinone/'.$this->session->flashdata('details')));
			}else if ($this->session->flashdata('detail') == 'kantin'){
				redirect(base_url('index.php/Canteen/kantin/'));
			}else {
				redirect(base_url('index.php/Canteen/kantinone/'.$detail));
			}
	}
	public function search_produk_kantin()
	{	
		$data['validasi_checkout1'] = $this->fe_model->validasi_checkout_kantin($this->session->userdata('id_pembeli'));
		$data['validasi_checkout'] = $this->fe_model->validasi_checkout_keranjang($this->session->userdata('id_pembeli'));
		$data['profile'] = $this->fe_model->data_user($this->session->userdata('id_pembeli'));
		$data['riwayat'] = $this->fe_model->riwayat_transaksi($this->session->userdata('id_pembeli'));
		$data['jumlah_payment'] = $this->fe_model->jumlah_payment($this->session->userdata('id_pembeli'));
		$data['kategori'] = $this->fe_model->data_kategori();
		$a = $this->input->post('search');
		$data['produk'] = $this->fe_model->search_produk_kantin($a,$this->uri->segment(3));
		$data['total'] = $this->fe_model->total_keranjang($this->session->userdata('id_pembeli'));
		$data['keranjang'] = $this->fe_model->data_keranjang($this->session->userdata('id_pembeli'));
		$data['jumlah'] = $this->fe_model->jumlah_keranjang($this->session->userdata('id_pembeli'));
		$data['kantin'] = $this->fe_model->data_kantin();
		$data['detail'] = $this->fe_model->detail_kantin($this->uri->segment(3));
		$data['konten'] = "Frontend/kantinone";
		$this->load->view('Frontend/utama2', $data);
	}
		public function pengajuan_saldo(){
		
		$validasi_pengajuan = $this->fe_model->validasi_pengajuan($this->session->userdata('id_user'));
		
		if($validasi_pengajuan >= 1){
			$this->session->set_flashdata('data','16');
			redirect(base_url('index.php/Canteen/kantin'));
		}
		else{
			$foto=$_FILES['foto'];
			if($foto=''){}else{
				$config['upload_path']	= './upload/saldo/';
				$config['allowed_types']	= 'gif|jpg|png|jpeg';

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')) {
					$this->session->set_flashdata('data','18');
					redirect(base_url('index.php/Canteen/kantin'));
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
				redirect(base_url('index.php/Canteen/kantin'));
		}
	}
}
?>