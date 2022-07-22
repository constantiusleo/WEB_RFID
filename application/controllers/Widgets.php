<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Widgets extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Rfid_table');
		$this->layout = 'template/container';
	}

	public function index()
	{
		$data['data'] = $this->Rfid_table->get()->result();
		$data['total'] = $this->Rfid_table->count_row();
		$data['total_available'] = $this->Rfid_table->count_available();
		$data['total_delivery'] = $this->Rfid_table->count_in_delivery();
		$data['s_type'] = $this->Rfid_table->distinct_type()->result();
		$data['s_type_total'] = array();
		$data['s_type_total_available'] = array();
		$data['s_type_total_in_delivery'] = array();
		foreach ($data['s_type'] as $st) {
			$data['s_type_total'][$st->Type] = $this->Rfid_table->count_type($st->Type);
			$data['s_type_total_available'][$st->Type] = $this->Rfid_table->count_type_available($st->Type);
			$data['s_type_total_in_delivery'][$st->Type] = $this->Rfid_table->count_type_in_delivery($st->Type);
		}
		$data['content'] = 'widgets';
		$this->load->view($this->layout, $data);
	}
}
