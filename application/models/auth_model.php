<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model 
{
    public function create($formArray)
    {
        $this->db->insert("login",$formArray); 
    }
   public function getByUsername($username)
    {
        $this->db->where("email",$username);
       $user= $this->db->get("login")->row_array();
        return $user;

    }
}
