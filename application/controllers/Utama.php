<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('fe_model');
		$this->load->library('pagination');
	}
		
	public function index()
	{	
		$data['validasi_checkout1'] = $this->fe_model->validasi_checkout_kantin($this->session->userdata('id_pembeli'));
		$data['validasi_checkout'] = $this->fe_model->validasi_checkout_keranjang($this->session->userdata('id_pembeli'));
		$data['sekolah'] = $this->fe_model->sekolah();
		$data['profile'] = $this->fe_model->data_user($this->session->userdata('id_pembeli'));
		$data['jumlah_payment'] = $this->fe_model->jumlah_payment($this->session->userdata('id_pembeli'));
		$data['riwayat'] = $this->fe_model->riwayat_transaksi($this->session->userdata('id_pembeli'));
		$data['total'] = $this->fe_model->total_keranjang($this->session->userdata('id_pembeli'));
		$data['keranjang'] = $this->fe_model->data_keranjang($this->session->userdata('id_pembeli'));
		$data['jumlah'] = $this->fe_model->jumlah_keranjang($this->session->userdata('id_pembeli'));
		$data['user'] = $this->fe_model->edit_pembeli($this->session->userdata('id_pembeli'));
		$data['kategori'] = $this->fe_model->data_kategori();
		$data['kantin'] = $this->fe_model->data_kantin_recomended();
		$data['data']= $this->fe_model->new_daftar_produk(); 
		$this->load->view('Frontend/dasboard', $data);
	}
	public function detail_produk()
	{
		$data['validasi_checkout1'] = $this->fe_model->validasi_checkout_kantin($this->session->userdata('id_pembeli'));
		$data['validasi_checkout'] = $this->fe_model->validasi_checkout_keranjang($this->session->userdata('id_pembeli'));
		$data['profile'] = $this->fe_model->data_user($this->session->userdata('id_pembeli'));
		$data['jumlah_payment'] = $this->fe_model->jumlah_payment($this->session->userdata('id_pembeli'));
		$data['riwayat'] = $this->fe_model->riwayat_transaksi($this->session->userdata('id_pembeli'));
		$data['total'] = $this->fe_model->total_keranjang($this->session->userdata('id_pembeli'));
		$data['keranjang'] = $this->fe_model->data_keranjang($this->session->userdata('id_pembeli'));
		$data['jumlah'] = $this->fe_model->jumlah_keranjang($this->session->userdata('id_pembeli'));
		$data['alldetail'] = $this->fe_model->alldetail_produk($this->uri->segment(3));
		$data['data'] = $this->fe_model->detail_produk($this->uri->segment(3));
		$data['kantin'] = $this->fe_model->data_kantin();
		$data['konten'] = "Frontend/detail_produk";
		$this->load->view('Frontend/utama2', $data);
	}
	public function tambah_qty()
	{
		 if($this->session->userdata('status_fe') != "login")
				{
					redirect(base_url("index.php/Login/login"));
				}
					$data = $this->fe_model->data_validasi_keranjang($this->session->userdata('id_pembeli') , $this->uri->segment(4));
					$jumlah_masuk = 1;
					$jumlahtetap = $data->jumlah_pesanan;
					$hasil = $jumlah_masuk + $jumlahtetap;
					$harga = $this->uri->segment(5);
					$total_jumlah = $hasil * $harga;
					
					$data_edit = array(
						'jumlah_pesanan' => $jumlah_masuk + $jumlahtetap,
						'total_harga' => $total_jumlah
        			);
		
					$where = $data->id_dafpes;
					$this->fe_model->update_data($this->uri->segment(3) , $data_edit , 'id_dafpes' , 'daftar_pesanan');
					redirect(base_url('index.php/Utama/chart/'));
	}
	public function kurang_qty()
	{
		 if($this->session->userdata('status_fe') != "login")
				{
					redirect(base_url("index.php/Login/login"));
				}
					$data = $this->fe_model->data_validasi_keranjang($this->session->userdata('id_pembeli') , $this->uri->segment(4));
					$jumlah_masuk = 1;
					$jumlahtetap = $data->jumlah_pesanan;
					$hasil = $jumlahtetap - $jumlah_masuk;
					$harga = $this->uri->segment(5);
					$total_jumlah = $hasil * $harga;
					
					$data_edit = array(
						'jumlah_pesanan' => $jumlahtetap - $jumlah_masuk ,
						'total_harga' => $total_jumlah
        			);
		
					$where = $data->id_dafpes;
					$this->fe_model->update_data($this->uri->segment(3) , $data_edit , 'id_dafpes' , 'daftar_pesanan');
					redirect(base_url('index.php/Utama/chart/'));
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
				redirect(base_url('index.php/Canteen/kantinone/'.$this->uri->segment(4)));
			}
			else if($validasikantin < 1){
				$this->session->set_flashdata('data','6');
				redirect(base_url('index.php/Utama'));
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
					redirect(base_url('index.php/Canteen/kantinone/'.$this->uri->segment(4)));
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
				redirect(base_url('index.php/Canteen/kantinone/'.$this->uri->segment(4)));
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
				redirect(base_url('index.php/Canteen/kantinone/'.$this->uri->segment(4)));
			}
			
	}
	public function chart()
	{	
		 if($this->session->userdata('status_fe') != "login")
        {
            redirect(base_url("index.php/Login/login"));
        }
		$data['data_payment']= $this->fe_model->detpes($this->session->userdata('id_pembeli'));
		$data['validasi_checkout1'] = $this->fe_model->validasi_checkout_kantin($this->session->userdata('id_pembeli'));
		$data['validasi_checkout'] = $this->fe_model->validasi_checkout_keranjang($this->session->userdata('id_pembeli'));
		$data['profile'] = $this->fe_model->data_user($this->session->userdata('id_pembeli'));
		$data['jumlah_payment'] = $this->fe_model->jumlah_payment($this->session->userdata('id_pembeli'));
		$data['riwayat'] = $this->fe_model->riwayat_transaksi($this->session->userdata('id_pembeli'));
		$data['total'] = $this->fe_model->total_keranjang($this->session->userdata('id_pembeli'));
		$data['keranjang'] = $this->fe_model->data_keranjang($this->session->userdata('id_pembeli'));
		$data['jumlah'] = $this->fe_model->jumlah_keranjang($this->session->userdata('id_pembeli'));
		$data['konten'] = "Frontend/chart";
		$this->load->view('Frontend/utama2', $data);
	}
	public function kelola()
	{	
		 if($this->session->userdata('status_fe') != "login")
        {
            redirect(base_url("index.php/Login/login"));
        }
		$data['data_payment']= $this->fe_model->detpes($this->session->userdata('id_pembeli'));
		$data['validasi_checkout1'] = $this->fe_model->validasi_checkout_kantin($this->session->userdata('id_pembeli'));
		$data['validasi_checkout'] = $this->fe_model->validasi_checkout_keranjang($this->session->userdata('id_pembeli'));
		$data['profile'] = $this->fe_model->data_user($this->session->userdata('id_pembeli'));
		$data['jumlah_payment'] = $this->fe_model->jumlah_payment($this->session->userdata('id_pembeli'));
		$data['riwayat'] = $this->fe_model->riwayat_transaksi($this->session->userdata('id_pembeli'));
		$data['total'] = $this->fe_model->total_keranjang($this->session->userdata('id_pembeli'));
		$data['keranjang'] = $this->fe_model->data_keranjang($this->session->userdata('id_pembeli'));
		$data['jumlah'] = $this->fe_model->jumlah_keranjang($this->session->userdata('id_pembeli'));
		$data['konten'] = "Frontend/kelola";
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
			redirect(base_url('index.php/Utama'));	
		}
		$where = $this->uri->segment('3');
		$this->fe_model->single_delete('id_dafpes' , $where , 'daftar_pesanan');
		$this->session->set_flashdata('data','3');
		redirect(base_url('index.php/Utama'));
	}
		public function delete_pesanan_chart(){
		 if($this->session->userdata('status_fe') != "login")
        {
            redirect(base_url("index.php/Login/login"));
        }
		$cek = $this->fe_model->cek_keranjang($this->session->userdata('id_pembeli'));
		if($cek == 1){
			$where = $this->uri->segment('3');
			$this->fe_model->delete_pesanan_akhir($this->session->userdata('id_pembeli'));
			$this->session->set_flashdata('data','3');
			redirect(base_url('index.php/Utama/chart'));	
		}
		$where = $this->uri->segment('3');
		$this->fe_model->single_delete('id_dafpes' , $where , 'daftar_pesanan');
		$this->session->set_flashdata('data','3');
		redirect(base_url('index.php/Utama/chart'));
	}
	public function data_makanan_user(){
		 $data = $this->fe_model->data_keranjang($this->session->userdata('id_pembeli'));
		 echo json_encode($data);
	} 
	public function search_produk(){
		$a = $this->input->post('search');
		$data['validasi_checkout1'] = $this->fe_model->validasi_checkout_kantin($this->session->userdata('id_pembeli'));
		$data['validasi_checkout'] = $this->fe_model->validasi_checkout_keranjang($this->session->userdata('id_pembeli'));
		$data['profile'] = $this->fe_model->data_user($this->session->userdata('id_pembeli'));
		$data['riwayat'] = $this->fe_model->riwayat_transaksi($this->session->userdata('id_pembeli'));
		$data['jumlah_payment'] = $this->fe_model->jumlah_payment($this->session->userdata('id_pembeli'));
		$data['data'] = $this->fe_model->search_produk($a);
		$data['total'] = $this->fe_model->total_keranjang($this->session->userdata('id_pembeli'));
		$data['keranjang'] = $this->fe_model->data_keranjang($this->session->userdata('id_pembeli'));
		$data['jumlah'] = $this->fe_model->jumlah_keranjang($this->session->userdata('id_pembeli'));
		$data['detail'] = $this->fe_model->detail_produk($this->uri->segment(3));
		$data['kategori'] = $this->fe_model->data_kategori();
		$data['kantin'] = $this->fe_model->data_kantin();
		$data['konten'] = "Frontend/search_produk";
		$this->load->view('Frontend/utama2', $data);
	}
	public function checkout(){
		 
		if($this->session->userdata('status_fe') != "login")
        {
            redirect(base_url("index.php/Login/login"));
        }
		
		$this->form_validation->set_rules('alamat', 'Lokasi', 'required');
	
		if ($this->form_validation->run() == TRUE)
		{
			$jumlah_payment = $this->fe_model->jumlah_payment($this->session->userdata('id_pembeli'));
			$validasi1 = $this->fe_model->validasi_payment($this->session->userdata('id_pembeli'));
			if($jumlah_payment >= 1) {
				$this->session->set_flashdata('data','10');
				redirect(base_url('index.php/Utama/chart'));
			}else if($validasi1 >= 1)
				{
					$this->session->set_flashdata('data','7');
					redirect(base_url('index.php/Produk'));
				}else {
					$lokasi = $this->input->post('alamat');    
					$id_kantin = $this->uri->segment(3);    
					$method = $this->input->post('payment');    
					$ongkir = $this->input->post('ongkir');    
					$jarak = $this->input->post('jarak');    
					$pembeli = $this->session->userdata('id_pembeli');
					if(empty($this->uri->segment(3))){
						$this->session->set_flashdata('data','15');
						redirect(base_url('index.php/Utama/chart'));
					}
					if($method == 1){
						$payment = $this->fe_model->total_payment($this->session->userdata('id_pembeli'));
						$profile = $this->fe_model->data_user($this->session->userdata('id_pembeli'));

						if($profile->saldo >= $ongkir + $payment->jumlah ){
							$profile= $this->fe_model->data_user($this->session->userdata('id_pembeli'));
							$pesanan1= $this->fe_model->data_user_pesanan($this->session->userdata('id_pembeli'));
							$total= $this->fe_model->total_keranjang($this->session->userdata('id_pembeli'));
							$this->fe_model->checkout($lokasi,$method,$pembeli,$ongkir,$jarak,$id_kantin); 
							$this->session->set_flashdata('data','7');
							redirect(base_url('index.php/Payment'));

						}else {
							$this->session->set_flashdata('data','14');
							redirect(base_url('index.php/Utama/chart'));
						}
					}else{
						$this->fe_model->checkout($lokasi,$method,$pembeli,$ongkir,$jarak,$id_kantin); 
						$this->session->set_flashdata('data','7');
						redirect(base_url('index.php/Payment'));
					}
				}
		}
		else{
			$this->session->set_flashdata('data','9');
			redirect(base_url('index.php/Utama/chart'));
		}
	}
	public function pengajuan_saldo(){
		
		$validasi_pengajuan = $this->fe_model->validasi_pengajuan($this->session->userdata('id_user'));
		
		if($validasi_pengajuan >= 1){
			$this->session->set_flashdata('data','15');
			redirect(base_url('index.php/Utama'));
		}
		else{
			$foto=$_FILES['foto'];
			if($foto=''){}else{
				$config['upload_path']	= './upload/saldo/';
				$config['allowed_types']	= 'gif|jpg|png|jpeg';

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')) {
					$this->session->set_flashdata('data','17');
					redirect(base_url('index.php/Utama'));
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
				$this->session->set_flashdata('data','16');
				redirect(base_url('index.php/Utama'));
		}
	}
}
?>