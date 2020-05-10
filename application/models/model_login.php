<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_login extends CI_model {
	
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
	function akun_penjual($id){
		 $query = $this->db->query("SELECT * FROM akun_penjual WHERE id_user = '$id'");
		 return $query->row();
	}
}
?>