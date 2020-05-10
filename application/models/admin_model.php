<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_model extends CI_model {
	
		public function registrasi($data){
        $this->db->insert('akun_pembeli',$data);
    }
		function get_last_id($a , $b){
		   $query = $this->db->query("SELECT $a from $b order by $a desc");
		   return $query->row();
    }
		function return_result($a , $b = 1){
        $query = $this->db->query($a);
        
        if($b == 1){
            return $query->result();
        }
        else if($b == "row"){
            return $query->num_rows();
        }
        else{
            return $query->row();
        }
    }
	public function login($table , $where){
		return $this->db->get_where($table,$where);
	}
	public function jml_transaksi($a){
		$query = $this->db->query("SELECT * FROM produk_transaksi where id_lokasi = '$a'");
		return $query->num_rows();
	}
	public function data_sekolah($limit, $start){
		return $this->db->get('data_sekolah', $limit, $start)->result();
	}
	public function jml_pesanan($a){
		$query = $this->db->query("SELECT * FROM daftar_pesanan where id_lokasi = '$a'");
		return $query->num_rows();
	}
	public function get_total($a) 
    {
        return $this->db->get("$a")->num_rows();
    }
	public function get_total_kategori() 
    {
        return $this->db->get("kategori_produk")->num_rows();
    }
	public function get_total_penjual() 
    {
        return $this->db->get("akun_penjual")->num_rows();
    }
	public function single_delete($column , $where , $table)
	{
		$this->db->where($column, $where);
		$this->db->delete($table);
	}
	public function input_data($data , $table){
		$this->db->insert($table,$data);
	}
	public function get_transaksi(){
		$query = $this->db->query("SELECT * FROM daftar_pesanan WHERE STATUS = 0");
		return $query->num_rows();
	}
	function update_data($id , $data_edit , $a , $b){
        $this->db->where($a , $id);
        $this->db->update($b , $data_edit);
    }
	public function search_transaksi($a){
		$query = $this->db->query("SELECT * FROM transaksi INNER JOIN data_kantin ON transaksi.`id_kantin` = data_kantin.`id_kantin` INNER JOIN akun_pembeli ON transaksi.`id_pembeli` = akun_pembeli.`id_pembeli` WHERE transaksi.`id_transaksi` LIKE '%$a%' OR nama_kantin LIKE '%$a%' OR nama LIKE '%$a%' ORDER BY  id_transaksi DESC");
		return $query->result();
	}
	public function detail_sekolah($a){
		$query = $this->db->query("SELECT * FROM data_sekolah WHERE id_sekolah ='$a'");
		return $query->row();
	}
	public function data_akun($limit, $start)
	{
		return $this->db->get('akun_pembeli', $limit, $start)->result();
	}
	public function semua_penjual(){
		$query = $this->db->query("SELECT * FROM akun_penjual");
		return $query->result();
	}
	public function jml_data($a){
		$query = $this->db->query("SELECT semua_$a() AS jml_data");
		return $query->row();
	}
	public function data_omset_bulan($b){
		$query = $this->db->query("SELECT SUM(total_harga) AS jumlah FROM transaksi JOIN data_kantin ON transaksi.`id_kantin` = data_kantin.`id_kantin` JOIN akun_penjual ON data_kantin.`id_penjual` = akun_penjual.`id_penjual` WHERE tanggal LIKE '".date("Y")."-$b-%'");
		return $query->row();
	}
	public function satu_penjual($a){
		$query = $this->db->query("SELECT * FROM data_kantin INNER JOIN akun_penjual ON data_kantin.id_penjual = akun_penjual.id_penjual WHERE data_kantin.id_kantin = '$a'");
		return $query->row();
	}
	public function verifikasi($a)
	{
		$query = $this->db->query("UPDATE akun_penjual SET verifikasi = '2' WHERE id_penjual = '$a';");
	}
	public function banned($a)
	{
		$query = $this->db->query("UPDATE akun_penjual SET verifikasi = '1' WHERE id_penjual = '$a';");
	}
	public function edit_pembeli($a){
		$query = $this->db->query("SELECT * FROM akun_pembeli JOIN user ON akun_pembeli.id_user = user.id_user where id_pembeli = '$a'");
		return $query->row();
	}
	public function edit_produk($a){
		$query = $this->db->query("SELECT * FROM daftar_produk where id_produk = '$a'");
		return $query->row();
	}
	public function search_pembeli($a){
		$query = $this->db->query("SELECT * FROM akun_pembeli WHERE id_pembeli LIKE '%$a%' OR nama LIKE '%$a%' OR email LIKE '%$a%' OR no_telepon LIKE '%$a%'");
		return $query->result();
	}
	public function edit_penjual($a){
		$query = $this->db->query("SELECT * FROM akun_penjual JOIN user ON akun_penjual.id_user = user.id_user where id_penjual = '$a'");
		return $query->row();
	}
	public function search_penjual($a){
		$query = $this->db->query("SELECT * FROM akun_penjual JOIN user ON akun_penjual.id_user = user.id_user WHERE id_penjual LIKE '%$a%' OR nama LIKE '%$a%' OR email LIKE '%$a%' OR no_telepon LIKE '%$a%'");
		return $query->result();
	}
	function data_kategori($limit, $start){
		return $this->db->get('kategori_produk', $limit, $start)->result();
	}
	function semua_kategori(){
		$query=$this->db->query("SELECT * FROM kategori_produk");
		return $query->result();
	}
	function user_saldo($a){
		$query=$this->db->query("SELECT * FROM saldo JOIN user ON saldo.`id_user` = user.`id_user` WHERE user.`id_user` = '$a'");
		return $query->row();
	}
	function ubah_password_penjual($data,$nip){
		$query = $this->db->query("UPDATE akun_penjual SET PASSWORD = '$data' WHERE id_penjual = '$id';");
	}
	function ubah_password_admin($data){
		$query = $this->db->query("UPDATE user SET PASSWORD = '$data' WHERE id_user = 'US00002'");
	}
	function semua_kantin($limit,$mulai){
		$query = $this->db->query("SELECT * FROM data_kantin INNER JOIN akun_penjual ON data_kantin.`id_penjual` = akun_penjual.`id_penjual` LIMIT $mulai,$limit");
		return $query->result();
	}
	function semua_saldo($limit,$mulai){
		$query = $this->db->query("SELECT * FROM pengajuan_saldo JOIN USER ON pengajuan_saldo.`id_user` = user.`id_user` WHERE LEVEL = '2' LIMIT $mulai,$limit");
		return $query->result();
	}
	function data_kantin(){
		$query = $this->db->query("SELECT * FROM data_kantin INNER JOIN akun_penjual ON data_kantin.`id_penjual` = akun_penjual.`id_penjual`");
		return $query->result();
	}
	function data_produk($limit,$mulai){
		$query = $this->db->query("SELECT * FROM daftar_produk INNER JOIN data_kantin ON data_kantin.`id_kantin` = daftar_produk.`id_kantin` INNER JOIN kategori_produk ON daftar_produk.id_kategori = kategori_produk.id_kategori LIMIT $mulai,$limit");
		return $query->result();
	}
	function data_penjual($limit,$mulai){
		$query = $this->db->query("SELECT * FROM akun_penjual INNER JOIN user ON akun_penjual.id_user = user.id_user LIMIT $mulai,$limit");
		return $query->result();
	}
	function data_admin($a){
		$query = $this->db->query("SELECT * FROM user where id_user = '$a'");
		return $query->row();
	}
	public function search_kategori($a){
		$query = $this->db->query("SELECT * FROM kategori_produk WHERE id_kategori LIKE '%$a%' OR nama_kategori LIKE '%$a%'");
		return $query->result();
	}
	public function search_kantin($a){
		$query = $this->db->query("SELECT * FROM data_kantin INNER JOIN akun_penjual ON akun_penjual.`id_penjual` = data_kantin.`id_penjual` WHERE id_kantin LIKE '$a%' OR nama LIKE '$a%' OR nama_kantin LIKE '$a%'");
		return $query->result();
	}
	public function search_sekolah($a){
		$query = $this->db->query("SELECT * FROM data_sekolah WHERE id_sekolah LIKE '$a%' OR nama_sekolah LIKE '$a%'");
		return $query->result();
	}
	public function detail_produk($a){
		$query = $this->db->query("SELECT * FROM daftar_produk INNER JOIN data_kantin ON data_kantin.`id_kantin` = daftar_produk.`id_kantin` 
		INNER JOIN kategori_produk ON daftar_produk.id_kategori = kategori_produk.id_kategori WHERE id_produk = '$a';");
		return $query->row();
	}
	function search_produk($a){
		$query = $this->db->query("SELECT * FROM daftar_produk INNER JOIN data_kantin ON data_kantin.`id_kantin` = daftar_produk.`id_kantin` INNER JOIN kategori_produk ON daftar_produk.id_kategori = kategori_produk.id_kategori WHERE nama_produk LIKE '%$a%' OR nama_kantin LIKE '%$a%' OR nama_kategori LIKE '%$a%' OR id_produk LIKE '%$a%'");
		return $query->result();
	}
	public function edit_kantin($a){
		$query = $this->db->query("SELECT * FROM data_kantin where id_kantin = '$a'");
		return $query->row();
	}
	public function get_bulan($a) 
    {
        return $this->db->query("SELECT * FROM transaksi WHERE tanggal LIKE '".date("Y")."-$a-%'")->num_rows();
    }
	public function jml_produk($a){
		$query = $this->db->query("SELECT * FROM daftar_produk WHERE id_kantin = '$a'");
		return $query->num_rows();
	}
	public function jml_kantin($a){
		$query = $this->db->query("SELECT * FROM data_kantin WHERE id_penjual = '$a'");
		return $query->num_rows();
	}
	public function cek_pesanan($a){
		$query = $this->db->query("SELECT * FROM daftar_pesanan WHERE id_produk = '$a'");
		return $query->num_rows();
	}
	public function delete_semua_penjual($a){
		$this->db->query("DELETE data_kantin FROM akun_penjual LEFT JOIN data_kantin ON akun_penjual.`id_penjual` = data_kantin.`id_penjual` WHERE akun_penjual.id_penjual = '$a'");
	}
	public function sekolah(){
		$query = $this->db->query("SELECT * FROM data_sekolah");
		return $query->result();
	}
	public function jml_kategori($a){
		$query = $this->db->query("SELECT * FROM daftar_produk WHERE id_kategori = '$a'");
		return $query->num_rows();
	}
	function data_transaksi($limit, $start){
		$query = $this->db->query("SELECT * FROM transaksi INNER JOIN data_kantin ON transaksi.`id_kantin` = data_kantin.`id_kantin` INNER JOIN akun_pembeli ON transaksi.`id_pembeli` = akun_pembeli.`id_pembeli` ORDER BY id_transaksi DESC LIMIT $start,$limit");
		return $query->result();
	}
	public function delete_semua_produk($a){
		$this->db->query("DELETE FROM produk_transaksi  WHERE id_produk = '$a'");
	}
	public function delete_bulanlalu(){
		$this->db->query("DELETE FROM activity_log WHERE log_date NOT LIKE '".date("Y")."-".date("m")."-%';");
	}
	public function delete_transaksilalu(){
		$this->db->query("DELETE produk_transaksi FROM transaksi JOIN produk_transaksi ON transaksi.id_transaksi = produk_transaksi.id_transaksi  WHERE tanggal NOT LIKE '".date("Y")."-%';");
		$this->db->query("DELETE FROM transaksi WHERE tanggal NOT LIKE '".date("Y")."-%';");
	}
	public function delete_transaksi($a){
		$this->db->query("DELETE FROM produk_transaksi WHERE id_transaksi ='$a'");
		$this->db->query("DELETE FROM transaksi WHERE id_transaksi ='$a'");
	}
	public function delete_pesananlalu(){
		$this->db->query("DELETE FROM produk_transaksi WHERE tanggal NOT LIKE '".date("Y")."-%' ");
	}
}
?>