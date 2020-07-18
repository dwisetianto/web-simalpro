<?php
class M_event extends CI_Model{

	function get_all_galeri(){
		$hsl=$this->db->query("SELECT tbl_galeri.*,DATE_FORMAT(galeri_tanggal,'%d/%m/%Y') AS tanggal,album_nama FROM tbl_galeri join tbl_album on galeri_album_id=album_id ORDER BY galeri_id DESC");
		return $hsl;
	}
	function get_all_event(){
		$hsl=$this->db->query("SELECT *,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal FROM tbl_event");
		return $hsl;
	}

	function get_event_by_lokasi($lokasi){
		if($lokasi == "NON STO") $hsl=$this->db->query("SELECT *,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal FROM tbl_event WHERE lokasi NOT LIKE 'STO %'"); 
		else $hsl=$this->db->query("SELECT *,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal FROM tbl_event WHERE lokasi='$lokasi'");
		return $hsl;
	}

	function get_all_eventid($idwitel){
		$hsl=$this->db->query("SELECT *,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal FROM tbl_event where idwitel='$idwitel' ");
		return $hsl;
	}

	function get_event_by_lokasiid($lokasi,$idwitel){
		if($lokasi == "NON STO") $hsl=$this->db->query("SELECT *,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal FROM tbl_event WHERE lokasi NOT LIKE 'STO %' and idwitel='$idwitel' "); 
		else $hsl=$this->db->query("SELECT *,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal FROM tbl_event WHERE lokasi='$lokasi' and idwitel='$idwitel'");
		return $hsl;
	}

	function simpan_event($data, $table){
		$this->db->insert($table,$data);
	}
	
	function update_event($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_event($kode){
		$hsl=$this->db->query("DELETE FROM tbl_event WHERE id_event='$kode'");
		return $hsl;
	}

	//Front-End
	function get_galeri_home(){
		$hsl=$this->db->query("SELECT tbl_galeri.*,DATE_FORMAT(galeri_tanggal,'%d/%m/%Y') AS tanggal,album_nama FROM tbl_galeri join tbl_album on galeri_album_id=album_id ORDER BY galeri_id DESC limit 4");
		return $hsl;
	}

	function get_galeri_by_album_id($idalbum){
		$hsl=$this->db->query("SELECT tbl_galeri.*,DATE_FORMAT(galeri_tanggal,'%d/%m/%Y') AS tanggal,album_nama FROM tbl_galeri join tbl_album on galeri_album_id=album_id where galeri_album_id='$idalbum' ORDER BY galeri_id DESC");
		return $hsl;
	}
	

}