<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	 
	public function __construct()
	{
		parent::__construct();
		$admin=$this->session->userdata("user");
		if(empty($admin))
		{ 
			$this->session->set_flashdata("msg",'your session is over');

			redirect(base_url().'index.php/login');
		}
		
	}
    public function index()
	{
		$admin=$this->session->userdata("user");
		$this->load->view('dashboard');
	}
}