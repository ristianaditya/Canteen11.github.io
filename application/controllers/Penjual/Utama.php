<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Utama extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		 if($this->session->userdata('status_pe') != "login")
        {
            redirect(base_url("index.php/Login/login"));
        }
		$this->load->model('model_login');
		$this->load->model('penjual_model');
		$this->load->model('fe_model');
	}

    public function index(){
		$data['jml_pesanan'] = $this->penjual_model->get_pesanan($this->session->userdata('id_penjual'));
		$data['jml_proses'] = $this->penjual_model->get_proses_pesanan($this->session->userdata('id_penjual'));
		$data['profile'] = $this->penjual_model->data_user($this->session->userdata('id_penjual'));
		$data['produk'] = $this->penjual_model->get_total_produk($this->session->userdata('id_penjual'));
		$data['transaksi'] = $this->penjual_model->get_bulan($this->session->userdata('id_penjual'));
		$data['omset'] = $this->penjual_model->data_omset_new($this->session->userdata('id_penjual'));
		$data['januari'] = $this->penjual_model->data_omset_bulan($this->session->userdata('id_penjual'),'01');
		$data['februari'] = $this->penjual_model->data_omset_bulan($this->session->userdata('id_penjual'),'02');
		$data['maret'] = $this->penjual_model->data_omset_bulan($this->session->userdata('id_penjual'),'03');
		$data['april'] = $this->penjual_model->data_omset_bulan($this->session->userdata('id_penjual'),'04');
		$data['mei'] = $this->penjual_model->data_omset_bulan($this->session->userdata('id_penjual'),'05');
		$data['juni'] = $this->penjual_model->data_omset_bulan($this->session->userdata('id_penjual'),'06');
		$data['juli'] = $this->penjual_model->data_omset_bulan($this->session->userdata('id_penjual'),'07');
		$data['agustus'] = $this->penjual_model->data_omset_bulan($this->session->userdata('id_penjual'),'08');
		$data['september'] = $this->penjual_model->data_omset_bulan($this->session->userdata('id_penjual'),'09');
		$data['oktober'] = $this->penjual_model->data_omset_bulan($this->session->userdata('id_penjual'),'10');
		$data['november'] = $this->penjual_model->data_omset_bulan($this->session->userdata('id_penjual'),'11');
		$data['desember'] = $this->penjual_model->data_omset_bulan($this->session->userdata('id_penjual'),'12');
		$data['januari1'] = $this->penjual_model->get_bulan_grafik("01", $this->session->userdata('id_penjual'));
		$data['februari1'] = $this->penjual_model->get_bulan_grafik("02", $this->session->userdata('id_penjual'));
		$data['maret1'] = $this->penjual_model->get_bulan_grafik("03", $this->session->userdata('id_penjual'));
		$data['april1'] = $this->penjual_model->get_bulan_grafik("04", $this->session->userdata('id_penjual'));
		$data['mei1'] = $this->penjual_model->get_bulan_grafik("05", $this->session->userdata('id_penjual'));
		$data['juni1'] = $this->penjual_model->get_bulan_grafik("06", $this->session->userdata('id_penjual'));
		$data['juli1'] = $this->penjual_model->get_bulan_grafik("07", $this->session->userdata('id_penjual'));
		$data['agustus1'] = $this->penjual_model->get_bulan_grafik("08", $this->session->userdata('id_penjual'));
		$data['september1'] = $this->penjual_model->get_bulan_grafik("09", $this->session->userdata('id_penjual'));
		$data['oktober1'] = $this->penjual_model->get_bulan_grafik("10", $this->session->userdata('id_penjual'));
		$data['november1'] = $this->penjual_model->get_bulan_grafik("11", $this->session->userdata('id_penjual'));
		$data['desember1'] = $this->penjual_model->get_bulan_grafik("12", $this->session->userdata('id_penjual'));
		$data['januari12'] = $this->penjual_model->get_perbandingan_grafik();
        $data['konten'] = "penjual/Utama";
        $this->load->view('penjual/load' , $data);
    }

    public function edit_profile(){
		$data['jml_pesanan'] = $this->penjual_model->get_pesanan($this->session->userdata('id_penjual'));
		$data['jml_proses'] = $this->penjual_model->get_proses_pesanan($this->session->userdata('id_penjual'));
		$data['profile'] = $this->penjual_model->data_user($this->session->userdata('id_penjual'));
		$data['user'] = $this->penjual_model->user($this->session->userdata('id_penjual'));
		$data['kantin'] = $this->penjual_model->data_kantin($this->session->userdata('id_penjual'));
        $data['konten'] = "penjual/profile";
        $this->load->view('penjual/load' , $data);
    }
	 public function produk(){
		$this->load->library('pagination');
		$data['jml_pesanan'] = $this->penjual_model->get_pesanan($this->session->userdata('id_penjual'));
		$data['jml_proses'] = $this->penjual_model->get_proses_pesanan($this->session->userdata('id_penjual'));
		//config
		$config['base_url'] = 'http://localhost/Kantin.Ol/index.php/Penjual/Utama/produk/';
		$config['total_rows'] = $this->penjual_model->jml_produk($this->session->userdata('id_penjual'));
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
		
		$config['next_link'] = '<i class="ni ni-bold-right "></i> ';
		$config['next_tag_open'] = '<li class="page-item active">';
		$config['next_tag_close'] = '</li>';
		
		$config['prev_link'] = ' <i class="ni ni-bold-left "></i> ';
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
		$data['profile'] = $this->penjual_model->data_user($this->session->userdata('id_penjual'));
		$data['produk'] = $this->penjual_model->daftar_produk($this->session->userdata('id_penjual'), $config['per_page'], $data['start']-0);
        $data['konten'] = "penjual/daftar_produk";
        $this->load->view('penjual/load' , $data);
    }
    public function search_produk(){
		$data['jml_pesanan'] = $this->penjual_model->get_pesanan($this->session->userdata('id_penjual'));
		$data['jml_proses'] = $this->penjual_model->get_proses_pesanan($this->session->userdata('id_penjual'));
		$a = $this->input->post('search');
		$data['profile'] = $this->penjual_model->data_user($this->session->userdata('id_penjual'));
		$data['produk'] = $this->penjual_model->search_produk($a, $this->session->userdata('id_penjual'));
		$data['konten'] = "penjual/search_produk";
        $this->load->view('penjual/load' , $data);
	}
	public function search_pesanan(){
		$data['jml_pesanan'] = $this->penjual_model->get_pesanan($this->session->userdata('id_penjual'));
		$data['jml_proses'] = $this->penjual_model->get_proses_pesanan($this->session->userdata('id_penjual'));
		$a = $this->input->post('search');
		$data['profile'] = $this->penjual_model->data_user($this->session->userdata('id_penjual'));
		$data['pesanan'] = $this->penjual_model->search_pesanan($a, $this->session->userdata('id_penjual'));
		$data['konten'] = "penjual/search_pesanan";
        $this->load->view('penjual/load' , $data);
	}
	public function search_proses_pesanan(){
		$data['jml_pesanan'] = $this->penjual_model->get_pesanan($this->session->userdata('id_penjual'));
		$data['jml_proses'] = $this->penjual_model->get_proses_pesanan($this->session->userdata('id_penjual'));
		$a = $this->input->post('search');
		$data['profile'] = $this->penjual_model->data_user($this->session->userdata('id_penjual'));
		$data['pesanan'] = $this->penjual_model->search_proses_pesanan($a, $this->session->userdata('id_penjual'));
		$data['konten'] = "penjual/search_proses_pesanan";
        $this->load->view('penjual/load' , $data);
	}
	public function search_transaksi(){
		$data['jml_pesanan'] = $this->penjual_model->get_pesanan($this->session->userdata('id_penjual'));
		$data['jml_proses'] = $this->penjual_model->get_proses_pesanan($this->session->userdata('id_penjual'));
		$a = $this->input->post('search');
		$data['profile'] = $this->penjual_model->data_user($this->session->userdata('id_penjual'));
		$data['pesanan'] = $this->penjual_model->search_transaksi($a, $this->session->userdata('id_penjual'));
		$data['konten'] = "penjual/search_transaksi";
        $this->load->view('penjual/load' , $data);
	}
	public function search_feedback(){
		$data['jml_pesanan'] = $this->penjual_model->get_pesanan($this->session->userdata('id_penjual'));
		$data['jml_proses'] = $this->penjual_model->get_proses_pesanan($this->session->userdata('id_penjual'));
		$a = $this->input->post('search');
		$data['profile'] = $this->penjual_model->data_user($this->session->userdata('id_penjual'));
		$data['feedback'] = $this->penjual_model->search_feedback($a, $this->session->userdata('id_penjual'));
		$data['konten'] = "penjual/search_feedback";
        $this->load->view('penjual/load' , $data);
	}
	public function tambah_produk(){
		$data['jml_pesanan'] = $this->penjual_model->get_pesanan($this->session->userdata('id_penjual'));
		$data['jml_proses'] = $this->penjual_model->get_proses_pesanan($this->session->userdata('id_penjual'));
		$data['profile'] = $this->penjual_model->data_user($this->session->userdata('id_penjual'));
		$data['kategori'] = $this->penjual_model->data_kategori();
		$data['konten'] = "penjual/tambah_produk";
        $this->load->view('penjual/load' , $data);
	}
	public function update_foto_kantin()
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
				$this->session->set_flashdata('data','5');
				redirect(base_url('index.php/Penjual/Utama/edit_profile/'));
			}else{
				$foto=$this->upload->data('file_name');
			}
		}
		
		$data_edit = array(
			'foto_kantin' => '/upload/kantin/'.$foto
			);
		$this->penjual_model->update_data($where , $data_edit , 'id_kantin' , 'data_kantin');
		$this->session->set_flashdata('alert','3'); 
		redirect(base_url('index.php/Penjual/Utama/edit_profile/'));
	}
    public function pesanan(){
		
		$this->load->library('pagination');
		//config
		$config['base_url'] = 'http://localhost/Kantin.Ol/index.php/Penjual/Utama/pesanan/';
		$config['total_rows'] = $this->penjual_model->get_pesanan($this->session->userdata('id_penjual'));
		$data['jml_pesanan'] = $this->penjual_model->get_pesanan($this->session->userdata('id_penjual'));
		$data['jml_proses'] = $this->penjual_model->get_proses_pesanan($this->session->userdata('id_penjual'));
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
		
		$config['next_link'] = '<i class="ni ni-bold-right "></i> ';
		$config['next_tag_open'] = '<li class="page-item active">';
		$config['next_tag_close'] = '</li>';
		
		$config['prev_link'] = ' <i class="ni ni-bold-left "></i> ';
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
		$data['profile'] = $this->penjual_model->data_user($this->session->userdata('id_penjual'));
		$data['pesanan'] = $this->penjual_model->pesanan($this->session->userdata('id_penjual'), $config['per_page'], $data['start']-0);
        $data['konten'] = "penjual/pesanan";
        $this->load->view('penjual/load' , $data);
    }
	 public function detail_pesanan(){
		$data['jml_pesanan'] = $this->penjual_model->get_pesanan($this->session->userdata('id_penjual'));
		$data['jml_proses'] = $this->penjual_model->get_proses_pesanan($this->session->userdata('id_penjual'));
		$data['detail_pesanan'] = $this->penjual_model->detail_pesanan($this->uri->segment(4));
		$data['profile'] = $this->penjual_model->data_user($this->session->userdata('id_penjual'));
        $data['konten'] = "penjual/detail_pesanan";
        $this->load->view('penjual/load' , $data);
    }
	 public function edit_produk(){
		$data['jml_pesanan'] = $this->penjual_model->get_pesanan($this->session->userdata('id_penjual'));
		$data['jml_proses'] = $this->penjual_model->get_proses_pesanan($this->session->userdata('id_penjual'));
		$data['profile'] = $this->penjual_model->data_user($this->session->userdata('id_penjual'));
		$data['produk_det'] = $this->penjual_model->produk_det($this->uri->segment(4));
        $data['konten'] = "penjual/edit_produk";
        $this->load->view('penjual/load' , $data);
    }
	public function delete_produk()
	{
		$where = $this->uri->segment('4');
		$cek_pesanan = $this->penjual_model->cek_pesanan($where);
		if($cek_pesanan >= 1){
			$this->session->set_flashdata('alert','4'); 
			redirect(base_url('index.php/Penjual/Utama/produk'));
		}else{
			$this->penjual_model->delete_semua_produk($where);
			$this->db->where('id_produk',$where);
			$query = $this->db->get('daftar_produk');
			$row = $query->row();
			unlink(".$row->foto_produk");
			$this->db->delete('daftar_produk', array('id_produk' => $where));
			$this->penjual_model->single_delete('id_produk' , $where , 'daftar_produk');
			$this->session->set_flashdata('alert','3'); 
			redirect(base_url('index.php/Penjual/Utama/produk'));
		}
	}
	 public function detail_transaksi(){
		$data['jml_pesanan'] = $this->penjual_model->get_pesanan($this->session->userdata('id_penjual'));
		$data['jml_proses'] = $this->penjual_model->get_proses_pesanan($this->session->userdata('id_penjual'));
		$data['detail_pesanan'] = $this->penjual_model->detail_transaksi($this->uri->segment(4));
		$data['profile'] = $this->penjual_model->data_user($this->session->userdata('id_penjual'));
        $data['konten'] = "penjual/detail_transaksi";
        $this->load->view('penjual/load' , $data);
    }
	 public function accept_pesanan(){
		 $data_edit = array(
            'status' => '3',
        );
        $where = $this->uri->segment(4);
        
        $this->penjual_model->update_data($where , $data_edit , 'id_pesanan' , 'pesanan');
		$this->session->set_flashdata('alert','1'); 
		redirect(base_url('index.php/Penjual/Utama/pesanan'));
    }
	 public function kirim_pesanan(){
		 $data_edit = array(
            'status' => '4',
        );
        $where = $this->uri->segment(4);
		$this->penjual_model->update_data($where , $data_edit , 'id_pesanan' , 'pesanan');
	
		$id_pembeli = $this->uri->segment(5);
		$querys = "SELECT * FROM akun_pembeli JOIN user ON akun_pembeli.id_user = user.id_user WHERE id_pembeli = '$id_pembeli'";
		$akun = $this->penjual_model->return_result($querys);
				foreach($akun as $a){
					$email = $a->email;
					$nama = $a->nama;
				}
		
		 
		$data['jumlah_payment'] = $this->fe_model->jumlah_payment($id_pembeli);
		$data['nama'] = $nama;
		$data['total'] = $this->fe_model->total_keranjang($id_pembeli);
		$data['payment'] = $this->fe_model->total_payment($id_pembeli);
		$data['jumlah'] = $this->fe_model->jumlah_keranjang($id_pembeli);
		$data['data_payment']= $this->fe_model->payment($id_pembeli);
		 
		
		 // Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'ristianaditya35@gmail.com',  // Email gmail
            'smtp_pass'   => 'ristianaditya123',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];
		
		 // Load library email dan konfigurasinya
        $this->load->library('email', $config);
		
        // Email dan nama pengirim
        $this->email->from('CanteenBandung@canteen11.com', 'CanteenBandung@canteen11.com');

        // Email penerima
        $this->email->to($email); // Ganti dengan email tujuan

        // Subject email
        $this->email->subject('Invoice Your Payment ');
		
		$view = $this->load->view('Frontend/email_invoice', $data, true);
        // Isi email
        $this->email->message($view);
		 
		 if ($this->email->send()) 
			{
				echo "berhasil" ;
			}else 
			{
				echo "gagal" ;
			}

		redirect(base_url('index.php/Penjual/Utama/proses_pesanan'));
    }
	  public function proses_pesanan(){
		$this->load->library('pagination');
		//config
		$config['base_url'] = 'http://localhost/Kantin.Ol/index.php/Penjual/Utama/proses_pesanan/';
		$config['total_rows'] = $this->penjual_model->get_proses_pesanan($this->session->userdata('id_penjual'));
		$data['jml_proses'] = $this->penjual_model->get_proses_pesanan($this->session->userdata('id_penjual'));
		$data['jml_pesanan'] = $this->penjual_model->get_pesanan($this->session->userdata('id_penjual'));
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
		
		$config['next_link'] = '<i class="ni ni-bold-right "></i> ';
		$config['next_tag_open'] = '<li class="page-item active">';
		$config['next_tag_close'] = '</li>';
		
		$config['prev_link'] = '<i class="ni ni-bold-left"></i> ';
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
		$data['profile'] = $this->penjual_model->data_user($this->session->userdata('id_penjual'));
		$data['pesanan'] = $this->penjual_model->proses_pesanan($this->session->userdata('id_penjual'), $config['per_page'], $data['start']-0);
        $data['konten'] = "penjual/proses_pesanan";
        $this->load->view('penjual/load' , $data);
    }
	  public function riwayat_transaksi(){
		$this->load->library('pagination');
		$data['jml_pesanan'] = $this->penjual_model->get_pesanan($this->session->userdata('id_penjual'));
		$data['jml_proses'] = $this->penjual_model->get_proses_pesanan($this->session->userdata('id_penjual'));
		//config
		$config['base_url'] = 'http://localhost/Kantin.Ol/index.php/Penjual/Utama/riwayat_transaksi/';
		$config['total_rows'] = $this->penjual_model->get_transaksi($this->session->userdata('id_penjual'));
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
		
		$config['next_link'] = '<i class="ni ni-bold-right "></i>';
		$config['next_tag_open'] = '<li class="page-item active">';
		$config['next_tag_close'] = '</li>';
		
		$config['prev_link'] = '<i class="ni ni-bold-left "></i>';
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
		$data['profile'] = $this->penjual_model->data_user($this->session->userdata('id_penjual'));
		$data['pesanan'] = $this->penjual_model->riwayat_transaksi($this->session->userdata('id_penjual'), $config['per_page'], $data['start']-0);
        $data['konten'] = "penjual/riwayat_transaksi";
        $this->load->view('penjual/load' , $data);
    }
	
	public function feedback(){
		$this->load->library('pagination');
		$data['jml_pesanan'] = $this->penjual_model->get_pesanan($this->session->userdata('id_penjual'));
		$data['jml_proses'] = $this->penjual_model->get_proses_pesanan($this->session->userdata('id_penjual'));
		
		//config
		$config['base_url'] = 'http://localhost/Kantin.Ol/index.php/Penjual/Utama/feedback/';
		$config['total_rows'] = $this->penjual_model->get_feedback($this->session->userdata('id_penjual'));
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
		
		$config['next_link'] = '<i class="ni ni-bold-right "></i>';
		$config['next_tag_open'] = '<li class="page-item active">';
		$config['next_tag_close'] = '</li>';
		
		$config['prev_link'] = '<i class="ni ni-bold-left "></i>';
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
		$data['profile'] = $this->penjual_model->data_user($this->session->userdata('id_penjual'));
		$data['feedback'] = $this->penjual_model->feedback($this->session->userdata('id_penjual'), $config['per_page'], $data['start']-0);
        $data['konten'] = "penjual/feedback";
        $this->load->view('penjual/load' , $data);
    }
	
	
		public function aksi_edit_produk(){
			$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|min_length[3]|max_length[16]');
			$this->form_validation->set_rules('harga', 'Harga', 'required|min_length[3]|max_length[9]');
			$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|min_length[8]|max_length[64]');

			if($this->form_validation->run() != FALSE){

			$data_edit = array(
				'nama_produk' => $this->input->post('nama_produk'),
				'harga' => $this->input->post('harga'),
				'status_produk' => $this->input->post('status'),
				'deskripsi' => $this->input->post('deskripsi')
			);

			$where = $this->uri->segment(4);

			$this->penjual_model->update_data($where , $data_edit , 'id_produk' , 'daftar_produk');
			$this->session->set_flashdata('alert','3'); 
			redirect(base_url('index.php/Penjual/Utama/produk'));
		}
			else{
				$data['jml_pesanan'] = $this->penjual_model->get_pesanan($this->session->userdata('id_penjual'));
				$data['jml_proses'] = $this->penjual_model->get_proses_pesanan($this->session->userdata('id_penjual'));
				$data['profile'] = $this->penjual_model->data_user($this->session->userdata('id_penjual'));
				$data['produk_det'] = $this->penjual_model->produk_det($this->uri->segment(4));
				$data['konten'] = "penjual/edit_produk";
				$this->load->view('penjual/load' , $data);
			}
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
				$this->session->set_flashdata('alert','2');
				redirect(base_url('index.php/Penjual/Utama/edit_produk/'.$where));
			}else{
				$foto=$this->upload->data('file_name');
			}
		}
		
		$data_edit = array(
			'foto_produk' => '/upload/produk/'.$foto
			);
		$this->penjual_model->update_data($where , $data_edit , 'id_produk' , 'daftar_produk');
		$this->session->set_flashdata('alert','3'); 
		redirect(base_url('index.php/Penjual/Utama/edit_produk/'.$where));
	}
	public function aksi_tambah_produk(){
		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|min_length[3]|max_length[16]');
		$this->form_validation->set_rules('harga', 'Harga', 'required|min_length[3]|max_length[9]');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|min_length[8]|max_length[64]');
		
		if($this->form_validation->run() != FALSE){
			
			$id = $this->penjual_model->get_last_id('id_produk' , 'daftar_produk');
			$id_produk = ltrim($id->id_produk , "PR");
			$id_produk = sprintf('%05d' , $id_produk + 1);
			$id_produk = "PR".$id_produk;

			$id_kantin = $this->uri->segment(4);
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
					$data['jml_pesanan'] = $this->penjual_model->get_pesanan($this->session->userdata('id_penjual'));
					$data['jml_proses'] = $this->penjual_model->get_proses_pesanan($this->session->userdata('id_penjual'));
					$data['profile'] = $this->penjual_model->data_user($this->session->userdata('id_penjual'));
					$data['kategori'] = $this->penjual_model->data_kategori();
					$data['konten'] = "penjual/tambah_produk";
					$this->load->view('penjual/load' , $data);
				}else{
					$foto=$this->upload->data('file_name');
					$query = array(
					'id_produk' => $id_produk,
					'id_kantin' => $id_kantin,
					'id_kategori' => $kategori,
					'nama_produk' => $nama_produk,
					'harga' => $harga,
					'status_produk' => $this->input->post('status'),
					'deskripsi' => $deskripsi,
					'foto_produk' => '/upload/produk/'.$foto
					);
					$this->penjual_model->input_data($query , 'daftar_produk');
					$this->session->set_flashdata('alert','4');
					redirect(base_url('index.php/Penjual/Utama/produk'));
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
					$data['jml_pesanan'] = $this->penjual_model->get_pesanan($this->session->userdata('id_penjual'));
					$data['jml_proses'] = $this->penjual_model->get_proses_pesanan($this->session->userdata('id_penjual'));
					$data['profile'] = $this->penjual_model->data_user($this->session->userdata('id_penjual'));
					$data['kategori'] = $this->penjual_model->data_kategori();
					$data['konten'] = "penjual/tambah_produk";
					$this->load->view('penjual/load' , $data);
				}else{
					$data['jml_pesanan'] = $this->penjual_model->get_pesanan($this->session->userdata('id_penjual'));
					$data['jml_proses'] = $this->penjual_model->get_proses_pesanan($this->session->userdata('id_penjual'));
					$data['profile'] = $this->penjual_model->data_user($this->session->userdata('id_penjual'));
					$data['kategori'] = $this->penjual_model->data_kategori();
					$data['konten'] = "penjual/tambah_produk";
					$this->load->view('penjual/load' , $data);
				}
			}
		}
	}
	public function aksi_edit_penjual()
	{
		$data_edit = array(
            'nama' => $this->input->post('username'),
            'no_telepon' => $this->input->post('no_telepon'),
			'no_ktp' => $this->input->post('no_ktp'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'alamat' => $this->input->post('alamat'),
        );
		$query_user = array(
			'email' => $this->input->post('email'),
			
		);
		$data_kantin = array(
			'nama_kantin' => $this->input->post('nama_kantin'),
			'deskripsi' => $this->input->post('deskripsi_kantin')
			
		);
        
        $where = $this->session->userdata('id_penjual');
        $profile = $this->penjual_model->data_user($this->session->userdata('id_penjual'));
        $this->penjual_model->update_data($where , $data_edit , 'id_penjual' , 'akun_penjual');
        $this->penjual_model->update_data($where , $data_kantin , 'id_penjual' , 'data_kantin');
        $this->penjual_model->update_data($profile->id_user , $query_user , 'id_user' , 'user');
		$this->session->set_flashdata('alert','1'); 
		redirect(base_url('index.php/Penjual/Utama/edit_profile/'));
	
	}
	public function ganti_password_penjual()
	{	
		$profile = $this->penjual_model->data_user($this->session->userdata('id_penjual'));
	
		$old_password = $this->input->post('old_password');
		$where = array( 
			'id_user' => $profile->id_user,
			'password' => md5($old_password));
		$cek = $this->admin_model->login("user",$where)->num_rows();

        if($cek > 0){
			$password = $this->input->post('password');
			
			$data = md5($password);
			$this->penjual_model->ubah_password_penjual($data, $profile->id_user);
			$this->session->set_flashdata('data','3');
			redirect(base_url('index.php/Penjual/Utama/edit_profile/'));
			}
		else {
			$this->session->set_flashdata('alert','5');
			redirect(base_url('index.php/Penjual/Utama/edit_profile/'));
		}
	}
	public function open_kantin()
	{
		$data_edit = array(
            'status_kantin' => 2
        );
		
        $this->penjual_model->update_data($this->session->userdata('id_penjual') , $data_edit , 'id_penjual' , 'data_kantin');
		$this->session->set_flashdata('alert','6'); 
		redirect(base_url('index.php/Penjual/Utama/'));
	}
	public function closed_kantin()
	{
		$data_edit = array(
            'status_kantin' => 1
        );
		
        $this->penjual_model->update_data($this->session->userdata('id_penjual') , $data_edit , 'id_penjual' , 'data_kantin');
		$this->session->set_flashdata('alert','7'); 
		redirect(base_url('index.php/Penjual/Utama/'));
	}
	public function update_foto_penjual()
	{
		$where = $this->session->userdata('id_penjual');	
		$foto=$_FILES['foto'];
		if($foto=''){}else{
			$config['upload_path']	= './upload/penjual/';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')) {
				$data = array('error' => $this->upload->display_errors());
				$data['jml_pesanan'] = $this->penjual_model->get_pesanan($this->session->userdata('id_penjual'));
				$data['jml_proses'] = $this->penjual_model->get_proses_pesanan($this->session->userdata('id_penjual'));
				$data['profile'] = $this->penjual_model->data_user($this->session->userdata('id_penjual'));
				$data['user'] = $this->penjual_model->user($this->session->userdata('id_penjual'));
				$data['kantin'] = $this->penjual_model->data_kantin($this->session->userdata('id_penjual'));
				$data['konten'] = "penjual/profile";
				$this->load->view('penjual/load' , $data);
			}else{
				$this->db->where('id_penjual',$where);
				$query = $this->db->get('akun_penjual');
				$row = $query->row();
				unlink(".$row->foto");
				$foto=$this->upload->data('file_name');
				$data_edit = array(
				'foto' => '/upload/penjual/'.$foto
				);
				$this->penjual_model->update_data($where , $data_edit , 'id_penjual' , 'akun_penjual');
				$this->session->set_flashdata('alert','3'); 
				redirect(base_url('index.php/Penjual/Utama/edit_profile/'));
			}
		}
	}
}
?>