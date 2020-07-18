<?php
class M_switching extends CI_Model{

	function get_all_switching(){
		$hsl=$this->db->query("SELECT * FROM tbl_switching ORDER BY lokasi");
		return $hsl;
	} 

	function get_all_switchingid($idwitel){
		$hsl=$this->db->query("SELECT * FROM tbl_switching where idwitel='$idwitel' ORDER BY lokasi");
		return $hsl;
	} 
	
	function simpan_switching($data, $table){
		$this->db->insert($table,$data);
		return $hsl;
	}

	function get_switching_by_lokasi($lokasi){
		if($lokasi == "NON STO") $hsl=$this->db->query("SELECT * FROM tbl_switching WHERE lokasi NOT LIKE 'STO %'"); 
		else $hsl=$this->db->query("SELECT * FROM tbl_switching WHERE lokasi='$lokasi'");
		return $hsl;
	}

	function get_switching_by_lokasiid($lokasi,$idwitel){
		if($lokasi == "NON STO") $hsl=$this->db->query("SELECT * FROM tbl_switching WHERE lokasi NOT LIKE 'STO %' and idwitel='$idwitel'"); 
		else $hsl=$this->db->query("SELECT * FROM tbl_switching WHERE lokasi='$lokasi' and idwitel='$idwitel'");
		return $hsl;
	}

	function update_switching($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_switching($kode){
		$hsl=$this->db->query("DELETE FROM tbl_switching WHERE no_urut='$kode'");
		return $hsl;
	}

}