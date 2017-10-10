<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {

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
	public function index()
	{
		//$this->load->view('welcome_message');
		$this->load->view('includes/header.php');
		$this->load->view('index.php');
		$this->load->view('includes/footer.php');
	}

	public function showAllPosts()
	{
		$this->db->order_by('created_at', 'desc');
		$query = $this->db->get('posts');
		if($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function addPosts()
	{
		$new_post_insert_data = array(
			'post_title' => $this->input->post('title'),
			'post_body' => $this->input->post('postBody')
			);

		$insert = $this->db->insert('posts', $new_post_insert_data);
		return $insert;

	}

	public function add()
	{
		$field = array(
			'post_title'=>$this->input->post('title'),
			'post_body'=>$this->input->post('postBody')
			//'created_at'=>date('Y-m-d H:i:s')
			);
		$this->db->insert('posts', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function editPost()
	{
		$id = $this->input->get('post_id');
		$this->db->where('post_id', $id);
		$query = $this->db->get('posts');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updatePost(){
		$id = $this->input->post('txtId');
		$field = array(
		'post_title'=>$this->input->post('title'),
		'post_body'=>$this->input->post('postBody')
		//'updated_at'=>date('Y-m-d H:i:s')
		);
		$this->db->where('post_id', $id);
		$this->db->update('posts', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

}