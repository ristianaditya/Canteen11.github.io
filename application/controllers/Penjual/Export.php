<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
		 if($this->session->userdata('status_pe') != "login")
        {
            redirect(base_url("index.php/Login/login"));
        }
		$this->load->model('model_login');
		$this->load->model('penjual_model');
		$this->load->model('admin_model');

    }
	public function index(){
		$bulan = $this->input->post('bulan');
		$this->load->library('pdf');
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
		$data['user']= $this->penjual_model->data_user($this->session->userdata('id_penjual'));
		$data['produk']= $this->penjual_model->report_produk($this->session->userdata('id_penjual'), $bulan);
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "Report Canteen.pdf";
		$this->pdf->load_view('report_penjual', $data);
	}
	public function admin(){
		$bulan = $this->input->post('bulan');
		$this->load->library('pdf');
		$data['kantin']= $this->penjual_model->report_kantin_admin($bulan);
		$data['produk']= $this->penjual_model->report_produk_admin($bulan);
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "Report Admin.pdf";
		$this->pdf->load_view('report_admin', $data);
	}

}
