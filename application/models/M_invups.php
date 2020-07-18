<?php
class M_invups extends CI_Model{

	function get_all_invups(){
		$hsl=$this->db->query("SELECT * FROM cme_invups ORDER BY lokasi");
		return $hsl;
	} 
	
	function simpan_invups($data, $table){
		$this->db->insert($table,$data);
		//return $hsl;
	}

	function get_invups_by_kode($kode){
		$hsl=$this->db->query("SELECT * FROM cme_invups WHERE nomor_urut='$kode'");
		return $hsl;
	}

	function get_invups_by_lokasi($lokasi){
		if($lokasi == "NON STO") $hsl=$this->db->query("SELECT * FROM cme_invups WHERE lokasi NOT LIKE 'STO %'"); 
		else $hsl=$this->db->query("SELECT * FROM cme_invups WHERE lokasi='$lokasi'");
		return $hsl;
	}

	function update_invups($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_invups($kode){
		$hsl=$this->db->query("DELETE FROM cme_invups WHERE nomor_urut='$kode'");
		return $hsl;
	}


	//Frontend
	function get_invups(){
		$hsl=$this->db->query("SELECT cme_invups.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM cme_invups ORDER BY nomor_urut DESC");
		return $hsl;
	}

	function get_invups_per_page($offset,$limit){
		$hsl=$this->db->query("SELECT cme_invups.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM cme_invups ORDER BY nomor_urut DESC LIMIT $offset,$limit");
		return $hsl;
	}
//===============//
	function get_all_invupsid($idwitel){
		$hsl=$this->db->query("SELECT * FROM cme_invups where idwitel='$idwitel' ORDER BY lokasi");
		return $hsl;
	} 

	function get_invups_by_lokasiid($lokasi,$idwitel){
		if($lokasi == "NON STO") $hsl=$this->db->query("SELECT * FROM cme_invups WHERE lokasi NOT LIKE 'STO %' and idwitel='$idwitel'"); 
		else $hsl=$this->db->query("SELECT * FROM cme_invups WHERE lokasi='$lokasi' and idwitel='$idwitel'");
		return $hsl;
	}

	//Frontend
	function get_invupsid($idwitel){
		$hsl=$this->db->query("SELECT cme_invups.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM cme_invups where idwitel='$idwitel' ORDER BY nomor_urut DESC");
		return $hsl;
	}

	function get_invups_per_pageid($offset,$limit,$idwitel){
		$hsl=$this->db->query("SELECT cme_invups.*,DATE_FORMAT(port_tanggal,'%d %M %Y') AS tanggal FROM cme_invups where idwitel='$idwitel' ORDER BY nomor_urut DESC LIMIT $offset,$limit");
		return $hsl;
	}
}