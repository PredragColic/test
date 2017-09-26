<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function index() {
        $this->load->view('welcome_message');
    }

    public function getLogin() {

        $this->load->view('login');
    }

    public function postLogin() {
        $this->load->model('login_model');

        extract($_POST);

        $id = $this->login_model->is_logged($email, $password);
        if (!$id) {
            // Logovanje nije uspelo
            redirect(base_url('login'));
        } else {
            // Uspesno logovanje
            redirect(base_url());
        }
    }

    public function getRegistration() {
        $this->load->view('registration');
    }

    public function postRegistration($data) {
        
    }

    public function Logout() {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
   
    
    public function test(){
        $this->load->view('test');
    }

}
