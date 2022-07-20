<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Widgets extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_m');
		$this->layout = 'template/container';
	}

	public function index()
	{
		$data['data'] = $this->User_m->get()->result();
		$data['total'] = $this->User_m->count_row();
		$data['total_available'] = $this->User_m->count_available();
		$data['total_delivery'] = $this->User_m->count_in_delivery();
		$data['s_type'] = $this->User_m->distinct_type()->result();
		$data['content'] = 'widgets';
		$this->load->view($this->layout, $data);
	}
}
