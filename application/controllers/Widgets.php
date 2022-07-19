<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Widgets extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_m');
		$this->load->model('Total');
		$this->layout = 'template/container';
	}

	public function index()
	{
		$data['data'] = $this->User_m->get()->result();
		$data['total'] = $this->Total->count_row();
		$data['content'] = 'widgets';
		$this->load->view($this->layout, $data);
	}
}
