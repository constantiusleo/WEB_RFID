<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ScanRFID extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rfid_table');
        $this->layout = 'template/container';
    }

    public function index()
    {
        $data['content'] = 'scanRFID';
        $data['palet_biru_available'] = $this->Rfid_table->count_palet_biru_available();
        $data['palet_hijau_available'] = $this->Rfid_table->count_palet_hijau_available();
        $data['palet_biru_in_delivery'] = $this->Rfid_table->count_palet_biru_in_delivery();
        $data['palet_hijau_in_delivery'] = $this->Rfid_table->count_palet_hijau_in_delivery();
        $data['customer'] = $this->input->post('customer');
        $this->load->view($this->layout, $data);
    }
}
