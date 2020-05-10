<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class fe_model extends CI_model {
	
		public function registrasi($data){
        $this->db->insert('akun_pembeli',$data);
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
	public function single_delete($column , $where , $table)
	{
		$this->db->where($column, $where);
		$this->db->delete($table);
	}
	public function login($table , $where){
		return $this->db->get_where($table,$where);
	}
	function get_last_id($a , $b){
		   $query = $this->db->query("SELECT $a from $b order by $a desc");
		   return $query->row();
    }
	public function input_data($data , $table){
		$this->db->insert($table,$data);
	}
	public function edit_pembeli($a){
		$query = $this->db->query("SELECT * FROM akun_pembeli where id_pembeli = '$a'");
		return $query->row();
	}
	public function data_lokasi(){
		$query = $this->db->query('SELECT * FROM data_lokasi');
		return $query->result();
	}
	function data_kategori(){
		$query = $this->db->query("SELECT * FROM kategori_produk");
		return $query->result();
	}
	function data_kantin(){
		$query = $this->db->query("SELECT * FROM data_kantin_view");
		return $query->result();
	}
	function data_kantin_recomended(){
		$query = $this->db->query("SELECT * FROM data_kantin_recomended");
		return $query->result();
	}
	function data_produk(){
		$query = $this->db->query("SELECT * FROM daftar_produk INNER JOIN data_kantin ON data_kantin.`id_kantin` = daftar_produk.`id_kantin` INNER JOIN kategori_produk ON daftar_produk.id_kategori = kategori_produk.id_kategori");
		return $query->result();
	}
	public function detail_produk($a){
		$query = $this->db->query("SELECT COUNT(data_kantin.id_kantin) AS jml_transaksi, data_kantin.`id_kantin`, data_kantin.`id_penjual`, nama_kantin, daftar_produk.`id_produk`,nama_kategori, foto_produk, nama_sekolah, daftar_produk.`id_kategori`, status_kantin, nama_produk, penilaian, daftar_produk.`status_produk`, daftar_produk.`harga` FROM daftar_produk JOIN data_kantin ON data_kantin.`id_kantin` = daftar_produk.`id_kantin` LEFT JOIN transaksi ON data_kantin.`id_kantin` = transaksi.`id_kantin` JOIN kategori_produk ON daftar_produk.id_kategori = kategori_produk.id_kategori JOIN data_sekolah ON data_kantin.id_sekolah = data_sekolah.id_sekolah WHERE id_produk = '$a' GROUP BY daftar_produk.`id_produk` ;");
		return $query->row();
	}
	public function alldetail_produk($a){
		$query = $this->db->query("SELECT * FROM daftar_produk INNER JOIN data_kantin ON daftar_produk.`id_kantin` = data_kantin.`id_kantin` INNER JOIN akun_penjual ON data_kantin.`id_penjual` = akun_penjual.`id_penjual` INNER JOIN kategori_produk ON daftar_produk.id_kategori = kategori_produk.id_kategori JOIN user ON akun_penjual.id_user = user.id_user WHERE id_produk  = '$a'");
		return $query->row();
	}
	public function data_keranjang($a){
		$query = $this->db->query("SELECT * FROM pesanan JOIN daftar_pesanan ON pesanan.id_pesanan = daftar_pesanan.id_pesanan INNER JOIN daftar_produk ON daftar_pesanan.`id_produk` = daftar_produk.`id_produk`INNER JOIN data_kantin ON daftar_produk.`id_kantin` = data_kantin.`id_kantin` LEFT JOIN data_sekolah ON data_kantin.id_sekolah = data_sekolah.id_sekolah WHERE id_pembeli = '$a' AND status = '1'");
		return $query->result();
	}
	public function validasi_checkout_keranjang($a){
		$query = $this->db->query("SELECT * FROM pesanan JOIN daftar_pesanan ON pesanan.id_pesanan = daftar_pesanan.id_pesanan INNER JOIN daftar_produk ON daftar_pesanan.`id_produk` = daftar_produk.`id_produk`INNER JOIN data_kantin ON daftar_produk.`id_kantin` = data_kantin.`id_kantin` WHERE id_pembeli = '$a' AND status = '1' AND status_produk = '1'");
		return $query->num_rows();
	}
	public function validasi_checkout_kantin($a){
		$query = $this->db->query("SELECT * FROM pesanan JOIN daftar_pesanan ON pesanan.id_pesanan = daftar_pesanan.id_pesanan INNER JOIN daftar_produk ON daftar_pesanan.`id_produk` = daftar_produk.`id_produk`INNER JOIN data_kantin ON daftar_produk.`id_kantin` = data_kantin.`id_kantin` WHERE id_pembeli = '$a' AND status = '1' AND status_produk = '1' AND status_kantin = '1'");
		return $query->num_rows();
	}
	public function jumlah_keranjang($a){
		$query = $this->db->query("SELECT * FROM pesanan JOIN daftar_pesanan ON pesanan.id_pesanan = daftar_pesanan.id_pesanan INNER JOIN daftar_produk ON daftar_pesanan.`id_produk` = daftar_produk.`id_produk`INNER JOIN data_kantin ON daftar_produk.`id_kantin` = data_kantin.`id_kantin` WHERE id_pembeli = '$a' AND status = '1'");
		return $query->num_rows();
	}
	public function total_keranjang($a){
		$query = $this->db->query("SELECT foto_produk,SUM(total_harga) AS jumlah,nama_produk,jumlah_pesanan,harga FROM daftar_pesanan JOIN pesanan ON daftar_pesanan.id_pesanan = pesanan.id_pesanan INNER JOIN daftar_produk ON daftar_pesanan.`id_produk` = daftar_produk.`id_produk`INNER JOIN data_kantin ON daftar_produk.`id_kantin` = data_kantin.`id_kantin` WHERE id_pembeli = '$a' AND status = '1'");
		return $query->row();
	}
	public function jml_rating($a){
		$query = $this->db->query("SELECT SUM(penilaian) AS penilaian, id_pembeli, id_kantin FROM report WHERE id_kantin = '$a' ");
		return $query->row();
	}
	public function detail_kantin($a){
		$query = $this->db->query("SELECT * FROM data_kantin INNER JOIN akun_penjual ON data_kantin.`id_penjual` = akun_penjual.`id_penjual` JOIN user ON akun_penjual.id_user = user.id_user INNER JOIN data_sekolah ON data_kantin.id_sekolah = data_sekolah.id_sekolah WHERE id_kantin = '$a'");
		return $query->row();
	}
	public function validasi_pengajuan($a){
		$query = $this->db->query("SELECT * FROM pengajuan_saldo JOIN user ON pengajuan_saldo.`id_user` = user.`id_user` WHERE user.`id_user` = '$a'");
		return $query->num_rows();
	}
	public function jml_report($id_pembeli, $id_kantin){
		$query = $this->db->query("SELECT * FROM report where id_pembeli = '$id_pembeli' AND id_kantin = '$id_kantin'");
		return $query->num_rows();
	}
	public function produk_kantin($a){
		$query = $this->db->query("SELECT COUNT(data_kantin.id_kantin) AS jml_transaksi, data_kantin.`id_kantin`, data_kantin.`id_penjual`, nama_kantin, daftar_produk.`id_produk`, foto_produk, daftar_produk.`id_kategori`, status_kantin, nama_produk, penilaian, daftar_produk.`status_produk`, daftar_produk.`harga` FROM daftar_produk JOIN data_kantin ON data_kantin.`id_kantin` = daftar_produk.`id_kantin` LEFT JOIN transaksi ON data_kantin.`id_kantin` = transaksi.`id_kantin` JOIN kategori_produk ON daftar_produk.id_kategori = kategori_produk.id_kategori WHERE data_kantin.id_kantin = '$a' GROUP BY daftar_produk.`id_produk` ORDER BY RAND()");
		return $query->result();
	}
	public function sekolah(){
		$query = $this->db->query("SELECT * FROM data_sekolah");
		return $query->result();
	}
	function search_produk($a){
		$query = $this->db->query("SELECT COUNT(data_kantin.id_kantin) AS jml_transaksi, data_kantin.`id_kantin`, data_kantin.`id_penjual`, nama_kantin, daftar_produk.`id_produk`, foto_produk, daftar_produk.`id_kategori`, status_kantin, nama_produk, penilaian, daftar_produk.`status_produk`, daftar_produk.`harga` FROM daftar_produk JOIN data_kantin ON data_kantin.`id_kantin` = daftar_produk.`id_kantin` LEFT JOIN transaksi ON data_kantin.`id_kantin` = transaksi.`id_kantin` JOIN kategori_produk ON daftar_produk.id_kategori = kategori_produk.id_kategori WHERE nama_produk LIKE '%$a%' GROUP BY daftar_produk.`id_produk`");
		return $query->result();
	}
	function filter_produk($kantin, $sekolah, $nilai){
		$query = $this->db->query("SELECT COUNT(data_kantin.id_kantin) AS jml_transaksi, data_kantin.`id_kantin`, data_kantin.`id_penjual`, nama_kantin, daftar_produk.`id_produk`, foto_produk, daftar_produk.`id_kategori`, status_kantin, nama_produk, nama_sekolah, penilaian, daftar_produk.`status_produk`, daftar_produk.`harga` FROM daftar_produk JOIN data_kantin ON data_kantin.`id_kantin` = daftar_produk.`id_kantin` LEFT JOIN transaksi ON data_kantin.`id_kantin` = transaksi.`id_kantin` JOIN kategori_produk ON daftar_produk.id_kategori = kategori_produk.id_kategori JOIN data_sekolah ON data_kantin.`id_sekolah` = data_sekolah.`id_sekolah` WHERE penilaian >= $nilai AND nama_kantin LIKE '%$kantin%' AND nama_sekolah LIKE '%$sekolah%' GROUP BY daftar_produk.`id_produk`");
		return $query->result();
	}
	public function get_total($a) 
    {
        return $this->db->get("$a")->num_rows();
    }
	function daftar_produk($limit,$mulai){
		$query = $this->db->query("SELECT COUNT(data_kantin.id_kantin) AS jml_transaksi, data_kantin.`id_kantin`, data_kantin.`id_penjual`, nama_kantin, daftar_produk.`id_produk`, foto_produk, daftar_produk.`id_kategori`, status_kantin, nama_produk, penilaian, daftar_produk.`status_produk`, daftar_produk.`harga` FROM daftar_produk JOIN data_kantin ON data_kantin.`id_kantin` = daftar_produk.`id_kantin` LEFT JOIN transaksi ON data_kantin.`id_kantin` = transaksi.`id_kantin` JOIN kategori_produk ON daftar_produk.id_kategori = kategori_produk.id_kategori GROUP BY daftar_produk.`id_produk` ORDER BY RAND() LIMIT $mulai,$limit");
		return $query->result();
	}
	function search_produk_kantin($a,$b){
		$query = $this->db->query("SELECT COUNT(data_kantin.id_kantin) AS jml_transaksi, data_kantin.`id_kantin`, data_kantin.`id_penjual`, nama_kantin, daftar_produk.`id_produk`, foto_produk, daftar_produk.`id_kategori`, status_kantin, nama_produk, penilaian, daftar_produk.`status_produk`, daftar_produk.`harga` FROM daftar_produk JOIN data_kantin ON data_kantin.`id_kantin` = daftar_produk.`id_kantin` LEFT JOIN transaksi ON data_kantin.`id_kantin` = transaksi.`id_kantin` JOIN kategori_produk ON daftar_produk.id_kategori = kategori_produk.id_kategori WHERE nama_produk LIKE '%$a%' AND data_kantin.id_kantin = '$b'");
		return $query->result();
	}
	function new_daftar_produk(){
		$query = $this->db->query("SELECT * FROM new_daftar_produk");
		return $query->result();
	}
	public function validasi_keranjang ($pembeli,$produk){
		$query = $this->db->query("SELECT * FROM pesanan JOIN daftar_pesanan ON pesanan.id_pesanan = daftar_pesanan.id_pesanan WHERE id_pembeli LIKE '$pembeli' AND id_produk LIKE '$produk' AND status = '1'");
		return $query->num_rows();
	}
	public function cek_keranjang ($pembeli){
		$query = $this->db->query("SELECT * FROM pesanan JOIN daftar_pesanan ON pesanan.id_pesanan = daftar_pesanan.id_pesanan WHERE id_pembeli = '$pembeli' AND status = '1' ");
		return $query->num_rows();
	}
	public function validasi_kantin_keranjang ($pembeli,$kantin){
		$query = $this->db->query("SELECT * FROM pesanan JOIN daftar_pesanan ON pesanan.id_pesanan = daftar_pesanan.id_pesanan INNER JOIN daftar_produk ON daftar_pesanan.id_produk = daftar_produk.id_produk WHERE id_pembeli LIKE '$pembeli' AND daftar_produk.id_kantin LIKE '$kantin' AND status = '1'");
		return $query->num_rows();
	}
	public function validasi_pesanan($pembeli){
		$query = $this->db->query("SELECT * FROM pesanan WHERE id_pembeli = '$pembeli'");
		return $query->num_rows();
	}
	public function data_validasi_keranjang ($pembeli,$produk){
		$query = $this->db->query("SELECT * FROM pesanan JOIN daftar_pesanan ON pesanan.id_pesanan = daftar_pesanan.id_pesanan WHERE id_pembeli LIKE '$pembeli' AND id_produk LIKE '$produk' AND status = '1'");
		return $query->row();
	}
	public function jml_data_user($id_user){
		$query = $this->db->query("SELECT * FROM user JOIN akun_pembeli ON user.id_user = akun_pembeli.id_user WHERE user.id_user = '$id_user' AND verifikasi = '1'");
		return $query->num_rows();
	}
	function update_data($id , $data_edit , $a , $b){
        $this->db->where($a , $id);
        $this->db->update($b , $data_edit);
    }
	public function data_user($a){
		$query = $this->db->query("SELECT * FROM user JOIN akun_pembeli ON user.id_user = akun_pembeli.id_user JOIN saldo ON user.id_user = saldo.id_user WHERE id_pembeli = '$a'");
		return $query->row();
	}
	public function data_kantin_saldo($a){
		$query = $this->db->query("SELECT saldo.id_saldo FROM data_kantin JOIN akun_penjual ON data_kantin.`id_penjual` = akun_penjual.`id_penjual` JOIN user ON akun_penjual.`id_user` = user.`id_user` JOIN saldo ON user.`id_user` = saldo.`id_user` WHERE id_kantin = '$a'");
		return $query->row();
	}
	public function data_user_pesanan($a){
		$query = $this->db->query("SELECT * FROM pesanan WHERE id_pembeli = '$a'");
		return $query->row();
	}
	public function id_pesanan($a){
		$query = $this->db->query("SELECT * FROM pesanan WHERE id_pembeli = '$a' AND STATUS = '1'");
		return $query->row();
	}
	public function riwayat_transaksi($a){
		$query = $this->db->query("SELECT * FROM transaksi LEFT JOIN data_kantin ON transaksi.`id_kantin` = data_kantin.`id_kantin` WHERE id_pembeli = '$a'ORDER BY tanggal DESC LIMIT 8");
		return $query->result();
	}
	function ubah_password($data,$id){
		$query = $this->db->query("UPDATE user SET PASSWORD = '$data' WHERE id_user = '$id';");
	}
	public function checkout($lokasi,$method,$pembeli,$ongkir,$jarak,$id_kantin){
		$query = $this->db->query("UPDATE pesanan SET id_kantin = '$id_kantin', alamat = '$lokasi',STATUS='2',method='$method', ongkir ='$ongkir', jarak='$jarak' WHERE id_pembeli='$pembeli' AND STATUS = '1'");
	}
	public function payment($a){
		$query = $this->db->query("CALL payment('$a');");
		return $query->result();
	}
	public function riwayat_pdf($a){
		$query = $this->db->query("CALL riwayat_transaksi('$a');");
		return $query->result();
	}
	public function detpes($a){
		$query = $this->db->query("SELECT * FROM daftar_pesanan JOIN pesanan ON daftar_pesanan.`id_pesanan` = pesanan.`id_pesanan` JOIN daftar_produk ON daftar_pesanan.id_produk = daftar_produk.id_produk  INNER JOIN data_kantin ON daftar_produk.id_kantin = data_kantin.id_kantin WHERE id_pembeli = '$a' AND status = '1'");
		return $query->result();
	}
	public function total_payment($a){
		$query = $this->db->query("SELECT foto_produk,SUM(total_harga) AS jumlah,nama_produk,jumlah_pesanan,harga FROM daftar_pesanan JOIN pesanan ON daftar_pesanan.id_pesanan = pesanan.id_pesanan INNER JOIN daftar_produk ON daftar_pesanan.`id_produk` = daftar_produk.`id_produk`INNER JOIN data_kantin ON daftar_produk.`id_kantin` = data_kantin.`id_kantin` WHERE id_pembeli = '$a' AND status > '1'");
		return $query->row();
	}
	public function cancel_pesanan($pesanan){
		$this->db->query("DELETE FROM pesanan WHERE id_pesanan = '$pesanan'");
	}
	public function konfirm_pesanan($id_pembeli, $id_transaksi){
		$this->db->query("CALL konfirm_pesanan('$id_pembeli', '$id_transaksi')");
	}
	public function jumlah_payment($pembeli){
		$query = $this->db->query("SELECT * FROM pesanan JOIN daftar_pesanan ON pesanan.id_pesanan = daftar_pesanan.id_pesanan WHERE id_pembeli = '$pembeli' AND STATUS >'1'");
		return $query->num_rows();
	}
	public function validasi_payment($pembeli){
		$query = $this->db->query("SELECT * FROM pesanan JOIN daftar_pesanan ON pesanan.id_pesanan = daftar_pesanan.id_pesanan JOIN daftar_produk ON daftar_pesanan.`id_produk` = daftar_pesanan.`id_produk` WHERE id_pembeli = '$pembeli' AND STATUS > 1 AND status_produk = 1");
		return $query->num_rows();
	}
	public function pesan_pembeli($id_kantin, $id_pembeli){
		$query = $this->db->query("SELECT * FROM message WHERE id_kantin = '$id_kantin' AND id_pembeli = '$id_pembeli' ORDER BY id_message ASC;");
		return $query->result();
	}
	public function search_kantin($a){
		$query = $this->db->query("SELECT
		  COUNT(`data_kantin`.`id_kantin`) AS `jml_transaksi`,
		  `data_kantin`.`id_kantin`       AS `id_kantin`,
		  `data_kantin`.`id_penjual`      AS `id_penjual`,
		  `data_sekolah`.`id_sekolah`     AS `id_sekolah`,
		  `data_kantin`.`nama_kantin`     AS `nama_kantin`,
		  `data_kantin`.`deskripsi`       AS `deskripsi`,
		  `data_sekolah`.`alamat_sekolah` AS `alamat_sekolah`,
		  `data_kantin`.`penilaian`       AS `penilaian`,
		  `data_kantin`.`status_kantin`   AS `status_kantin`,
		  `data_kantin`.`foto_kantin`     AS `foto_kantin`,
		  `akun_penjual`.`nama`           AS `nama`,
		  `data_sekolah`.`nama_sekolah`   AS `nama_sekolah`
		FROM (((`data_kantin`
			 LEFT JOIN `transaksi`
			   ON ((`data_kantin`.`id_kantin` = `transaksi`.`id_kantin`)))
			JOIN `akun_penjual`
			  ON ((`data_kantin`.`id_penjual` = `akun_penjual`.`id_penjual`)))
		   JOIN `data_sekolah`
			 ON ((`data_kantin`.`id_sekolah` = `data_sekolah`.`id_sekolah`))) WHERE nama_kantin LIKE '%$a%' OR nama_sekolah LIKE '%$a%' GROUP BY `data_kantin`.`id_kantin`");
		return $query->result();
	}
	public function filter_kantin($kantin, $sekolah, $nilai){
		$query = $this->db->query("SELECT
		  COUNT(`data_kantin`.`id_kantin`) AS `jml_transaksi`,
		  `data_kantin`.`id_kantin`       AS `id_kantin`,
		  `data_kantin`.`id_penjual`      AS `id_penjual`,
		  `data_sekolah`.`id_sekolah`     AS `id_sekolah`,
		  `data_kantin`.`nama_kantin`     AS `nama_kantin`,
		  `data_kantin`.`deskripsi`       AS `deskripsi`,
		  `data_sekolah`.`alamat_sekolah` AS `alamat_sekolah`,
		  `data_kantin`.`penilaian`       AS `penilaian`,
		  `data_kantin`.`status_kantin`   AS `status_kantin`,
		  `data_kantin`.`foto_kantin`     AS `foto_kantin`,
		  `akun_penjual`.`nama`           AS `nama`,
		  `data_sekolah`.`nama_sekolah`   AS `nama_sekolah`
		FROM (((`data_kantin`
			 LEFT JOIN `transaksi`
			   ON ((`data_kantin`.`id_kantin` = `transaksi`.`id_kantin`)))
			JOIN `akun_penjual`
			  ON ((`data_kantin`.`id_penjual` = `akun_penjual`.`id_penjual`)))
		   JOIN `data_sekolah`
			 ON ((`data_kantin`.`id_sekolah` = `data_sekolah`.`id_sekolah`))) WHERE penilaian >= $nilai AND nama_kantin LIKE '%$kantin%' AND nama_sekolah LIKE '%$sekolah%' GROUP BY `data_kantin`.`id_kantin`");
		return $query->result();
	}
	public function delete_pesanan_akhir($a){
		$this->db->query("DELETE FROM pesanan WHERE id_pembeli = '$a'");
	}
	public function delete_pesanan($a){
		$this->db->query("DELETE daftar_pesanan FROM pesanan JOIN daftar_pesanan ON pesanan.id_pesanan = daftar_pesanan.id_pesanan WHERE id_pembeli = '$a'");
		$this->db->query("DELETE FROM pesanan WHERE id_pembeli = '$a'");
	}
	public function pesanan($a){
		$query = $this->db->query("SELECT * FROM pesanan JOIN daftar_pesanan ON pesanan.`id_pesanan` = daftar_pesanan.`id_pesanan` JOIN daftar_produk ON daftar_pesanan.`id_produk` = daftar_produk.`id_produk` JOIN data_kantin ON daftar_produk.`id_kantin` = data_kantin.`id_kantin` JOIN akun_penjual ON data_kantin.`id_penjual` = akun_penjual.`id_penjual` JOIN user ON akun_penjual.`id_user` = user.`id_user` JOIN saldo ON user.`id_user` = saldo.`id_user` WHERE id_pembeli= '$a'");
		return $query->row();
	}
	public function pesanan_pembeli($a){
		$query = $this->db->query("SELECT * FROM saldo WHERE id_user = '$a'");
		return $query->row();
	}
}
?>