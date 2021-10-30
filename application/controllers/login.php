<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function index()
	{
		$this->load->view('login');
         $this->load->library("form_validation");

	}
    public function auth(){
        
        $this->load->library("form_validation");
        $this->load->model('auth_model');
       $this->form_validation->set_rules('username','username','trim|required');
       $this->form_validation->set_rules('password','password','trim|required');
       if($this->form_validation->run()==true)
        {  
            $username=$this->input->post("username");
                $admin=$this->auth_model->getByUsername($username);
                
                if(!empty($admin))
                { 
                    $password=$this->input->post("password");
                    if(password_verify($password,$admin['password'])==true)
                    {  
                        $adminArray['id']=$admin['id'];
                        $adminArray['username']=$admin['name'];
                        $this->session->set_userdata("user",$adminArray);
                        redirect(base_url().'index.php/home');
                    }
                
                }
                else{ 
                    $this->session->set_flashdata('msg','Either Username or Password is incorrect');
                    redirect(base_url().'index.php/login');
                }
        }
        else{
            $this->load->view('login');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('user');
        redirect(base_url().'index.php/login');
    }
}
