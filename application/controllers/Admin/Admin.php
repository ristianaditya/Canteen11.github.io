<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		 if($this->session->userdata('status') != "login")
        {
            redirect(base_url("index.php/Login/login"));
        }
		$this->load->model('model_login');
		$this->load->model('admin_model');
	}
	public function index()
	{	
		$data['kantin'] = $this->admin_model->jml_data("kantin");
		$data['produk'] = $this->admin_model->jml_data("produk");
		$data['pembeli'] = $this->admin_model->jml_data("pembeli");
		$data['januari1'] = $this->admin_model->data_omset_bulan('01');
		$data['februari1'] = $this->admin_model->data_omset_bulan('02');
		$data['maret1'] = $this->admin_model->data_omset_bulan('03');
		$data['april1'] = $this->admin_model->data_omset_bulan('04');
		$data['mei1'] = $this->admin_model->data_omset_bulan('05');
		$data['juni1'] = $this->admin_model->data_omset_bulan('06');
		$data['juli1'] = $this->admin_model->data_omset_bulan('07');
		$data['agustus1'] = $this->admin_model->data_omset_bulan('08');
		$data['september1'] = $this->admin_model->data_omset_bulan('09');
		$data['oktober1'] = $this->admin_model->data_omset_bulan('10');
		$data['november1'] = $this->admin_model->data_omset_bulan('11');
		$data['desember1'] = $this->admin_model->data_omset_bulan('12');
		$data['januari'] = $this->admin_model->get_bulan("01");
		$data['februari'] = $this->admin_model->get_bulan("02");
		$data['maret'] = $this->admin_model->get_bulan("03");
		$data['april'] = $this->admin_model->get_bulan("04");
		$data['mei'] = $this->admin_model->get_bulan("05");
		$data['juni'] = $this->admin_model->get_bulan("06");
		$data['juli'] = $this->admin_model->get_bulan("07");
		$data['agustus'] = $this->admin_model->get_bulan("08");
		$data['september'] = $this->admin_model->get_bulan("09");
		$data['oktober'] = $this->admin_model->get_bulan("10");
		$data['november'] = $this->admin_model->get_bulan("11");
		$data['desember'] = $this->admin_model->get_bulan("12");
		$data['konten'] = "Admin/dasboard";
		$this->load->view('Admin/utama' , $data);
	}
	public function data_admin()
	{
		$data['data'] = $this->admin_model->data_admin($this->session->userdata('id_admin'));
		$data['konten'] = "Admin/data_admin";
		$this->load->view('Admin/utama' , $data);
	}
	
	public function ganti_password()
	{	
		$old_password = $this->input->post('old_password');
		$where = array( 
			'id_user' => 'US00002',
			'password' => md5($old_password));
		$cek = $this->admin_model->login("user",$where)->num_rows();

        if($cek > 0){
			$password = $this->input->post('new_password');
			
			$data = md5($password);
			$this->admin_model->ubah_password_admin($data);
			$this->session->set_flashdata('data','6');
			redirect(base_url('index.php/Admin/Admin/data_admin'));
			}
		else {
			$this->session->set_flashdata('data','7');
			redirect(base_url('index.php/Admin/Admin/data_admin'));
		}
	}
}
?>