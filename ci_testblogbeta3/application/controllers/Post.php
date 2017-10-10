<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

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
		$this->load->model('Post_model');	
	}

	public function showAllPosts()
	{
		$this->load->model('Post_model');
		$result = $this->Post_model->showAllPosts();
		echo json_encode($result);
	}

	public function addPost()
	{
		//$this->load->library('form_validation');
		$validator = array('success' => false, 'messages' => array());

		$validate_data = array(
			array(
				'field' => 'title',
				'label' => 'Title',
				'rules' => 'required'
			),
			array(
				'field' => 'postBody',
				'label' => 'Body',
				'rules' => 'required'
			)
		);

		$this->form_validation->set_rules($validate_data);
		//$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		$this->form_validation->set_error_delimiters('<div class="text-danger" style="font-size: 12px; margin-top:5px;">', '</div>');

		//$this->load->model('Post_model');
		//$query = $this->Post_model->addPosts();
		//echo '<pre>';
		//print_r($query);
		//echo var_dump($query);
		//exit;

		if($this->form_validation->run() === true) {

			$this->load->model('Post_model');
			
			if ($query = $this->Post_model->addPosts()) {
				
				$validator['success'] = true;
				$validator['messages'] = 'Successfully Posted';
			} else {
				$validator['success'] = false;
				$validator['messages'] = 'error';
			}

		} else {
			$validator['success'] = false;
			foreach ($_POST as $key => $value) {
				$validator['messages'][$key] = form_error($key);
			}
		}

		echo json_encode($validator);
	}

	public function add()
	{
		$result = $this->Post_model->add();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function editPost()
	{
		$result = $this->Post_model->editPost();
		echo json_encode($result);
	}

	public function UpdatePost()
	{
		$result = $this->Post_model->updatePost();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

}