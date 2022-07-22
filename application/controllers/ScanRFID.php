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
        $data['customer'] = $this->input->post('customer');
        $this->load->view($this->layout, $data);
    }
}
