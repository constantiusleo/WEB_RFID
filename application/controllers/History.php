<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Header_table');
		$this->load->model('Item_table');
		$this->layout = 'template/container';
	}

	public function index()
	{
		$data['data'] = $this->Header_table->get()->result();
		$data['content'] = 'history';
		$this->load->view($this->layout, $data);
	}

	public function choose_ID()
	{
		$id_received = $this->input->post('id_send');

		$data['table_send'] = $this->Item_table->get_table_by_id($id_received)->result();

		$data['status'] = true;
		if ('IS_AJAX') {
			echo json_encode($data);
		}
	}
}
