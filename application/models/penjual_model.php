<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penjual_model extends CI_model {
	
	public function data_user($a){
		$query = $this->db->query("SELECT * FROM user JOIN akun_penjual ON user.id_user = akun_penjual.id_user JOIN saldo ON user.id_user = saldo.id_user JOIN data_kantin ON akun_penjual.id_penjual = data_kantin.id_penjual WHERE data_kantin.id_penjual = '$a'");
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
	public function user($a){
		$query = $this->db->query("SELECT * FROM user JOIN akun_penjual ON user.id_user = akun_penjual.id_user JOIN saldo ON user.id_user = saldo.id_user WHERE akun_penjual.id_penjual = '$a'");
		return $query->row();
	}
	function get_last_id($a , $b){
		   $query = $this->db->query("SELECT $a from $b order by $a desc");
		   return $query->row();
    }
	function ubah_password_penjual($data,$id){
		$query = $this->db->query("UPDATE user SET PASSWORD = '$data' WHERE id_user = '$id';");
	}
	public function data_kantin($a){
		$query = $this->db->query("SELECT * FROM data_kantin WHERE id_penjual = '$a'");
		return $query->row();
	}
	public function report_produk($id_penjual, $b){
		$query = $this->db->query("CALL report_produk_kantin('$id_penjual',$b)");
		return $query->result();
	}
	public function report_produk_admin($b){
		$query = $this->db->query("CALL report_produk_admin($b)");
		return $query->result();
	}
	public function report_kantin_admin($b){
		$query = $this->db->query("SELECT
		  `data_kantin`.`id_kantin`       AS `id_kantin`,
		  `data_kantin`.`id_penjual`      AS `id_penjual`,
		  `data_sekolah`.`id_sekolah`     AS `id_sekolah`,
		  `akun_penjual`.`nama`           AS `nama`,
		  `data_kantin`.`nama_kantin`     AS `nama_kantin`,
		  `data_sekolah`.`nama_sekolah`   AS `nama_sekolah`,
		  `data_kantin`.`deskripsi`       AS `deskripsi`,
		  `data_sekolah`.`alamat_sekolah` AS `alamat_sekolah`,
		  `data_kantin`.`penilaian`       AS `penilaian`,
		  `data_kantin`.`foto_kantin`     AS `foto_kantin`,
		  COUNT(`data_kantin`.`id_kantin`) AS `jml_transaksi`,
		  SUM(`transaksi`.`total_harga`)  AS `omset`
		FROM (((`data_kantin`
		     LEFT JOIN `transaksi`
		       ON ((`data_kantin`.`id_kantin` = `transaksi`.`id_kantin`)))
		    JOIN `akun_penjual`
		      ON ((`data_kantin`.`id_penjual` = `akun_penjual`.`id_penjual`)))
		   JOIN `data_sekolah`
		     ON ((`data_kantin`.`id_sekolah` = `data_sekolah`.`id_sekolah`)))
		     WHERE MONTH(transaksi.`tanggal`) = $b
		GROUP BY `data_kantin`.`id_kantin`
		ORDER BY COUNT(`data_kantin`.`id_kantin`)DESC;");
		return $query->result();
	}
	public function input_data($data , $table){
		$this->db->insert($table,$data);
	}
	public function edit_penjual($a){
		$query = $this->db->query("SELECT * FROM akun_penjual JOIN user ON akun_penjual.id_user = user.id_user where id_penjual = '$a'");
		return $query->row();
	}
	public function get_total_produk($a){
		$query = $this->db->query("SELECT produk_kantin('$a') AS jml_produk");
		return $query->row();
	}
	public function validasi_produk_delete($a){
		$query = $this->db->query("SELECT * FROM pesanan JOIN daftar_pesanan ON pesanan.`id_pesanan` = daftar_pesanan.`id_pesanan` WHERE pesanan.id_pesanan = '$a'");
		return $query->num_rows();
	}
	public function validasi_produk($a){
		$query = $this->db->query(" SELECT * FROM daftar_pesanan JOIN pesanan ON daftar_pesanan.`id_pesanan` = pesanan.`id_pesanan` WHERE id_produk = '$a'");
		return $query->row();
	}
	public function get_bulan_grafik($a, $b) 
    {
       $query = $this->db->query("SELECT total_transaksi_kantin('$b', $a) AS jml_transaksi");
	   return $query->row();
    }
	public function get_bulan($id_penjual) 
    {
        return $this->db->query("SELECT * FROM transaksi JOIN data_kantin ON transaksi.id_kantin = data_kantin.id_kantin JOIN akun_penjual ON data_kantin.id_penjual = akun_penjual.`id_penjual` WHERE akun_penjual.id_penjual = '$id_penjual' AND tanggal LIKE '".date("Y-m")."-%'")->num_rows();
    }
	public function data_omset_new($a){
		$query = $this->db->query("SELECT SUM(total_harga) AS jumlah FROM transaksi JOIN data_kantin ON transaksi.`id_kantin` = data_kantin.`id_kantin` JOIN akun_penjual ON data_kantin.`id_penjual` = akun_penjual.`id_penjual` WHERE akun_penjual.`id_penjual` = '$a' AND tanggal LIKE '".date("Y-m")."-%'");
		return $query->row();
	}
	
	public function data_omset_bulan($a, $b){
		$query = $this->db->query("SELECT grafik_omset_bulan('$a', $b) AS jumlah");
		return $query->row();
	}
	public function get_perbandingan_grafik(){
		$query = $this->db->query("SELECT SUM(total_harga) AS jumlah, nama_kantin, transaksi.id_kantin FROM transaksi JOIN data_kantin ON transaksi.`id_kantin` = data_kantin.`id_kantin` JOIN akun_penjual ON data_kantin.`id_penjual` = akun_penjual.`id_penjual` WHERE tanggal LIKE '".date("Y-m")."-%' GROUP BY transaksi.id_kantin LIMIT 4");
		return $query->result();
	}
	public function produk_det($a){
		$query = $this->db->query("SELECT * FROM daftar_produk JOIN kategori_produk ON daftar_produk.id_kategori = kategori_produk.id_kategori WHERE daftar_produk.id_produk = '$a'");
		return $query->row();
	}
	public function pesanan($a, $limit, $mulai){
		$query = $this->db->query("SELECT id_pesanan, akun_pembeli.`nama`, data_kantin.`id_kantin`, pesanan.`alamat`, status, method, ongkir, jarak  FROM pesanan JOIN akun_pembeli ON pesanan.`id_pembeli` = akun_pembeli.`id_pembeli` JOIN data_kantin ON pesanan.`id_kantin` = data_kantin.`id_kantin`JOIN akun_penjual ON data_kantin.`id_penjual` = akun_penjual.`id_penjual` WHERE akun_penjual.`id_penjual` = '$a' AND status = 2 LIMIT $mulai,$limit");
		return $query->result();
	}
	public function data_kategori(){
		$query = $this->db->query("SELECT * FROM kategori_produk");
		return $query->result();
	}
	public function search_pesanan($b, $a){
		$query = $this->db->query("SELECT id_pesanan, akun_pembeli.`nama`, data_kantin.`id_kantin`, pesanan.`alamat`, status, method, ongkir, jarak  FROM pesanan JOIN akun_pembeli ON pesanan.`id_pembeli` = akun_pembeli.`id_pembeli` JOIN data_kantin ON pesanan.`id_kantin` = data_kantin.`id_kantin`JOIN akun_penjual ON data_kantin.`id_penjual` = akun_penjual.`id_penjual` WHERE akun_penjual.`id_penjual` = '$a' AND status = 2 AND akun_pembeli.nama LIKE '%$b%'");
		return $query->result();
	}
	public function search_proses_pesanan($b, $a){
		$query = $this->db->query("SELECT id_pesanan, akun_pembeli.`nama`, data_kantin.`id_kantin`, pesanan.`alamat`, status, method, ongkir, jarak, pesanan.id_pembeli  FROM pesanan JOIN akun_pembeli ON pesanan.`id_pembeli` = akun_pembeli.`id_pembeli` JOIN data_kantin ON pesanan.`id_kantin` = data_kantin.`id_kantin`JOIN akun_penjual ON data_kantin.`id_penjual` = akun_penjual.`id_penjual` WHERE akun_penjual.`id_penjual` = '$a' AND status = 3 AND akun_pembeli.nama LIKE '%$b%'");
		return $query->result();
	}
	public function get_pesanan($a){
		$query = $this->db->query("SELECT * FROM pesanan JOIN akun_pembeli ON pesanan.`id_pembeli` = akun_pembeli.`id_pembeli` JOIN data_kantin ON pesanan.`id_kantin` = data_kantin.`id_kantin`JOIN akun_penjual ON data_kantin.`id_penjual` = akun_penjual.`id_penjual` WHERE akun_penjual.`id_penjual` = '$a' AND status = 2 ");
		return $query->num_rows();
	}
	public function get_proses_pesanan($a){
		$query = $this->db->query("SELECT * FROM pesanan JOIN akun_pembeli ON pesanan.`id_pembeli` = akun_pembeli.`id_pembeli` JOIN data_kantin ON pesanan.`id_kantin` = data_kantin.`id_kantin`JOIN akun_penjual ON data_kantin.`id_penjual` = akun_penjual.`id_penjual` WHERE akun_penjual.`id_penjual` = '$a' AND status >= 3 ");
		return $query->num_rows();
	}
	public function get_transaksi($a){
		$query = $this->db->query("SELECT * FROM transaksi JOIN akun_pembeli ON transaksi.`id_pembeli` = akun_pembeli.`id_pembeli` JOIN data_kantin ON transaksi.`id_kantin` = data_kantin.`id_kantin` JOIN akun_penjual ON akun_penjual.`id_penjual` = data_kantin.`id_penjual` WHERE akun_penjual.`id_penjual` = '$a'");
		return $query->num_rows();
	}
	public function get_feedback($a){
		$query = $this->db->query("SELECT * FROM report JOIN data_kantin ON report.id_kantin = data_kantin.id_kantin JOIN akun_pembeli ON report.id_pembeli = akun_pembeli.id_pembeli WHERE id_penjual = '$a'");
		return $query->num_rows();
	}
	public function proses_pesanan($a, $limit, $mulai){
		$query = $this->db->query("SELECT id_pesanan, akun_pembeli.`nama`, data_kantin.`id_kantin`, pesanan.`alamat`, status, method, ongkir, jarak, pesanan.id_pembeli  FROM pesanan JOIN akun_pembeli ON pesanan.`id_pembeli` = akun_pembeli.`id_pembeli` JOIN data_kantin ON pesanan.`id_kantin` = data_kantin.`id_kantin`JOIN akun_penjual ON data_kantin.`id_penjual` = akun_penjual.`id_penjual` WHERE akun_penjual.`id_penjual` = '$a' AND status >= 3 LIMIT $mulai,$limit");
		return $query->result();
	}
	public function riwayat_transaksi($a, $limit, $mulai){
		$query = $this->db->query("SELECT transaksi.id_transaksi, akun_pembeli.nama, tanggal, total_harga FROM transaksi JOIN akun_pembeli ON transaksi.`id_pembeli` = akun_pembeli.`id_pembeli` JOIN data_kantin ON transaksi.`id_kantin` = data_kantin.`id_kantin` JOIN akun_penjual ON akun_penjual.`id_penjual` = data_kantin.`id_penjual` WHERE akun_penjual.`id_penjual` = '$a' LIMIT $mulai,$limit");
		return $query->result();
	}
	public function feedback($a, $limit, $mulai){
		$query = $this->db->query("SELECT id_report, akun_pembeli.nama, report.deskripsi, report.penilaian FROM report JOIN data_kantin ON report.id_kantin = data_kantin.id_kantin JOIN akun_pembeli ON report.id_pembeli = akun_pembeli.id_pembeli WHERE id_penjual = '$a' LIMIT $mulai,$limit");
		return $query->result();
	}
	public function search_feedback($b, $a){
		$query = $this->db->query("SELECT id_report, akun_pembeli.nama, report.deskripsi, report.penilaian FROM report JOIN data_kantin ON report.id_kantin = data_kantin.id_kantin JOIN akun_pembeli ON report.id_pembeli = akun_pembeli.id_pembeli WHERE id_penjual = '$a' AND akun_pembeli.nama LIKE '%$b%'");
		return $query->result();
	}
	public function search_transaksi($b, $a){
		$query = $this->db->query("SELECT transaksi.id_transaksi, akun_pembeli.nama, tanggal, total_harga FROM transaksi JOIN akun_pembeli ON transaksi.`id_pembeli` = akun_pembeli.`id_pembeli` JOIN data_kantin ON transaksi.`id_kantin` = data_kantin.`id_kantin` JOIN akun_penjual ON akun_penjual.`id_penjual` = data_kantin.`id_penjual` WHERE akun_penjual.`id_penjual` = '$a' AND akun_pembeli.nama LIKE '%$b%'");
		return $query->result();
	}
	function update_data($id , $data_edit , $a , $b){
        $this->db->where($a , $id);
        $this->db->update($b , $data_edit);
    }
	public function detail_pesanan($a){
		$query = $this->db->query("SELECT nama_produk, jumlah_pesanan, daftar_pesanan.deskripsi, total_harga FROM pesanan JOIN daftar_pesanan ON pesanan.`id_pesanan` = daftar_pesanan.`id_pesanan` JOIN daftar_produk ON daftar_pesanan.id_produk = daftar_produk.id_produk WHERE pesanan.`id_pesanan` = '$a'");
		return $query->result();
	}
	public function detail_transaksi($a){
		$query = $this->db->query("SELECT * FROM transaksi JOIN produk_transaksi ON transaksi.`id_transaksi` = produk_transaksi.`id_transaksi` JOIN daftar_produk ON daftar_produk.`id_produk` = produk_transaksi.`id_produk` WHERE produk_transaksi.id_transaksi = '$a'");
		return $query->result();
	}
	public function daftar_produk($a, $limit, $mulai){
		$query = $this->db->query("SELECT * FROM daftar_produk JOIN kategori_produk ON daftar_produk.`id_kategori` = kategori_produk.`id_kategori` JOIN data_kantin ON daftar_produk.`id_kantin` = data_kantin.`id_kantin` WHERE id_penjual = '$a' LIMIT $mulai,$limit");
		return $query->result();
	}
	public function jml_produk($a){
		$query = $this->db->query("SELECT * FROM daftar_produk JOIN data_kantin ON daftar_produk.id_kantin = data_kantin.id_kantin WHERE id_penjual = '$a'");
		return $query->num_rows();
	}
	public function single_delete($column , $where , $table)
	{
		$this->db->where($column, $where);
		$this->db->delete($table);
	}
	public function delete_semua_produk($a){
		$this->db->query("DELETE FROM produk_transaksi  WHERE id_produk = '$a'");
	}
	function search_produk($a, $id_penjual){
		$query = $this->db->query("SELECT * FROM daftar_produk INNER JOIN data_kantin ON data_kantin.`id_kantin` = daftar_produk.`id_kantin` INNER JOIN kategori_produk ON daftar_produk.id_kategori = kategori_produk.id_kategori WHERE nama_produk LIKE '%$a%' OR nama_kantin LIKE '%$a%' OR nama_kategori LIKE '%$a%' AND id_penjual = '$id_penjual'");
		return $query->result();
	}
	public function cek_pesanan($a){
		$query = $this->db->query("SELECT * FROM daftar_pesanan WHERE id_produk = '$a'");
		return $query->num_rows();
	}
}