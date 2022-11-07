<?php
class Auth extends CI_controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_operator');
		$this->load->model('M_toko');
	}

	function login()
	{
		if (isset($_POST['submit'])) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$hasil	= $this->Model_operator->login($username, $password);
			if ($hasil == TRUE) {
				$this->db->where('username', $username);
				$this->db->update('operator', array('last_login' => date('Y-m-d')));
				$this->session->set_userdata(array(
					'id' => $hasil->row()->id_operator,
					'status_login' => 'oke',
					'username' => $hasil->row()->username,
					'nama_operator' => $hasil->row()->nama_operator,
				));
				redirect('Dashboard');
			} else {
				$this->session->set_flashdata('message_name', 'Username atau Password salah!!');
				redirect('Auth/login');
			}
		} else {
			$this->load->view('Form_login');
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('Auth/login');
	}
}
