<?php

class User_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function check($email, $username) {
		$this->db->where(['email' => $email, 'username' => $username]);
		$query = $this->db->get('users');
		return $query->result();
	}

	function checklogin($username, $password) {
		$this->db->where(['username' => $username, 'password' => md5($password), 'status' => '0']);
		$query = $this->db->get('users');
		return $query->result();
	}

	public function get_users() {

		//$this->db->select('*');
		//$this->db->from('users');
		//$query = $this->db->get();
		$query = $this->db->get('users');
		return $query->result();
	}

	public function insert($data) {

		//insert user data to users table
		$insert = $this->db->insert('users', $data);

		//return the status
		return $insert?$this->db->insert_id():false;
	}

	public function delete($id) {

		$this->db->where('id', $id);

		$result = $this->db->delete('users');
		if ($result) {
			return "Data is deleted successfully";
		} else {
			return "Error has occurred";
		}

	}

}
?>