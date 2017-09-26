<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function is_logged($username, $password){
        //$this->load->library('session');
        //$this->load->library('Encryption');

        $password = md5($password);

        if($logparams = $this->check_login($username, $password)){
            if($logparams == FALSE)
            {
               // Logovanje nije uspelo
               $this->session->set_flashdata('alogin_error', true);
               redirect('login');
            }
            else
            {
                // Uspesno logovanje
                if(empty($this->session->userdata('aloged_in'))){
                    $this->session->set_userdata('aloged_in',true);
                    $this->session->set_userdata('user_id',$logparams['id']);
                    $this->session->set_userdata('username',$logparams['name']);
                }
            }
        }
        return $logparams;
    }

    function check_login($username,$password){
         $query_str = "SELECT id, name, email FROM users  "
                . "WHERE email = ? AND password = ? ";
        $result = $this->db->query($query_str, array($username, $password));

        if ($result->num_rows()==1)
        {
           return $result->row_array(0);
        }
        else
        {
            return FALSE;
        }
    }
}
