<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies

	}

	// List all your items
	public function index()
	{
		$this->load->view('Admin/home');
	}

	// Add a new item
	public function add()
	{

	}

	//Update one item
	public function update( $id = NULL )
	{

	}

	//Delete one item
	public function delete( $id = NULL )
	{

	}
}

/* End of file Admin_home.php */
/* Location: ./application/controllers/Admin_home.php */
