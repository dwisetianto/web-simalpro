<?php
class M_sto extends CI_Model{

	function get_sto_by_lokasi($lokasi){
		if($lokasi == "NON STO") $hsl=$this->db->query("SELECT * FROM tbl_landing WHERE lokasi NOT LIKE 'STO %'"); 
		else $hsl=$this->db->query("SELECT * FROM tbl_landing WHERE lokasi='$lokasi'");
		return $hsl;
	}
	
	function get_sto_by_lokasiid($lokasi,$idwitel){
		if($lokasi == "NON STO") $hsl=$this->db->query("SELECT * FROM tbl_landing WHERE lokasi NOT LIKE 'STO %' and idwitel='$idwitel'"); 
		else $hsl=$this->db->query("SELECT * FROM tbl_landing WHERE lokasi='$lokasi' and idwitel='$idwitel'");
		return $hsl;
	}

	function simpan($data, $table){
		$this->db->insert($table,$data);
	}

	function get_nama($kode){
		$hsl=$this->db->query("SELECT * FROM tbl_denah WHERE no_urut='$kode'");
		return $hsl;
	}
	
	function update($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_denah($kode){
		$hsl=$this->db->query("DELETE FROM tbl_denah WHERE no_urut='$kode'");
		return $hsl;
	}

}