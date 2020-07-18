<?php
class M_witel extends CI_Model{

	function get_all_witel(){
		$hsl=$this->db->query("SELECT * FROM tbl_witel");
		return $hsl;
	} 

	function get_sto($idwitel){
		$hsl=$this->db->query("SELECT * FROM tbl_witel where idwitel='$idwitel'");
		return $hsl;
	}
	
	function simpan_witel($data, $table){
		$this->db->insert($table,$data);
		//return $hsl;
	}

	function get_witel_by_id($id){
		$hsl=$this->db->query("SELECT * FROM tbl_witel WHERE idwitel='$id'");
		return $hsl;
	}

	function update_witel($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_witel($idwitel){
		$hsl=$this->db->query("DELETE FROM tbl_witel WHERE idwitel='$idwitel'");
		return $hsl;
	}

}