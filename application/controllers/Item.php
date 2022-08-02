<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Rfid_table');
		$this->layout = 'template/container';
	}

	public function index()
	{
		$data['id_received'] = $this->input->post('id_send');
		$data['data'] = $this->Rfid_table->get()->result();
		$data['content'] = 'item';
		$this->load->view($this->layout, $data);
	}
}
