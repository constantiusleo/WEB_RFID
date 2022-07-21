<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InputNewType extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rfid_table');
        $this->load->model('Type_table');
        $this->load->model('Crud');
        $this->layout = 'template/container';
    }

    public function index()
    {
        $data['data'] = $this->Type_table->get()->result();
        $data['palet_biru_available'] = $this->Rfid_table->count_palet_biru_available();
        $data['palet_hijau_available'] = $this->Rfid_table->count_palet_hijau_available();
        $data['palet_biru_in_delivery'] = $this->Rfid_table->count_palet_biru_in_delivery();
        $data['palet_hijau_in_delivery'] = $this->Rfid_table->count_palet_hijau_in_delivery();
        $data['content'] = 'inputNewType';
        $this->load->view($this->layout, $data);
    }

    public function NewType()
    {
        $type = $this->input->post('type');

        $data = array(
            'Type' => $type
        );
        $this->Crud->input_data($data, 'Type_table');
        redirect(base_url('InputNewType'));
    }
}
