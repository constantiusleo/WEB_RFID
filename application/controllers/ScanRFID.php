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

    public function TagScanned()
    {
        $type = $this->input->post('costumer_data');
        for ($i = 1; $i <= $this->input->post('number'); $i++) {
            $EPC = $this->input->post("epc_" . $i);
            $data = array(
                'EPC' => $EPC,
                'Type' => $type,
                'Status' => 'AVAILABLE'
            );
            $this->Crud->input_data($data, 'master');
        }
        redirect(base_url('#'));
    }
}
