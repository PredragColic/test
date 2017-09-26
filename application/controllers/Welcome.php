<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->model('post_model');
		$data = [];
		$data['posts'] = $this->post_model->get_all();
		$this->load->view('welcome_message',$data);
	}
}
