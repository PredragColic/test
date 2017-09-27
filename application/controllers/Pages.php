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

    public function registration() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required|trim|is_unique[users.name]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('repassword', 're-password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Registration";
            $this->load->view('registration',$data);
        } else{
            $this->load->model('user_model');
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );
            $this->user_model->addUser($data);
            redirect('login');
        }
    }

    public function postRegistration($data) {
        
    }

    public function Logout() {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }

    public function category($id) {

        $this->load->model('post_model');
        $data['title'] = 'Posts in category';
        $data['posts'] = $this->post_model->getby('category_id', $id);

        $this->load->view('welcome_message', $data);
    }

    public function test() {
        $this->load->view('test');
    }

}
