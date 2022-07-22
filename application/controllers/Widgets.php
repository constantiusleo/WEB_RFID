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
		$data['palet_biru'] = $this->Rfid_table->count_palet_biru();
		$data['palet_hijau'] = $this->Rfid_table->count_palet_hijau();
		$data['box_331'] = $this->Rfid_table->count_box_331();
		$data['palet_biru_available'] = $this->Rfid_table->count_palet_biru_available();
		$data['palet_hijau_available'] = $this->Rfid_table->count_palet_hijau_available();
		$data['box_331_available'] = $this->Rfid_table->count_box_331_available();
		$data['palet_biru_in_delivery'] = $this->Rfid_table->count_palet_biru_in_delivery();
		$data['palet_hijau_in_delivery'] = $this->Rfid_table->count_palet_hijau_in_delivery();
		$data['box_331_in_delivery'] = $this->Rfid_table->count_box_331_in_delivery();
		$data['s_type'] = $this->Rfid_table->distinct_type()->result();
		foreach ($data['s_type'] as $value) {
			$data['s_type_total'] = $this->Rfid_table->count_type($value->Type);
		}
		$data['content'] = 'widgets';
		$this->load->view($this->layout, $data);
	}
}
