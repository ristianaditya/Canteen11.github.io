<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('fe_model');
		$this->load->library('pagination');
	}
	public function detail_produk()
	{
		$data['validasi_checkout1'] = $this->fe_model->validasi_checkout_kantin($this->session->userdata('id_pembeli'));
		$data['validasi_checkout'] = $this->fe_model->validasi_checkout_keranjang($this->session->userdata('id_pembeli'));
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
	public function penilaian()
	{
		$id = $this->fe_model->get_last_id('id_report' , 'report');
		$id_report = ltrim($id->id_report , "REP");
		$id_report = sprintf('%05d' , $id_report + 1);
		$id_report = "REP".$id_report;
		
		$rating = $this->input->post('rating');
		$kantin = $this->fe_model->detail_kantin($this->input->post('id_kantin'));
		$query = array(
						'penilaian' => $rating,
						'id_report' => $id_report,
						'deskripsi' => $this->input->post('deskripsi'),
						'id_kantin' => $this->input->post('id_kantin'),
						'id_pembeli' => $this->session->userdata('id_pembeli')
        				);
		$this->fe_model->input_data($query, 'report');
		$jml_report = $this->fe_model->jml_report($this->session->userdata('id_pembeli'), $this->input->post('id_kantin'));
		$jml_rating = $this->fe_model->jml_rating($this->input->post('id_kantin'));
		$total_penilaian = $jml_rating->penilaian / $jml_report;
		
				$data_edit = array(
						'penilaian' => $total_penilaian,
        				);
		
		$this->fe_model->update_data($this->input->post('id_kantin') , $data_edit , 'id_kantin' , 'data_kantin');
		$this->session->set_flashdata('data','19');
		redirect(base_url('index.php/Produk/produk'));
		
	}
	public function produk()
	{	
		$data['profile'] = $this->fe_model->data_user($this->session->userdata('id_pembeli'));
		$data['riwayat'] = $this->fe_model->riwayat_transaksi($this->session->userdata('id_pembeli'));
		$data['jumlah_payment'] = $this->fe_model->jumlah_payment($this->session->userdata('id_pembeli'));
		$data['total'] = $this->fe_model->total_keranjang($this->session->userdata('id_pembeli'));
		$data['keranjang'] = $this->fe_model->data_keranjang($this->session->userdata('id_pembeli'));
		$data['validasi_checkout1'] = $this->fe_model->validasi_checkout_kantin($this->session->userdata('id_pembeli'));
		$data['validasi_checkout'] = $this->fe_model->validasi_checkout_keranjang($this->session->userdata('id_pembeli'));
		$data['validasi_pesanan'] = $this->fe_model->validasi_pesanan($this->session->userdata('id_pembeli'));
		$data['jumlah'] = $this->fe_model->jumlah_keranjang($this->session->userdata('id_pembeli'));
		$data['detail'] = $this->fe_model->detail_produk($this->uri->segment(3));
		$data['kategori'] = $this->fe_model->data_kategori();
		$data['data'] = $this->fe_model->data_produk();
		$data['kantin'] = $this->fe_model->data_kantin();
		$data['sekolah'] = $this->fe_model->sekolah();
		
		//config
		$config['base_url'] = 'http://localhost/Kantin.Ol/index.php/Produk/produk/';
		$config['total_rows'] = $this->fe_model->get_total("daftar_produk");
		$config['per_page'] = 12;
		
		//styling
		$config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination mb-0">';
		$config['full_tag_close'] = '</ul></nav>';
		
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		
		$config['next_link'] = 'Selanjutnya';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		
		$config['prev_link'] = 'Sebelumnya';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['attributes'] = array('class' => 'page-link');
		
		//initialize
		$this->pagination->initialize($config);
		
		$data['start'] = $this->uri->segment(3);
		$nol=0;	
		$data['data']= $this->fe_model->daftar_produk($config['per_page'], $data['mulai'] = $this->uri->segment(3)-$nol); 
		
		$data['konten'] = "Frontend/produk";
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
				redirect(base_url('index.php/Produk/produk'));
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
			redirect(base_url('index.php/Produk/produk'));
		}
		$where = $this->uri->segment('3');
		$this->fe_model->single_delete('id_dafpes' , $where , 'daftar_pesanan');
		$this->session->set_flashdata('data','3');
		redirect(base_url('index.php/Produk/produk'));
	}
	public function search_produk(){
		$data['validasi_checkout1'] = $this->fe_model->validasi_checkout_kantin($this->session->userdata('id_pembeli'));
		$data['validasi_checkout'] = $this->fe_model->validasi_checkout_keranjang($this->session->userdata('id_pembeli'));
		$data['profile'] = $this->fe_model->data_user($this->session->userdata('id_pembeli'));
		$a = $this->input->post('search');
		$data['riwayat'] = $this->fe_model->riwayat_transaksi($this->session->userdata('id_pembeli'));
		$data['jumlah_payment'] = $this->fe_model->jumlah_payment($this->session->userdata('id_pembeli'));
		$data['data'] = $this->fe_model->search_produk($a);
		$data['total'] = $this->fe_model->total_keranjang($this->session->userdata('id_pembeli'));
		$data['keranjang'] = $this->fe_model->data_keranjang($this->session->userdata('id_pembeli'));
		$data['jumlah'] = $this->fe_model->jumlah_keranjang($this->session->userdata('id_pembeli'));
		$data['detail'] = $this->fe_model->detail_produk($this->uri->segment(3));
		$data['kategori'] = $this->fe_model->data_kategori();
		$data['kantin'] = $this->fe_model->data_kantin();
		$data['sekolah'] = $this->fe_model->sekolah();
		$data['konten'] = "Frontend/search_produk";
		$this->load->view('Frontend/utama2', $data);
	}
	public function filter_produk(){
		$data['validasi_checkout1'] = $this->fe_model->validasi_checkout_kantin($this->session->userdata('id_pembeli'));
		$data['validasi_checkout'] = $this->fe_model->validasi_checkout_keranjang($this->session->userdata('id_pembeli'));
		$data['profile'] = $this->fe_model->data_user($this->session->userdata('id_pembeli'));
		$kantin = $this->input->post('nama_kantin');
			$sekolah = $this->input->post('sekolah');
			$status = $this->input->post('status');
			if($status == "best"){
				$data['data'] = $this->fe_model->filter_produk($kantin, $sekolah, 4);
			}else{
				$data['data'] = $this->fe_model->filter_produk($kantin, $sekolah, 0);
			}
		$data['riwayat'] = $this->fe_model->riwayat_transaksi($this->session->userdata('id_pembeli'));
		$data['jumlah_payment'] = $this->fe_model->jumlah_payment($this->session->userdata('id_pembeli'));
		$data['total'] = $this->fe_model->total_keranjang($this->session->userdata('id_pembeli'));
		$data['keranjang'] = $this->fe_model->data_keranjang($this->session->userdata('id_pembeli'));
		$data['jumlah'] = $this->fe_model->jumlah_keranjang($this->session->userdata('id_pembeli'));
		$data['detail'] = $this->fe_model->detail_produk($this->uri->segment(3));
		$data['kategori'] = $this->fe_model->data_kategori();
		$data['kantin'] = $this->fe_model->data_kantin();
		$data['sekolah'] = $this->fe_model->sekolah();
		$data['konten'] = "Frontend/search_produk";
		$this->load->view('Frontend/utama2', $data);
	}
		public function pengajuan_saldo(){
		
		$validasi_pengajuan = $this->fe_model->validasi_pengajuan($this->session->userdata('id_user'));
		
		if($validasi_pengajuan >= 1){
			$this->session->set_flashdata('data','16');
			redirect(base_url('index.php/Produk/produk'));
		}
		else{
			$foto=$_FILES['foto'];
			if($foto=''){}else{
				$config['upload_path']	= './upload/saldo/';
				$config['allowed_types']	= 'gif|jpg|png|jpeg';

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')) {
					$this->session->set_flashdata('data','18');
					redirect(base_url('index.php/Produk/produk'));
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
				redirect(base_url('index.php/Produk/produk'));
		}
	}
}
?>