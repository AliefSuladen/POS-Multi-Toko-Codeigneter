<?php

class Kategori extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		chek_role();
		$this->load->model('Model_kategori');
	}

	function index()
	{
		$data['record'] = $this->Model_kategori->tampilkan_data();
		$this->load->view('Form_login');
	}
}
