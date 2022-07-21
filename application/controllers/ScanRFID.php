<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ScanRFID extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_m');
        $this->layout = 'template/container';
    }

    public function index()
    {
        $data['content'] = 'scanRFID';

        $data['data'] = $this->User_m->get()->result();
		$data['total'] = $this->User_m->count_row();
		$data['total_available'] = $this->User_m->count_available();
		$data['total_delivery'] = $this->User_m->count_in_delivery();
		$data['palet_biru_available'] = $this->User_m->count_palet_biru_available();
		$data['palet_hijau_available'] = $this->User_m->count_palet_hijau_available();
		$data['box_331_available'] = $this->User_m->count_box_331_available();
		$data['palet_biru_in_delivery'] = $this->User_m->count_palet_biru_in_delivery();
		$data['palet_hijau_in_delivery'] = $this->User_m->count_palet_hijau_in_delivery();
		$data['box_331_in_delivery'] = $this->User_m->count_box_331_in_delivery();
		$data['s_type'] = $this->User_m->distinct_type()->result();

        $this->load->view($this->layout, $data);
    }
}