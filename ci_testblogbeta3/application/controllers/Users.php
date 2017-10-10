<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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
	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('Model_users');	
	}

	public function register()
	{
		$validator = array('success' => false, 'messages' => array());

		$validate_data = array(
			array(
				'field' => 'txtUsername',
				'label' => 'Username',
				'rules' => 'required|is_unique[users.username]|min_length[3]|max_length[12]'
			),
			array(
				'field' => 'txtPassword',
				'label' => 'Password',
				'rules' => 'required|matches[txtConfirmPass]|min_length[8]'
			),
			array(
				'field' => 'txtConfirmPass',
				'label' => 'Confirm Password',
				'rules' => 'required'
			),
			array(
				'field' => 'txtEmail',
				'label' => 'Email',
				'rules' => 'required|is_unique[users.email]|valid_email'
			)
		);

		$this->form_validation->set_rules($validate_data);
		$this->form_validation->set_message('is_unique', 'The {field} already exists');
		//$this->form_validation->set_message('integer', 'The {field} must be number');
		$this->form_validation->set_message('min_length[3]', 'The {field} must be atleast 3 characters');
		$this->form_validation->set_message('max_length[12]', 'The {field} must be not be morethan 12 characters');
		$this->form_validation->set_message('min_length[8]', 'The {field} must be atleast 8 characters');
		$this->form_validation->set_message('valid_email', 'Please enter a valid Email');
		$this->form_validation->set_error_delimiters('<div class="text-danger" style="font-size: 12px; margin-top:5px;">', '</div>');

		if($this->form_validation->run() === true) {

			$this->Model_users->register();

			$validator['success'] = true;
			$validator['messages'] = 'Successfully Registered';
		}
		else {
			$validator['success'] = false;
			foreach ($_POST as $key => $value) {
				$validator['messages'][$key] = form_error($key);
			}
		}

		echo json_encode($validator);

	}

	public function login()
	{

		$validator = array('success' => false, 'messages' => array(), 'username' => '');

		$validate_data = array(
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|callback_validate_email'
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required'
			)
		);

		$this->form_validation->set_rules($validate_data);
		//$this->form_validation->set_message('valid_email', 'Please enter a valid Email');

		$this->form_validation->set_error_delimiters('<div class="text-danger" style="font-size: 12px; margin-top:5px;">', '</div>');


		if($this->form_validation->run() === true) {

			$login = $this->Model_users->login();
			$username = $this->Model_users->getUsername();
			

				if($login) 
				{

					$this->load->library('session');

					$newdata = array(
		        	'user_id'  => $login,	        
		        	'logged_in' => TRUE
					);

					$this->session->set_userdata($newdata);

					$validator['success'] = true;
					$validator['messages'] = 'Succesfully Loggedin';
					$validator['username'] = $username;				
				} else {
					$validator['success'] = false;
					$validator['messages'] = 'Error Email/Password combination';					
					   }
			
			} else {
				$validator['success'] = false;
			    foreach ($_POST as $key => $value) {
				$validator['messages'][$key] = form_error($key);
				}
		
		}
		echo json_encode($validator);
	}

	public function validate_email()
	{
		$email = $this->Model_users->validate_email();

		if($email === true) {
			return true;
		} 
		else {
			$this->form_validation->set_message('validate_email', 'The {field} does not exists');
			return false;
		}
	}

}