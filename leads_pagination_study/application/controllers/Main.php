<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{		
		// $this->load->view('index');
		redirect('/pagination/index');
	}

	public function index_table(){
		$this->load->model('Main_model');
		$data['leads'] = $this->Main_model->get_data_by_name($this->input->post());
		// $data['name'] = $this->input->post('name');
		$this->load->view('index', array('data' => $data));
	}
}
