<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		 if($this->session->userdata('status_fe') != "login")
        {
            redirect(base_url("index.php/Login/login"));
        }
		$this->load->model('fe_model');
		$this->load->library('pagination');
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
			redirect(base_url('index.php/Profile/profile'));
		}
		$where = $this->uri->segment('3');
		$this->fe_model->single_delete('id_dafpes' , $where , 'daftar_pesanan');
		$this->session->set_flashdata('data','3');
		redirect(base_url('index.php/Profile/profile'));
	}
	public function profile()
	{	
		$data['validasi_checkout1'] = $this->fe_model->validasi_checkout_kantin($this->session->userdata('id_pembeli'));
		$data['validasi_checkout'] = $this->fe_model->validasi_checkout_keranjang($this->session->userdata('id_pembeli'));
		$data['riwayat'] = $this->fe_model->riwayat_transaksi($this->session->userdata('id_pembeli'));
		$data['jumlah_payment'] = $this->fe_model->jumlah_payment($this->session->userdata('id_pembeli'));
		$data['total'] = $this->fe_model->total_keranjang($this->session->userdata('id_pembeli'));
		$data['keranjang'] = $this->fe_model->data_keranjang($this->session->userdata('id_pembeli'));
		$data['jumlah'] = $this->fe_model->jumlah_keranjang($this->session->userdata('id_pembeli'));
		$data['profile'] = $this->fe_model->data_user($this->session->userdata('id_pembeli'));
		$data['kantin'] = $this->fe_model->data_kantin();
		$data['konten'] = "Frontend/profile";
		$this->load->view('Frontend/utama2', $data);
	}
	public function aksi_edit_pembeli()
	{
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('hp', 'Nomer Telephone', 'required|min_length[12]|max_length[13]');
		$where = $this->uri->segment(4);
		if($this->form_validation->run() != FALSE){
		$data_edit = array(
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'no_telepon' => $this->input->post('hp')
        );
        
        $where = $this->session->userdata('id_pembeli');
        
        $this->fe_model->update_data($where , $data_edit , 'id_pembeli' , 'akun_pembeli');
		$this->session->set_flashdata('data','4'); 
		redirect(base_url('index.php/Profile/profile/'));
	}
		else{
			$data['validasi_checkout1'] = $this->fe_model->validasi_checkout_kantin($this->session->userdata('id_pembeli'));
			$data['validasi_checkout'] = $this->fe_model->validasi_checkout_keranjang($this->session->userdata('id_pembeli'));
			$data['riwayat'] = $this->fe_model->riwayat_transaksi($this->session->userdata('id_pembeli'));
			$data['jumlah_payment'] = $this->fe_model->jumlah_payment($this->session->userdata('id_pembeli'));
			$data['profile'] = $this->fe_model->data_user($this->session->userdata('id_pembeli'));
			$data['konten'] = "Frontend/profile";
			$this->load->view('Frontend/utama2', $data);
		}
	}
	public function ganti_password()
	{	
	$this->form_validation->set_rules('new_password', 'Password', 'required|matches[old_password]');
	$this->form_validation->set_rules('old_password', 'Password', 'required');
	
	if ($this->form_validation->run() != FALSE)
	{
		$id = $this->session->userdata('id_user');
		$old_password = $this->input->post('password');
		$where = array( 
			'id_user' => $id,
			'password' => md5($old_password));
		$cek = $this->fe_model->login("user",$where)->num_rows();

        if($cek > 0){
			$password = $this->input->post('new_password');
			$data = md5($password);
			$this->fe_model->ubah_password($data,$id);
			$this->session->set_flashdata('data','4');
			redirect(base_url('index.php/Profile/profile'));
				}
		else {
			$this->session->set_flashdata('data','5');
			redirect(base_url('index.php/Profile/profile'));
		}
	}else
		$this->session->set_flashdata('data','5');
		redirect(base_url('index.php/Profile/profile'));
	}
	public function update_foto()
	{
		$where = $this->uri->segment('3');
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
				redirect(base_url('index.php/Profile/profile'));
			}else{
				$foto=$this->upload->data('file_name');
			}
		}
		
		$data_edit = array(
			'foto' => '/upload/pembeli/'.$foto
			);
		$this->fe_model->update_data($where , $data_edit , 'id_pembeli' , 'akun_pembeli');
		$this->session->set_flashdata('data','4'); 
		redirect(base_url('index.php/Profile/profile/'));
	}
		public function pengajuan_saldo(){
		
		$validasi_pengajuan = $this->fe_model->validasi_pengajuan($this->session->userdata('id_user'));
		
		if($validasi_pengajuan >= 1){
			$this->session->set_flashdata('data','16');
			redirect(base_url('index.php/Profile/profile'));
		}
		else{
			$foto=$_FILES['foto'];
			if($foto=''){}else{
				$config['upload_path']	= './upload/saldo/';
				$config['allowed_types']	= 'gif|jpg|png|jpeg';

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')) {
					$this->session->set_flashdata('data','18');
					redirect(base_url('index.php/Profile/profile'));
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
				redirect(base_url('index.php/Profile/profile'));
		}
	}
}
?>