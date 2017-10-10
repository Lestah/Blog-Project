<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_users extends CI_Model {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function register()
	{

		$salt = $this->salt();

		$password = $this->makePassword($this->input->post('txtPassword'), $salt);

		$insert_data = array(
			'username' => $this->input->post('txtUsername'),
			'password' => $password,
			'salt' => $salt,
			'email' => $this->input->post('txtEmail')
			//'mobile' => $this->input->post('txtMobile')
		);

		$this->db->insert('users', $insert_data);
	}

	public function salt()
	{
		return password_hash("rasmuslerdorf", PASSWORD_DEFAULT);
	}

	public function makePassword($password = null, $salt = null)
	{
		if($password && $salt) {
			return hash('sha256', $password.$salt);
		}
	}

	public function validate_email() 
	{
		$email = $this->input->post('email');
		$sql = "SELECT * FROM users WHERE email = ?";
		$query = $this->db->query($sql, array($email));
		return ($query->num_rows() == 1) ? true: false; 
	}

	public function fetchDataByEmail($email = null) 
	{
		if($email) {
			$sql = "SELECT salt FROM users WHERE email = ?";
			$query = $this->db->query($sql, array($email));
			$result = $query->row_array();

			return ($query->num_rows() == 1) ? $result : false;
			return $result;
		}
	}

	public function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$userData = $this->fetchDataByEmail($email);

		if($userData) {
			$password = $this->makePassword($password, $userData['salt']);	

			$sql = "SELECT * FROM users WHERE email = ? AND password = ?";
			$query = $this->db->query($sql, array($email, $password));
			$result = $query->row_array();

			return ( $query->num_rows() == 1 ) ? $result['id'] : false;
		} // /if
		else {
			return false;
		} // /else
	}

	public function getUsername()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$userData = $this->fetchDataByEmail($email);

		if($userData) {
			$password = $this->makePassword($password, $userData['salt']);	

			$sql = "SELECT * FROM users WHERE email = ? AND password = ?";
			$query = $this->db->query($sql, array($email, $password));
			$result = $query->row_array();

			return ( $query->num_rows() == 1 ) ? $result['username'] : false;
		} // /if
		else {
			return false;
		} // /else
	}


	
}