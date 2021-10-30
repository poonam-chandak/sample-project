<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct()
{
parent::__construct();
$this->load->library ("form_validation");
$this->load->helper(array("url", "form"));
$this->load->model("auth_model"); 
}
	public function index()
	{
		$this->load->view('welcome_message');
        $this->load->library("form_validation");

	}
    // this function will show register page
    public function register(){
        $this->load->helper(array('form', 'url'));
        if(!empty($this->input->post())){
        $this->load->library("form_validation");
        $this->form_validation->set_rules('name','Name',"trim|required");
        $this->form_validation->set_rules('email','Email',"trim|required|valid_email");
        $this->form_validation->set_rules('phone','Phone',"trim|required|max_length[10]|min_length[9]|regex_match[/^[0-9]{10}$/]");
        $this->form_validation->set_rules('password','Password',"trim|required|min_length[8]");
       
        
        if($this->form_validation->run()==FALSE)
        {

            $this->load->view("register"); 
        }

        else{
            $formArray= array();
            $formArray['name']=$this->input->post('name');
            $formArray['email']=$this->input->post('email');
            $formArray['password']=password_hash($this->input->post('password'),PASSWORD_DEFAULT);
            $formArray['phone']=$this->input->post('phone');
            $formArray['created_at']=date('y-m-d h:i:s');
                $this->auth_model->create($formArray);
                $this->session->set_flashdata('msg',"You are registed now.");
                redirect(base_url().'index.php/login');

            }
        }
        else{ 
            $this->load->view("register");

        }

    }

}
