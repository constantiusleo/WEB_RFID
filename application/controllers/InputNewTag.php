<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InputNewTag extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rfid_table');
        $this->load->model('Type_table');
        $this->load->model('Crud');
        $this->layout = 'template/container';
        $this->load->helper('form');
    }

    public function index()
    {
        $data['data'] = $this->Type_table->get()->result();
        $data['palet_biru_available'] = $this->Rfid_table->count_palet_biru_available();
        $data['palet_hijau_available'] = $this->Rfid_table->count_palet_hijau_available();
        $data['palet_biru_in_delivery'] = $this->Rfid_table->count_palet_biru_in_delivery();
        $data['palet_hijau_in_delivery'] = $this->Rfid_table->count_palet_hijau_in_delivery();

        $data['content'] = 'inputNewTag';
        $this->load->view($this->layout, $data);
    }

    public function NewTag()
    {
        $type = $this->input->post('select_type');
        // $EPC = $this->input->post('EPC');
        $EPC = 'TEST';

        $data = array(
            'EPC' => $EPC,
            'Type' => $type,
            'Status' => 'AVAILABLE'
        );
        $this->Crud->input_data($data, 'master');
        redirect(base_url('#'));
    }
}
