<?php
class M_metro extends CI_Model{

	function get_all_metro(){
		$hsl=$this->db->query("SELECT * FROM tbl_metro ORDER BY nama_metro");
		return $hsl;
	} 
	
	function simpan_metro($data, $table){
		$this->db->insert($table,$data);
		return $hsl;
	}

	function get_metro_by_kode($kode){
		$hsl=$this->db->query("SELECT * FROM tbl_metro WHERE tro_id='$kode'");
		return $hsl;
	}

	function get_metro_by_lokasi($lokasi,$kode){
		$key = "";
		$hsl;
		if($lokasi == "NON STO") {
			if ($kode == 1) $hsl=$this->db->query("SELECT * FROM tbl_metro WHERE (kelompok='METRO ETHERNET' AND lokasi NOT LIKE 'STO %') OR (kelompok='E1 CES' AND  lokasi NOT LIKE 'STO %') ORDER BY kelompok");
			else if ($kode == 2) $hsl=$this->db->query("SELECT * FROM tbl_metro WHERE kelompok='IP BACKBONE' AND lokasi NOT LIKE 'STO %'");
			else if ($kode == 3) $hsl=$this->db->query("SELECT * FROM tbl_metro WHERE kelompok='ONE NETWORK' AND lokasi NOT LIKE 'STO %'");
			else if ($kode == 4) $hsl=$this->db->query("SELECT * FROM tbl_metro WHERE kelompok='IP BROADBAND' AND lokasi NOT LIKE 'STO %'");
			else if ($kode == 5) $hsl=$this->db->query("SELECT * FROM tbl_metro WHERE kelompok='DATA NETWORK' AND lokasi NOT LIKE 'STO %'");
		}
		else  {
			if ($kode == 1) $hsl=$this->db->query("SELECT * FROM tbl_metro WHERE (kelompok='METRO ETHERNET' AND lokasi='$lokasi') OR (kelompok='E1 CES' AND lokasi='$lokasi') ORDER BY kelompok");
			else if ($kode == 2) $hsl=$this->db->query("SELECT * FROM tbl_metro WHERE kelompok='IP BACKBONE' AND lokasi='$lokasi'");
			else if ($kode == 3) $hsl=$this->db->query("SELECT * FROM tbl_metro WHERE kelompok='ONE NETWORK' AND lokasi='$lokasi'");
			else if ($kode == 4) $hsl=$this->db->query("SELECT * FROM tbl_metro WHERE kelompok='IP BROADBAND' AND lokasi='$lokasi'");
			else if ($kode == 5) $hsl=$this->db->query("SELECT * FROM tbl_metro WHERE kelompok='DATA NETWORK' AND lokasi='$lokasi'");
		}
		//$hsl=$this->db->query("SELECT * FROM tbl_metro WHERE tro_id='$kode'");
		return $hsl;
	}

	function get_metro_by_cat($kode){
		$key = "";
		if ($kode == 1) $hsl=$this->db->query("SELECT * FROM tbl_metro WHERE kelompok='METRO ETHERNET' OR kelompok='E1 CES' ORDER BY kelompok");
		else if ($kode == 2) $hsl=$this->db->query("SELECT * FROM tbl_metro WHERE kelompok='IP BACKBONE'");
		else if ($kode == 3) $hsl=$this->db->query("SELECT * FROM tbl_metro WHERE kelompok='ONE NETWORK'");
		else if ($kode == 4) $hsl=$this->db->query("SELECT * FROM tbl_metro WHERE kelompok='IP BROADBAND'");
		else if ($kode == 5) $hsl=$this->db->query("SELECT * FROM tbl_metro WHERE kelompok='DATA NETWORK'");
		//$hsl=$this->db->query("SELECT * FROM tbl_metro WHERE tro_id='$kode'");
		return $hsl;
	}

	function update_metro($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_metro($kode){
		$hsl=$this->db->query("DELETE FROM tbl_metro WHERE no='$kode'");
		return $hsl;
	}


	//==============//
	function get_all_metroid($idwitel){
		$hsl=$this->db->query("SELECT * FROM tbl_metro where idwitel='$idwitel' ORDER BY nama_metro");
		return $hsl;
	} 

	function get_metro_by_lokasiid($lokasi,$kode,$idwitel){
		$key = "";
		$hsl;
		if($lokasi == "NON STO") {
			if ($kode == 1) $hsl=$this->db->query("SELECT * FROM tbl_metro WHERE ((kelompok='METRO ETHERNET' AND lokasi NOT LIKE 'STO %') OR (kelompok='E1 CES' AND  lokasi NOT LIKE 'STO %')) and idwitel='$idwitel'  ORDER BY kelompok");
			else if ($kode == 2) $hsl=$this->db->query("SELECT * FROM tbl_metro WHERE kelompok='IP BACKBONE' AND lokasi NOT LIKE 'STO %' and idwitel='$idwitel' ");
			else if ($kode == 3) $hsl=$this->db->query("SELECT * FROM tbl_metro WHERE kelompok='ONE NETWORK' AND lokasi NOT LIKE 'STO %' and idwitel='$idwitel'");
			else if ($kode == 4) $hsl=$this->db->query("SELECT * FROM tbl_metro WHERE kelompok='IP BROADBAND' AND lokasi NOT LIKE 'STO %' and idwitel='$idwitel'");
			else if ($kode == 5) $hsl=$this->db->query("SELECT * FROM tbl_metro WHERE kelompok='DATA NETWORK' AND lokasi NOT LIKE 'STO %' and idwitel='$idwitel'");
		}
		else  {
			if ($kode == 1) $hsl=$this->db->query("SELECT * FROM tbl_metro WHERE ((kelompok='METRO ETHERNET' AND lokasi='$lokasi') OR (kelompok='E1 CES' AND lokasi='$lokasi')) and idwitel='$idwitel' ORDER BY kelompok");
			else if ($kode == 2) $hsl=$this->db->query("SELECT * FROM tbl_metro WHERE kelompok='IP BACKBONE' AND lokasi='$lokasi' and idwitel='$idwitel'");
			else if ($kode == 3) $hsl=$this->db->query("SELECT * FROM tbl_metro WHERE kelompok='ONE NETWORK' AND lokasi='$lokasi' and idwitel='$idwitel'");
			else if ($kode == 4) $hsl=$this->db->query("SELECT * FROM tbl_metro WHERE kelompok='IP BROADBAND' AND lokasi='$lokasi' and idwitel='$idwitel'");
			else if ($kode == 5) $hsl=$this->db->query("SELECT * FROM tbl_metro WHERE kelompok='DATA NETWORK' AND lokasi='$lokasi' and idwitel='$idwitel'");
		}
		//$hsl=$this->db->query("SELECT * FROM tbl_metro WHERE tro_id='$kode'");
		return $hsl;
	}

	function get_metro_by_catid($kode,$idwitel){
		$key = "";
		if ($kode == 1) $hsl=$this->db->query("SELECT * FROM tbl_metro WHERE (kelompok='METRO ETHERNET' OR kelompok='E1 CES') and idwitel='$idwitel' ORDER BY kelompok");
		else if ($kode == 2) $hsl=$this->db->query("SELECT * FROM tbl_metro WHERE kelompok='IP BACKBONE' and idwitel='$idwitel'");
		else if ($kode == 3) $hsl=$this->db->query("SELECT * FROM tbl_metro WHERE kelompok='ONE NETWORK' and idwitel='$idwitel'");
		else if ($kode == 4) $hsl=$this->db->query("SELECT * FROM tbl_metro WHERE kelompok='IP BROADBAND' and idwitel='$idwitel'");
		else if ($kode == 5) $hsl=$this->db->query("SELECT * FROM tbl_metro WHERE kelompok='DATA NETWORK' and idwitel='$idwitel'");
		//$hsl=$this->db->query("SELECT * FROM tbl_metro WHERE tro_id='$kode'");
		return $hsl;
	}
}