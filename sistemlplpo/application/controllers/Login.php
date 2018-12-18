<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form','url','file'));
		$this->load->helper('html');
		$this->load->library('session');
		$this->load->library('simple_login');
		$this->load->library('form_validation');
		$this->load->library('table');
		$this->load->library('template');
		$this->load->database();
	}

	// Index login
	public function index() {
		// Fungsi Login
		$valid = $this->form_validation;
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$valid->set_rules('username','Username','required');
		$valid->set_rules('password','Password','required');
		if($valid->run()) {
			$this->simple_login->login($username,$password);
		}
		/*if(!isset($_SESSION['username'])){
			$data = array('title' => 'Halaman Login Administrator');
			$this->load->view('login/login',$data);
		} elseif ($_SESSION['username']=='admin') {
			redirect('home');
		}*/
		// End fungsi login
		$this->load->view('login/login');
	}

	// Logout di sini
	public function logout() {
		$this->simple_login->logout();
	}
}
