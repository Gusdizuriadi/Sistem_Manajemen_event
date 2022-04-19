<?php
class user_model extends CI_Model{
	
	function get_user(){
		$hsl=$this->db->query("SELECT * FROM user");
		return $hsl;
	}

	function insert_user($nama,$pass,$level,$email,$gambar){
		$hsl=$this->db->query("INSERT INTO user(name_user,password_user,level_user,email_user,foto_user,status_user) VALUES ('$nama','$email',MD5('$pass'),'$level','1','$gambar')");
		return $hsl;
	}

	function insert_user_noimg($nama,$email,$pass,$level){
		$hsl=$this->db->query("INSERT INTO user(name_user,email_user,password_user,level_user,status_user) VALUES ('$nama','$email',MD5('$pass'),'$level','1')");
		return $hsl;
	}

	function update_user_nopass($id_user,$nama,$email,$level,$gambar){
		$hsl=$this->db->query("UPDATE user SET name_user='$nama',email_user='$email',level_user='$level',foto_user='$gambar' WHERE id_user='$id_user'");
		return $hsl;
	}

	function update_user_nopassimg($id_user,$nama,$email,$level){
		$hsl=$this->db->query("UPDATE user SET name_user='$nama',email_user='$email',level_user='$level' WHERE id_user='$id_user'");
		return $hsl;
	}

	function update_user($id_user,$nama,$email,$pass,$level,$gambar){
		$hsl=$this->db->query("UPDATE user SET name_user='$nama',email_user='$email',password_user=MD5('$pass'),level_user='$level',foto_user='$gambar' WHERE id_user='$id_user'");
		return $hsl;
	}

	function update_user_noimg($id_user,$nama,$email,$pass,$level){
		$hsl=$this->db->query("UPDATE user SET name_user='$nama',email_user='$email',password_user=MD5('$pass'),level_user='$level' WHERE id_user='$id_user'");
		return $hsl;
	}

	function lock_user($id_user){
		$hsl=$this->db->query("UPDATE user SET user_status='0' WHERE id_user='$id_user'");
		return $hsl;
	}

	function unlock_user($id_user){
		$hsl=$this->db->query("UPDATE user SET user_status='1' WHERE id_user='$id_user'");
		return $hsl;
	}

	function delete_user($id_user){
		$hsl=$this->db->query("DELETE FROM user WHERE id_user='$id_user'");
		return $hsl;
	}

	function validasi_email($email){
		$hsl=$this->db->query("SELECT * FROM user WHERE email_user='$email'");
		return $hsl;
	}
}